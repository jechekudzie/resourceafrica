@extends('layouts.admin')

@section('content')


      <!-- BEGIN: Content -->
      <div class="content">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                        <div class="text-base text-slate-500 mt-1">Item Sales</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                        <div class="text-base text-slate-500 mt-1">New Orders</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                        <div class="text-base text-slate-500 mt-1">Total Products</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                        <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->



                </div>
            </div>
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
                                <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->

@endsection
