<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleCategory;
use App\Article;
use Session;

class ArticleController extends Controller
{
    public function getArticleByCategory($slug)
    {
        if($slug == 'all-news')
        {
            $articles = Article::paginate(6);
            $slug = ucwords(str_replace('-',' ',$slug));
        }
        elseif($slug == 'newer-news')
        {
            $articles = Article::orderBy('created_at','desc')->paginate(6);
            $slug = ucwords(str_replace('-',' ',$slug));
        }
        elseif($slug == 'older-news')
        {
            $articles = Article::orderBy('created_at','asc')->paginate(6);
            $slug = ucwords(str_replace('-',' ',$slug));
        }
        else{
            $category = ArticleCategory::where('slug',$slug)->first();

            $articles = Article::where('category_id',$category->id)->orderBy('created_at','desc')->paginate(6);

            $slug = $category->title;
        }

        return view('article_list',compact('articles','category','slug'));
    }

    public function articleDetail($slug,$article)
    {
        $category = ArticleCategory::where('slug',$slug)->first();

        $article = Article::where('slug',$article)->first();

        $relarticles = Article::where('category_id',$category->id)->orderBy('created_at')->take(6)->get();

        $ip = \Request::ip();

        if(\Session::has($article->id) == null)
        {
            $article->view = $article->view + 1;
            $article->save();
        }
        \Session::put($article->id,$ip);


        $post = date('Y-m-d h:m:s A',strtotime($article->created_at));

        $ago = $this->time_elapsed_string($post);


        return view('article_detail',compact('article','category','relarticles','ago'));
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'ႏွစ္',
            'm' => 'လ',
            'w' => 'ပါတ္',
            'd' => 'ရက္',
            'h' => 'နာရီ',
            'i' => 'မီနစ္',
            's' => 'စကၠန္ပ',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? ' လြန္ခဲ႔ေသာ '.implode(', ', $string) : 'ယခုတင္သည္';
    }
    
}
