<?php

namespace App\Http\Controllers;

use App\ClosedQuestion;
use App\UsersCompleted;
use http\Env\Response;
use App\Vote;
use Illuminate\Http\Request;

class ClosedQuestionsController extends Controller
{
    public function getQuestion(Request $request, $id)
    {

        echo $id;
        $vote = Vote::find($id);

        if (!$vote) {
            return response()->json(['status' => false, 'message' => 'not found'])->setStatusCode(404);
        }

        if (ClosedQuestion::where('id_votes', $id)->where('id_users', $request->user->id)->first()) {
            return response()->json(['status' => false, 'message' => 'user voted']);
        }

        return response()->json($vote);
    }

    public function setAnswer(Request $request, $id)
    {

        $vote = Vote::find($id);

        if (!$vote) {
            return response()->json(['status' => false, 'message' => 'not found'])->setStatusCode(404);
        }

        if (ClosedQuestion::where('id_votes', $id)->where('id_users', $request->user->id)->first()) {
            return response()->json(['status' => false, 'message' => 'user voted']);
        }

        $closedQuestion = new ClosedQuestion();

        $closedQuestion->id_users = $request->user->id;
        $closedQuestion->id_votes = $vote->id;
        $closedQuestion->value = (bool)$request->value;
        $closedQuestion->save();

        $closedQuestion = new UsersCompleted();

        $closedQuestion->id_user = $request->user->id;
        $closedQuestion->id_votes = $vote->id;
        $closedQuestion->save();

        return response()->json(['status' => true]);
    }
}
