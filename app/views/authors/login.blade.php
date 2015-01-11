@extends('layouts.master')

@section('content')

    <div class="content_wrapper">

        @if ($errors->has())
            <div class="alert alert-danger awesome">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <?php echo Form::open(array('url' => 'authors/loginAuthor', 'method' => 'post','class'=>'form-signin')); ?>

            <h2 class="text-center">Admin Login</h2>

            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <p>
                <label>{{ Form::label('email', 'E-Mail', array('class' => 'awesome')) 	}}</label>
                {{ Form::text('email',  Input::old('email'),array('class' => 'form-control','placeholder' => 'Email Address'))}}
                </p>
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>

            <div class="form-group @if ($errors->has('password')) has-error @endif">
                <p><label>{{ Form::label('password', 'Password', array('class' => 'awesome',)) 	}}</label>
                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'Password'))}}
                </p>
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
           <p>
           {{ Form::submit('Login',array('class' => 'btn btn-large btn-primary btn-block'))}}
            </p>

        <?php echo Form::close(); ?>

        <br>
        <div class="text-center-register">
            <h5> New to MyPage?  {{link_to_route('new_author','Sign up now >>')}} </h5>
        </div>

@stop

