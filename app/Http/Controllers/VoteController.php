<?php

namespace App\Http\Controllers;

use App\User;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
//        $userId = Auth::id();
//        $user = User::find($userId);
//        $votes = DB::table('votes')
//            ->where('id_permission', '=', $user->id_permission)->get();
        $votes = DB::table('votes')->where('id_permission', '=', $request->user->id)->get();
        return response()->json([
            'success' => 'true',
            'data' => $votes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store($request)
    {
        $newVote = Vote::create($request->all());
        if (isset($newVote))
            return response()->json([
                'success' => 'true',
                'code' => 200
            ]);
        return response()->json([
            'success' => 'false',
            'code' => 400
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $vote = Vote::find($id);
        return response()->json([
            'success' => 'true',
            'data' => $vote
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        $editVote = Vote::find($id);
        return response()->json([
            'success' => 'true',
            'data' => $editVote
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update($id, Request $request)
    {
        $update = Vote::find($id);
        if (isset($update)) {
            $update->update($request->all());
            $update->save();
            return response()->json([
                'success' => 'true'
            ]);
        }
        return response()->json([
            'success' => 'false'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        $deletedVote = Vote::find($id);
        $deletedVote->delete();
        return response()->json([
            'success' => 'true'
        ]);
    }
}
