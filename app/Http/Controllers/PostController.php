<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ここでアイコンも結合した方が良いか？リレーションを使っても取得できそうだが、クエリ実行回数を考えると、、
        //user
        $posts = DB::table('users')
            ->leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.id as id', 'users.name as name', 'user_details.icon as icon', 'posts.id as post_id', 'posts.message as message', 'posts.reply_post_id as reply_post_id', 'posts.created_at as created_at', 'posts.created_at as show_time', DB::raw('null as retweet_name'));

        $retweetPosts = DB::table('users')
            ->leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('retweets', 'posts.id', '=', 'retweets.post_id')
            ->join('users as u', 'u.id', '=', 'retweets.user_id')
            ->select('users.id as id', 'users.name as name', 'user_details.icon as icon', 'posts.id as post_id', 'posts.message as message', 'posts.reply_post_id as reply_post_id', 'posts.created_at as created_at', 'retweets.created_at as show_time', 'u.name as retweet_name');

        $shownPosts = $posts->union($retweetPosts)->orderBy('show_time', 'desc')->simplePaginate(5);


        return view('posts.index', ['shownPosts' => $shownPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param StorePostRequest $request
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        if (!(empty($validated['replyPostId']) || Post::idExists($validated['replyPostId']))){
            throw ValidationException::withMessages([
                'replyPostId' => ['存在しない投稿に返信しようとしています。'],
            ]);
        }
        
        $post = Post::create([
            'user_id' => Auth::id(),
            'message' => $validated['message'],
            'reply_post_id' => $validated['replyPostId']
        ]);

        //RegisteredUserControllerと同様にProviderを用いた方が良いか?
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     * @param string $id
     */
    public function show(string $id): void
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     */
    public function edit(string $id): void
    {
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string  $id
     */
    public function update(Request $request, string $id): void
    {
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     */
    public function destroy(string $id): void
    {
    }
}
