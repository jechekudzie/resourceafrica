@extends('administration.layouts.admin')

@section('content')

    <!-- END: Top Bar -->
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Set up organisations
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class="flex justify-center">
            <button class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2" id="step1">1</button>
            <button
                class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2"
                id="step2">
                2
            </button>
            <button
                class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2"
                id="step3">
                3
            </button>
        </div>
        <div class="px-5 mt-10">
            <div class="font-medium text-center text-lg">Setup a new organisation</div>
            <div class="text-slate-500 text-center mt-2">To start off, please enter the organisation name and select its
                type in the hierarchy
            </div>
        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">Create New Organisation</div>

            <div id="inline-form" class="pt-5">
                <div class="preview">
                    <div class="grid grid-cols-12 gap-2" id="input-fields">
                        <input id="name" name="name" type="text" class="form-control col-span-4 mt-5"
                               placeholder="Enter Name of Organisation"
                               aria-label="default input inline 1">
                        <select type="text" class="dynamicSelect form-control col-span-4 mt-5"
                                aria-label="default input inline 2">
                            <option selected>Select Organisation Type</option>
                            @foreach($types as $organisation_type)
                                <option value="{{ $organisation_type->id }}"
                                        data-id="{{ $organisation_type->id }}"
                                        class="organizationtype">{{ $organisation_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Inline Form -->
            <div class="intro-y mt-5" id="formcontainer" style="display: none">
                <div id="inline-form">
                    <div class="preview">
                        <form id="fieldvaluesform" method="post"
                              action="{{ url('/administration/organizations/fields/store') }}">
                            @csrf
                            <div class="grid grid-cols-12 gap-2" id="fieldset">
                            </div>
                            <input type="hidden" name="organization_type_id" id="organization_type_id"/>
                            <input type="hidden" name="admin_name" id="adminname"/>
                            <input type="hidden" name="admin_email" id="adminemail"/>
                            <input type="hidden" name="organization_name" id="organization_name"/>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Inline Form -->

            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5" id="adminAccount" style="display: none">
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-1" class="form-label">Admin Name</label>
                    <input id="admin_name" type="text" class="form-control" placeholder="Name of Super Admin">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-2" class="form-label">Email Address</label>
                    <input id="admin_email" type="email" class="form-control"
                           placeholder="Enter the Administrator's Email Address">
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button class="btn btn-secondary w-24" id="previousScreen">Previous</button>
                    <button class="btn btn-primary w-24 ml-2" id="saveOrganisation">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Wizard Layout -->

@endsection

@push('scripts')
    <script>
        var selectedValue;
        var step = 1;
        var hasFetched = false;

        $(document).on('click', '.dynamicSelect', function () {
            selectedValue = $(this).val(); // get selected
            var selectElement = $(this);
            selectElement.nextAll('.dynamicSelect').remove();

            if (!isNaN(selectedValue)) {
                $.ajax({
                    url: '/api/administration/organizations/get-children/' + selectedValue,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.length !== 0) {
                            appendNewSelect(data)
                        }
                    }
                });
            }

            function appendNewSelect(data) {
                var select = $('<select/>', {
                    id: '',   // set the ID attribute
                    class: 'dynamicSelect form-control col-span-4 mt-5' // set the class attribute
                });
                select.append('<option selected>Select Organisation Type</option>');
                $.each(data, function (key, value) {
                    select.append('<option data-id="' + value.id + '" class="organizationtype" value="' + value.id + '">' + value.name + '</option>');
                });
                $('#input-fields').append(select);
            }
        });

        $(document).on('click', '#saveOrganisation', function () {

            if (step === 1) {
                var lastSelect = selectedValue;

                // display loading animation just below the button
                var loading = $('<div/>', {
                    class: 'spinner-border text-primary',
                    role: 'status'
                });

                loading.append($('<span/>', {
                    class: 'sr-only',
                    text: 'Loading...'
                }));

                $('#topform').after(loading);

                if (!isNaN(lastSelect)) {
                    if (!hasFetched) {
                        $.ajax({
                            url: '/api/administration/organizations/store',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                organization_type_id: lastSelect
                            },
                            success: function (data) {
                                $('#formcontainer').show();
                                $.each(data.original, function (groupName, groupItems) {
                                    $.each(groupItems, function (index, field) {
                                        //switch case groupedItems type
                                        switch (field.type) {
                                            case 'text':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="text" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'number':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="number" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'textarea':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><textarea class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></textarea></div>');
                                                break;
                                            case 'select':
                                                var select = $('<select/>', {
                                                    id: '',
                                                    class: 'form-control col-span-4',
                                                    name: 'input' + field.id,
                                                });
                                                select.append('<option selected>Select ' + field.name + '</option>');
                                                $.each(field.options, function (key, value) {
                                                    select.append('<option value="' + value + '">' + value + '</option>');
                                                });
                                                $('#fieldset').append(select);
                                                break;
                                            case 'checkbox':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="checkbox" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'radio':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="radio" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'date':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="date" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'time':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="time" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                            case 'date':
                                                $('#fieldset').append('<div class="col-span-4"><label>' + field.name + '</label><input type="date" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                                break;
                                        }
                                        //put a hr and move to next row
                                        $('#fieldset').append('<hr class="col-span-12 my-5">');
                                    });
                                });
                                hasFetched = true;
                            }
                        }).always(function () {
                            // remove loading spinner regardless of AJAX request was successful or not
                            loading.remove();
                        });
                    } else {
                        // Just show the formcontainer if it's already populated
                        $('#formcontainer').show();
                    }
                    step++;
                }
            }

            if (step === 2) {
                //step2 button add primary class
                $('#step2').removeClass('bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500');
                $('#step2').addClass('btn-primary');
                $('#inline-form').hide();
                $('#formcontainer').show();
                step++;
                //stop propagating the click event
                return false;
            }

            if (step === 3) {
                //step3 button add primary class
                $('#step3').removeClass('bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500');
                $('#step3').addClass('btn-primary');
                $('#formcontainer').hide();
                $('#adminAccount').show();
                $('#saveOrganisation').text('Finish');
                step++;
                //stop propagating the click event
                return false;
            }

            //if step is 4, then save the organisation
            if (step === 4) {
                //grab the fieldvaluesform
                var fieldValues = $('#fieldvaluesform').serializeArray();

                //add the admin name and email to the fieldValues
                $('#adminname').val($('#admin_name').val());
                $('#adminemail').val($('#admin_email').val());
                $('#organization_type_id').val(selectedValue);
                $('#organization_name').val($('#name').val());

                $("#fieldvaluesform").submit();
            }
        });

        // Handle form submission
        $("#fieldvaluesform").on('submit', function (e) {
            // Prevent the form from being submitted normally
            e.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Make AJAX request
            $.ajax({
                url: '/api/administration/organizations/fields/store',
                type: 'POST',
                dataType: 'json',
                data: formData,
                success: function (response) {
                    // Handle success response
                    console.log(response);
                    window.location.href = '/administration/organizations';
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log('Error: ' + error.message);
                    console.log('Status: ' + status);
                    console.log(xhr.responseText);
                }
            });
        });

        //previous screen on click
        $(document).on('click', '#previousScreen', function () {
            if (step === 2) {
                $('#step2').removeClass('btn-primary');
                $('#step2').addClass('bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500');
                $('#formcontainer').hide();
                $('#inline-form').show();
                step--;
            }

            if (step === 4) {
                $('#step3').removeClass('btn-primary');
                $('#step3').addClass('bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500');
                $('#adminAccount').hide();
                $('#formcontainer').show();
                $('#saveOrganisation').text('Next');
                step -= 2;
            }
        });


    </script>
@endpush
