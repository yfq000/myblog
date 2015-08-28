@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">写文章</div>
			<div class="panel-body">
				<form action="{{URL('admin/update').'/'.$post->id}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="form-group">
				    <input class="form-control" type="text" name="title" placeholder="文章题目" value="{{$post->title}}">
				  </div>
				  <div class="form-group">
				    
				    <script id="ueditor" name="content" type="text/plain">{{$post->content}}</script>
				    
				  </div>		
				  <button type="submit" class="btn btn-primary">修改</button>
				  <a href="{{URL('admin/destroy') . '/' . $post->id}}">删除</a>
				</form>
			</div>
		</div>
	</div>	
</div>
 	<script type="text/javascript">
    	var ue = UE.getEditor('ueditor');
	</script>
@endsection
