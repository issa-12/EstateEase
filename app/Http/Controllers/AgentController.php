<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function showAgents()
    {
        $agents = User::where('type','=','agent')->get();
        if (Auth::check()) {
            $agents = User::where('type', 'agent')
            ->where('id', '!=', Auth::user()->id)
            ->get();
        }
        return view('agent.allAgents', ['agents' => $agents]);
    }
    public function requestAgent()
    {
        if (!strcmp(Auth::user()->type, 'user')) {
            $r = new Request();
            $r->user_id = Auth::user()->id;
            $r->result='under review';
            $r->save();
        }
        return to_route('home');

    }
}
