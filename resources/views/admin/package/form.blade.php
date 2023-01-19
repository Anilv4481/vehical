<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.name_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-4 fv-row">
            {!! Form::text('name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.name_title', 1)]) !!}
        </div>
        <!--end::Col-->

        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.amount_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-4 fv-row">
            {!! Form::text('amount', null, ['placeholder' => trans_choice('content.amount_title', 1), 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0']) !!}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-2 col-form-label fw-bold fs-6">
            <span class="required">{{ trans_choice('content.vat_title', 1) }}</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                title="Entry Fee should be atleast 1."></i>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-4 fv-row">
            {!! Form::text('vat', null, ['placeholder' => trans_choice('content.vat_title', 1), 'class' => 'form-control form-control-lg form-control-solid']) !!}
        </div>
        <!--end::Col-->

        <!--begin::Label-->
        <label class="col-lg-2 col-form-label fw-bold fs-6">
            <span class="required">{{ trans_choice('content.sar_title', 1) }}</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                title="Prize should be atleast 1."></i>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-4 fv-row">
            {!! Form::text('sar', null, ['placeholder' => trans_choice('content.sar_title', 1), 'class' => 'form-control form-control-lg form-control-solid']) !!}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

  


</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PackageRequest', 'form') !!}
@endpush
