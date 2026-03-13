<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Step3Form extends Form
{
    public array $segments = [];
    public string $marketing = "";

    public string $production = "";
        public array $concurents = [
        'name' => '',
        'url' => ''];

    public string $tasks_description = "";
    public string $specialist_level = "";
    public string $tech_stack = "";
    public string $has_tz = "";
    public string $team_integration = "";
    public string $additional_info = "";

    public function __construct()
    {
        $this->concurents = [
            ['name' => '', 'url' => '']
        ];
    }

}
