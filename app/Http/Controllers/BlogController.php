<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Blog::class, 'blog');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        $perpage = intval( $request->query('show', 10) );
        $blogs = Blog::with('user')
                ->orderBy('id','desc')
                ->paginate($perpage);

        return view('blogs/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog;
        return view('blogs.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        
        // dd($request);

        $blog = auth()->user()->blogs()->create( $request->all() );

        $tag = \App\Models\Tag::inRandomOrder()
                                ->limit(2)
                                ->pluck('id');
        
        foreach( $tag as $id ){
            $blog->tags()->attach($id);  
        }
        
 
        $response = array(
            'message'=>'Blog posted sucessfully',
        );
        return redirect()->route('blogs.index')->with('response',$response);

        // $blog = App\Models\Blog::find(1); 
        // $tag = Str::random(10);
        // $blog->tags()->create([
        //     'name' => $tag,
        //     'slug' => Str::slug( $tag )
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::firstOrFail($id);
        return view('blogs/show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog )
    {
        $blog->update( $request->all() );
        $response = array(
            'message'=>'Blog updated sucessfully',
        );
        return redirect()->route('blogs.index')->with('response',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        foreach ( $blog->tags as $tag){
            $blog->tags()->detach($tag->id);
        }
        $blog->delete();
        $response = array(
            'message'=>'Blog deleted sucessfully',
        );
        return redirect()->route('blogs.index')->with('response',$response);
    }
}
