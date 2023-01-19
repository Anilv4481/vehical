<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_type', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_type">
              <option value=""> Please select service type</option>
              <option value="FlatBattery">Flat Battery </option>
              <option value="FlatTyre">Flat Tyre</option>
              <option value="Towing">Towing </option>
              <option value="Petrol/Desiel">Petrol/ Desiel</option>
              <option value="Keyunlock">Key unlock </option>
              <option value="StartingProblem">Starting Problem </option>
            </select>
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tube', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tube">
              <option value=""> Please select tyre type</option>
              <option value="tube">Tube</option>
              <option value="tubeless">Tubeless</option>
            </select>
        </div>

    </div>
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical">
              <option value=""> Please select vehical type</option>
              <option value="bike">Bike</option>
              <option value="car">Car</option>
              <option value="pickup">Pickup</option>
              <option value="van">Van</option>
              <option value="truck">truck</option>
            </select>
        </div>
    </div>


    <!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
     {!! JsValidator::formRequest('App\Http\Requests\Admin\CareRequest', 'form') !!}
@endpush
