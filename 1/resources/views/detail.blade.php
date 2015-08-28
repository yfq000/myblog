@extends('m')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="post">
				<div class="row">
					<div class="title h4"><a href="{{URL('show').'/'.$post->id}}"><strong>{{$post->title}}</strong></a></div>	
				</div>
				<div class="row">
					<div class="content">{!!$post->content!!}</div>
				</div>
				<div class="row">
					<div class="post-user"><i> Posted by </i> {{$post->user->name}}</div> 
					<div class="post-date"><i>Created at <?php echo date('Y年m月d日',strtotime($post->created_at));?>  Latest updated at <?php echo date('Y年m月d日',strtotime($post->updated_at));?> </i></div>
				</div>
			</div>
			<div class="comment">
				<form action="{{URL('store').'/'.$post->id.'/'}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
				    	<input class="form-control" type="text" name="user_name" placeholder="名字" required>
				  	</div>
					<div class="form-group">
					   <textarea class="form-control" rows="3"  name="content" placeholder="评论" required></textarea>
					</div>
		
				  <button type="submit" class="btn btn-primary">发布</button>
				</form>
				@foreach($post->comments as $comment)
					<ul class="list-unstyled">
						<li class="username">{{$comment->user_name}}:</li>
						<li class="username">{{$comment->content}}</li>
					</ul>	
				@endforeach
			</div>
		</div>	
	</div>
</div>
@endsection
