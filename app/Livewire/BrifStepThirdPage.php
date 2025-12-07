<?php

namespace App\Livewire;

use App\Livewire\Forms\BrifStepThirdForm;
use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\SessionConstants;

class BrifStepThirdPage extends Component
{
    public BrifStepThirdForm $form;

    public function mount()
    {
        // Загружаем данные из сессии только при инициализации компонента
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step3, $this->form);
    }

    public function save()
    {
        session([SessionConstants::brif_form_step3 => $this->form]);
        return redirect("/brif-step-fourth");
    }

    public function render()
    {
        return view('livewire.brif-step-third-page');
    }

    public function removeConcurent(int $index)
    {
        unset($this->form->concurents[$index]);
        $this->form->concurents = array_values($this->form->concurents);

    }

    public function addConcurent()
    {
        $this->form->concurents[] = ['name' => '', 'url' => ''];
    }
}
