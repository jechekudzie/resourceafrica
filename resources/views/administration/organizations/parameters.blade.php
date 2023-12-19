@extends('administration.layouts.admin')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Inbox Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto flex">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#basic-modal-preview"
                       class="btn btn-primary">Add Organisation Type</a>
                </div>
            </div>
            <!-- END: Inbox Filter -->
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- BEGIN: Blank Modal -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Organisation Types
                    </h2>
                </div>
                <div class="p-5">
                    <div id="evts" class="demo"></div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Blank Modal -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Manage <span id="selectedtypename"></span> Form Fields
                    </h2>
                </div>
                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <form id="fields-form" method="post" action="{{ route('admin.parameters.store') }}">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">
                                <input type="text" name="name" class="form-control col-span-3" placeholder="Field Name"
                                       aria-label="default input inline 1" id="fieldname">
                                <input type="text" name="label" class="form-control col-span-3"
                                       placeholder="Field Label"
                                       aria-label="default input inline 3" id="fieldlabel">
                                <select name="type" id="field_type" class="col-span-3">
                                    <option value="text">Text</option>
                                    <option value="number">Number</option>
                                    <option value="date">Date</option>
                                    <option value="select">Select (Dropdown)</option>
                                    <option value="textarea">Text Area</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="radio">Radio Button</option>
                                    <option value="file">File Upload</option>
                                </select>
                                <input type="hidden" id="organisation_type_id" name="organization_type_id" value="">
                                <button class="btn btn-primary col-span-3" id="save-field">Add Field</button>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <hr/>
                    <div class="overflow-x-auto">
                        <table class="table table-sm" id="fields-table">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Field Name</th>
                                <th class="whitespace-nowrap">Field Type</th>
                                <th class="whitespace-nowrap">Preview</th>
                                <th class="whitespace-nowrap">Option(s)</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="basic-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('organizations.create') }}">
                    @csrf
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">
                            <div>
                                <label for="crud-form-1" class="form-label">Organisation Type</label>
                                <input id="crud-form-1" type="text" class="form-control w-full"
                                       placeholder="Enter new organisation type" name="name">
                            </div>
                            <div class="mt-3">
                                <label for="crud-form-1" class="form-label">Organisation Type Description</label>
                                <textarea id="crud-form-1" class="form-control w-full"
                                          placeholder="Enter organisation type description"
                                          name="description"></textarea>
                            </div>
                            <input type="hidden" id="parent_id" name="parent_id" value="">
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

    <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="deleteFieldModal" action="{{ url('api/administration/fields/delete') }}">
                    @csrf
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"><i data-lucide="x-circle"
                                                        class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This
                                process
                                cascades to all child records and
                                cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <input type="hidden" name="organization_id" id="organization_id">
                            <input type="hidden" name="id" id="field_id">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="programmatically-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Element Preview</h2>
                </div> <!-- END: Modal Header -->
                <div class="modal-body p-10" id="fieldPreviewPane">

                </div>
            </div>
        </div>
    </div>

    <div id="editFieldModal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Update Field
                    </h2>
                </div>
                <div id="vertical-form" class="p-5">
                    <form method="post" action="{{ url('/api/administration/fields/update') }}" id="editfieldform">
                        @csrf
                        <div class="preview">
                            <div>
                                <label for="editfieldname" class="form-label">Field Name</label>
                                <input id="editfieldname" name="name" type="text" class="form-control"
                                       placeholder="Field Name">
                            </div>
                            <div>
                                <label for="editfieldlabel" class="form-label">Field Label</label>
                                <input id="editfieldlabel" name="label" type="text" class="form-control"
                                       placeholder="Field Label">
                            </div>
                            <div>
                                <label for="editfieldtype" class="form-label">Field Type</label>
                                <select name="type" id="editfieldtype" class="form-control">
                                    <option value="text">Text</option>
                                    <option value="number">Number</option>
                                    <option value="date">Date</option>
                                    <option value="select">Select (Dropdown)</option>
                                    <option value="textarea">Text Area</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="radio">Radio Button</option>
                                    <option value="file">File Upload</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" id="editfieldid"/>
                            <input type="hidden" name="organization_id" id="editorg_id"/>
                            <button type="submit" class="btn btn-primary mt-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="configFieldModal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Configure Field Options
                    </h2>
                </div>
                <div id="vertical-form" class="p-5">
                    <form method="post" id="configfieldform">
                        @csrf
                        <div class="preview">
                            <div>
                                <label for="configfieldname" class="form-label">Put the Field Options Separated by
                                    Comma</label>
                                <input id="configfieldname" name="value" type="text" class="form-control"
                                       placeholder="Option 1, Option 2, Option 3">
                            </div>
                            <input type="hidden" name="field_id" id="field_id"/>
                            <input type="hidden" name="organization_id" id="organization_id"/>
                            <button type="submit" class="btn btn-primary mt-5">Set Options</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let id = null;

        $(document).ready(function () {
            //disable fields-form fields until an organisation type is selected
            $('#fields-form').find('input, select, button').prop('disabled', true);

            $('#evts')
                .on("changed.jstree", function (e, data) {
                    if (data.selected.length) {
                        // Show modal
                        id = data.instance.get_node(data.selected[0]).original.id;
                        $('#inline-form').find('#organisation_type_id').val(id);
                        $('#selectedtypename').text(data.instance.get_node(data.selected[0]).original.text);

                        //enable fields-form fields
                        $('#fields-form').find('input, select, button').prop('disabled', false);

                        //put selected id as value of modal parent_id element
                        $('#parent_id').val(id);

                        //fetch all the fields from the database for this organisation type
                        $.ajax({
                            url: '/api/administration/organization-types/' + id + '/fields',
                            type: 'GET',
                            success: function (response) {
                                populateFieldTable(response);
                            }
                        });
                    }

                })
                .jstree({
                    'core': {
                        'multiple': false,
                        'data': {
                            'url': '/api/administration/organization-types', // Replace with your actual URL
                            'dataType': 'json'
                        },
                    }
                });

            //save field on save-field button click
            $('#save-field').click(function (e) {
                e.preventDefault();
                let form = $('#fields-form');
                let data = form.serialize();
                let url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        $('#fieldname').val('');
                        $('#fieldlabel').val('');
                        populateFieldTable(response);
                    }
                });
            });


            //preview field on previewfield button click
            $(document).on('click', '.previewfield', function () {
                let id = $(this).data('field');
                $.ajax({
                    url: '/api/administration/preview/fields/' + id,
                    type: 'GET',
                    success: function (response) {
                        console.log(response.type)
                        let input = '';
                        if (response.type === 'text') {
                            input = `<div class="w-full"><label>${response.name}</label><input type="text" class="form-control" placeholder="${response.label}"></div>`;
                        } else if (response.type === 'number') {
                            input = `<div class="w-full"><label>${response.name}</label><input type="number" class="form-control" placeholder="${response.label}"></div>`;
                        } else if (response.type === 'date') {
                            input = `<div class="w-full"><label>${response.name}</label><input type="date" class="form-control" value="${response.value}"></div>`;
                        } else if (response.type === 'select') {
                            let options = response.value.split(',');
                            let select = `<select class="form-control">`;
                            $.each(options, function (index, option) {
                                select += `<option value="${option}">${option}</option>`;
                            });
                            select += `</select>`;
                            input = `<div class="w-full"><label>${response.name}</label>${select}</div>`;
                        } else if (response.type === 'textarea') {
                            input = `<div class="w-full"><label>${response.name}</label><textarea class="form-control" placeholder="${response.label}"></textarea></div>`;
                        } else if (response.type === 'checkbox') {
                            //create options from value string splitting at comma
                            let options = response.value.split(',');
                            let checkboxes = '';
                            var counter = 0;
                            $.each(options, function (index, option) {
                                checkboxes += `<div class="flex items-center text-gray-700 dark:text-gray-500"><label class="ml-2" for="checkbox-${counter}"><input type="checkbox" class="form-checkbox" id="checkbox-${counter}"> ${option.replace(/\s/g, '')}</label></div>`;
                                counter++;
                            });
                            input = `<div class="w-full"><label>${response.name}</label>${checkboxes}</div>`;
                        } else if (response.type === 'radio') {
                            //create options from value string splitting at comma
                            let options = response.value.split(',');
                            let radios = '';
                            var counter = 0;
                            $.each(options, function (index, option) {
                                radios += `<div class="flex items-center text-gray-700 dark:text-gray-500"><label class="ml-2" for="radio-${counter}"><input type="radio" name="demo" class="form-radio" id="radio-${counter}"> ${option.replace(/\s/g, '')}</label></div>`;
                                counter++;
                            });
                            input = `<div class="w-full"><label>${response.name}</label>${radios}</div>`;
                        } else if (response.type === 'file') {
                            input = `<div class="w-full"><label>${response.name}</label><input type="file" class="form-control"></div>`;
                        }
                        $('#fieldPreviewPane').html(input);
                        const el = document.querySelector("#programmatically-modal");
                        const modal = tailwind.Modal.getOrCreateInstance(el);
                        modal.show();
                    }
                });
            });
        });

        //methods to populate field table
        function populateFieldTable(data) {
            $('#fields-table tbody').empty();
            var count = 0;
            var configure = false;
            $.each(data.original, function (groupName, groupItems) {
                $.each(groupItems, function (index, field) {
                    configure = field.type === 'select' || field.type === 'checkbox' || field.type === 'radio';
                    $('#fields-table tbody').append(
                        `<tr>
                                    <td>${count + 1}</td>
                                    <td>${field.name}</td>
                                    <td>${field.type}</td>
                                    <td>
                                        <div class="flex">
                                            <a data-field="${field.id}" class="edit flex items-center mr-3 previewfield" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" icon-name="eye"
                                                data-lucide="eye" class="lucide lucide-eye block mx-auto">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle></svg>
                                                &nbsp;Show
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex">
                                            ` + (configure ? `<a data-field="${field.id}" data-organization="${id}" class="save flex items-center mr-3 configureoptions" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" icon-name="settings" data-lucide="settings"
                                                class="lucide lucide-settings block mx-auto">
                                                <path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path>
                                                <circle cx="12" cy="12" r="3"></circle></svg>
                                                Configure
                                            </a>` : ' <a href="#" style="text-align: center"> N/A </a> ') + `
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex">
                                            <a class="edit flex items-center mr-3 editFormField" href="javascript:;" data-field="${field.id}" data-organization="${id}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" icon-name="check-square"
                                                     data-lucide="check-square"
                                                     class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a data-field="${field.id}" data-organization="${id}" class="delete flex items-center text-danger deleteField" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2"
                                                     data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                `
                    );
                    count++;
                });
            });
        }

        //deleteFieldModal on show
        $(document).on('click', '.deleteField', function () {
            let id = $(this).data('field');
            let organization_id = $(this).data('organization');
            $('#deleteFieldModal').find('#field_id').val(id);
            $('#deleteFieldModal').find('#organization_id').val(organization_id);
            const el = document.querySelector("#delete-modal-preview");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        });

        //deleteFieldModal on submit
        $('#deleteFieldModal').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let data = form.serialize();
            let url = form.attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (response) {
                    populateFieldTable(response);
                    form.find('input, select, button').val('');
                    const el = document.querySelector("#delete-modal-preview");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.hide();
                }
            });
        });

        //editFormFieldModal on show
        $(document).on('click', '.editFormField', function () {
            let id = $(this).data('field');
            let organization_id = $(this).data('organization');
            $.ajax({
                url: '/api/administration/preview/fields/' + id,
                type: 'GET',
                success: function (response) {
                    $('#editfieldform').find('#editfieldname').val(response.name);
                    $('#editfieldform').find('#editfieldlabel').val(response.label);
                    $('#editfieldform').find('#editfieldtype').val(response.type);
                    $('#editfieldform').find('#editfieldid').val(response.id);
                    $('#editfieldform').find('#editorg_id').val(organization_id);
                    const el = document.querySelector("#editFieldModal");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.show();
                }
            });
        });

        //editfieldform on submit
        $('#editfieldform').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let data = form.serialize();
            let url = form.attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (response) {
                    populateFieldTable(response);
                    form.find('input, select, button').val('');
                    const el = document.querySelector("#editFieldModal");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.hide();
                }
            });
        });

        //configureoptions on click
        $(document).on('click', '.configureoptions', function () {
            let id = $(this).data('field');
            let organization_id = $(this).data('organization');
            $('#configfieldform').find('#field_id').val(id);
            $('#configfieldform').find('#organization_id').val(organization_id);
            const el = document.querySelector("#configFieldModal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        });

        //configfieldform on submit
        $('#configfieldform').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let data = form.serialize();
            let url = form.attr('action');
            $.ajax({
                url: '/api/administration/field/options',
                type: 'POST',
                data: data,
                success: function (response) {
                    populateFieldTable(response);
                    form.find('input, select, button').val('');
                    const el = document.querySelector("#configFieldModal");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.hide();
                }
            });
        });


    </script>
@endpush
