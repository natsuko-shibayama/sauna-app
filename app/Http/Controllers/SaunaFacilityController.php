<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaunaFacilityRequest;
use App\Http\Requests\UpdateSaunaFacilityRequest;
use App\Models\SaunaFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaunaFacilityController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // dd($request);
        $query = $this->getQuery($request);
        $saunas = $query->get(); //ここで初めてDBにアクセス
        return view('admin.top', [
            'saunas' => $saunas,
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

    /**
     * クエリを返すメソッド
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
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
        return $query;
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.saunas.create');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\StoreSaunaFacilityRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
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
     * @param \App\Models\SaunaFacility $saunaFacility
     * @param int $saunaId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(SaunaFacility $saunaFacility, int $saunaId)
    {
        $sauna = SaunaFacility::findOrFail($saunaId);
        return view('admin.saunas.edit', [
            'sauna' => $sauna
        ]);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\UpdateSaunaFacilityRequest $request
     * @param \App\Models\SaunaFacility $saunaFacility
     * @param int $saunaId
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
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
