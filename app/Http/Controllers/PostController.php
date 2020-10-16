<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $users = User::all();
        $items = Post::with('user')->orderBy('created_at', 'desc')->get();

        $params = [
            'authUser' => $authUser,
            'users' => $users,
            'items' => $items,
        ];

        return view('post.index', $params);
    }

    public function json() {
        $items = Post::all();

        $params = [
            'items' => $items,
        ];

        return view('post.json', $params);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $form = $request->all();

        $rules = [
            'user_id' => 'integer|required',
            'title' => 'required',
            'message' => 'required',
        ];
        $message = [
            'user_id.integer' => 'Error',
            'user_id.required' => 'Error',
            'title.required' => 'タイトルが入力されていません',
            'message.required' => 'メッセージが入力されていません',
        ];
        $validator = Validator::make($form, $rules, $message);

        $uploadfile = $request->file('thumbnail');

        if (!empty($uploadfile)){
            if ($validator->fails()) {
                return redirect('/post')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $thumbnailname = $request->file('thumbnail')->hashName();
                $request->file('thumbnail')->storeAs('public/post', $thumbnailname);

                unset($form['_token']);
                $post->user_id = $request->user_id;
                $post->title = $request->title;
                $post->message = $request->message;
                $post->image = $thumbnailname;
                $post->save();
                return redirect('/post');
            }
        } else {
            if ($validator->fails()) {
                return redirect('/post')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                unset($form['_token']);
                $post->user_id = $request->user_id;
                $post->title = $request->title;
                $post->message = $request->message;
                $post->save();
                return redirect('/post');
            }
        }
    }

    public function show($id)
    {
        $authUser = Auth::user();
        $item = Post::find($id);

        $params = [
            'authUser' => $authUser,
            'item' => $item,
        ];

        return view('post.show', $params);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $form = $request->all();

        $uploadfile = $request->file('thumbnail');

        if(!empty($uploadfile)){
            $thumbnailname = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->storeAs('public/post', $thumbnailname);

            unset($form['_token']);
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->message = $request->message;
            $post->image = $thumbnailname;
            $post->save();
            return redirect('/post');
        } else {
            unset($form['_token']);
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->message = $request->message;
            $post->save();
            return redirect('/post');
        }
    }

    public function destroy($id)
    {
        $item = Post::find($id)->delete();
        return redirect('/post');
    }
}
