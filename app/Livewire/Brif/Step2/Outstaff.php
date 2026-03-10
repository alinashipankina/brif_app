<?php

namespace App\Livewire\Brif\Step2;

use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\OutstaffForm;

class Outstaff extends Component
{
    public OutstaffForm $form;

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        FormHelper::fillFormFromSession(SessionConstants::OUTSTAFF_FORM, $this->form);
    }


    public function save()
    {
        $this->validate([
            'form.specialists' => 'required|array|min:1',
            'form.specialist_count' => 'required',
            'form.work_period' => 'required',
            'form.work_format' => 'required',
            'form.project_budget' => 'required',
        ], [
            'form.specialists.required' => 'Выберите хотя бы одного специалиста',
            'form.specialists.min' => 'Выберите хотя бы одного специалиста',
            'form.specialist_count.required' => 'Укажите количество специалистов',
            'form.work_period.required' => 'Укажите, на какой срок требуются специалисты',
            'form.work_format.required' => 'Выберите предпочтительный формат работы',
            'form.project_budget.required' => '	Укажите бюджет на аутстафф',
        ]);

        $this->saveToSession();
        return redirect("/brif/step3");
    }

    private function saveToSession()
    {
        session([SessionConstants::OUTSTAFF_FORM => $this->form->all()]);
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
        return view('livewire.brif.step2.outstaff', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
