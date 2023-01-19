<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_name', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_name', 1)]) !!}
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_gst_no', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_gst_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_gst_no', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_owner_name', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_owner_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_owner_name', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_address', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_address', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_address', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_email', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_email', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_email', 1)]) !!}
        </div>
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_mobile', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_mobile', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_mobile', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_year_of_exp', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_year_of_exp', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_year_of_exp', 1)]) !!}
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_aboutus', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_aboutus', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_aboutus', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">



        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_password', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_password', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_password', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_c_password', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('company_c_password', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_c_password', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_work_place_photo', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::file('company_work_place_photo', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_work_place_photo', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_profile_image', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::file('company_profile_image', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_profile_image', 1)]) !!}
        </div>

    </div>
    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_location', 1) }}</label>

<div class="col-lg-4 fv-row">
        {!! Form::text('company_location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_location', 1)]) !!}
</div>


    </div>

    <!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
     {!! JsValidator::formRequest('App\Http\Requests\Admin\ShopRegistrationrequest', 'form') !!}
@endpush
