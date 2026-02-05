<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create_tag(Request $request){
         $incomingFields = $request->validate([
            'name' => 'required'
        ]);
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        Tag::create($incomingFields);
        return redirect()->back()->with('success', 'new Tag has been made');
    }
}
