<?php

namespace App\Livewire\Brif;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\Step3Form;

class Step3 extends Component
{
    public Step3Form $form;
    public $serviceType = '';

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $step1Data = Session::get(SessionConstants::STEP1_FORM, []);
        $this->serviceType = $step1Data['service_type'] ?? '';


        FormHelper::fillFormFromSession(SessionConstants::STEP3_FORM, $this->form);

        if (empty($this->form->concurents) || !is_array($this->form->concurents)) {
            $this->form->concurents = [['name' => '', 'url' => '']];
        }
    }

    public function save()
    {
        $this->validate([
            'form.concurents' => 'required|array|min:1',
            'form.concurents.*.name' => 'required|string|min:2',
            'form.concurents.*.url' => 'required|url',
            'form.segments' => 'required|array|min:1',
        ], [
            'form.concurents.required' => 'Добавьте хотя бы одного конкурента',
            'form.concurents.min' => 'Добавьте хотя бы одного конкурента',
            'form.concurents.*.name.required' => 'Введите название конкурента',
            'form.concurents.*.name.min' => 'Название должно быть не менее 2 символов',
            'form.concurents.*.url.required' => 'Введите URL конкурента',
            'form.concurents.*.url.url' => 'Введите корректный URL (например, https://example.com)',
            'form.segments.required' => 'Выберите хотя бы один сегмент потребителей',
            'form.segments.array' => 'Выберите хотя бы один сегмент потребителей',
            'form.segments.min' => 'Выберите хотя бы один сегмент потребителей',
        ]);

        $this->saveToSession();
        return redirect("/brif/step4");
    }

    public function removeConcurent(int $index)
    {
        if (count($this->form->concurents) > 1) {
            unset($this->form->concurents[$index]);
            $this->form->concurents = array_values($this->form->concurents);
        }
    }

    public function addConcurent()
    {
        $this->form->concurents[] = ['name' => '', 'url' => ''];
    }

    private function saveToSession()
    {
        session([SessionConstants::STEP3_FORM => $this->form->all()]);
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'form.')) {
            $this->saveToSession();
        }
    }

    public function goBack()
    {
        $this->saveToSession();
        return match($this->serviceType) {
            'SEO-продвижение' => redirect()->route('brif.step2.seo'),
            'Зарубежное SEO' => redirect()->route('brif.step2.seo-foreign'),
            'GEO-продвижение' => redirect()->route('brif.step2.geo'),
            'Перформанс-маркетинг' => redirect()->route('brif.step2.performance'),
            'Контекстная реклама' => redirect()->route('brif.step2.context'),
            'SERM (управление репутацией)' => redirect()->route('brif.step2.serm'),
            'Контент-поддержка' => redirect()->route('brif.step2.content'),
            'Веб-аналитика' => redirect()->route('brif.step2.analytics'),
            'Аутстафф' => redirect()->route('brif.step2.outstaff'),
            default => redirect()->route('brif.step1'),
        };
    }

    public function render()
    {
            return view('livewire.brif.step3', [
                'stepNumber' => StepHelper::getStepNumber(),
                'totalSteps' => 4
            ]);
    }
}


