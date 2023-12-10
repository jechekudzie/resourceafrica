@extends('administration.layouts.admin')

@section('content')

    <!-- BEGIN: Inline Form -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Create New Organisation
            </h2>
        </div>
        <div id="inline-form" class="p-5">
            <div class="preview">
                <div class="grid grid-cols-12 gap-2" id="input-fields">
                    <input id="name" name="name" type="text" class="form-control col-span-4"
                           placeholder="Enter Name of Organisation"
                           aria-label="default input inline 1">
                    <select type="text" class="dynamicSelect form-control col-span-4"
                            aria-label="default input inline 2">
                        <option selected>Select Organisation Type</option>
                        @foreach($types as $organisation_type)
                            <option value="{{ $organisation_type->id }}"
                                    data-id="{{ $organisation_type->id }}"
                                    class="organizationtype">{{ $organisation_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mt-5" id="saveOrganisation">Create Organisation</button>
            </div>
        </div>
    </div>
    <!-- END: Inline Form -->

    <!-- BEGIN: Inline Form -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Capture Details for Organisation
            </h2>
        </div>
        <div id="inline-form" class="p-5">
            <div class="preview">
                <div class="grid grid-cols-12 gap-2">
                    <input type="text" class="form-control col-span-4" placeholder="Input inline 1"
                           aria-label="default input inline 1">
                    <input type="text" class="form-control col-span-4" placeholder="Input inline 2"
                           aria-label="default input inline 2">
                    <input type="text" class="form-control col-span-4" placeholder="Input inline 3"
                           aria-label="default input inline 3">
                </div>
            </div>
        </div>
    </div>
    <!-- END: Inline Form -->

@endsection


@push('scripts')
    <script>
        $(document).on('click', '.dynamicSelect', function () {
            var selectedValue = $(this).val(); // get selected
            var selectElement = $(this);
            selectElement.nextAll('.dynamicSelect').remove();

            //if value is not NaN
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
                    class: 'dynamicSelect form-control col-span-4' // set the class attribute
                });
                select.append('<option selected>Select Organisation Type</option>');
                $.each(data, function (key, value) {
                    select.append('<option data-id="' + value.id + '" class="organizationtype" value="' + value.id + '">' + value.name + '</option>');
                });
                $('#input-fields').append(select);
            }
        });

        $(document).on('click', '#saveOrganisation', function () {
            //get last .dynamicSelect's value. that is the correct type id
            var lastSelect = $('.dynamicSelect').last().val();

            //save organisation to back end
            $.ajax({
                url: '/api/administration/organizations/store',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: $('#name').val(),
                    organisation_type_id: lastSelect
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush
