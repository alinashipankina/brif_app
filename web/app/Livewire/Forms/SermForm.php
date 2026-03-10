<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class SermForm extends Form
{
    public string $company_name = "";

    public array $urls = [''];

    public array $social_links = [''];

    public array $problems = [];

    public string $review_platforms = "";

    public string $has_positive_reviews = "";

    public string $priority_platforms = "";

    public string $monthly_budget = "";

    public string $has_experience = "";

    public $form_completion_time = null;

    public $day_of_week = null;

    public $time_of_day = null;
}
