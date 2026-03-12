<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Link;
use Illuminate\Http\Request;

class MtoMController extends Controller
{
    public function give_tag(Link $link, Request $request)
    {
        $incomingFields = $request->validate([
            'tag_id' => 'required'
        ]);
        $link->tag()->syncWithoutDetaching($incomingFields['tag_id']);
        Log::record('Assigned Tag to', 'link', $link->id);
        return redirect()->back()->with('success', 'new Tag has been made');
    }

    public function favor(Link $link)
    {
        $link->favorits()->syncWithoutDetaching(auth()->id());
        return redirect()->back()->with('success', 'Link Has Been Set As Favorite');
    }
}
