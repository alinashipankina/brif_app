<?php

namespace App\Livewire;

use App\Livewire\Forms\BrifSeoPageForm;
use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\SessionConstants;

class BrifSeoPage extends Component
{
    public BrifSeoPageForm $form;

   public function mount()
    {
        // Загружаем данные из сессии только при инициализации компонента
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step2, $this->form);
    }

    public function save()
    {
        session([SessionConstants::brif_form_step2 => $this->form]);
        return redirect("/brif-step-third");
    }

    public function addUrl() {
        $this->form->urls[] = '';
        // session([self::stepSessionName => $this->form]);
    }

    public function render()
    {
        return view('livewire.brif-seo-page');
    }
}
