<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $items = Post::all();
        return view('post.index', ['items' => $items]); // ビューの描画
        // return $items->toArray(); // JSONデータで描画
    }

    public function store(Request $request)
    {
        $post = new Post;
        $form = $request->all();

        // 最低限なバリデーション処理です。ここでは特に説明はしません。
        $rules = [
            'user_id' => 'integer|required', // 2項目以上条件がある場合は「 | 」を挟む
            'title' => 'required',
            'body' => 'required',
        ];
        $message = [
            'user_id.integer' => 'System Error',
            'user_id.required' => 'System Error',
            'title.required' => 'タイトルが入力されていません',
            'body.required' => 'メッセージが入力されていません'
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            return redirect('/post')
                ->withErrors($validator)
                ->withInput();
        } else {
            unset($form['_token']);
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            return redirect('/post');
        }
    }

    public function show($id)
    {
        $item = Post::find($id);
        return view('post.show', ['item' => $item]);
    }

    public function destroy($id)
    {
        $items = Post::find($id)->delete();
        return redirect('/post');
    }
}
