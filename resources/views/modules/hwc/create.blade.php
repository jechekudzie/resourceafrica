@extends('layouts.app2')

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Add Incident Mega Form -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Incident</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('hwc.incidents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title"
                                   placeholder="Enter incident title..">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="location">Longitude</label>
                            <input type="text" class="form-control form-control-lg" id="longitude" name="longitude"
                                   placeholder="Enter incident longitude">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="latitude">Latitude</label>
                            <input type="text" class="form-control form-control-lg" id="latitude" name="latitude"
                                   placeholder="Enter incident latitude.">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title"
                                   placeholder="Enter incident title..">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="location">Longitude</label>
                            <input type="text" class="form-control form-control-lg" id="longitude" name="longitude"
                                   placeholder="Enter incident longitude">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="latitude">Latitude</label>
                            <input type="text" class="form-control form-control-lg" id="latitude" name="latitude"
                                   placeholder="Enter incident latitude.">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control form-control-lg" id="description" name="description"
                                  rows="4" placeholder="Enter incident description.."></textarea>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="date">Date</label>
                            <input type="date" class="form-control form-control-lg" id="date" name="date"
                                   placeholder="Enter date (optional)..">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="time">Time</label>
                            <input type="time" class="form-control form-control-lg" id="time" name="time"
                                   placeholder="Enter time (optional)..">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="image">Image (optional)</label>
                        <input type="file" class="form-control form-control-lg" id="image" name="image"
                               placeholder="Enter image URL (optional)..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Involved Species</label>
                        <div class="">
                            @foreach(\App\Models\Species::all() as $specie)
                                <div class="form-check form-check-inline col-2">
                                    <input class="form-check-input" type="checkbox" value="{{ $specie->id }}"
                                           id="example-checkbox-inline{{ $specie->id }}"
                                           name="species[]">
                                    <label class="form-check-label"
                                           for="example-checkbox-inline{{ $specie->id }}">{{ $specie->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Include hidden fields for user_id, organization_id, species_id, status_id, if applicable -->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="organization_id" value="{{ $data['org']->id }}">
                    <!-- Replace with actual status ID -->
                    <hr/>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-check opacity-50 me-1"></i> Save Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Add Incident Mega Form -->


    </div>

@endsection
