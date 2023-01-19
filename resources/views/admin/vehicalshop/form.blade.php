<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->
   
       
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_shop_profile_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_shop_profile" accept=".png, .jpg, .jpeg">
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_shop_address_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_shop_address', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_shop_address', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_phone_number_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_phone_number', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_phone_number', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_type', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_type', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_shop_email_id_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_shop_email_id', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_shop_email_id', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_shop_status', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_shop_status">
              <option value=""> Please select status</option>
              <option value="0">Approve</option>
              <option value="1">Reapprove</option>
              <option value="2">Pending</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_problem_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
               {!! Form::text('vehical_problem', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_problem', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_desc_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::textarea('vehical_desc', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_desc', 1)]) !!}
        </div>

    </div>
  
</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalShopRequest', 'form') !!}
@endpush