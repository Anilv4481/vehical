<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Company Name</th>
    <th>Company GST Number</th>
    <th>Company Owner Name</th>
    <th>Company Address</th>
    <th>Company Email</th>
    <th>Company Mobile</th>
    <th>Company Year Of Exp..</th>
    <th>Company About Us</th>
    <th>Company Work Place Photo</th>
    <th>Company Profile Image</th>
    <th>Company Location</th>
    <th>ACTION</th>
  </tr>

  @foreach($vehicalshop as $user)

  <tr>

    <td>{{$user->shop_registration_id }}</td>
    <td>{{$user->company_name }}</td>
    <td>{{$user->company_gst_no}}</td>
    <td>{{$user->company_owner_name}}</td>
    <td>{{$user->company_address}}</td>
    <td>{{$user->company_email}}</td>
    <td>{{$user->company_mobile}}</td>
    <td>{{$user->company_year_of_exp}}</td>
    <td>{{$user->company_aboutus}}</td>

    <td><img src="{{ url('/') }}/vehical/image/{{$user->company_work_place_photo}}" style="width:50px; height:50px;" /></td>
    <td><img src="{{ url('/') }}/vehical/image/{{$user->company_profile_image}}" style="width:50px; height:50px;" /></td>
    <td>{{$user->company_location}}</td>
    <td>
        <a href="{{ url('/') }}/admin/shopregistrations/{{$user->shop_registration_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/shopregistrations/destroy/{{$user->shop_registration_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>
    
  </tr>
  @endforeach
</table>
