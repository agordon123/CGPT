<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;


class ChatGPTIndexController extends Controller
{
    public function __invoke(string $id = null):Response
    {
        return Inertia::render('Chat/ChatIndex',
        ['chat'=> fn()=>$id ? Chat::findOrFail($id):null,
        'messages'=> Chat::latest()->where('user_id',Auth::id())->get()
        ]);
        
    }
}
