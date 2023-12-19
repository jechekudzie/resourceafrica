@extends('layouts.app2')

@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Human Wildlife Conflict Mega Form -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Human Wildlife Conflict</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <form action="" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="species_id">Species ID</label>
                            <input type="text" class="form-control form-control-lg" id="species_id"
                                   name="species_id"
                                   placeholder="Enter species ID..">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="organization_id">Organization ID</label>
                            <input type="text" class="form-control form-control-lg" id="organization_id"
                                   name="organization_id" placeholder="Enter organization ID..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="h_w_c_type_id">Conflict Type ID</label>
                                <input type="text" class="form-control form-control-lg" id="h_w_c_type_id"
                                       name="h_w_c_type_id" placeholder="Enter conflict type ID..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="h_w_c_outcome_id">Outcome ID</label>
                                <input type="text" class="form-control form-control-lg" id="h_w_c_outcome_id"
                                       name="h_w_c_outcome_id" placeholder="Enter outcome ID..">
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="date">Date</label>
                                    <input type="text" class="form-control form-control-lg" id="date"
                                           name="date"
                                           placeholder="Enter date (optional)..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="time">Time</label>
                                    <input type="text" class="form-control form-control-lg" id="time"
                                           name="time"
                                           placeholder="Enter time (optional)..">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="area">Area</label>
                                <input type="text" class="form-control form-control-lg" id="area" name="area"
                                       placeholder="Enter area (optional)..">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="longitude">Longitude</label>
                                <input type="text" class="form-control form-control-lg" id="longitude"
                                       name="longitude"
                                       placeholder="Enter longitude (optional)..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="latitude">Latitude</label>
                                <input type="text" class="form-control form-control-lg" id="latitude"
                                       name="latitude"
                                       placeholder="Enter latitude (optional)..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="distance_to_community">Distance to
                                    Community</label>
                                <input type="text" class="form-control form-control-lg"
                                       id="distance_to_community"
                                       name="distance_to_community"
                                       placeholder="Enter distance to community (optional)..">
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-check opacity-50 me-1"></i> Save Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Human Wildlife Conflict Mega Form -->
    </div>

@endsection
