<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Blog;

class HomeController extends Controller
{
    public function ShowIndex(){
        $mainblog = Blog::orderBy('views', 'desc')->first();
        $mainblog->fecha = Carbon::parse($mainblog->fecha)->format('F j, Y');

        $popularblogs = Blog::orderBy('views', 'desc')->where('views', '<', $mainblog->views)->take(2)->get();
        foreach ($popularblogs as $popularblog) {
            $popularblog->fecha = Carbon::parse($popularblog->fecha)->format('F j, Y');
        }

        $dateblogs = Blog::orderBy('fecha', 'desc')->offset(3)->limit(PHP_INT_MAX)->take(3)->get();
        foreach ($dateblogs as $dateblog) {
            $dateblog->fecha = Carbon::parse($dateblog->fecha)->format('F j, Y');
        }

        $mostpopularblogs = Blog::orderBy('views', 'desc')->get();
        foreach ($mostpopularblogs as $key => $mostpopularblog) {
            $mostpopularblog->fecha = Carbon::parse($mostpopularblog->fecha)->format('F j, Y');
        }

        $recentblogs = Blog::orderBy('fecha', 'desc')->take(4)->get();
        foreach ($recentblogs as $key => $recentblog) {
            $recentblog->fecha = Carbon::parse($recentblog->fecha)->format('F j, Y');
        }

        return view('index', compact('mainblog', 'popularblogs', 'dateblogs', 'mostpopularblogs', 'recentblogs'));
    }

    public function SearchBlog(Request $request){
        $term = $request->data;
        $blog = Blog::where('nombre', 'like', "%$term%")->first();

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
