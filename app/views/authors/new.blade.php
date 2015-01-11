@extends('layouts.master')

@section('content')

            @if ($errors->has())
            <div class="alert alert-danger awesome">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
			<?php echo Form::open(array('url' => 'authors/saveAuthor', 'method' => 'post', 'class'=>'form-signin')); ?>
				<h2>Join SmartTechPark Today.</h2>

				<br>

				<div class="form-group @if ($errors->has('first_name')) has-error @endif">
                    <p>
                        {{ Form::label('first_name', 'First Name', array('class' => 'awesome')) }}
                        {{ Form::text('first_name', Input::old('first_name'),array('class' => 'form-control','placeholder' => 'First-name'))}}
                    </p>
                    @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
				</div>

				<div class="form-group @if ($errors->has('last_name')) has-error @endif">
                    <p>
                        {{ Form::label('last_name', 'Last Name', array('class' => 'awesome')) }}
                        {{ Form::text('last_name', Input::old('last_name'),array('class' => 'form-control','placeholder' => 'Last-name'))}}
                    </p>
                    @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                </div>

                <div class="form-group @if ($errors->has('email')) has-error @endif">
				<p>
					{{ Form::label('email', 'E-Mail', array('class' => 'awesome')) }}
					{{ Form::text('email',  Input::old('email'),array('class' => 'form-control','placeholder' => 'Email'))}}
				</p>
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                </div>

                <div class="form-group @if ($errors->has('password')) has-error @endif">
                <p>
                    {{ Form::label('password', 'Password', array('class' => 'awesome')) }}
                    {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Password')) }}
                </p>
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                </div>
{{--                <p>
                    {{ Form::label('password_confirm', 'Confirm Password', array('class' => 'awesome')) }}
                    {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
                </p>--}}

				<p>
					{{ Form::submit('Register',array('class' => 'btn btn-large btn-primary btn-block')) }}
				</p>
				
  
			<?php echo Form::close(); ?>
			
@stop

