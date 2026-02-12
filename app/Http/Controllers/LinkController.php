<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkValidation;
use App\Models\Log;
use App\Models\Tag;
use App\Models\Link;
use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LinkController extends Controller
{
    public function link_page()
    {
        $links = auth()->user()->link()->latest()->get();
        $category = auth()->user()->catagory()->get();
        $lonks = auth()->user()->sharedlink()->get();
        $tags = Tag::all();
        return view('pages.links', ['links' => $links, 'cats' => $category, 'tags' => $tags, 'lonks' => $lonks]);
    }
    public function create_link(LinkValidation $request)
    {
        $incomingFields = $request->validated();
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['link'] = strip_tags($incomingFields['link']);
        $link = Link::create($incomingFields);
        Log::record('created', 'link', $link->id);
        return redirect('links')->with('success', 'new Link has been added');
    }
    public function line(Link $link)
    {
        $togs = $link->tag()->get();
        $tags = Tag::all();
        return view('pages.link', ['link' => $link, 'tags' => $tags, 'togs' => $togs]);
    }



    public function search(Request $request)
    {
        $query = auth()->user()->link();
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->filled('catagory_id')) {
            $query->where('catagory_id', $request->catagory_id);
        }
        if ($request->filled('tag_id')) {
            $query->whereHas('tag', function ($q) use ($request) {
                $q->where('id', $request->tag_id);
            });
        }
        $links = $query->latest()->get();
        $category = auth()->user()->catagory()->get();
        $tags = Tag::all();
        return view('pages.links', ['links' => $links, 'cats' => $category, 'tags' => $tags, 'lonks' => []]);
    }




    public function delete(Link $link)
    {
        if (auth()->user()->role->contains('role', 'admin')) {
            $link->forceDelete();
            return redirect()->back();
        }
        Log::record('Deleted', 'link', $link->id);
        $link->delete();
        return redirect()->back();
    }

    public function share(Link $link)
    {
        $users = User::whereDoesntHave('role', function ($q) {
            $q->where('role', 'admin');
        })->get();
        return view('pages.share', ['link' => $link, 'users' => $users]);
    }
    public function sharel(Request $request, Link $link)
    {
        $user = User::find($request['user_id']);
        if ($request->permissions === '1') {
            $link->sharedusers()->syncWithoutDetaching([$user->id => ['access_type' => 'edit']]);
            $per = 'editor';
        } else {
            $link->sharedusers()->syncWithoutDetaching([$user->id => ['access_type' => 'read']]);
            $per = 'viewer';
        }
        Mail::to($user->email)
            ->send(new WelcomeEmail($user->name, $link->id, $per));
        return redirect()->back();
    }
    public function bin()
    {
        $links = auth()->user()->link()->onlyTrashed()->get();
        return view('pages.bin', ['links' => $links]);
    }
    public function restore(Link $link)
    {
        $link->restore();
        Log::record('Restored', 'link', $link->id);
        return redirect()->back();
    }
    public function favors()
    {
        $favors = auth()->user()->favorits()->latest()->get();
        return view('pages.favors', ['links' => $favors]);
    }
}
