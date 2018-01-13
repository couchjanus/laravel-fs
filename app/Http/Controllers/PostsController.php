<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;


class PostsController extends Controller
{
    /**
     * оказать список всех resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index')
            ->with('posts', $posts);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        $post = Post::find($id);
        $data = ['post' => $post];

        return view('posts.show',$data);
    }

    public function listByCategoryId($id)
    {

    $posts = Post::with('category')->where('category_id',$id)->get();

    return view('posts.single')
                    ->with('posts', $posts);

    }

    public function listOrderByCategories()
    {

    $posts = Post::with('category')->orderBy('category_id', 'asc')->get();

    return view('posts.list')
                    ->with('posts', $posts);

    }

    public function listByCategories()
    {

    $categories = Category::with(['posts' => function($query){
        $query->orderBy('updated_at', 'DESC')->take(4)->get();
    }])->get();

    return view('posts.categories')
                    ->with('categories', $categories);

    }

}
