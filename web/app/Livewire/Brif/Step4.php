<?php

namespace App\Livewire\Brif;

use Livewire\Component;
use App\Services\PredictionService;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Models\Questionare;
use App\Models\QuestionareField;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Step4 extends Component
{
    public $form = [];
    public $serviceType = '';

    public function mount()
    {
        $step1Data = Session::get(SessionConstants::STEP1_FORM, []);
        $step3Data = Session::get(SessionConstants::STEP3_FORM, []);
        $step2Data = $this->getStep2Data($step1Data['service_type'] ?? '');

        $this->form = array_merge($step1Data, $step2Data, $step3Data);
        $this->serviceType = $step1Data['service_type'] ?? '';
    }

    private function getStep2Data($serviceType)
    {
        return match($serviceType) {
            'SEO-продвижение' => Session::get(SessionConstants::SEO_FORM, []),
            'Зарубежное SEO' => Session::get(SessionConstants::SEO_FOREIGN_FORM, []),
            'GEO-продвижение' => Session::get(SessionConstants::GEO_FORM, []),
            'Перформанс-маркетинг' => Session::get(SessionConstants::PERFORMANCE_FORM, []),
            'Контекстная реклама' => Session::get(SessionConstants::CONTEXT_FORM, []),
            'SERM (управление репутацией)' => Session::get(SessionConstants::SERM_FORM, []),
            'Контент-поддержка' => Session::get(SessionConstants::CONTENT_FORM, []),
            'Веб-аналитика' => Session::get(SessionConstants::ANALYTICS_FORM, []),
            'Аутстафф' => Session::get(SessionConstants::OUTSTAFF_FORM, []),
            default => [],
        };
    }

    private function getStep2Route()
    {
        return match($this->serviceType) {
            'SEO-продвижение' => 'seo',
            'Зарубежное SEO' => 'seo-foreign',
            'GEO-продвижение' => 'geo',
            'Перформанс-маркетинг' => 'performance',
            'Контекстная реклама' => 'context',
            'SERM (управление репутацией)' => 'serm',
            'Контент-поддержка' => 'content',
            'Веб-аналитика' => 'analytics',
            'Аутстафф' => 'outstaff',
            default => 'seo',
        };
    }

    public function save()
    {
        try {
            DB::beginTransaction();

            $questionare = Questionare::create([
                'name' => $this->form['name'] ?? '',
                'role' => $this->form['role'] ?? null,
                'phone' => $this->form['phone'] ?? '',
                'email' => $this->form['email'] ?? '',
                'service_type' => $this->form['service_type'] ?? '',
            ]);

            if (isset($this->form['urls']) && !empty($this->form['urls'])) {
                QuestionareField::create([
                    'questionare_id' => $questionare->id,
                    'field_name' => 'urls',
                    'field_value' => json_encode($this->form['urls'], JSON_UNESCAPED_UNICODE),
                ]);
            }

            $baseFields = ['name', 'role', 'phone', 'email', 'service_type'];

            foreach ($this->form as $key => $value) {
                if (in_array($key, $baseFields) || empty($value) || $key === 'urls')
                    {
                        continue;
                    }

                    $fieldValue = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;

                    QuestionareField::create([
                        'questionare_id' => $questionare->id,
                        'field_name' => $key,
                        'field_value' => $fieldValue,
                    ]);
            }

            try {
                $predictionService = app(PredictionService::class);

                $this->form['form_completion_time'] = session('form_start_time')
                    ? now()->diffInSeconds(session('form_start_time'))
                    : 300;
                $this->form['day_of_week'] = (int)now()->dayOfWeek;
                $this->form['time_of_day'] = (int)now()->hour;

                $segmentsCount = 0;
                if (isset($this->form['segments']) && is_array($this->form['segments'])) {
                    $segmentsCount = count($this->form['segments']);
                }
                $this->form['segments_count'] = $segmentsCount;

                // Логируем данные перед отправкой в ML
                Log::info('Отправка данных в ML сервис', ['data' => $this->form]);

                $prediction = $predictionService->predict($this->form);

                // Логируем ответ от ML сервиса
                Log::info('Ответ от ML сервиса', ['prediction' => $prediction]);

                if ($prediction && isset($prediction['probability'])) {
                    $questionare->prediction_probability = $prediction['probability'];
                    $questionare->prediction_will_buy = $prediction['will_buy'] ?? false;
                    $questionare->prediction_confidence = $prediction['confidence'] ?? 'unknown';
                    $questionare->prediction_raw = json_encode($prediction, JSON_UNESCAPED_UNICODE);
                    $questionare->predicted_at = now();
                    $questionare->save();

                    Log::info('ML предсказание сохранено', [
                        'questionare_id' => $questionare->id,
                        'probability' => $prediction['probability'],
                        'will_buy' => $prediction['will_buy'] ?? false,
                        'confidence' => $prediction['confidence'] ?? 'unknown'
                    ]);
                } else {
                    Log::warning('ML сервис вернул пустой ответ или нет probability', [
                        'questionare_id' => $questionare->id,
                        'prediction' => $prediction
                    ]);
                }

            } catch (\Exception $e) {
                Log::error('Ошибка при получении ML предсказания', [
                    'questionare_id' => $questionare->id,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
            }

            Session::put('brif_data', $this->form);
            Session::put('last_questionare_id', $questionare->id);

            Session::forget(SessionConstants::STEP1_FORM);
            Session::forget(SessionConstants::STEP3_FORM);
            Session::forget(SessionConstants::SEO_FORM);
            Session::forget(SessionConstants::SEO_FOREIGN_FORM);
            Session::forget(SessionConstants::GEO_FORM);
            Session::forget(SessionConstants::PERFORMANCE_FORM);
            Session::forget(SessionConstants::CONTENT_FORM);
            Session::forget(SessionConstants::CONTEXT_FORM);
            Session::forget(SessionConstants::SERM_FORM);
            Session::forget(SessionConstants::ANALYTICS_FORM);
            Session::forget(SessionConstants::OUTSTAFF_FORM);

            DB::commit();

            StepHelper::resetStep();

            return redirect()->route('brif.success');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ошибка при сохранении заявки: ' . $e->getMessage());
            session()->flash('error', 'Произошла ошибка при сохранении заявки. Пожалуйста, попробуйте снова.');
            return null;
        }
    }

    public function goBack()
    {
        return redirect()->route('brif.step3');
    }

    public function render()
    {
        return view('livewire.brif.step4', [
            'step2Route' => $this->getStep2Route(),
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
