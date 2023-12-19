@extends('layouts.app2')

@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple User Widgets -->
        <h2 class="content-heading">
            Wildlife Species
        </h2>
        <div class="row">
            @foreach($species as $specie)
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full block-content-sm bg-pulse-dark">
                            <div class="fw-semibold text-white">{{ $specie['name'] }}</div>
                        </div>
                        <div class="block-content block-content-full bg-image"
                             style="background-image: url('{{ asset('images/'.strtolower($specie['name'].'.jpg')) }}');">
                            <img class="img-avatar img-avatar-thumb"
                                 src="{{ asset('images/'.strtolower($specie['name'].'.jpg')) }}" alt="">
                        </div>
                        <div class="block-content block-content-full block-content-sm"
                             style="background-color: {{ $specie['color'] }} !important;">
                            <div class="fs-sm text-white">{{ $specie['status'] }}</div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="mb-1"><i class="si si-clock fa-2x text-pulse"></i></div>
                            <div class="fs-sm text-muted">~ 6 months left</div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>
    </div>

@endsection
