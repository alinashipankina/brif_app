<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class SeoForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $year = "";

    public string $geography = "";

    public string $monthly_budget = "";

    public string $has_experience = "";

    public $form_completion_time = null;

    public $day_of_week = null;

    public $time_of_day = null;
}
