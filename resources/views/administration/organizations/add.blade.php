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

    <!-- BEGIN: Super Large Slide Over Content -->
    <div id="permissions_slideover" class="modal modal-slide-over" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header p-5">
                    <h2 class="font-medium text-base mr-auto">Manage Permissions for [ <span id="orgname"></span> >
                        <span
                            id="orgrole"></span> ]</h2>
                </div>
                <div class="modal-body">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap">Module</th>
                                <th class="whitespace-nowrap">Create</th>
                                <th class="whitespace-nowrap">Read</th>
                                <th class="whitespace-nowrap">Update</th>
                                <th class="whitespace-nowrap">Delete</th>
                            </tr>
                            </thead>
                            <tbody id="pbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editrolemodal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Update Role Name
                    </h2>
                </div>
                <div id="vertical-form" class="p-5">
                    <form method="post" action="{{ url('/api/administration/update/roles') }}" id="editroleform">
                        @csrf
                        <div class="preview">
                            <div>
                                <label for="editrolename" class="form-label">Role Name</label>
                                <input id="editrolename" name="name" type="text" class="form-control"
                                       placeholder="Role Name">
                            </div>
                            <input type="hidden" name="role_id" id="editroleid"/>
                            <button class="btn btn-primary mt-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="post" action="{{ url('/api/administration/roles/delete') }}" id="deleteRoleForm">
                        @csrf
                        <input type="hidden" name="role_id" id="delete_role_id"/>
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
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- END: Modal Content -->

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
                            });
                            $('#example-tab-5').append(`<div style="text-align: end" class="col-span-12 float-right">
                              <button id="saveButton" class="btn btn-primary">Save Record</button>
                            </div>`);
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
                                <a class="warning flex items-center mr-3 configpermissions" href="javascript:;"
                                   data-role="${role.id}"
                                    data-orgname="${role.organization_name}"
                                   data-rolename="${role.name}">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="key" data-lucide="key" class="lucide lucide-key block mx-auto"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 11-7.778 7.778 5.5 5.5 0 017.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    &nbsp;Configure
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="flex">
                                            <a class="save flex items-center mr-3 editrole" data-role="${role.id}" href="javascript:;" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit block mx-auto"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                Edit
                                            </a>
                                            <a class="delete flex items-center text-danger delete-role" href="javascript:;" data-role="${role.id}">
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
                    //reset form
                    $('#addRoleForm').trigger("reset");
                    fetchOrganizationRoles(id, type);
                }
            });
        });

        //configpermissions onclick
        $(document).on('click', '.configpermissions', function () {
            const mySlideOver = tailwind.Modal.getOrCreateInstance(document.querySelector("#permissions_slideover"));
            $('#orgname').text($(this).data('orgname'));
            $('#orgrole').text($(this).data('rolename'));
            var roleid = $(this).data('role');
            mySlideOver.show();
            $.ajax({
                url: '/api/administration/permissions/' + roleid,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#permissions_slideover').find('tbody').empty();
                    $.each(data, function (index, permission) {
                        $('#permissions_slideover').find('tbody').append(`<tr>
                        <td>${permission.module}</td>
                        <td><input data-role="${roleid}" data-module="${permission.prefix}" data-permission="create" class="permission-checkbox" type="checkbox" ${permission.permissions.create ? 'checked' : ''}></td>
                        <td><input data-role="${roleid}" data-module="${permission.prefix}" data-permission="read" class="permission-checkbox" type="checkbox" ${permission.permissions.read ? 'checked' : ''}></td>
                        <td><input data-role="${roleid}" data-module="${permission.prefix}" data-permission="update" class="permission-checkbox" type="checkbox" ${permission.permissions.update ? 'checked' : ''}></td>
                        <td><input data-role="${roleid}" data-module="${permission.prefix}" data-permission="delete" class="permission-checkbox" type="checkbox" ${permission.permissions.delete ? 'checked' : ''}></td>class="permission-checkbox" type="checkbox" ${permission.permissions.delete ? 'checked' : ''} ></td>
                    </tr>`);
                    });
                }
            });
        });

        //update permission on checkbox click function
        $(document).on('click', '.permission-checkbox', function () {
            var roleid = $(this).data('role');
            var module = $(this).data('module');
            var permission = $(this).data('permission');
            var checked = $(this).is(':checked');
            $.ajax({
                url: '/api/administration/permissions/update',
                type: 'POST',
                data: {
                    'checked': checked,
                    'role_id': roleid,
                    'permission': module + '.' + permission,
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });

        //editrole on click edit the role in modal
        $(document).on('click', '.editrole', function () {
            var roleid = $(this).data('role');
            $.ajax({
                url: '/api/administration/roles/' + roleid,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    const el = document.querySelector("#editrolemodal");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    //put role id in the input element
                    $('#editroleid').val(data.id);
                    //put role name in the input element
                    $('#editrolename').val(data.name);
                    modal.show();
                }
            });
        });

        //editroleform on submit
        $("#editroleform").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: "/api/administration/update/roles",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    //reset form
                    $('#editroleform').trigger("reset");
                    //close modal
                    const el = document.querySelector("#editrolemodal");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.hide();
                    //fetch roles
                    fetchOrganizationRoles(id, type);
                }
            });
        });

        //delete role on click
        $(document).on('click', '.delete-role', function () {
            var roleid = $(this).data('role');
            const el = document.querySelector("#delete-modal-preview");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            $('#delete_role_id').val(roleid);
            modal.show();
        });

        //deleteRoleForm on submit
        $("#deleteRoleForm").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: "/api/administration/roles/delete",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    //reset form
                    $('#deleteRoleForm').trigger("reset");
                    //close modal
                    const el = document.querySelector("#delete-modal-preview");
                    const modal = tailwind.Modal.getOrCreateInstance(el);
                    modal.hide();
                    //fetch roles
                    fetchOrganizationRoles(id, type);
                }
            });
        });

    </script>
@endpush
