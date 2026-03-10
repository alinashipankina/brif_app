<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ContextForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $geography = "";

    public string $has_context_experience = "";

    public array $campaign_goals = [];

    public string $has_seasonality = "";

    public string $monthly_budget = "";
}
