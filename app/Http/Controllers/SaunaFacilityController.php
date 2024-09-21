<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaunaFacilityRequest;
use App\Http\Requests\UpdateSaunaFacilityRequest;
use App\Models\SaunaFacility;

class SaunaFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 管理者TOP兼サウナ一覧
    public function index()
    {
        // サウナ一覧をすべて取得
        $saunas = SaunaFacility::get();
        // dd($saunas);
        return view('admin.top', [
            'saunas' => $saunas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    //サウナ施設新規登録画面
    public function create()
    {
        return view('admin.saunas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // サウナ新規登録処理
    public function store(StoreSaunaFacilityRequest $request)
    {
        // dd("サウナ新規登録処理です", $request->name);
        // インスタンス作成
        $sauna = new SaunaFacility();
        // 呼び出してpostされた値を代入していく
        $sauna->name = $request->name;
        $sauna->postal_code = $request->postal_code;
        $sauna->prefecture = $request->prefecture;
        $sauna->city = $request->city;
        $sauna->address = $request->address;
        $sauna->access = $request->access;
        $sauna->map = $request->map;
        $sauna->price = $request->price;
        $sauna->image = $request->image;
        $sauna->sauna_comment = $request->saunaComment;
        $sauna->has_loyly = $request->input('hasLoyly');
        $sauna->loyly_comment = $request->loylyComment;
        $sauna->has_water_bath = $request->input('hasWaterbath');;
        $sauna->water_bath_comment = $request->waterbathComment;
        $sauna->has_outdoor_bath = $request->input('hasOutdoorbath');;
        $sauna->has_chair = $request->input('hasChair');
        $sauna->chair_comment = $request->chairComment;
        $sauna->save();
        // トップ画面にリダイレクト
        return redirect()->route('admin.top');

    }

    /**
     * Display the specified resource.
     */
    public function show(SaunaFacility $saunaFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaunaFacility $saunaFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaunaFacilityRequest $request, SaunaFacility $saunaFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaunaFacility $saunaFacility)
    {
        //
    }
}
