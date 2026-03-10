<?php

namespace App\Livewire\Brif\Step2;

use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\StepHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\SeoForeignForm;

class SeoForeign extends Component
{
    public SeoForeignForm $form;

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        // Теперь заполняем из сессии
        FormHelper::fillFormFromSession(SessionConstants::SEO_FOREIGN_FORM, $this->form);

        if (empty($this->form->urls) || !is_array($this->form->urls)) {
            $this->form->urls = [''];
        }
    }

    public function save()
    {
        $this->validate([
            'form.urls' => 'required|array|min:1',
            'form.urls.*' => 'required|url',
            'form.business_sphere' => 'required',
            'form.year' => 'required',
            'form.countries' => 'required',
            'form.languages' => 'required',
            'form.has_localized' => 'required',
            'form.monthly_budget' => 'required',
        ], [
            'form.urls.required' => 'Укажите хотя бы один URL сайта',
            'form.urls.min' => 'Укажите хотя бы один URL сайта',
            'form.urls.*.required' => 'URL не может быть пустым',
            'form.urls.*.url' => 'Введите корректный URL (например, https://example.com)',
            'form.business_sphere.required' => 'Укажите сферу деятельности компании',
            'form.year.required' => '	Укажите, как давно компания на рынке',
            'form.countries.required' => '	Укажите страны для продвижения',
            'form.languages.required' => 'Укажите языки, на которых должен быть представлен сайт',
            'form.has_localized.required' => 'Укажите, есть ли уже локализованная версия сайта',
            'form.monthly_budget.required' => 'Выберите бюджет на SEO-продвижение за рубежом',
        ]);

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
        session([SessionConstants::SEO_FOREIGN_FORM => $this->form->all()]);
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
        return view('livewire.brif.step2.seo-foreign', [
            'stepNumber' => StepHelper::getStepNumber(),
            'totalSteps' => 4
        ]);
    }
}
