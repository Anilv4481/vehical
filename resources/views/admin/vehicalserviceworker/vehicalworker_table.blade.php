<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>service worker name</th>
    <th>service worker phone</th>
    <th>service worker shop name</th>
    <th>service worker email id</th>
    <th>service worker longitude</th>
    <th>service worker latitude</th>
    <th>service worker status</th>
    <th>service worker active</th>
    <th>service worker last location</th>
    <th>service worker image</th>
    <th>ACTION</th>
  </tr>

  @foreach($serviceworker as $user)
  <tr>

    <td>{{$user->service_worker_id }}</td>
    <td>{{$user->service_worker_name}}</td>
    <td>{{$user->service_worker_phone}}</td>
    <td>{{$user->service_worker_shop_name}}</td>
    <td>{{$user->service_worker_email_id}}</td>
    <td>{{$user->longitude}}</td>
    <td>{{$user->latitude}}</td>
    
    <td>
       <?php if ($user->service_worker_status == 0) {?>
        <button type="button" class="btn btn-success">Approved</button>
       <?php }?>

       <?php if ($user->service_worker_status == 1) {?>
        <button type="button" class="btn btn-danger">Reapproved</button>
       <?php }?>
       
       <?php if ($user->service_worker_status == 2) {?>
        <button type="button" class="btn btn-warning">Pending</button>
       <?php }?>
    </td>
    
    <td>

       <?php if ($user->service_worker_active == 0) {?>
        <button type="button" class="btn btn-success">Yes</button>
       <?php }?>

       <?php if ($user->service_worker_active == 1) {?>
        <button type="button" class="btn btn-danger">No</button>
       <?php }?>

    </td>
    
    <td>{{$user->service_worker_last_location}}</td>
    
    <td><img src="{{ url('/') }}/worker/image/{{$user->service_worker_profile}}" style="width:50px; height:50px;" /></td>
    
    <td>
        <a href="{{ url('/') }}/admin/serviceworkers/{{$user->service_worker_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/serviceworkers/destroy/{{$user->service_worker_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>

  </tr>
  @endforeach
</table>