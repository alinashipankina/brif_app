<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class SeoForeignForm extends Form
{
    public array $urls = [''];

    public string $business_sphere = "";

    public string $year = "";

    public string $countries = "";

    public string $languages = "";

    public string $has_localized = "";

    public string $monthly_budget = "";
}
