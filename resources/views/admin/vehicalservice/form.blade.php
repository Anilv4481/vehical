<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->
   
       
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_image_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
       
            <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_image" accept=".png, .jpg, .jpeg">
            
       
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehicalservice_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehicalservice_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehicalservice_name', 1)]) !!}
        </div>

    </div>

  
</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalServiceRequest', 'form') !!}
@endpush