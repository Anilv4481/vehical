<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Vehical Company Name</th>
    <th>Vehical Nmae</th>
    <th>Vehical Registration No</th>

    <th>ACTION</th>
  </tr>

  @foreach($carbike as $user)

  <tr>

    <td>{{$user->car_bike_details_id }}</td>
    <td>{{$user->vehical_company_name }}</td>
    <td>{{$user->vehical_name }}</td>
    <td>{{$user->vehical_registration_no }}</td>


       <td>
        <a href="{{ url('/') }}/admin/carbikedetails/{{$user->car_bike_details_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/carbikedetails/destroy/{{$user->car_bike_details_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>

  </tr>
  @endforeach
</table>
