@extends('administration.layouts.admin')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="grid grid-cols-12 gap-6">

            <!-- BEGIN: col-9 -->
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: PageHeader -->
                    <div class="col-span-12 mt-8">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-4">
                                <!-- BEGIN: Blank Modal -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Human Wildlife Conflict
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-8">
                            <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                                <!-- BEGIN: Inbox Filter -->
                                <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                                    <div class="w-full sm:w-auto flex">
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#basic-modal-preview"
                                           class="btn btn-primary">Add HWC  incident</a>
                                    </div>
                                </div>
                                <!-- END: Inbox Filter -->
                            </div>
                        </div>

                    </div>
                    <!-- END: PageHeader -->
                </div>

                <!-- BEGIN: Input Sizing -->
                <div class="intro-y box mt-5">

                    <div class="container mx-auto p-8">
                        <!-- Static HTML Table -->
                        <div>
                            <table id="example" class="table-bordered min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        description</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Action</th>

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Repeat rows here -->
                               @foreach($conflicts as $conflict)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$loop->iteration}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$conflict->id}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$conflict->id}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$conflict->id}}</td>

                                    <td class="px-6 py-4 whitespace-nowrap">View | Edit</td>
                                </tr>

                               @endforeach

                                <!-- Add more rows as needed -->
                                </tbody>
                            </table>

                        </div>
                        <!-- Static HTML Table -->

                        <!-- BEGIN: Modal Content -->
                        <div id="basic-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="post" action="{{ url('/path-to-your-store-route') }}">
                                        @csrf
                                        <div class="intro-y col-span-12 lg:col-span-6">
                                            <div class="intro-y box p-5">
                                                <!-- Species Dropdown -->
                                                <div>
                                                    <label for="species_id" class="form-label">Species</label>
                                                    <select id="species_id" class="form-control w-full" name="species_id">
                                                        @foreach($species as $specie)
                                                            <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Organization Dropdown -->
                                                <div class="mt-3">
                                                    <label for="organization_id" class="form-label">Organization</label>
                                                    <select id="organization_id" class="form-control w-full" name="organization_id">
                                                        @foreach($organizations as $organization)
                                                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- HWC Type Dropdown -->
                                                <div class="mt-3">
                                                    <label for="h_w_c_type_id" class="form-label">HWC Type</label>
                                                    <select id="h_w_c_type_id" class="form-control w-full" name="h_w_c_type_id">
                                                        @foreach($hwcTypes as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- HWC Outcome Dropdown -->
                                                <div class="mt-3">
                                                    <label for="h_w_c_outcome_id" class="form-label">HWC Outcome</label>
                                                    <select id="h_w_c_outcome_id" class="form-control w-full" name="h_w_c_outcome_id">
                                                        @foreach($hwcOutcomes as $outcome)
                                                            <option value="{{ $outcome->id }}">{{ $outcome->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Additional Fields -->
                                                <div class="mt-3">
                                                    <label for="date" class="form-label">Date</label>
                                                    <input id="date" type="date" class="form-control w-full" name="date">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="time" class="form-label">Time</label>
                                                    <input id="time" type="time" class="form-control w-full" name="time">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="area" class="form-label">Area</label>
                                                    <input id="area" type="text" class="form-control w-full" placeholder="Enter area" name="area">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="longitude" class="form-label">Longitude</label>
                                                    <input id="longitude" type="text" class="form-control w-full" placeholder="Enter longitude" name="longitude">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="latitude" class="form-label">Latitude</label>
                                                    <input id="latitude" type="text" class="form-control w-full" placeholder="Enter latitude" name="latitude">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="distance_to_community" class="form-label">Distance to Community</label>
                                                    <input id="distance_to_community" type="text" class="form-control w-full" placeholder="Enter distance to community" name="distance_to_community">
                                                </div>

                                                <div class="text-right mt-5">
                                                    <button type="submit" class="btn btn-primary">Save Record</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- END: Modal Content -->
                    </div>

                </div>
                <!-- END: Input Sizing -->
                <!-- BEGIN: Input Groups -->

            </div>
            <!-- END: Content -->


        </div>
    </div>
    <!-- END: Content -->



@endsection
