<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class GeoForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $client_questions = "";

    public string $has_expert_content = "";

    public string $needs_geo_content = "";

    public string $monthly_budget = "";

    public string $has_experience = "";

    public $form_completion_time = null;

    public $day_of_week = null;

    public $time_of_day = null;
}
