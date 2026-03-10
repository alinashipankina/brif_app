<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ContextForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $geography = "";

    public string $has_experience = "";

    public array $campaign_goals = [];

    public string $has_seasonality = "";

    public string $monthly_budget = "";

    public $form_completion_time = null;

    public $day_of_week = null;

    public $time_of_day = null;
}
