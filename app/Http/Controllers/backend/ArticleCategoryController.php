<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArticleCategory;
use Validator;
use Session;
use File;
use App\Image;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategory::all();
        return view('admin.article-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article-category.create');
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
                'keyword' => 'max:255',
                'avatar' => 'mimes:jpg,jpeg,png'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{
            $image_id = 0;

            if($request->hasFile('avatar'))
            {
                $avatar = $request->file('avatar');
                $img_name = strtolower(str_replace(' ', '_', $request->title_en)).'_'.time().'.jpg';
                $img_path = 'uploads/article-category';

                $avatar->storeAs($img_path,$img_name);

                $image = new Image;
                $image->name = $img_name;
                $image->path = $img_path;
                $image->type = 'article_cateogry';

                if($image->save())
                {   
                    $image_id = $image->id;
                    session('success','ထည့်သွင်းပြီးပါပြီး ။');
                }
                else{
                     session('warning','ဓါတ်ပုံထည့်သွင်းခြင်း အဆင့်မအောင်မြင်ပါ ။');

                     return back();
                }

            }

            $category = new ArticleCategory;
            $category->title = $request->title;
            $category->title_en = $request->title_en;
            $category->keyword = $request->keyword;
            $category->image_id = $image_id;
            $category->desc = $request->desc;
            $category->save();

            return redirect('admin/article-categories');

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
        $category = ArticleCategory::find($id);
        return view('admin.article-category.edit',compact('category'));
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
                'keyword' => 'max:255',
                'avatar' => 'mimes:jpg,jpeg,png'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{

            $category = ArticleCategory::find($id);

            if($request->hasFile('avatar'))
            {
                $avatar = $request->file('avatar');
                $img_name = strtolower(str_replace(' ', '_', $request->title_en)).'_'.time().'.jpg';
                $img_path = 'uploads/article-category';

                $avatar->storeAs($img_path,$img_name);

                $image = Image::find($category->image_id);

                $delUrl = $image->path.'/'.$image->name;
                if(is_file($delUrl))
                {
                    File::delete($delUrl);
                }

                $image->name = $img_name;
                $image->path = $img_path;
                $image->type = 'article_cateogry';

                if($image->save())
                {
                    
                    session('success','ထည့်သွင်းပြီးပါပြီး ။');
                }
                else{
                     session('warning','ဓါတ်ပုံထည့်သွင်းခြင်း အဆင့်မအောင်မြင်ပါ ။');

                     return back();
                }

            }

            $category->title = $request->title;
            $category->title_en = $request->title_en;
            $category->keyword = $request->keyword;
            $category->desc = $request->desc;
            $category->save();

            return redirect('admin/article-categories');

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
        $category = ArticleCategory::find($id);

        $image = Image::find($category->image_id);

        if($image)
        {
            $file = $image->path.'/'.$image->name;

            if(is_file($file)){
                File::delete($file);
            }
        }

        $category->delete();

        return redirect('admin/article-categories');
    }
}
