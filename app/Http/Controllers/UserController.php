<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaunaFacility;

class UserController extends Controller
{
    // トップ画面
    public function top(Request $request)
    {
        $query = $this->getQuery($request);
        $saunaFacilities = $query->get();

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

    // サウナ一覧検索画面
    public function index(Request $request)
    {
        // dd($request);
        $query = $this->getQuery($request);
        $saunaFacilities = $query->get();

        // こだわり検索
        $filters = collect([
            'has_loyly' => $request->has_loyly ? 'ロウリュ' : null,
            'has_water_bath' => $request->has_water_bath ? '水風呂' : null,
            'has_outdoor_bath' => $request->has_outdoor_bath ? '外気浴' : null,
            'has_chair' => $request->has_chair ? 'ととのい椅子' : null,
        ])->filter();
        // エリア検索
        $areas = collect([
            'kanagawa' => $request->kanagawa ? '神奈川' : null,
            'gunma' => $request->gunma ? '群馬' : null,
            'tokyo' => $request->tokyo ? '東京' : null,
            'saitama' => $request->saitama ? '埼玉' : null,
            'chiba' => $request->chiba ? '千葉' : null,
            'ibaraki' => $request->ibaraki ? '茨城' : null,
        ])->filter();
        return view('user.index', [
            'saunaFacilities' => $saunaFacilities,
            'request' => $request,
            'name' => $request->name,
            'filters' => $filters,
            'areas' => $areas,
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
        $query = SaunaFacility::query();

        if ($request->name) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if ($request->has_loyly) {
            $query->where('has_loyly', 1);
        }
        if ($request->has_water_bath) {
            $query->where('has_water_bath', 1);
        }
        if ($request->has_outdoor_bath) {
            $query->where('has_outdoor_bath', 1);
        }
        if ($request->has_chair) {
            $query->where('has_chair', 1);
        }

        $areas = [];
        if ($request->kanagawa) {
            $areas[] = '神奈川県';
        }
        if ($request->gunma) {
            $areas[] = '群馬県';
        }
        if ($request->tokyo) {
            $areas[] = '東京都';
        }
        if ($request->saitama) {
            $areas[] = '埼玉県';
        }
        if ($request->chiba) {
            $areas[] = '千葉県';
        }
        if ($request->ibaraki) {
            $areas[] = '茨城県';
        }
        if (count($areas) > 0) {
            $query->whereIn('prefecture', $areas);
        }

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
