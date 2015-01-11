@extends('layouts.master')

@section('content')

<?php $id = $data['0']->id;?>
<div class="content_wrapper">
        <h1 class="title"> Admin Information</h1>
		@foreach($data as $info)
			<div class="list"><label class="name_title">First Name :  </label>{{ $info->first_name}}</div> 
			<div class="list"><label class="name_title">Last Name :  </label>{{ $info->last_name}}</div>
			<div class="list"><label class="name_title">Email :  </label>{{ $info->email}}</div> 
			<div class="list"><label class="name_title">Updated At :  </label>{{ $info->updated_at}}</div> 
        @endforeach
		<div class="list">{{link_to_route('authors_list','Admin List')}} || {{link_to_route("update_author","Update","id=$id")}} || {{link_to_route("delete_author","Delete","id=$id")}} || {{link_to_route("logout_author","Logout")}}</div>
		</div>



        <h1 class="title"> Admin Information</h1>
		<table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First-Name</th>
        			<th>Last-Name</th>
                    <th>Email</th>
                    <th>Updated At</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $info->first_name }}</td>
                    <td>{{ $info->last_name }}</td>
                    <td>{{ $info->email }}</td>
                    <td>{{ $info->updated_at }}</td>
                    <td>{{ link_to_route('authors_list', 'Admin List',array('class' => 'btn btn-info'))  }}</td>
                    <td>{{ link_to_route('update_author', 'Update',"id=$id",array('class' => 'btn btn-info')) }}</td>
                    <td>{{ link_to_route('delete_author', 'Delete',"id=$id",array('class' => 'btn btn-info')) }}</td>
                </tr>
            </tbody>
        </table>
        <h3>{{link_to_route("logout_author","Logout")}}</h3>
@stop
