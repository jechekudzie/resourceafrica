@extends('layouts.app')

@section('content')

    <div class="content">
        <!-- Mixed Grid -->
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <h2 class="content-heading">
                    Welcome {{ Auth::user()->name }}
                    <small>- Organizations</small>
                </h2>
                <div class="row">
                    @foreach($data as $item)
                        <div class="col-md-6 col-xl-6">
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
            <div class="col-sm-12 col-lg-4">
                <!-- Simple -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Organisational Structure</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="js-nestable-connected-simple dd">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle">Projects</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">Themes</div>
                                        </li>
                                        <li class="dd-item" data-id="3">
                                            <div class="dd-handle">Apps</div>
                                        </li>
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">Games</div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">Tutorials</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle">Design</div>
                                        </li>
                                        <li class="dd-item" data-id="7">
                                            <div class="dd-handle">Coding</div>
                                        </li>
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle">Marketing</div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9">
                                    <div class="dd-handle">Inspiration</div>
                                </li>
                                <li class="dd-item" data-id="10">
                                    <div class="dd-handle">Resources</div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Simple -->
            </div>
        </div>
        <!-- END Mixed Grid -->
    </div>

@endsection
