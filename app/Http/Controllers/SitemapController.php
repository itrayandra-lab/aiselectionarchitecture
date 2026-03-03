<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostCategory;
use App\Models\Page;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Posts::where('status', 'active')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('updated_at', 'desc')
            ->get();

        $categories = PostCategory::orderBy('updated_at', 'desc')->get();
        
        $pages = Page::where('status', 'active')
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('sitemap', [
            'posts' => $posts,
            'categories' => $categories,
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }
}
