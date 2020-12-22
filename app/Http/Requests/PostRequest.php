<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/',
            'content' => 'required|string|max:1000',
        ];
    }

    /**
     * @param Request $request
     * 
     * @return Post
     */
    public function getPost(Request $request)
    {
        $request->validate($this->rules());

        /**
         * @todo Needs to solve this dependancy issue using Bindings 
         */
        $post = new Post();
        $post->name = $request->input('name');
        $post->desciption = $request->input('content');

        return $post;
    }
}