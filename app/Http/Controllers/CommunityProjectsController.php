<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityProjectsController extends Controller
{
    //projects
    public function projects()
    {
        return view('administration.community-projects.projects');
    }

    //participants
    public function participants()
    {
        return view('administration.community-projects.projects');
    }

    //funding
    public function funding()
    {
        return view('administration.community-projects.projects');
    }

    //progress
    public function progress()
    {
        return view('administration.community-projects.projects');
    }

    public function reports()
    {
        return view('administration.community-projects.projects');
    }
}
