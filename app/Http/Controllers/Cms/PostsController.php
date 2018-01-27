<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Gate;

use Image;
use Session;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Gate::allows('admin-only', auth()->user())) {

            $posts = Post::paginate(10);

            return view('cms.posts.index')
                ->with('posts', $posts);
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('cms.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new Post Model initialization
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        // Check if file is present
        if( $request->hasFile('post_thumbnail') ) {
            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
                    
            Image::make($post_thumbnail)->resize(300, 300)->save( public_path('media/' . $filename ) );
        
            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }
        
        $post->save();
        
        $post->tags()->sync($request->input('tags'), false);

        return redirect(route('articles.index'))->with('message','An article has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::findOrFail( $id );
        $data = ['post' => $post];

        return view('admin.posts.show',$data);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::findOrFail( $id );
       
       $categories = Category::pluck('name', 'id');

       $tags = Tag::pluck('name', 'id');

       $data = ['post' => $post, 'categories' => $categories, 'tags' => $tags];

       return view('admin.posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        
        // Check if file is present
        if( $request->hasFile('post_thumbnail') ) {
            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
            
            Image::make($post_thumbnail)->resize(300, 200)->save( public_path('/uploads/' . $filename ) );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();

        $post->tags()->sync($request->input('tags'));

        return redirect(route('articles.index'))->with('message','An article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // https://laravel.com/docs/5.4/queries#deletes
        Post::findOrFail($id)->delete();

        return redirect(route('posts.index'))->with('message','An article has been deleted');
    }
}
