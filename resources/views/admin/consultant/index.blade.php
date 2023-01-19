@extends('admin.layouts.base')

{{-- @section('admin_filter_form')
    {!! Form::open(['route' => 'admin.consultants.download', 'method' => 'POST', 'id' => 'filter_data', 'class' => 'form mb-15']) !!}
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.consultants.name', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('name', null, ['placeholder' => __('content.consultants.name'), 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0 search_input']) !!}
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span class="required">{{ trans_choice('content.consultants.id', 1) }}</span>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('consultant_id', null, ['placeholder' => __('placeholder.consultant_id'), 'class' => 'form-control form-control-lg form-control-solid only_number search_input']) !!}
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
            'name' => trans_choice('content.consult_title', 2),
        ]),
   
    ])
    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.f_name', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.consultant_image', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.email_status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.phone_status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('action', 1)],
      
            
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
                    "url": "{{ route('admin.consultants.index') }}",
                    data: function(d) {
                        d.name = $('input[name=name]').val();
                        d.consultant_id = $('input[name=consultant_id]').val();
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
                            var show_url = `{{ url('/') }}/admin/consultants/` + row['id'] +
                                `?tab=details`;
                            return ` 
                                        <div class="font-medium whitespace-no-wrap">${data}</div>`;
                        }
                    },
                    {
                        data: 'picture',
                        name: 'picture',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap"><img src="{{url('/') }}/counsultant/image/${data}" height="50"></div>`;
                        }
                    },
                    {
                        data: 'email_status',
                        name: 'email_status',
                        render: function(data, type, row, meta) {
                            var email_status='';
                        var email_status1='';
                        if(data==0){
                                email_status="Verify";
                                email_status1=1;
                         }else if(data==1){
                            email_status="Unverify";
                            email_status1=0;
                        } 
                                        
                        var edit_url = `{{ url('/') }}/admin/users/emailapprove/` + row['id']+
                                `/`+email_status1;
                            if(data==0){
                                return ` <a href="${edit_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:green">${email_status}</div>
                                    </a>`;
                            }else{
                                return ` <a href="${edit_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:red">${email_status}</div>
                                    </a>`;
                            }
                        }
                    },
                    {
                        data: 'phone_status',
                        name: 'phone_status',
                        render: function(data, type, row, meta) {
                            var phone_status='';
                                var phone_status1='';
                                if(data==0){
                                    phone_status="Verify";
                                     phone_status1=1;
                             }else if(data==1){
                                phone_status="Unverify";
                                phone_status1=0;
                            } 
                            var phone_url = `{{ url('/') }}/admin/users/phoneapprove/` + row['id']+
                                `/`+phone_status1;
                            if(data==0){
                                return ` <a href="${phone_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:green">${phone_status}</div>
                                    </a>`;        
                            }
                            else{
                                return ` <a href="${phone_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:red">${phone_status}</div>
                                    </a>`; 
                            }
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row, meta) {
                            var data_status1='';
                            var data_status2='';
                            if(data==0){
                                data_status1="Active";
                                data_status2=1;
                             }else if(data==1){
                                data_status1="Deactive";
                                data_status2=0;
                            } 

                            var status_url = `{{ url('/') }}/admin/users/` + row['id'] +
                                `/`+data_status2;
                            if(data==0){
                            return ` <a href="${status_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:green">${data_status1}</div>
                                    </a>`;
                            }else{
                                return ` <a href="${status_url}">
                                        <div class="font-medium whitespace-no-wrap" style="color:red">${data_status1}</div>
                                    </a>`;
                            }

                    },
                },
                
                {
                        data: 'id',
                        name: 'id',
                        // visible:false,
                        render: function(data, type, row, meta) {

                            // var edit_url = `{{ url('/') }}/admin/consultants/` + row['id'] +
                            //     `/edit/?tab=edit`;
                            // var show_url = `{{ url('/') }}/admin/advisorys/` + row['id'] +
                            //     `?tab=details`;

                            var show_url = `{{ url('/') }}/admin/battles/` + row['id'];
                         
                        // var edit_data = actionEditButton(edit_url, row['id']);
                        var show_data = actionShowButton(show_url);

                            var del_data = actionDeleteButton(row['id']);
                            return `<div class="flex justify-left items-center">${show_data} ${del_data} </div>`;

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
            var url = `{{ url('/') }}/admin/consultants/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/consultants/status/` + id + `/` + status;
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
