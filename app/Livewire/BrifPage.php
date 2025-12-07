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
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step1, $this->form);
    }


    public function save()
    {
        session([SessionConstants::brif_form_step1 => $this->form]);
        return redirect("/brif-seo-step");
    }


    public function render()
    {
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step1, $this->form);

        return view('livewire.brif-page');
    }
}
