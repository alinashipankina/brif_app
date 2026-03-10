<?php

namespace App\Livewire\Brif;

use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\Step1Form;

class Step1 extends Component
{
    public Step1Form $form;

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        FormHelper::fillFormFromSession(SessionConstants::STEP1_FORM, $this->form);
    }


    public function save()
    {
        $this->validate([
        'form.name' => 'required|min:5',
        'form.phone' => 'required',
        'form.email' => 'required|email',
        'form.service_type' => 'required',
    ], [
        'form.name.required' => 'Поле ФИО обязательно для заполнения',
        'form.name.min' => 'ФИО должно содержать минимум 5 символов',
        'form.phone.required' => 'Поле номер телефона обязательно для заполнения',
        'form.email.required' => 'Поле электронной почты обязательно для заполнения',
        'form.email.email' => 'Введите корректный email адрес',
        'form.service_type.required' => 'Пожалуйста, выберите услугу',
    ]);

        session([SessionConstants::STEP1_FORM => $this->form->all()]);

        return match($this->form->service_type) {
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
        return view('livewire.brif.step1', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
