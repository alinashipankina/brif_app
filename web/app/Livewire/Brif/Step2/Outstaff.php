<?php

namespace App\Livewire\Brif\Step2;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\OutstaffForm;

class Outstaff extends Component
{
    public OutstaffForm $form;

    public function mount()
    {
        StepHelper::setStepNumber(2);

        $this->resetErrorBag();
        $this->resetValidation();

        Session::put('current_step', 2);

        FormHelper::fillFormFromSession(SessionConstants::OUTSTAFF_FORM, $this->form);

        if (!session()->has('form_start_time')) {
            session()->put('form_start_time', now());
        }
    }


    public function save()
    {
        Session::put('current_step', 2);

        $this->validate([
            'form.specialists' => 'required|array|min:1',
            'form.specialist_count' => 'required',
            'form.work_period' => 'required',
            'form.work_format' => 'required',
            'form.has_experience' => 'required',
            'form.project_budget' => 'required',
        ], [
            'form.specialists.required' => 'Выберите хотя бы одного специалиста',
            'form.specialists.min' => 'Выберите хотя бы одного специалиста',
            'form.specialist_count.required' => 'Укажите количество специалистов',
            'form.work_period.required' => 'Укажите, на какой срок требуются специалисты',
            'form.work_format.required' => 'Выберите предпочтительный формат работы',
            'form.has_experience.required' => 'Укажите, был ли опыт аутстаффа ранее',
            'form.project_budget.required' => '	Укажите бюджет на аутстафф',
        ]);

        $startTime = session()->get('form_start_time');
        if ($startTime) {
            $formCompletionTime = now()->diffInSeconds($startTime);
            $this->form->form_completion_time = $formCompletionTime;
        }

        $this->form->day_of_week = now()->dayOfWeek;
        $this->form->time_of_day = now()->hour;

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
