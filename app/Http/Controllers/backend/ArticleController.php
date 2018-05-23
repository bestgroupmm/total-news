<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleCategory;
use Validator;
use File;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'title' => 'required|max:255',
                'title_en' => 'required|max:255',
                'video_link' => 'max:255',
                'category' => 'required|numeric',
                'desc' => 'required',
                'avatar' => 'required|mimes:jpg,jpeg,png'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{

            if($request->hasFile('avatar'))
            {
                $avatar = $request->file('avatar');
                $img_name = strtolower(str_replace(' ', '_', $request->title_en)).'_'.time().'.jpg';
                $img_path = 'uploads/article/'.date('Y').'/'.date('F').'/'.date('d-D');

                $avatar->storeAs($img_path,$img_name);

            }

            $article = new Article;
            $article->title = $request->title;
            $article->title_en = $request->title_en;
            $article->video_link = $request->video_link;
            $article->slug = str_replace(' ','-', $request->title);
            $article->img_path = $img_path;
            $article->img_name = $img_name;
            $article->desc = $request->desc;
            $article->category_id = $request->category;
            $article->view = 0;
            $article->post_by = Auth::user()->name . ' ( Myanmar Total News )';
            $article->save();

            return redirect('admin/articles');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = ArticleCategory::all();
        $article = Article::find($id);
        return view('admin.article.edit',compact('categories','article'));
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
        $validator = Validator::make($request->all(),[
                'title' => 'required|max:255',
                'title_en' => 'required|max:255',
                'video_link' => 'max:255',
                'category' => 'required|numeric',
                'desc' => 'required',
                'avatar' => 'mimes:jpg,jpeg,png'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{

            $article = Article::find($id);


            if($request->hasFile('avatar'))
            {
                $url = $article->img_path.'/'.$article->img_name;
                File::delete($url);

                $avatar = $request->file('avatar');
                $img_name = strtolower(str_replace(' ', '_', $request->title_en)).'_'.time().'.jpg';
                $img_path = 'uploads/article/'.date('Y').'/'.date('F').'/'.date('d-D');

                $avatar->storeAs($img_path,$img_name);

                $article->img_path = $img_path;
                $article->img_name = $img_name;

            }

            
            $article->title = $request->title;
            $article->title_en = $request->title_en;
            $article->video_link = $request->video_link;
            $article->desc = $request->desc;
            $article->category_id = $request->category;
            $article->view = 0;
            $article->save();

            return redirect('admin/articles');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $url = $article->img_path.'/'.$article->img_name;
        if(is_file($url))
        {
            File::delete($url);
        }

        $article->delete();

        return redirect('admin/articles');
    }
}
