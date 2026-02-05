<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function link_page()
    {
        $links = auth()->user()->link()->latest()->get();
        $category = auth()->user()->catagory()->get();
        $tags = Tag::all();
        return view('pages.links', ['links' => $links, 'cats' => $category, 'tags' => $tags]);
    }
    public function create_link(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'link' => ['required', 'url', 'active_url'],
            'catagory_id' => 'required'
        ]);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['link'] = strip_tags($incomingFields['link']);
        Link::create($incomingFields);
        return redirect('links')->with('success', 'new Link has been added');
    }
    public function line(Link $link) {
        $togs = $link->tag()->get();
        $tags = Tag::all();
        return view('pages.link', ['link' => $link, 'tags' => $tags, 'togs' => $togs]);
    }
    public function search(Request $request){
        $query = auth()->user()->link();
        if($request->filled('title')){
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if($request->filled('catagory_id')){
            $query->where('catagory_id', $request->catagory_id);
        }
        if($request->filled('tag_id')){
            $query->whereHas('tag', function ($q) use ($request) {
            $q->where('id', $request->tag_id);
        });
        }
        $links = $query->latest()->get();
        $category = auth()->user()->catagory()->get();
        $tags = Tag::all();
        return view('pages.links', ['links' => $links, 'cats' => $category, 'tags' => $tags]);
    }
}
