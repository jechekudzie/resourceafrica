@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="grid grid-cols-12 gap-6">

            <!-- BEGIN: col-9 -->
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: PageHeader -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                    class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>


                    </div>
                    <!-- END: PageHeader -->
                </div>

                <!-- BEGIN: Input Sizing -->
                <div class="intro-y box mt-5">

                    <div class="container mx-auto p-8">
                        <!-- Static HTML Table -->
                        <div>
                            <table id="example" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Position</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Office</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Age</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Start date</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Salary</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Repeat rows here -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">ku jeche</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Tiger Nixon</td>
                                        <td class="px-6 py-4 whitespace-nowrap">System Architect</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Edinburgh</td>
                                        <td class="px-6 py-4 whitespace-nowrap">61</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2011/04/25</td>
                                        <td class="px-6 py-4 whitespace-nowrap">$320,800</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>

                        </div>


                    </div>

                </div>
                <!-- END: Input Sizing -->
                <!-- BEGIN: Input Groups -->

            </div>
            <!-- END: Content -->

            <!-- END: col-3 -->
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                        <!-- BEGIN: Transactions -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Transactions
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-6.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Tom Cruise</div>
                                            <div class="text-slate-500 text-xs mt-0.5">27 May 2021</div>
                                        </div>
                                        <div class="text-danger">-$37</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-11.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Leonardo DiCaprio</div>
                                            <div class="text-slate-500 text-xs mt-0.5">29 January 2021</div>
                                        </div>
                                        <div class="text-danger">-$152</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-9.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Kevin Spacey</div>
                                            <div class="text-slate-500 text-xs mt-0.5">12 September 2021</div>
                                        </div>
                                        <div class="text-success">+$31</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-6.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Angelina Jolie</div>
                                            <div class="text-slate-500 text-xs mt-0.5">11 December 2021</div>
                                        </div>
                                        <div class="text-danger">-$35</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="dist/images/profile-7.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Kevin Spacey</div>
                                            <div class="text-slate-500 text-xs mt-0.5">12 June 2022</div>
                                        </div>
                                        <div class="text-success">+$25</div>
                                    </div>
                                </div>
                                <a href=""
                                    class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                                    More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END: Content -->

        </div>
    </div>
    <!-- END: Content -->
@endsection


