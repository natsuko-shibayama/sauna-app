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
        $query = SaunaFacility::query();

        // 施設名で検索
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // こだわり検索
        if ($request->filled('has_loyly')) {
            $query->where('has_loyly', true);
        }

        if ($request->filled('has_water_bath')) {
            $query->where('has_water_bath', true);
        }

        if ($request->filled('has_outdoor_bath')) {
            $query->where('has_outdoor_bath', true);
        }

        if ($request->filled('has_chair')) {
            $query->where('has_chair', true);
        }

        // エリア検索
        $areas = ['kanagawa', 'gunma', 'tokyo', 'saitama', 'chiba', 'ibaraki'];
        $selectedAreas = [];
        foreach ($areas as $area) {
            if ($request->filled($area)) {
                $selectedAreas[] = $area;
            }
        }
        if (!empty($selectedAreas)) {
            $query->whereIn('prefecture', $selectedAreas);
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
