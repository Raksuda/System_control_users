
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
   
    <title>Add User</title>

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
    @section('content')
    @extends('layouts.app')
    {{--dd($user)--}}
    <div class="container">
      <form class="form-signin" method="POST" action="{{ route('adduser.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <h2 class="form-signin-heading">กรุณากรอกข้อมูล</h2>
        <label >ชื่อ</label>
        <input type="text" name="inputName" value="{{$user->firstname}}" class="form-control" placeholder="">
        <label >นามสกุล</label>
        <input type="text" name="inputLast" value="{{$user->lastname}}" class="form-control" placeholder="">
        <label >เบอร์โทร</label>
        <input type="text" name="inputTel" value="{{$user->mobile}}" class="form-control" placeholder="" >
        <label >อีเมลล์</label>
        <input type="text" name="inputMail" value="{{$user->email}}" class="form-control" placeholder="">
        <label >ที่อยู่</label>
        <textarea rows="4" cols="40" name="inputAddress">{{$user->address}}</textarea>

        <!--<input type="text" name="inputMail" value="{{$user->province_id}}" class="form-control" placeholder="">-->
        
        <div class="form-group {{ ($errors->has('roll'))?'has-error':'' }}">
            <label >จังหวัด</label>
            <!--<input type="text" name="inputProvince" class="form-control" placeholder="">-->
            <select class="form-control" name="inputProvince" id="inputProvince">
                <option value="">-- เลือก จังหวัด --</option>

                    @foreach ($province as $pro)

                        <option @if($user->province_id == $pro->PROVINCE_ID) @php echo "selected" @endphp @endif value="{{ $pro->PROVINCE_ID }}">{{ ucfirst($pro->PROVINCE_NAME) }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
            <label >อำเภอ</label>
                <select class="form-control" name="inputAmphur" id="inputAmphur">
                    @foreach ($amphur as $amp)
                        <option @if($user->amphur_id == $amp->PROVINCE_ID) @php echo "selected" @endphp @endif value="{{ $amp->AMPHUR_ID }}">
                            {{ ucfirst($amp->AMPHUR_NAME) }}
                        </option>
                    @endforeach
                </select>
        </div>
        
        <label >รหัสไปรษณีย์</label>
        <input type="text" value="{{$user->zipcode}}" name="inputZipcode" class="form-control" placeholder="">


        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>

      </form>

       </div>

    </div> <!-- /container -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>

         $(document).ready(function() {
        $('#inputProvince').on('change', function() {
            var proID = $(this).val();
            if(proID) {
                $.ajax({
                    url: '{{url('')}}/ProAndAm/'+proID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#inputAmphur').empty();
                        $('#inputAmphur').focus;
                        $('#inputAmphur').append('<option value="">-- เลือก อำเภอ --</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="inputAmphur"]').append('<option value="'+ value.AMPHUR_ID +'">' + value.AMPHUR_NAME + '</option>');
                    });
                  }else{
                    $('#inputAmphur').empty();
                  }
                  }
                });
            }else{
              $('#inputAmphur').empty();
            }
        });
    });
    </script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  @endsection
</body>
</html>


