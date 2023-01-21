<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type', 1) }}</label>

       <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
              <option value=""> Please select vehical</option>
              <option value="bike">Bike </option>
              <option value="car">Car</option>
              <option value="pick-up">Pick-up</option>
              <option value="van">Van</option>
              <option value="truck">Truck</option>
            </select>
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tube', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tube">
              <option value=""> Please select tube</option>
              <option value="tube">Tube </option>
              <option value="tubless">Tubless</option>

            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_size', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('tyre_size', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.tyre_size', 1)]) !!}
        </div>
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_photo', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::file('tyre_photo', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.tyre_photo', 1)]) !!}
        </div>
    </div>


    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_no', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_no', 1)]) !!}
        </div>
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.location', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.location', 1)]) !!}
        </div>

    </div>
    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.descrption', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('descrption', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.descrption', 1)]) !!}
        </div>
    </div>


    <!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
     {!! JsValidator::formRequest('App\Http\Requests\Admin\FlatTyreRequest', 'form') !!}
@endpush
