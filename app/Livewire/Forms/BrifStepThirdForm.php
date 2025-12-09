<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BrifStepThirdForm extends Form
{
    public string $production = "";
    public array $concurents = [
        'name' => '',
        'url' => ''];

    public array $segments = [];

    public string $marketing = "";

    public function __construct()
    {
        $this->concurents = [
            ['name' => '', 'url' => '']
        ];
    }

}
