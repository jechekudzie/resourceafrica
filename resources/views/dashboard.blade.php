@extends('layouts.app')

@section('content')

    <div class="content">
        <!-- Project Widgets: Cards with Details -->
        <h2 class="content-heading">
            Welcome {{ Auth::user()->name }}
            <small>- Organizations</small>
        </h2>
        <div class="row items-push">
            @foreach($data as $item)
                <div class="col-md-6 col-xl-4">
                    <!-- Detailed Project 1 -->
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-header">
                            <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                                <i class="fa fa-clock me-1 opacity-50"></i>
                                {{ "Member since ". date('M d, Y', strtotime($item['user']->created_at))}}
                            </div>
                        </div>
                        <div class="block-content block-content-full bg-body-light text-center">
                            <h3 class="fs-base fw-semibold mb-2">
                                <a href="javascript:void(0)">
                                    {{ $item['org']->name }}
                                </a>
                            </h3>
                            <h4 class="fs-sm text-muted mb-0">
                                {{ $item['role']->name }}
                            </h4>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-12">
                                    <a class="btn w-100 btn-alt-secondary"
                                       href="{{ url($item['org']->slug.'/dashboard') }}">
                                        <i class="fa fa-sign-in me-1 text-muted"></i>Enter Organization
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Detailed Project 1 -->
                </div>
            @endforeach
        </div>
    </div>

@endsection
