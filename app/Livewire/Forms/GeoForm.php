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
}
