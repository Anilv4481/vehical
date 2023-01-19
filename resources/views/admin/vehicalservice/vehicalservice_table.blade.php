<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>vehical service name</th>
    <th>vehical service image</th>
    <th>ACTION</th>
  </tr>

  @foreach($vehicalservice as $user)
  
  <tr>

    <td>{{$user->vehicalservice_id }}</td>
    <td>{{$user->vehicalservice_name}}</td>
 
    <td><img src="{{ url('/') }}/vehical/image/{{$user->vehical_image}}" style="width:50px; height:50px;" /></td>
  
    <td>
        <a href="{{ url('/') }}/admin/vehicalservices/{{$user->vehicalservice_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/vehicalservices/destroy/{{$user->vehicalservice_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
  </tr>
  @endforeach
</table>