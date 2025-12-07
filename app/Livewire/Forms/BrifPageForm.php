<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BrifPageForm extends Form
{
    #[Validate('required|min:5')]
    public $name = "";

    public $role = "";

    public $phone = "";

    public $email = "";

    public $usluga = "";


}
