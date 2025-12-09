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
        $this->resetErrorBag();
        $this->resetValidation();

        FormHelper::fillFormFromSession(SessionConstants::brif_form_step3, $this->form);

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
        return redirect("/brif-fourth-step");
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
        session([SessionConstants::brif_form_step3 => $this->form->all()]);
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
        return redirect('/brif-seo-step');
    }

    public function render()
    {
            return view('livewire.brif-step-third-page');
    }
}


