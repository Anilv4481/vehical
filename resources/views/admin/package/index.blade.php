@extends('admin.layouts.base')

{{-- @section('admin_filter_form')
    {!! Form::open(['route' => 'admin.packages.download', 'method' => 'POST', 'id' => 'filter_data', 'class' => 'form mb-15']) !!}
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.packages.name', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('name', null, ['placeholder' => __('content.packages.name'), 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0 search_input']) !!}
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span class="required">{{ trans_choice('content.packages.id', 1) }}</span>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('package_id', null, ['placeholder' => __('placeholder.package_id'), 'class' => 'form-control form-control-lg form-control-solid only_number search_input']) !!}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.status_title', 1) }}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="col-lg-8 fv-row">
                <select class="form-control form-control-lg form-control-solid search_input" data-control="select2"
                    name="status">
                    <option value="">{{ trans_choice('content.please_select', 1) }}</option>
                    <option value="1">{{ trans_choice('content.active_title', 1) }}</option>
                    <option value="0">{{ trans_choice('content.inactive_title', 1) }}</option>
                </select>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--end::Input group-->
    </div>
    <!--end::Card body-->

    <!--begin::Actions-->
    <div class="d-flex justify-content-end">
        @include('admin.layouts.components.buttons.white_btn', [
            'type' => 'reset',
            'id' => 'searchReset',
            'attr' => 'data-kt-menu-dismiss="true"',
            'title' => trans_choice('content.reset', 1),
            'class' => 'btn-active-light-primary',
        ])
        @include('admin.layouts.components.buttons.primary_btn', [
            'id' => 'extraSearch',
            'attr' => 'data-kt-menu-dismiss="true"',
            'title' => __('content.search_title'),
        ])
        @include('admin.layouts.components.buttons.exportbtn')
    </div>
    <!--end::Actions-->

    {!! Form::close() !!}
@endsection --}}

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.package', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.packages.index'),
        'filter' => false,
        'create_btn' => [
            'status' => true,
            'route' => route('admin.packages.create'),
            'name' => __('messages.create', [
                'name' => trans_choice('content.package', 1),
            ]),
        ],
       
    ])
    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.name_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.amount_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.vat_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.sar_title', 1)],
            ['classname' => 'min-w-100px', 'title' => trans_choice('content.action_title', 1)],
        ],
    ])
@endsection

@push('scripts')
    <script>
        var oTable;
        $(document).ready(function() {
            oTable = $('#kt_table_1').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                oLanguage: {
                    sLengthMenu: "Show _MENU_",
                },
                createdRow: function(row, data, dataIndex) {
                    // Set the data-status attribute, and add a class
                    $(row).attr('role', 'row');
                    $(row).find("td").last().addClass('text-danger');

                },
                ajax: {
                    "url": "{{ route('admin.packages.index') }}",
                    data: function(d) {
                        d.name = $('input[name=name]').val();
                        d.package_id = $('input[name=package_id]').val();
                        d.status = $('select[name=status]').val();
                    },
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return data;
                            // return "#" + serialNumberShow(meta);
                        }
                    },

                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                        }
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                        }
                    },
                    {
                        data: 'vat',
                        name: 'vat',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                        }
                    },
                    {
                        data: 'sar',
                        name: 'sar',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                        }
                    },
                 
                 
                  
                 
                 
                    {
                        data: 'id',
                        name: 'id',
                        // visible:false,
                        render: function(data, type, row, meta) {

                            var edit_url = `{{ url('/') }}/admin/packages/` + row['id'] +
                                `/edit/?tab=edit`;
                        
                            var edit_data = actionEditButton(edit_url, row['id']);
                         
                            var del_data = actionDeleteButton(row['id']);
                            return `<div class="flex justify-left items-center">  ${edit_data} ${del_data} </div>`;

                            // return `<div class="flex justify-left items-center"> ${button} </div>`;

                        }
                    },
                ],
            });
            //start: datatables common js file for changing
            oTable.columns().iterator('column', function(ctx, idx) {
                $(oTable.column(idx).header()).append('<span class="sort-icon"/>');
            });
            //end: datatables common js file for changing
        });

        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/packages/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/packages/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });
    </script>

    <script>
        $('#extraSearch').on('click', function() {
            //extraSearch is id of search button....
            oTable.draw();
        });

        $(document).on('click', '#searchReset', function(e) {
            $('#filter_data').trigger("reset");
            e.preventDefault();
            oTable.draw();
        });

        $(document).on('click', '.drawerReset', function(e) {
            $('#filter_data').trigger("reset");
            e.preventDefault();
            oTable.draw();
        });

        $(document).ready(function() {
            $('#filter_data').trigger("reset");
            oTable.draw();
        });

        $(document).on('click', '#search_filter_excel_download', function(e) {
            var export_type = $(this).attr('data-type');
            console.log(export_type);
            $('#export_type').val(export_type);
            $('#filter_data').submit();
        });
    </script>
@endpush
