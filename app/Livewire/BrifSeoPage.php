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
        $this->resetErrorBag();
        $this->resetValidation();

        FormHelper::fillFormFromSession(SessionConstants::brif_form_step2, $this->form);

        if (empty($this->form->urls) || !is_array($this->form->urls)) {
            $this->form->urls = [''];
        }
    }

    public function save()
    {
        $this->validate([
            'form.urls' => 'required|array|min:1',
            'form.urls.*' => 'required|url',
            'form.geography' => 'required',
            'form.summa' => 'required',
        ], [
            'form.urls.required' => 'Укажите хотя бы один URL сайта',
            'form.urls.min' => 'Укажите хотя бы один URL сайта',
            'form.urls.*.required' => 'URL не может быть пустым',
            'form.urls.*.url' => 'Введите корректный URL (например, https://example.com)',
            'form.geography.required' => 'Укажите города/страны для продвижения',
            'form.summa.required' => 'Выберите комфортную сумму расходов',
        ]);

        $this->saveToSession();
        return redirect("/brif-third-step");
    }

    public function addUrl() {
        $this->form->urls[] = '';
        $this->form->urls = array_values($this->form->urls);
        $this->saveToSession();
    }

    public function removeUrl($index) {
        if (count($this->form->urls) > 1) {
            unset($this->form->urls[$index]);
            $this->form->urls = array_values($this->form->urls);
            $this->saveToSession();
        }
    }

    private function saveToSession()
    {
        session([SessionConstants::brif_form_step2 => $this->form->all()]);
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
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.brif-seo-page');
    }
}
