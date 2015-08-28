@extends('app')
@section('content')

<div class="container">
	<h1>Welcome, Administrator!</h1>
	<br/>
	<table class="table">
		<tr class="bg-primary">
			<td>#</td>
			<td>标题</td>
			<td></td>
		</tr>
		@foreach($posts as $post)
		<tr>
			<td>
				{{$post->id}}
			</td>
			<td>
				<a href="{{ URL('admin/edit') . '/' . $post->id}}">{{$post->title}}</a>
			</td>
			<td>
				<a href="{{ URL('admin/edit') . '/' . $post->id}}">编辑</a> 
				<a href="{{ URL('admin/destroy') . '/' . $post->id}}">删除</a> 
			</td>			
		</tr>
		@endforeach
	</table>	
</div>
@endsection
