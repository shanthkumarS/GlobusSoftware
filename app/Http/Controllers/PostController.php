<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of Post.
     *
     * @return Response
     */
    public function index()
    {
        return view('post.posts-list', ['posts' => Post::all()]);
    }

   /**
     * Display a listing of Post of employee.
     *
     * @return Response
     */
    public function list()
    {
        return view('post.posts-list', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create(User $user)
    {
        $user = Auth::user();
        return view('post.create-post', ['user' => $user]);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param  Request $request
     * @param $userId
     * @return Response
     */
    public function store(
        Request $request,
        Post $post,
        $userId
    )
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/',
                'content' => 'required|string|max:1000'
            ]
        );

        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->user_id = $userId;

        $post->save();

        return redirect(route('user.posts.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        return view('post.post_info', ['user' => $user, 'post' => $post]);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('auth.register', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return View|Factory
     */
    public function update(Request $request, $id)
    {

        return redirect(route('list.users'))->with('success','Write here your messege');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int|false
     */
    public function destroy($id)
    {
        return Post::find($id)->delete();
    }
}