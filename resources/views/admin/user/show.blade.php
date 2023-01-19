@extends('admin.user.navbarsidebar')
@section('user_details_breadcrumb')
    @include('admin.layouts.components.header',[
    'title'=> __('messages.detail', ['name' => trans_choice('content.user', 2)]),
    'breadcrumbs'=> Breadcrumbs::render('admin.users.show')
    ])
@endsection
@section('user_details_tab')
    <!--begin:::Tab pane-->
    <div class="tab-pane fade {{ request()->tab == 'details' || request()->tab == '' ? 'show active' : '' }}"
        id="kt_user_view_overview_security" role="tabpanel">
        <!--begin::Card-->
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 style="color:blue">{{ trans_choice('content.profile', 1) }}</h2>
                </div>
               
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 pb-5">
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-bold text-gray-600">

                        <tr>
                                <td>Name</td>
                                <td>{{ $user->name }} {{ $user->l_name }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            
                            <tr>
                                <td>Number</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td>About</td>
                                <td>{{ $user->about }}</td>
                            </tr>
                          
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 style="color:blueviolet">{{ trans_choice('content.rating', 1) }}</h2>
                </div>
               
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 pb-5">
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-bold text-gray-600">

                        <tr>
                                <td>Rating</td>
                                <td>{{ $user->rating }}</td>
                            </tr>

                            <!-- <tr>
                                <td>Email</td>
                                <td>{{ $user->rating }}</td>
                            </tr> -->
                            
                            <!-- <tr>
                                <td>Number</td>
                                <td>{{ $user->phone }}</td>
                            </tr> -->
                            <!-- <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr> -->
                            <!-- <tr>
                                <td>About</td>
                                <td>{{ $user->about }}</td>
                            </tr> -->
                          
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 style="color:green">{{ trans_choice('content.review', 1) }}</h2>
                </div>
               
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 pb-5">
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-bold text-gray-600">

                        <tr>
                                <td>Review</td>
                                <td>{{ $user->name }} {{ $user->l_name }}</td>
                            </tr>

                            <!-- <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr> -->
                            
                            <!-- <tr>
                                <td>Number</td>
                                <td>{{ $user->phone }}</td>
                            </tr> -->
                            <!-- <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr> -->
                            <!-- <tr>
                                <td>About</td>
                                <td>{{ $user->about }}</td>
                            </tr> -->
                          
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        
        <!--end::Card-->
    </div>
    <!--end:::Tab pane-->
@endsection
