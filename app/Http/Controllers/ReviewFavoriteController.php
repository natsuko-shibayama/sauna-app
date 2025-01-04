<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewFavoriteController extends Controller
{
    public function store(Request $request, $saunaFacilityId, $reviewId)
    {
        // dd([
        //     'request' => $request->all(),
        //     'saunaFacilityId' => $saunaFacilityId,
        //     'reviewId' => $reviewId
        // ]);
        // ログイン中のユーザを取得
        $user = Auth::user();
        // dd($user);
        // 中間テーブルにレコードを追加
        $user->reviewFavorites()->create([
            'review_id' => $reviewId,
        ]);

        return redirect()->route('saunaFacilities', [
            'saunaFacilityId' => $saunaFacilityId
        ]);

    }

    public function destroy($saunaFacilityId, $reviewId)
    {
        // 現在ログイン中のユーザーを取得
        $user = Auth::user();
        // 該当するレビューいいねレコードを削除
        $user->reviewFavorites()
        ->where('review_id', $reviewId)
        ->delete();


        return redirect()->route('saunaFacilities' ,[
            'saunaFacilityId' => $saunaFacilityId
        ]);
    }
}
