<?php

namespace App\Livewire;

use App\Livewire\Forms\BrifPageForm;
use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\SessionConstants;

class BrifPage extends Component
{
    // private const formSessionName = "brif_form_step1";

    public BrifPageForm $form;

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step1, $this->form);
    }


    public function save()
    {
        $this->validate([
        'form.name' => 'required|min:5',
        'form.phone' => 'required',
        'form.email' => 'required|email',
        'form.usluga' => 'required',
    ], [
        'form.name.required' => 'Поле ФИО обязательно для заполнения',
        'form.name.min' => 'ФИО должно содержать минимум 5 символов',
        'form.phone.required' => 'Поле номер телефона обязательно для заполнения',
        'form.email.required' => 'Поле электронной почты обязательно для заполнения',
        'form.email.email' => 'Введите корректный email адрес',
        'form.usluga.required' => 'Пожалуйста, выберите услугу',
    ]);

        session([SessionConstants::brif_form_step1 => $this->form->all()]);

        return redirect("/brif-seo-step");
    }


    public function render()
    {
        return view('livewire.brif-page');
    }
}
