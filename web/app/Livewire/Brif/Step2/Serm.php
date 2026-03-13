<?php

namespace App\Livewire\Brif\Step2;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\SermForm;

class Serm extends Component
{
    public SermForm $form;

    public function mount()
    {
        StepHelper::setStepNumber(2);

        $this->resetErrorBag();
        $this->resetValidation();

        Session::put('current_step', 2);

        FormHelper::fillFormFromSession(SessionConstants::SERM_FORM, $this->form);

        if (empty($this->form->urls) || !is_array($this->form->urls)) {
            $this->form->urls = [''];
        }

        if (empty($this->form->social_links) || !is_array($this->form->social_links)) {
            $this->form->social_links = [''];
        }

        if (!session()->has('form_start_time')) {
            session()->put('form_start_time', now());
        }
    }

    public function save()
    {
        Session::put('current_step', 2);

        $this->validate([
            'form.company_name' => 'required',
            'form.urls' => 'required|array|min:1',
            'form.urls.*' => 'required|url',
            'form.problems' => 'required|array|min:1',
            'form.review_platforms' => 'required',
            'form.has_positive_reviews' => 'required',
            'form.priority_platforms' => 'required',
            'form.has_experience' => 'required',
            'form.monthly_budget' => 'required',
        ], [
            'form.company_name.required' => 'Укажите название компании или бренда',
            'form.urls.required' => 'Укажите хотя бы один URL сайта',
            'form.urls.min' => 'Укажите хотя бы один URL сайта',
            'form.urls.*.required' => 'URL не может быть пустым',
            'form.urls.*.url' => 'Введите корректный URL (например, https://example.com)',
            'form.problems.required' => 'Укажите, с какими проблемами вы столкнулись',
            'form.problems.min' => 'Укажите хотя бы одну проблему',
            'form.review_platforms.required' => 'Укажите, где чаще всего оставляют отзывы',
            'form.has_positive_reviews.required' => 'Укажите, есть ли уже готовые положительные отзывы',
            'form.priority_platforms.required' => 'Укажите, какие платформы для вас наиболее важны',
            'form.has_experience.required' => 'Укажите, был ли опыт управления репутацией в интернете ранее',
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

    public function addSocialLink()
    {
        $this->form->social_links[] = '';
        $this->form->social_links = array_values($this->form->social_links);
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

    public function removeSocialLink($index)
    {
        if (count($this->form->social_links) > 1) {
            unset($this->form->social_links[$index]);
            $this->form->social_links = array_values($this->form->social_links);
            $this->saveToSession();
        }
    }

    private function saveToSession()
    {
        session([SessionConstants::SERM_FORM => $this->form->all()]);
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
        return view('livewire.brif.step2.serm', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
