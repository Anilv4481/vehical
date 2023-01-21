<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Vehical Type</th>
    <th>Tube details</th>
    <th>Tyre Size</th>
    <th>Tyre Photo</th>
    <th>Vehical No</th>
    <th>Location</th>
    <th>Descrption</th>

    <th>ACTION</th>
  </tr>

  @foreach($flattyre as $user)

  <tr>

    <td>{{$user->flat_tyre_id }}</td>
    <td>{{$user->vehical_type }}</td>
    <td>{{$user->tube }}</td>
    <td>{{$user->tyre_size }}</td>
    <td><img src="{{ url('/') }}/vehical/image/{{$user->tyre_photo}}" style="width:50px; height:50px;" /></td>
    <td>{{$user->vehical_no }}</td>
    <td>{{$user->location }}</td>
    <td>{{$user->descrption }}</td>


       <td>
        <a href="{{ url('/') }}/admin/flattyres/{{$user->flat_tyre_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/flattyres/destroy/{{$user->flat_tyre_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>

  </tr>
  @endforeach
</table>
