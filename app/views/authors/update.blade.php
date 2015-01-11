@extends('layouts.master')
@section('content')

			
			<?php echo Form::open(array('url' => 'authors/saveinfo', 'method' => 'post','class'=>'form-signin')); ?>

				<h2>Update Author Information</h2>
				<p>
					{{ Form::label('first_name', 'First Name', array('class' => 'awesome')) 	}}
					{{ Form::text('first_name', $data['0']->first_name,array('class' => 'form-control')) }}
				</p>
				<p>
					{{ Form::label('last_name', 'Last Name', array('class' => 'awesome')) 	}}
					{{ Form::text('last_name', $data['0']->last_name,array('class' => 'form-control'))}}
				</p>
				<p>
					{{ Form::label('email', 'E-Mail', array('class' => 'awesome')) 	}}
					{{ Form::text('email', $data['0']->email,array('class' => 'form-control'))}}
				</p>
				{{ Form::hidden('id', $data['0']->id) }}
				<p>
					{{ Form::submit('Update',array('class' => 'btn btn-large btn-primary btn-block')) }}
				</p>
				
  
			<?php echo Form::close(); ?>
			
@stop
