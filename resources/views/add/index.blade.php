
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="../../favicon.ico">

    <title>ระบบสมาชิก</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

@section('content')
    @extends('layouts.app')

    <div class="container-fluid">
      <div class="row">
      
        <div class="col-md-8 col-md-offset-2 main">

          @if (session('Text'))
            <div class="alert alert-success">
              {{ session('Text') }}
            </div>
          @endif
          
          <h1 class="page-header">ระบบสมาชิก</h1>

	<div class="row">
		<div class="col-xs-6">
			
		</div>
		<div class="col-xs-6">
			
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form class="form" method="POST" role="search" action="{{ url('search')}}">
				{{ csrf_field() }}
    			<div class="input-group">
     				<input type="text" name="word" class="form-control" placeholder="Search for..." value="">
     				<span class="input-group-btn">
        				<button class="btn btn-default" type="submit">Search</button>
      				</span>
    			</div><!-- /input-group -->

			</form>

 		</div><!-- /.col-lg-6 -->

 		<div class="col-lg-6">
        		<a class="btn btn-default" href="{{ url('/create') }}" title="Add new User">+User</a>
        		<a class="btn btn-default" href="{{ url('/createPro') }}" title="Add new User">+Province</a>
        		<a class="btn btn-default" href="{{ url('/createAmp') }}" title="Add new User">+Amphur</a>
    		</div><!-- /.col-lg-6 -->
    </div>

<br> 
      


    	@if(isset($users))

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>เบอร์โทร</th>
                  <th>อีเมล์</th>
                  <th>ที่อยู่</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                	<td>{{$user->firstname}}</td>
                	<td>{{$user->lastname}}</td>
                	<td>{{$user->mobile}}</td>
                	<td>{{$user->email}}</td>
                	<td>{{$user->address}}</td>
                  <td> @if(Auth::check()) 
                    <a class="btn btn-xs btn-info" href="{{ URL::to('adduser/' . $user->id . '/edit') }}">Edit</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
      @else 

        <div class="alert alert-danger">
        </div>

      @endif 

          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"></script>')</script>
    <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
      @endsection
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
