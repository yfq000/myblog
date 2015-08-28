@extends('m')

@section('content')
<div class="container">
	<div class="row list">
		<div class="col-md-10 col-md-offset-1">
		@foreach($posts as $post)	
			<div class="post-index post-index-{{$post->id}}">
				<div class="row">
					<div class="title h4"><a href="{{URL('show').'/'.$post->id}}"><strong>{{$post->title}}</strong></a></div>	
				</div>
				<div class="row">
					<div class="content">{!!$post->content!!}</div>
				</div>
				<div class="row">
					<div class="post-user"><i> Posted by </i> {{$post->name}}</div> 
					<div class="post-date"><i>Created at <?php echo date('Y年m月d日',strtotime($post->created_at));?>  Latest updated at <?php echo date('Y年m月d日',strtotime($post->updated_at));?> </i></div>
				</div>
			</div>
	@endforeach
		</div>	
	</div>
</div>
@endsection
