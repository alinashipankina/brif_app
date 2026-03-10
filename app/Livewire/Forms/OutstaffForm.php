<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class OutstaffForm extends Form
{

    public array $specialists = [];

    public string $specialist_count = "";

    public string $work_period = "";

    public string $work_format = "";

    public string $project_budget = "";
}
