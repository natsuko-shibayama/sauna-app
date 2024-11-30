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

    // サウナ一覧画面（全件表示）
    public function index()
    {
        $saunaFacilities = SaunaFacility::all();

        return view('user.index', ['saunaFacilities' => $saunaFacilities]);
    }

    // 一覧画面での検索
    public function search(Request $request)
    {
        $query = $this->getQuery($request);
        $saunaFacilities = $query->get();

        return view('user.index', [
            'saunaFacilities' => $saunaFacilities,
            'request' => $request,
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
}
