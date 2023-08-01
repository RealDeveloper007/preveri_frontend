<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\News;

class SitemapXmlController extends Controller
{
    public function index() 
    {
        $posts = Company::where('status',1)->paginate(20000);
        return response()->view('index', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
      }
      
       public function feed() 
    {
        $posts = Company::where('status',1)->paginate(5000);
        return response()->view('feed', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
        


      }
      
    public function news() 
    {
        $posts = News::select('slug','created_at')->get();
        
        // $FileAdd = file_put_contents(public_path().'/site.xml', view('news',['posts'=>$posts]));
        
        // print_r($FileAdd); die;
        
        return response()->view('news', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
      }
}
