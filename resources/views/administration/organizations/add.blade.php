@extends('administration.layouts.admin')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Inbox Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto flex">
                    <a href="javascript:;"
                       class="btn btn-primary">Add Organisations</a>
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

            <!-- BEGIN: Link Tab -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Manage Organisation Details
                    </h2>
                </div>
                <div id="link-tab" class="p-5">
                    <div class="preview">
                        <ul class="nav nav-link-tabs" role="tablist">
                            <li id="example-5-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2 active" data-tw-toggle="pill"
                                        data-tw-target="#example-tab-5" type="button" role="tab"
                                        aria-controls="example-tab-5" aria-selected="true"> Details
                                </button>
                            </li>
                            <li id="example-6-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill"
                                        data-tw-target="#example-tab-6" type="button" role="tab"
                                        aria-controls="example-tab-6" aria-selected="false"> Roles &amp; Permissions
                                </button>
                            </li>
                            <li id="example-7-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill"
                                        data-tw-target="#example-tab-7" type="button" role="tab"
                                        aria-controls="example-tab-7" aria-selected="false"> User Accounts
                                </button>
                            </li>
                            <li id="example-8-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill"
                                        data-tw-target="#example-tab-8" type="button" role="tab"
                                        aria-controls="example-tab-8" aria-selected="false"> Reports
                                </button>
                            </li>
                            <li id="example-9-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill"
                                        data-tw-target="#example-tab-9" type="button" role="tab"
                                        aria-controls="example-tab-9" aria-selected="false"> Settings
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content mt-5">
                            <div id="example-tab-5" class="tab-pane grid grid-cols-12 gap-2 leading-relaxed active"
                                 role="tabpanel"
                                 aria-labelledby="example-5-tab">
                            </div>
                            <div id="example-tab-6" class="tab-pane tab-pane grid grid-cols-12 gap-2"
                                 role="tabpanel"
                                 aria-labelledby="example-6-tab">


                                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="box p-5">
                                        <form id="addRoleForm" method="post" action="{{ route('admin.roles.store') }}">
                                            @csrf
                                            <div class="preview">
                                                <div>
                                                    <label for="vertical-form-1" class="form-label">Role</label>
                                                    <input id="vertical-form-1" name="name" type="text"
                                                           class="form-control" required
                                                           placeholder="Create a New Role">
                                                </div>
                                                <input type="hidden" id="role_organization_id" name="organization_id">
                                                <button class="btn btn-primary mt-5" type="submit">Create Role
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="intro-y col-span-12 md:col-span-8 lg:col-span-8">
                                    <div class="box">
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">#</th>
                                                <th class="whitespace-nowrap">Role Name</th>
                                                <th class="whitespace-nowrap">Permissions</th>
                                                <th class="whitespace-nowrap">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody id="rolesTable">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="example-tab-7" class="tab-pane leading-relaxed active" role="tabpanel"
                                 aria-labelledby="example-7-tab">


                            </div>
                            <div id="example-tab-8" class="tab-pane leading-relaxed" role="tabpanel"
                                 aria-labelledby="example-8-tab">


                            </div>
                            <div id="example-tab-9" class="tab-pane leading-relaxed" role="tabpanel"
                                 aria-labelledby="example-9-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Basic Tab -->
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

        let [rand, type, id] = [null, null, null];
        let parentNodeId = null;

        $('#evts')
            .on("changed.jstree", function (e, data) {
                let selectedNodeId = data.selected[0];

                // get parent of the selected node id
                parentNodeId = $('#evts').jstree(true).get_parent(selectedNodeId);

                if (data.selected.length) {
                    [rand, type, id] = data.instance.get_node(data.selected[0]).original.id.split('-');

                    //set role_organization_id to id
                    if (type === 'o') {
                        $('#role_organization_id').val(id);
                    } else {
                        $('#role_organization_id').val('');
                    }

                    //ajax call to bring up the form fields
                    $.ajax({
                        url: '/api/administration/organization-types/fields',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            type: type,
                            id: id,
                            rand: rand,
                            parent: parentNodeId
                        },
                        success: function (data) {
                            $('#example-tab-5').empty();
                            $.each(data.original, function (groupName, groupItems) {
                                $.each(groupItems, function (index, field) {
                                    //switch case groupedItems type
                                    switch (field.type) {
                                        case 'text':
                                            var value = field.pivot.value ? field.pivot.value : '';
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="text" class="form-control" name="input' + field.id + '" value="' + value + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'number':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="number" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'textarea':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><textarea class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></textarea></div>');
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
                                            $('#example-tab-5').append(select);
                                            break;
                                        case 'checkbox':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="checkbox" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'radio':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="radio" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'date':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="date" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'time':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="time" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                        case 'date':
                                            $('#example-tab-5').append('<div class="col-span-4"><label>' + field.name + '</label><input type="date" class="form-control" name="input' + field.id + '" placeholder="Enter ' + field.name + '"></div>');
                                            break;
                                    }
                                });
                                //put a hr and move to next row
                                $('#example-tab-5').append('<hr class="col-span-12 my-5">');
                                $('#example-tab-5').append(`<div style="text-align: end" class="col-span-12 float-right">
                                    <button id="saveButton" class="btn btn-primary">Save Record</button>
                                </div>`);
                            });
                            fetchOrganizationRoles(id, type);
                            hasFetched = true;
                        }
                    });
                }
            })
            .jstree({
                'core': {
                    'multiple': false,
                    'data': {
                        'url': '/api/administration/organizations/instances',
                        'dataType': 'json'
                    },
                }
            });

        $(document).on('click', '#saveButton', function () {
            var form = $('<form/>', {
                id: 'saveForm',
                action: '/api/administration/organizations/store',
                method: 'POST',
                enctype: 'multipart/form-data'
            });
            $.each($('#example-tab-5').find('input, select, textarea'), function (index, field) {
                var input = $('<input/>', {
                    type: 'hidden',
                    name: field.name,
                    value: field.value
                });
                form.append(input);
            });

            //add type and id form fields
            var input = $('<input/>', {
                type: 'hidden',
                name: 'type',
                value: type
            });

            form.append(input);

            var input = $('<input/>', {
                type: 'hidden',
                name: 'id',
                value: id
            });

            form.append(input);

            var input = $('<input/>', {
                type: 'hidden',
                name: 'parent',
                value: parentNodeId
            });

            form.append(input);

            //add form to dom
            $('body').append(form);

            //submit form with ajax
            $.ajax({
                url: '/api/administration/organizations/store',
                type: 'POST',
                dataType: 'json',
                data: form.serialize(),
                success: function (data) {
                    console.log(data.parent);
                    $('#evts').jstree(true).refresh();
                    setTimeout(function () {
                        $('#evts').jstree('open_node', data.parent);
                    }, 1000);
                }
            });
        });

        function fetchOrganizationRoles(id, type) {
            $.ajax({
                url: '/api/administration/roles/' + id + '/' + type,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#rolesTable').empty();
                    $.each(data, function (index, role) {
                        $('#rolesTable').append(`<tr>
                        <td>${index + 1}</td>
                        <td>${role.name}</td>
                        <td>
                            <div class="flex">
                                <a class="warning flex items-center mr-3" href="javascript:;">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="key" data-lucide="key" class="lucide lucide-key block mx-auto"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 11-7.778 7.778 5.5 5.5 0 017.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    &nbsp;Configure
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="flex">
                                            <a class="save flex items-center mr-3" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit block mx-auto"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                Edit
                                            </a>
                                            <a class="delete flex items-center text-danger" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                                Delete
                                            </a>
                                        </div>
                        </td>
                    </tr>`);
                    });
                }
            });
        }

        $("#addRoleForm").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: "/administration/organisation/roles",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    // handle response
                }
            });
        });
    </script>
@endpush
