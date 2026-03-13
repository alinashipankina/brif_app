<?php

namespace App\Livewire\Brif\Step2;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\SeoForm;

class Seo extends Component
{
    public SeoForm $form;

    public function mount()
    {
        StepHelper::setStepNumber(2);

        $this->resetErrorBag();
        $this->resetValidation();

        Session::put('current_step', 2);

        FormHelper::fillFormFromSession(SessionConstants::SEO_FORM, $this->form);

        if (empty($this->form->urls) || !is_array($this->form->urls)) {
            $this->form->urls = [''];
        }

        if (!session()->has('form_start_time')) {
            session()->put('form_start_time', now());
        }
    }

    public function save()
    {
        Session::put('current_step', 2);

        $this->validate([
            'form.urls' => 'required|array|min:1',
            'form.urls.*' => 'required|url',
            'form.business_sphere' => 'required',
            'form.year' => 'required',
            'form.geography' => 'required',
            'form.has_experience' => 'required',
            'form.monthly_budget' => 'required',
        ], [
            'form.urls.required' => 'Укажите хотя бы один URL сайта',
            'form.urls.min' => 'Укажите хотя бы один URL сайта',
            'form.urls.*.required' => 'URL не может быть пустым',
            'form.urls.*.url' => 'Введите корректный URL (например, https://example.com)',
            'form.business_sphere.required' => 'Укажите сферу деятельности компании',
            'form.year.required' => '	Укажите, как давно компания на рынке',
            'form.geography.required' => 'Укажите города/страны для продвижения',
            'form.has_experience.required' => 'Укажите, был ли опыт продвижения ранее',
            'form.monthly_budget.required' => 'Выберите комфортную сумму расходов',
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

    public function addUrl()
    {
        $this->form->urls[] = '';
        $this->form->urls = array_values($this->form->urls);
        $this->saveToSession();
    }

    public function removeUrl($index)
    {
        if (count($this->form->urls) > 1) {
            unset($this->form->urls[$index]);
            $this->form->urls = array_values($this->form->urls);
            $this->saveToSession();
        }
    }

    private function saveToSession()
    {
        session([SessionConstants::SEO_FORM => $this->form->all()]);
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
        return view('livewire.brif.step2.seo', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4]
        );
    }
}
