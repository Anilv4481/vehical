<!--begin::Card body-->
<div class="card-body">
           
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_profile_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <input type="file" class="form-control form-control-lg form-control-solid" name="service_worker_profile" accept=".png, .jpg, .jpeg">
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_worker_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_worker_name', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label fw-bold fs-6">{{ trans_choice('content.service_worker_status_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_worker_status">
              <option value=""> Please select status</option>
              <option value="0">Approve</option>
              <option value="1">Reapprove</option>
              <option value="2">Pending</option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_phone_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_worker_phone', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_worker_phone', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_email_id_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_worker_email_id', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_worker_email_id', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label fw-bold fs-6">{{ trans_choice('content.service_worker_active', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select  class="form-control form-control-solid" name="service_worker_active">
              <option value=""> Please select Actice Yes / Not </option>
              <option value="0">Yes </option>
              <option value="1">No </option>
            </select>
        </div>

    </div>
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_last_location_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
               {!! Form::text('service_worker_last_location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_worker_last_location', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_worker_shop_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
               {!! Form::text('service_worker_shop_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_worker_shop_name', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.longitude_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
               {!! Form::text('longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitude', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.latitude_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
               {!! Form::text('latitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitude', 1)]) !!}
        </div>

    </div>
  
</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalworkerRequest', 'form') !!}
@endpush