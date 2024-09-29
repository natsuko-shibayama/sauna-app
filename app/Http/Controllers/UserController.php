<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateSaunaFacilityRequest;
use App\Models\SaunaFacility;

class UserController extends Controller
{
    // ユーザー画面トップページ
    public function top(Request $request)
    {
        // dd($request);
        $query = $this->getQuery($request);
        $saunaFacilities = $query->get();
        // $saunaFacilities = SaunaFacility::all();
        // dd($saunaFacilities);
        return view('user.top', [
            'saunaFacilities' => $saunaFacilities,
            'name' => $request->name,
            'has_loyly' => $request->has_loyly,
            'has_water_bath' => $request->has_water_bath,
            'has_outdoor_bath' => $request->has_outdoor_bath,
            'has_chair' => $request->has_chair,
            'kanagawa' => $request->kanagawa,
            'gunma' => $request->gunma,
            'tokyo' => $request->tokyo,
            'saitama' => $request->saitama,
            'chiba' => $request->chiba,
            'ibaraki' => $request->ibaraki,
        ]);
    }

    private function getQuery(Request $request)
    {
        $query = SaunaFacility::query(); //クエリ取得するための変数定義
        // こだわり検索
        if($request->name){
            $query->where('name', 'like', "%{$request->name}%");//クエリに部分一致の条件を追加
        }
        if($request->has_loyly){
            $query->where('has_loyly', 1);
        }
        if($request->has_water_bath){
            $query->where('has_water_bath', 1);
        }
        if($request->has_outdoor_bath){
            $query->where('has_outdoor_bath', 1);
        }
        if($request->has_chair){
            $query->where('has_chair', 1);
        }

        $areas = [];
        // エリア検索
        if($request->kanagawa){
            $areas[] = '神奈川県';
        }
        if($request->gunma){
            $areas[] = '群馬県';
        }
        if($request->tokyo){
            $areas[] = '東京都';
        }
        if($request->saitama){
            $areas[] = '埼玉県';
        }
        if($request->chiba){
            $areas[] = '千葉県';
        }
        if($request->ibaraki){
            $areas[] = '茨城県';
        }
        if(count($areas) > 0){
            $query->whereIn('prefecture', $areas);
        }
        $query->where('recommendation', 1);
        return $query;
    }

    // ユーザー画面からのサウナ詳細画面表示
    public function saunaFacilities(Request $request, int $saunaFacilityId)
    {
        // dd($request, $saunaFacilityId);
        $saunaFacility = SaunaFacility::with('saunas')->findOrFail($saunaFacilityId);
        // dd($saunaFacility->name);
        return view('user.show', [
            'saunaFacility' => $saunaFacility,
            // 'saunas' => $saunaFacility->saunas
        ]);
    }
}
