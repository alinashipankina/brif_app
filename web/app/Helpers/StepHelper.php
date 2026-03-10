<?php

namespace App\Helpers;

use Livewire\Form;

class StepHelper
{
    public static function getStepNumber()
    {
        $routeName = request()->route()->getName();

        return match($routeName) {
            'brif.step1' => 1,
            'brif.step2.seo', 'brif.step2.seo-foreign', 'brif.step2.geo', 'brif.step2.performance', 'brif.step2.context', 'brif.step2.serm', 'brif.step2.content', 'brif.step2.analytics', 'brif.step2.outstaff' => 2,
            'brif.step3' => 3,
            'brif.step4' => 4,
            default => 1,
        };
    }
}
