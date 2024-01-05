<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function rdcs()
    {
        return view('administration.marketing.rdcs');
    }

    public function quotas()
    {
        return view('administration.marketing.quotas');
    }

    public function negotiate()
    {
        return view('administration.marketing.quotas');
    }

    public function contracts()
    {
        return view('administration.marketing.quotas');
    }

    public function buyers()
    {
        return view('administration.marketing.quotas');
    }

    public function trophyFees()
    {
        return view('administration.marketing.quotas');
    }
}
