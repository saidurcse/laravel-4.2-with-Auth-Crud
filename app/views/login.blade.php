@extends('layouts.master')


@section('content')



    {{ Form::open(array('url' => 'login','class'=>'form-signin')) }}
    <h2>Please Login</h2>

    <!-- If there are login errors , show them here -->

    {{ $errors->first('email') }}
    {{ $errors->first('password') }}


    <!-- Form label for Email Address -->
    <p>
    {{--{{ Form::label('email', 'Email Address') }}--}}
    {{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email Address')) }}
    </p>

    <!-- Form label for Password -->
    <p>
    {{--{{ Form::label('password', 'Password') }}--}}
    {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Password')) }}
    </p>
    <!-- Form label for Submit -->
    <p> {{ Form::submit('Submit!', array('class' => 'btn btn-large btn-primary btn-block')) }}</p>

    {{ Form::close() }}

    <br>
    <div class="text-center-register">
        <h5> New to MyPage?  {{link_to_route('new_author','Sign up now >>')}} </h5>
    </div>


@stop