<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Finder\Finder;

class AdminController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin')->withPosts(Post::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
				'title'=>'required|max:255',
				'content'=>'required',
		]);
		
		$post = new Post;
		echo $post->title = Input::get('title');
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->user_id = 0;
		
		if ($post->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->widthErrors("文章发布失败！");
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('edit') ->withPost(Post::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
				'title'=>'required|max:255',
				'content'=>'required',
		]);
		
		$post = Post::find($id);
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		
		if ($post->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->widthErrors("文章修改失败！");
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		
		return Redirect::to('admin');
	}

}
