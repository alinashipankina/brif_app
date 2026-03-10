<?php

namespace App\Helpers;

use Livewire\Form;

class FormHelper
{
    public static function fillFormFromSession(string $sessionKey, Form $form): void
    {
        if (session()->has($sessionKey)) {
            $data = session($sessionKey);

            if (is_array($data)) {
                $form->fill($data);
            }
            else if ($data instanceof Form) {
                $form->fill($data->all());
            }
        }
    }
}
