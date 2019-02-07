<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;


class Articlecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articles 15 per page
        //Article is model and make sure u use model at top
        $article= Article::paginate(15);

        //return collection of articles(15) as a resource
        //ArticleResource is the resource we created and make sure u use resource at top
        return ArticleResource::collection($article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if put request's id not found get it , else create a new article with id 
        $article= $request->isMethod('put') ? Article::findOrFail
        ($request->article_id):new Article;
        
        //with id specified below
        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
      
        //and save it
        if($article->save()){
            return new ArticleResource($article);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a single article,id comes from the route
        $article = Article::findOrFail($id);

        //Return a single article as a resource
        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //get a single article,id comes from the route
        $article = Article::findOrFail($id);

        //destroy a single article as a resourc
        if($article->delete()){
            return new ArticleResource($article);
        }
    
    }
}
