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
                        <form class="w-full max-w-lg">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-1/2 px-2 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-first-name">
                                        First Name
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-first-name" type="text" placeholder="Jane">
                                </div>
                                <div class="w-1/2 px-2">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Last Name
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="text" placeholder="Doe">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-password">
                                        Password
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-password" type="password" placeholder="******************">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-state">
                                        State
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state">
                                            <option>New York</option>
                                            <option>California</option>
                                            <option>Illinois</option>
                                            <option>Texas</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path d="M5.3 7l4.7 4.7 4.7-4.7H5.3z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div> <label>Vertical Checkbox</label>
                                <div class="form-check mt-2"> <input id="checkbox-switch-1" class="form-check-input"
                                        type="checkbox" value=""> <label class="form-check-label"
                                        for="checkbox-switch-1">Chris Evans</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-2" class="form-check-input"
                                        type="checkbox" value=""> <label class="form-check-label"
                                        for="checkbox-switch-2">Liam Neeson</label> </div>
                                <div class="form-check mt-2"> <input id="checkbox-switch-3" class="form-check-input"
                                        type="checkbox" value=""> <label class="form-check-label"
                                        for="checkbox-switch-3">Daniel Craig</label> </div>
                            </div>
                            <div class="mt-3"> <label>Horizontal Checkbox</label>
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="form-check mr-2"> <input id="checkbox-switch-4" class="form-check-input"
                                            type="checkbox" value=""> <label class="form-check-label"
                                            for="checkbox-switch-4">Chris Evans</label> </div>
                                    <div class="form-check mr-2 mt-2 sm:mt-0"> <input id="checkbox-switch-5"
                                            class="form-check-input" type="checkbox" value=""> <label
                                            class="form-check-label" for="checkbox-switch-5">Liam Neeson</label> </div>
                                    <div class="form-check mr-2 mt-2 sm:mt-0"> <input id="checkbox-switch-6"
                                            class="form-check-input" type="checkbox" value=""> <label
                                            class="form-check-label" for="checkbox-switch-6">Daniel Craig</label> </div>
                                </div>
                            </div>
                            <div class="mt-3"> <label>Switch</label>
                                <div class="mt-2">
                                    <div class="form-check form-switch"> <input id="checkbox-switch-7"
                                            class="form-check-input" type="checkbox"> <label class="form-check-label"
                                            for="checkbox-switch-7">Default switch checkbox input</label> </div>
                                </div>
                            </div>

                            <div> <label>Vertical Radio Button</label>
                                <div class="form-check mt-2"> <input id="radio-switch-1" class="form-check-input"
                                        type="radio" name="vertical_radio_button" value="vertical-radio-chris-evans">
                                    <label class="form-check-label" for="radio-switch-1">Chris Evans</label> </div>
                                <div class="form-check mt-2"> <input id="radio-switch-2" class="form-check-input"
                                        type="radio" name="vertical_radio_button" value="vertical-radio-liam-neeson">
                                    <label class="form-check-label" for="radio-switch-2">Liam Neeson</label> </div>
                                <div class="form-check mt-2"> <input id="radio-switch-3" class="form-check-input"
                                        type="radio" name="vertical_radio_button" value="vertical-radio-daniel-craig">
                                    <label class="form-check-label" for="radio-switch-3">Daniel Craig</label> </div>
                            </div>
                            <div class="mt-3"> <label>Horizontal Radio Button</label>
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="form-check mr-2"> <input id="radio-switch-4" class="form-check-input"
                                            type="radio" name="horizontal_radio_button"
                                            value="horizontal-radio-chris-evans"> <label class="form-check-label"
                                            for="radio-switch-4">Chris Evans</label> </div>
                                    <div class="form-check mr-2 mt-2 sm:mt-0"> <input id="radio-switch-5"
                                            class="form-check-input" type="radio" name="horizontal_radio_button"
                                            value="horizontal-radio-liam-neeson"> <label class="form-check-label"
                                            for="radio-switch-5">Liam Neeson</label> </div>
                                    <div class="form-check mr-2 mt-2 sm:mt-0"> <input id="radio-switch-6"
                                            class="form-check-input" type="radio" name="horizontal_radio_button"
                                            value="horizontal-radio-daniel-craig"> <label class="form-check-label"
                                            for="radio-switch-6">Daniel Craig</label> </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mt-6">
                                <div class="w-full px-3">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
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
