<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\PostRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the Employees.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();

        return view(
            'dashboard', ['posts' => Post::all()]
        );
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create-post');
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param  PostRequest  $request
     * @return Response
     */
    public function store(
        Request $request,
        PostRequest $postRequest
    )
    {
        $post = $postRequest->getPost($request);
        $post->save();
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
        return view('post_info', ['post' => $post]);
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