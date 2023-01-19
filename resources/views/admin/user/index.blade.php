@extends('admin.layouts.base')

@section('admin_filter_form')
    {!! Form::open(['route' => 'admin.users.download', 'method' => 'POST', 'id' => 'filter_data', 'class' => 'form mb-15']) !!}
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.name_title', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('name', null, ['placeholder' => 'Name', 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0']) !!}
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.email_title', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control form-control-lg form-control-solid']) !!}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span class="required">{{ trans_choice('content.phone_title', 1) }}</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                    title="Phone number must be active"></i>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::tel('phone', null, ['placeholder' => 'Contact Number', 'class' => 'form-control form-control-lg form-control-solid']) !!}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.user_id', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('user_id', null, ['placeholder' => __('placeholder.user_id'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0']) !!}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.role', 1) }}</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8 fv-row">
                {!! Form::select('role', $roles, null, ['class' => 'form-control form-control-lg form-control-solid', 'data-control' => 'select2', 'placeholder' => 'Please Select Role']) !!}
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.status_title', 1) }}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="col-lg-8 fv-row">
                <select class="form-control form-control-lg form-control-solid" data-control="select2" name="status">
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
        <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" id="searchReset"
            data-kt-menu-dismiss="true">{{ trans_choice('content.reset', 1) }}</button>
        <button type="button" class="btn btn-sm btn-primary me-2" id="extraSearch"
            data-kt-menu-dismiss="true">{{ __('content.search_title') }}</button>
        <button type="submit" class="btn btn-sm btn-info"
            data-kt-menu-dismiss="true">{{ __('content.download_title') }}</button>
    </div>
    <!--end::Actions-->
    {!! Form::close() !!}
@endsection

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', ['name' => trans_choice('content.user', 2)]),
        'breadcrumbs' => Breadcrumbs::render('admin.users.index'),
    ])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
            
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table id="kt_table_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="">{{ trans_choice('content.id_title', 1) }}</th>
                                <th class=" min-w-125px">{{ trans_choice('content.name_title', 1) }}</th>
                                <th class="min-w-125px">{{ trans_choice('content.email_title', 1) }}</th>
                                
                                <th class=" min-w-125px">{{ trans_choice('content.email_status', 1) }}</th>
                                <th class=" min-w-125px">{{ trans_choice('content.phone_status', 1) }}</th>
                                <th class="min-w-100px">{{ trans_choice('content.status', 1) }}</th>
                                <th class="min-w-100px">{{ trans_choice('action', 1) }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold"></tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    @include('admin.user.filter_drawer')
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
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                },
                oLanguage: {
                    sLengthMenu: "Show _MENU_",
                    sEmptyTable: "No Records Found.",
                    infoEmpty: "No entries to show.",
                },
                createdRow: function(row, data, dataIndex) {
                    // Set the data-status attribute, and add a class
                    $(row).attr('role', 'row');
                    $(row).find("td").last().addClass('text-danger');

                },
                ajax: {
                    "url": "{{ route('admin.users.index') }}",
                    data: function(d) {
                        d.name = $('input[name=name]').val();
                        
                        d.email = $('input[name=email]').val();
                        d.user_id = $('input[name=user_id]').val();
                        d.phone_status = $('input[name=phone_status]').val();
                        d.email_status = $('input[name=email_status]').val();
                        d.status = $('select[name=status]').val();
                        // d.role = $('select[name=role]').val();
                    },
                },
                dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false,
                    // className: 'mdl-data-table__cell--non-numeric'
                }],
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
                        
                        render: function(data,type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/users/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}">
                                        <div class="font-medium whitespace-no-wrap">${data}</div>
                                    </a>`;
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        render: function(data, type, row, meta) {
                            return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
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
                            }else{
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
                            

                           }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {

                        // var edit_url = `{{ url('/') }}/admin/consultants/` + row['id'] +
                        //     `/edit/?tab=edit`;
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
            var url = `{{ url('/') }}/admin/users/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/users/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });
    </script>


    <script>
        $('#extraSearch').on('click', function() {
            //extraSearch is id of search button....
            oTable.draw();
        });

        $(document).on('click', '#searchReset', function(e) {
            //alert('success');
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
    </script>
@endpush
