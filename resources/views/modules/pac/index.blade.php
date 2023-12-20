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
                            <th>Incident ID</th>
                            <th>Type</th>
                            <th>Control Measures</th>
                            <th>Mitigation Measures</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pacs as $pac)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $pac->incident->title }}</td>
                                <td class="d-none d-sm-table-cell">{{ $pac->incident->outcome->type->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @foreach($pac->mitigation_measures as $measure)
                                        {{ $measure['name'] }},
                                    @endforeach
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    @foreach($pac->control_measures as $measure)
                                        {{ $measure['name'] }},
                                    @endforeach
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

@endsection
