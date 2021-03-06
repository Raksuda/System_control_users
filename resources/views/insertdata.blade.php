
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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/signin/signin.css" rel="stylesheet">

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


    <div class="container">

      <form class="form-signin" method="POST" action="{{url('saveinsert')}}">

        <h2 class="form-signin-heading">กรุณากรอกข้อมูล</h2>
        <label >ชื่อ</label>
        <input type="text" name="inputName" class="form-control" placeholder="">
        <label >นามสกุล</label>
        <input type="text" name="inputLast" class="form-control" placeholder="">
        <label >เบอร์โทร</label>
        <input type="text" name="inputTel" class="form-control" placeholder="" >
        <label >อีเมลล์</label>
        <input type="text" name="inputMail" class="form-control" placeholder="">
        <label >ที่อยู่</label>
        <textarea rows="4" cols="40" name="inputAddress"></textarea>
        <label >อำเภอ</label>
        <input type="text" name="inputAmphur" class="form-control" placeholder="">
        <label >จังหวัด</label>
        <input type="text" name="inputProvince" class="form-control" placeholder="">
        <label >รหัสไปรษณีย์</label>
        <input type="text" name="inputZipcode" class="form-control" placeholder="">
        <label >รหัสผ่าน</label>
        <input type="text" name="inputPassword" class="form-control" placeholder="">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>

      </form>

       </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
