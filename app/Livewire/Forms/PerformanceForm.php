<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class PerformanceForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $year = "";

    public string $geography = "";

    public array $channels = [];

    public string $has_experience = "";

    public array $priorities = [];

    public string $monthly_budget = "";
}
