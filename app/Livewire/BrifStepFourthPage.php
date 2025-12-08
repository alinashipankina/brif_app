<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\FormHelper;
use App\Helpers\SessionConstants;
use App\Livewire\Forms\BrifStepFourthForm;
use App\Models\Questionare;
use App\Models\QuestionareField;

class BrifStepFourthPage extends Component
{
    public BrifStepFourthForm $form;

    public function mount()
    {
        // Загружаем данные из сессии только при инициализации компонента

        $this->fillForm();
    }

    public function save() {
        $question = Questionare::create([
            'company_name' => $this->form->name,
            'role' => $this->form->role,
            'phone' => $this->form->phone,
            'email' => $this->form->email,
            'usluga' => $this->form->usluga,
        ]);

        $question->save();

        $fieldUrls = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'urls',
            'field_value' => json_encode(value: $this->form->urls),
            ]);

        $fieldUrls->save();

        $fieldSfera = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'usluga',
            'field_value' => $this->form->usluga,
            ]);

        $fieldSfera->save();

        $fieldYear = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'year',
            'field_value' => $this->form->year,
            ]);

        $fieldYear->save();

        $fieldGeography = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'geography',
            'field_value' => $this->form->geography,
            ]);

        $fieldGeography->save();

        $fieldSumma = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'summa',
            'field_value' => $this->form->summa,
            ]);

        $fieldSumma->save();

        $fieldProduction = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'production',
            'field_value' => $this->form->production,
            ]);

        $fieldProduction->save();

        $fieldConcurents = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'concurents',
            'field_value' => json_encode($this->form->concurents, JSON_UNESCAPED_UNICODE),
        ]);

        $fieldConcurents->save();

        $fieldSegment = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'segments',
            'field_value' => json_encode($this->form->segments),
            ]);

        $fieldSegment->save();

        $fieldMarketing = QuestionareField::create([
            'questionare_id' => $question->id,
            'field_name' => 'marketing',
            'field_value' => $this->form->marketing,
            ]);

        $fieldMarketing->save();


        redirect("/super-form");
    }

    public function render()
    {
        return view('livewire.brif-step-fourth-page');
    }


    // TODO: На странице подтверждения успешности отправки формы, сделать очистку сессии
    private function fillForm()
    {
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step1, $this->form);
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step2, $this->form);
        FormHelper::fillFormFromSession(SessionConstants::brif_form_step3, $this->form);
    }
}
