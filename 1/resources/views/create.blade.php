@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">写文章</div>
			<div class="panel-body">
				@if (count($errors) > 0)
		            <div class="alert alert-danger">
		              <strong>Whoops!</strong> There were some problems with your input.<br><br>
		              <ul>
		                @foreach ($errors->all() as $error)
		                  <li>{{ $error }}</li>
		                @endforeach
		              </ul>
		            </div>
		          @endif
			
				<form action="{{URL('admin/store')}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="form-group">
				    <input class="form-control" type="text" name="title" placeholder="文章题目">
				  </div>
				  <div class="form-group">
				    
				    <script id="ueditor" name="content" type="text/plain"></script>
				    
				    
				  </div>
		
				  <button type="submit" class="btn btn-primary">发布</button>
				</form>
			</div>
		</div>
	</div>	
</div>
 	<script type="text/javascript">
    	var ue = UE.getEditor('ueditor');
	</script>
@endsection
