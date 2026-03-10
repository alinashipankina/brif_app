<?php

namespace App\Livewire\Brif;

use Livewire\Component;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use Illuminate\Support\Facades\Session;
use App\Models\Questionare;
use App\Models\QuestionareField;

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

        // logger('Step4 form data:', $this->form);
        // dd($this->form);
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
        // dd($this->form);
        Session::put('brif_data', $this->form);

        Session::forget(SessionConstants::STEP1_FORM);
        Session::forget(SessionConstants::STEP3_FORM);
        Session::forget(SessionConstants::SEO_FORM);
        Session::forget(SessionConstants::SEO_FOREIGN_FORM);
        Session::forget(SessionConstants::PERFORMANCE_FORM);
        Session::forget(SessionConstants::CONTENT_FORM);
        Session::forget(SessionConstants::CONTEXT_FORM);
        Session::forget(SessionConstants::SERM_FORM);
        Session::forget(SessionConstants::ANALYTICS_FORM);
        Session::forget(SessionConstants::OUTSTAFF_FORM);

        return redirect()->route('brif.success');
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
