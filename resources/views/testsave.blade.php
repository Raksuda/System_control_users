      @if(isset($error) > 0)
      	<div class="alert alert-danger">
      		<ul>
      			@foreach ($error->all as $error)
      			<li> {{ $error }} </li>
      			@endforeach
      		</ul>
      	</div>
      @endif

      <div class="row">

      {{ Form::open(['url' => '/' ]) }}
      	<div class="col-xs-5">

      	{{ Form::label('titleName', 'ชื่อ :') }}	
       	{{ Form::text('name','',['class' => 'form-control']) }}
      		
      	{{ Form::label('titleLast', 'นามสกุล :') }}
       	{{ Form::text('last','',['class' => 'form-control']) }}

       	{{ Form::label('titleTel', 'เบอร์โทรศัพท์ :') }}
       	{{ Form::text('tel','',['class' => 'form-control']) }}

       	{{ Form::label('titleMail', 'อีเมลล์ :') }}
       	{{ Form::text('mail','',['class' => 'form-control']) }}

       	{{ Form::label('titleAdd', 'ที่อยู่ :') }}
       	{{ Form::textarea('add','',['rows' => 4, 'cols' => 50, 'class' => 'form-control' ]) }}
<br>
       	{{ Form::submit('+Add',['class' => 'btn btn-lg btn-primary btn-block']) }}

		</div>

       {{ Form::close() }}