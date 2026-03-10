<?php

namespace App\Livewire\Brif\Step2;

use App\Livewire\Forms\ContentForm;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use Livewire\Component;

class Content extends Component
{
    public ContentForm $form;

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        FormHelper::fillFormFromSession(SessionConstants::CONTENT_FORM, $this->form);

        if (empty($this->form->urls) || !is_array($this->form->urls)) {
            $this->form->urls = [''];
        }

        if (!session()->has('form_start_time')) {
            session()->put('form_start_time', now());
        }
    }

    public function save()
    {
        $this->validate([
            'form.urls' => 'required|array|min:1',
            'form.urls.*' => 'required|url',
            'form.business_sphere' => 'required',
            'form.content_types' => 'required|array|min:1',
            'form.content_volume' => 'required',
            'form.has_content_plan' => 'required',
            'form.needs_publishing' => 'required',
            'form.has_experience' => 'required',
            'form.monthly_budget' => 'required',
        ], [
            'form.urls.required' => 'Укажите хотя бы один URL сайта',
            'form.urls.min' => 'Укажите хотя бы один URL сайта',
            'form.urls.*.required' => 'URL не может быть пустым',
            'form.urls.*.url' => 'Введите корректный URL (например, https://example.com)',
            'form.business_sphere.required' => 'Укажите сферу деятельности компании',
            'form.content_types.required' => 'Выберите хотя бы один тип контента',
            'form.content_types.min' => 'Выберите хотя бы один тип контента',
            'form.content_volume.required' => 'Укажите примерный объем контента в месяц',
            'form.has_content_plan.required' => 'Укажите, есть ли у вас готовый контент-план',
            'form.needs_publishing.required' => 'Укажите, нужна ли публикация контента на сайте',
            'form.has_experience.required' => 'Укажите, был ли опыт контент-поддержки ранее',
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
        session([SessionConstants::CONTENT_FORM => $this->form->all()]);
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
        return view('livewire.brif.step2.content', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
