<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ContentForm extends Form
{

    public array $urls = [''];

    public string $business_sphere = "";

    public array $content_types = [];

    public string $content_volume = "";

    public string $has_content_plan = "";

    public string $needs_publishing = "";

    public string $monthly_budget = "";
}
