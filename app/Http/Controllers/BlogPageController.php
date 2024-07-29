<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;

class BlogPageController extends Controller
{
    public function ShowBlogIndex($id){
        $blog = Blog::find($id);
        $blog->fecha = Carbon::parse($blog->fecha)->format('F j, Y');

        $mainblog = Blog::orderBy('views', 'desc')->first();

        $popularblogs = Blog::orderBy('views', 'desc')->where('views', '<', $mainblog->views)->take(2)->get();
        foreach ($popularblogs as $popularblog) {
            $popularblog->fecha = Carbon::parse($popularblog->fecha)->format('F j, Y');
        }

        $recentblogs = Blog::orderBy('fecha', 'desc')->take(4)->get();
        foreach ($recentblogs as $key => $recentblog) {
            $recentblog->fecha = Carbon::parse($recentblog->fecha)->format('F j, Y');
        }

        return view('blogs', compact('blog', 'recentblogs', 'popularblogs'));
    }
}
