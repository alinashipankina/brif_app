<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class StepHelper
{
    public static function getStepNumber()
    {
        $routeName = request()->route()->getName();

        $stepFromRoute = match($routeName) {
            'brif.step1' => 1,
            'brif.step2.seo', 'brif.step2.seo-foreign', 'brif.step2.geo', 'brif.step2.performance', 'brif.step2.context', 'brif.step2.serm', 'brif.step2.content', 'brif.step2.analytics', 'brif.step2.outstaff' => 2,
            'brif.step3' => 3,
            'brif.step4' => 4,
            default => 1,
        };

        if ($stepFromRoute) {
            Session::put('current_step', $stepFromRoute);
        }

        return Session::get('current_step', $stepFromRoute);
    }

    public static function resetStep()
    {
        Session::forget('current_step');
    }

    public static function setStepNumber($step)
    {
        Session::put('current_step', $step);
    }
}
