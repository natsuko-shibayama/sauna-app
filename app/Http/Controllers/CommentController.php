<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //コメント投稿機能
    public function store(Request $request, $saunaFacilityId, $reviewId)
    {
        // dd([
        //     'request' => $request,
        //     'saunaFacilityId' => $saunaFacilityId,
        //     'reviewId' => $reviewId
        // ]);

        // ログイン中のユーザを取得
        $user = Auth::user();
        $user->comments()->create([
            'review_id' => $reviewId,
            'content' => $request->input('content'),
        ]);


        return redirect()->route('review_show', [
            'saunaFacilityId' => $saunaFacilityId,
            'reviewId' => $reviewId,
        ]);

    }
}
