<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store($saunaFacilityId)
    {
        //ログイン中のユーザを取得
        $user = Auth::user();
        //中間テーブルにレコードを追加
        $user->favorites()->attach($saunaFacilityId);

        return redirect()->route('saunaFacilities' ,[
            'saunaFacilityId' => $saunaFacilityId
        ]);

    }

    public function destroy($saunaFacilityId)
    {
        // 現在ログイン中のユーザーを取得
        $user = Auth::user();
        // 中間テーブルの該当レコードを削除
        $user->favorites()->detach($saunaFacilityId);
        return redirect()->route('saunaFacilities' ,[
            'saunaFacilityId' => $saunaFacilityId
        ]);
    }

}
