<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class AnalyticsForm extends Form
{

    public array $urls = [''];

    public string $business_sphere = "";

    public array $analytics_systems = [];

    public string $tracking_goals = "";

    public string $ecommerce_setup = "";

    public string $has_ad_access = "";

    public array $desired_outcomes = [];

    public string $monthly_budget = "";

    public string $has_experience = "";

    public $form_completion_time = null;

    public $day_of_week = null;

    public $time_of_day = null;
}
