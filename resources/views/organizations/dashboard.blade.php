@extends('layouts.app2')

@section('content')

    <div class="content">
        <!-- Project Widgets: Cards with Details -->
        <h2 class="content-heading">
            Welcome {{ Auth::user()->name }}
        </h2>
        <div class="row items-push">

        </div>
    </div>

@endsection
