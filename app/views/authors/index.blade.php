@extends('layouts.master')
@section('content')
			
			<table class="table table-bordered table-striped">
			<thead>
                <tr>
                    <th>
                        <h3>Admin List</h3>
                    </th>
                </tr>
			</thead>

			<tbody>
			@foreach($data as $info)
                <tr>
                    <td>
                     {{link_to_route('author',$info->first_name,array('id'=>$info->id))}}
                    </td>
                </tr>
                @endforeach
            </tbody>
			</table>
			<p>{{link_to_route('new_author','Add New Admin',array('class'=>'h2'))}}</p>

@stop


