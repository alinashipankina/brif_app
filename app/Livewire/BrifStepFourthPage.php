<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\BrifStepFourthForm;

class BrifStepFourthPage extends Component
{
    public BrifStepFourthForm $form;

    public function mount()
    {
        // Загружаем данные из сессии только при инициализации компонента

        $this->fillForm();
    }

    public function render()
    {
        return view('livewire.brif-step-fourth-page');
    }

    private function fillForm()
    {
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step1, $this->form);
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step2, $this->form);
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step3, $this->form);
    }
}
