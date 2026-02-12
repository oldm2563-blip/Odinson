<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Tag;
use App\Models\Link;
use App\Models\User;
use App\Models\Catagory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categories()
    {
        $categories = Catagory::all();
        return view('admin.admincat', ['cats' => $categories]);
    }
    public function links()
    {
        $categories = Link::all();
        $categoaries = Tag::all();
        $categosaries = Catagory::all();
        return view('admin.adminlinks', ['links' => $categories, 'tags' => $categoaries, 'cats' => $categosaries]);
    }
    public function users()
    {
        $categories = User::all();
        return view('admin.users', ['cats' => $categories]);
    }
    public function logs()
    {
        $logs = Log::all();
        return view('admin.logs', ['cats' => $logs]);
    }
}
