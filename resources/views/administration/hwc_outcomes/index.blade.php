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
                                            HWC Outcomes
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
                                           class="btn btn-primary">Add HWC Outcomes</a>
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
                               @foreach($outcomes as $outcome)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$loop->iteration}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$outcome->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$outcome->description}}</td>

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
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{ url('/administration/hwc/outcomes') }}">
                                        @csrf
                                        <div class="intro-y col-span-12 lg:col-span-6">
                                            <!-- BEGIN: Form Layout -->
                                            <div class="intro-y box p-5">
                                                <div>
                                                    <label for="crud-form-1" class="form-label">HWC Outcome</label>
                                                    <input id="crud-form-1" type="text" class="form-control w-full"
                                                           placeholder="Enter new hwc outcome" name="name">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="crud-form-1" class="form-label">HWC Type Description</label>
                                                    <textarea id="crud-form-1" class="form-control w-full"
                                                              placeholder="Enter HWC Outcome description"
                                                              name="description"></textarea>
                                                </div>
                                                <div class="text-right mt-5">
                                                    <button type="submit" class="btn btn-primary">Save Record</button>
                                                </div>
                                            </div>
                                            <!-- END: Form Layout -->
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
