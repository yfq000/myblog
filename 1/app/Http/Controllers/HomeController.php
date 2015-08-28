<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = DB::table('users')
							->join('posts','users.id','=','posts.user_id')
							->select('users.name','posts.id','posts.title','posts.content','posts.created_at','posts.updated_at')
							->get();
		
		return view('home')->withPosts($posts);
	}
	
	
	public function show($id)
	{	
		return view('detail')->withPost(Post::find($id));
	}
	
	public function store(Request $request, $id)
	{
		$this->validate($request, [
				'user_name'=>'required|max:255',
				'content'=>'required',
		]);
		
		
		$comment = new Comment();
		$comment->user_name = Input::get('user_name');
		$comment->content = Input::get('content');
		$comment->post_id = $id;
		if ($comment->save()){
			return Redirect::back();
		}
	}

}
