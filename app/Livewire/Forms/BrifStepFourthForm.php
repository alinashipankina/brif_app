<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BrifStepFourthForm extends Form
{
    public $name = "";

    public $role = "";

    public $phone = "";

    public $email = "";

    public $usluga = "";

    public array $urls = [''];

    public string $sfera = "";

    public string $year = "";

    public string $geography = "";

    public string $summa = "";

    public string $production = "";
    public array $concurents = [
        ['name' => '', 'url' => '']
    ];

    public array $segments = [''];

    public string $marketing = "";
}
