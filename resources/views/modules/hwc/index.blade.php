@extends('layouts.app2')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Add Incident Mega Form -->
        <div class="block block-rounded">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Human Wildlife Conflict Incidents
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Year</th>
                            <th>Type</th>
                            <th>Outcome</th>
                            <th>Species</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incidents as $incident)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ date('Y', strtotime($incident->date)) }}</td>
                                <td class="d-none d-sm-table-cell">{{ $incident->outcome->type->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ $incident->outcome->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @foreach($incident->species as $species)
                                        {{ $species['name'] }},
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <button data-bs-target="#modal-fadein" type="button"
                                            data-incident-id="{{ $incident->id }}"
                                            class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            title="Create PAC">
                                        <i class="fa fa-warning"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                            title="View Incident">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            title="Edit Incident">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            title="Delete Incident">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
    </div>

    <!-- Fade In Modal -->
    <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-fadein"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('pac.store') }}">
                    @csrf
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create PAC</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="title">Create PAC title</label>
                                    <input type="text" class="form-control form-control-lg" id="title" name="title"
                                           placeholder="Enter PAC title">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="location">Longitude</label>
                                    <input type="text" class="form-control form-control-lg" id="longitude"
                                           name="longitude"
                                           placeholder="Enter incident longitude">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="latitude">Latitude</label>
                                    <input type="text" class="form-control form-control-lg" id="latitude"
                                           name="latitude"
                                           placeholder="Enter incident latitude.">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">Mitigation Measures</label>
                                    <div class="col-12">
                                        @foreach(DB::table('mitigation_measures')->get() as $item)
                                            <div class="form-check form-check-inline col-6">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                       id="example-checkbox-inline{{ $item->id }}"
                                                       name="mitigation[]">
                                                <label class="form-check-label"
                                                       for="example-checkbox-inline{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Control Measures</label>
                                    <div class="col-12">
                                        @foreach(DB::table('control_measures')->get() as $item)
                                            <div class="form-check form-check-inline col-6">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                       id="control{{ $item->id }}"
                                                       name="control[]">
                                                <label class="form-check-label"
                                                       for="control{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="notes">Notes</label>
                                    <textarea class="form-control form-control-lg" id="notes" name="notes"
                                              rows="4" placeholder="Enter PAC Notes here"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="incident_id" id="incident_id">
                        <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                Done
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Fade In Modal -->

@endsection


@push('scripts')
    <script>
        //on modal show get the trigger's data incident attribute
        $('#modal-fadein').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var incident_id = button.data('incident-id') // Extract info from data-* attributes
            console.log(incident_id);
            $('#incident_id').val(incident_id);
        });

    </script>
@endpush
