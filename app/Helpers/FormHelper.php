<?php

namespace App\Helpers;

use Livewire\Form;

class FormHelper {
    public static function fillFormFromSession(string $key, Form $form){
        $formSession = session($key, []);

        if (!empty($formSession)) {
            $form->fill($formSession);
        }
    }
}
