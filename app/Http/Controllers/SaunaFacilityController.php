<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaunaFacilityRequest;
use App\Http\Requests\UpdateSaunaFacilityRequest;
use App\Models\SaunaFacility;
use Illuminate\Support\Facades\Storage;

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
    // サウナ施設新規登録処理
    public function store(StoreSaunaFacilityRequest $request)
    {
        // dd("サウナ新規登録処理です", $request->name);
        // インスタンス作成
        $sauna = new SaunaFacility();
        // 呼び出してpostされた値を代入していく（DBの処理）
        $sauna->name = $request->name;
        $sauna->postal_code = $request->postal_code;
        $sauna->prefecture = $request->prefecture;
        $sauna->city = $request->city;
        $sauna->address = $request->address;
        $sauna->access = $request->access;
        $sauna->location_map = $request->location_map;
        $sauna->price = $request->price;
        $sauna->sauna_comment = $request->saunaComment;
        $sauna->has_loyly = $request->input('hasLoyly');
        $sauna->loyly_comment = $request->loylyComment;
        $sauna->has_water_bath = $request->input('hasWaterbath');;
        $sauna->water_bath_comment = $request->waterbathComment;
        $sauna->has_outdoor_bath = $request->input('hasOutdoorbath');;
        $sauna->has_chair = $request->input('hasChair');
        $sauna->chair_comment = $request->chairComment;

        // 画像のアップロードの処理。ファイルがある場合、画像をpublic/imagesに保存。
        if($request->hasFile('image_path')){
            $imagePath = $request->file('image_path')->store('images', 'public');
        }else{
            $imagePath = null;
        }
        $sauna->image_path = $imagePath;
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
    // サウナ施設情報編集画面
    public function edit(SaunaFacility $saunaFacility, int $saunaId)
    {
        $sauna = SaunaFacility::findOrFail($saunaId);
        return view('admin.saunas.edit', [
            'sauna' => $sauna
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // サウナ施設情報更新処理
    public function update(UpdateSaunaFacilityRequest $request, SaunaFacility $saunaFacility, int $saunaId)
    {
        $sauna = SaunaFacility::findOrFail($saunaId);
        $sauna->name = $request->name;
        $sauna->postal_code = $request->postal_code;
        $sauna->prefecture = $request->prefecture;
        $sauna->city = $request->city;
        $sauna->address = $request->address;
        $sauna->access = $request->access;
        $sauna->location_map = $request->location_map;
        $sauna->price = $request->price;
        $sauna->sauna_comment = $request->saunaComment;
        $sauna->has_loyly = $request->input('hasLoyly');
        $sauna->loyly_comment = $request->loylyComment;
        $sauna->has_water_bath = $request->input('hasWaterbath');;
        $sauna->water_bath_comment = $request->waterbathComment;
        $sauna->has_outdoor_bath = $request->input('hasOutdoorbath');;
        $sauna->has_chair = $request->input('hasChair');
        $sauna->chair_comment = $request->chairComment;
        // 画像のアップロード処理
        if ($request->hasFile('image_path')) {
            // 既存の画像がある場合は削除
            if ($sauna->image_path) {
                Storage::disk('public')->delete($sauna->image_path);
            }

            // 新しい画像をstorage/app/public/imagesに保存
            $imagePath = $request->file('image_path')->store('images', 'public');
            $sauna->image_path = $imagePath; //インスタンスに代入
        }

        $sauna->save();
        return redirect()->route('admin.top', ['saunaId' => $saunaId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // サウナ施設削除処理
    public function destroy(SaunaFacility $saunaFacility, int $saunaId)
    {
        // dd($saunaId);
        $sauna = SaunaFacility::findOrFail($saunaId);
        $sauna->delete();
        return redirect()->route('admin.top');
    }
}
