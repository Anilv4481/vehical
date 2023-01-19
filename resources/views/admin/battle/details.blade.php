@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.edit', ['name' => trans_choice('content.battle', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.battles.show'),
    ])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Content-->
                <div id="kt_account_profile_details">

                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.total_player_title', 1) }}
                                </div>
                                <div class="fs-5 text-gray-600">{{ $battle->total_player }}</div>
                            </div>
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.room_no_title', 1) }}
                                </div>
                                <div class="fs-5 text-gray-600">{{ $battle->room_no }}</div>
                            </div>
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.entry_fee_title', 1) }}</div>
                                <div class="fs-5 text-gray-600">{{ $battle->entry_fee }}</div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.prize_title', 1) }}
                                </div>
                                <div class="fs-5 text-gray-600">{{ $battle->prize }}</div>
                            </div>
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.start_time_title', 1) }}</div>
                                <div class="fs-5 text-gray-600">{{ $battle->start_time }}</div>
                            </div>
                            <div class="col-md-4 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.status_title', 1) }}</div>
                                @if ($battle->status == 1)
                                    <div class="badge badge-light-success fw-bolder">
                                        {{ trans_choice('content.open_title', 1) }} </div>
                                @else
                                    <div class="badge badge-light-primary fw-bolder">
                                        {{ trans_choice('content.running_title', 1) }} </div>
                                @endif

                            </div>
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div
                        class="
                                            card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('admin.battles.index') }}"
                                class="text-white">{{ __('content.back_title') }}</a>
                        </button>
                    </div>
                    <!--end::Actions-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
