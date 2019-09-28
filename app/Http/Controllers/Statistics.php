<?php

namespace App\Http\Controllers;

use App\UsersCompleted;
use Illuminate\Http\Request;

class Statistics extends Controller
{
    public function CountClosedVotes(Request $request)
    {
        return response()->json(['status' => true, 'value' => $this->count($request->user)]);
    }

    public function GetBasicUserData(Request $request)
    {
        return response()->json(['name' => $request->user->name, 'status' => true, 'value' => $this->count($request->user)]);
    }

    function count($user)
    {
        return UsersCompleted::all()->where('id_user', $user->id)->count();
    }
}
