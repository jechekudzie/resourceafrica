<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IllegalActivitiesController extends Controller
{
    public function controlMeasures()
    {
        return view('administration.illegal_activities.control_measures');
    }

    public function investigations()
    {
        return view('administration.illegal_activities.control_measures');
    }

    public function caseManagement()
    {
        return view('administration.illegal_activities.control_measures');
    }
}
