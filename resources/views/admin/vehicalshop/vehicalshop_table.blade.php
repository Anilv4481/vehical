<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>vehical shop address</th>
    <th>vehical shop phone number</th>
    <th>vehical shop email </th>
    <th>vehical shop status</th>
    <th>vehical shop type</th>
    <th>vehical shop problem</th>
    <th>vehical shop image</th>
    <th>ACTION</th>
  </tr>

  @foreach($vehicalshop as $user)
  
  <tr>

    <td>{{$user->vehical_shop_id }}</td>
    <td>{{$user->vehical_shop_address}}</td>
    <td>{{$user->vehical_phone_number}}</td>
    <td>{{$user->vehical_shop_email_id}}</td>
    <td>
    <?php if ($user->vehical_shop_status == 0) {?>
        <button type="button" class="btn btn-success">Approved</button>
       <?php }?>
       <?php if ($user->vehical_shop_status == 1) {?>
        <button type="button" class="btn btn-danger">Reapproved</button>
       <?php }?>
       <?php if ($user->vehical_shop_status == 2) {?>
        <button type="button" class="btn btn-warning">Pending</button>
       <?php }?>
    </td>
    <td>{{$user->vehical_type}}</td>
    <td>{{$user->vehical_problem}}</td>

    <td><img src="{{ url('/') }}/vehical/image/{{$user->vehical_shop_profile}}" style="width:50px; height:50px;" /></td>
  
    <td>
        <a href="{{ url('/') }}/admin/vehicalshops/{{$user->vehical_shop_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/vehicalshops/destroy/{{$user->vehical_shop_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
  </tr>
  @endforeach
</table>