
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
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



    <div class="container-fluid">
      <div class="row">
      
        <div class="col-sm-9  col-md-10 col-md-offset-2 main">
          <h1 class="page-header">ระบบสมาชิก</h1>

        
	<div class="row">
		<div class="col-xs-6">
			{{$TestValue}}
		</div>
		<div class="col-xs-6">
			{{$TestValue2}}
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
    		<div class="input-group">
     			<input type="text" class="form-control" placeholder="Search for...">
     			<span class="input-group-btn">
        			<button class="btn btn-default" type="button">Search</button>
      			</span>
    		</div><!-- /input-group -->
 		</div><!-- /.col-lg-6 -->

 		<div class="col-lg-6">
    		<div class="input-group">

        			<a class="btn btn-default" href="{{url('insert')}}" title="Add new User">+Add</a>
      			
    		</div><!-- /input-group -->
 		</div><!-- /.col-lg-6 -->
    </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>เบอร์โทร</th>
                  <th>อีเมล์</th>
                  <th>ที่อยู่</th>
                </tr>
              </thead>
              <tbody>

                @foreach($Users as $user)

                <tr>
                	<td>{{$user->firstname}}</td>
                	<td>{{$user->lastname}}</td>
                	<td>{{$user->mobile}}</td>
                	<td>{{$user->email}}</td>
                	<td>{{$user->address}}</td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
