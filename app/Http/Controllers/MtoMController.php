<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class MtoMController extends Controller
{
    public function give_tag(Link $link, Request $request){
        $incomingFields = $request->validate([
            'tag_id' => 'required'
        ]);
        $link->tag()->attach($incomingFields['tag_id']);
        return redirect()->back()->with('success', 'new Tag has been made');
    }
}
