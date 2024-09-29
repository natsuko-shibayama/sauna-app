<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaunaFacilityRequest;
use App\Http\Requests\UpdateSaunaFacilityRequest;
use App\Models\Sauna;
use App\Models\SaunaFacility;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $saunaFacilities = $query->get(); //ここで初めてDBにアクセス
        return view('admin.top', [
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
        try {
            DB::beginTransaction();
            // dd("サウナ新規登録処理です", $request);
            // インスタンス作成
            $saunaFacility = new SaunaFacility();
            // 呼び出してpostされた値を代入していく（DBの処理）
            $saunaFacility->name = $request->name;
            $saunaFacility->postal_code = $request->postal_code;
            $saunaFacility->prefecture = $request->prefecture;
            $saunaFacility->city = $request->city;
            $saunaFacility->address = $request->address;
            $saunaFacility->access = $request->access;
            $saunaFacility->location_map = $request->location_map;
            $saunaFacility->price = $request->price;
            $saunaFacility->sauna_comment = $request->saunaComment;
            $saunaFacility->has_loyly = $request->input('hasLoyly');
            $saunaFacility->loyly_comment = $request->loylyComment;
            $saunaFacility->has_water_bath = $request->input('hasWaterbath');;
            $saunaFacility->water_bath_comment = $request->waterbathComment;
            $saunaFacility->has_outdoor_bath = $request->input('hasOutdoorbath');;
            $saunaFacility->has_chair = $request->input('hasChair');
            $saunaFacility->recommendation = $request->input('recommendation');
            $saunaFacility->chair_comment = $request->chairComment;

            // 画像のアップロードの処理。ファイルがある場合、画像をpublic/imagesに保存。
            if($request->hasFile('image_path')){
                $imagePath = $request->file('image_path')->store('images', 'public');
            }else{
                $imagePath = null;
            }
            $saunaFacility->image_path = $imagePath;

            $saunaFacility->save();
            // サウナ詳細情報登録
            $saunaNum = count($request->sauna_type);
            for($i = 0; $i < $saunaNum; $i++){
                $sauna = new Sauna();
                $sauna->type = $request->sauna_type[$i];
                $sauna->temperature = $request->temperature[$i];
                $sauna->note = $request->note[$i];
                $sauna->sauna_facility_id = $saunaFacility->id;
                $sauna->save();
            }
            // throw new Exception('エラーが発生しました');
            DB::commit();
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'サウナ施設の登録中にエラーが発生しました。もう一度お試しください。']);
        }
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
     * @param int $saunaFacilityId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $saunaFacilityId)
    {
        // dd("サウナ新規登録処理です", $saunaFacilityId);
        // $saunaFacility = SaunaFacility::findOrFail($saunaFacilityId);
        // 指定された ID の SaunaFacility を取得し、関連する Saunas もロード
        $saunaFacility = SaunaFacility::with('saunas')->findOrFail($saunaFacilityId);
        // dd($saunaFacility->saunas);

        return view('admin.saunas.edit', [
            'saunaFacility' => $saunaFacility,
            'saunas' => $saunaFacility->saunas
        ]);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\UpdateSaunaFacilityRequest $request
     * @param \App\Models\SaunaFacility $saunaFacility
     * @param int $saunaFacilityId
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSaunaFacilityRequest $request, SaunaFacility $saunaFacility, int $saunaFacilityId)
    {
        try {
            DB::beginTransaction();
            // dd("サウナ更新処理です", $request, $saunaFacilityId);
            $saunaFacility = SaunaFacility::findOrFail($saunaFacilityId);
            $saunaFacility->name = $request->name;
            $saunaFacility->postal_code = $request->postal_code;
            $saunaFacility->prefecture = $request->prefecture;
            $saunaFacility->city = $request->city;
            $saunaFacility->address = $request->address;
            $saunaFacility->access = $request->access;
            $saunaFacility->location_map = $request->location_map;
            $saunaFacility->price = $request->price;
            $saunaFacility->sauna_comment = $request->saunaComment;
            $saunaFacility->has_loyly = $request->input('hasLoyly');
            $saunaFacility->loyly_comment = $request->loylyComment;
            $saunaFacility->has_water_bath = $request->input('hasWaterbath');;
            $saunaFacility->water_bath_comment = $request->waterbathComment;
            $saunaFacility->has_outdoor_bath = $request->input('hasOutdoorbath');;
            $saunaFacility->has_chair = $request->input('hasChair');
            $saunaFacility->recommendation = $request->input('recommendation');
            $saunaFacility->chair_comment = $request->chairComment;
            // 画像のアップロード処理
            if ($request->hasFile('image_path')) {
                // 既存の画像がある場合は削除
                if ($saunaFacility->image_path) {
                    Storage::disk('public')->delete($saunaFacility->image_path);
                }

                // 新しい画像をstorage/app/public/imagesに保存
                $imagePath = $request->file('image_path')->store('images', 'public');
                $saunaFacility->image_path = $imagePath; //インスタンスに代入
            }
            $saunaFacility->save();

            // 追加する時は、紐づいてるサウナ情報を一回全消しして、それからまた新しく登録しなおす
            // サウナ施設に紐づくサウナ情報を削除
            Sauna::where('sauna_facility_id', $saunaFacility->id)->delete();
            // サウナ詳細情報登録
            $saunaNum = count($request->sauna_type);
            for($i = 0; $i < $saunaNum; $i++){
                $sauna = new Sauna();
                $sauna->type = $request->sauna_type[$i];
                $sauna->temperature = $request->temperature[$i];
                $sauna->note = $request->note[$i];
                $sauna->sauna_facility_id = $saunaFacility->id;
                $sauna->save();
            }
            // throw new Exception('エラーが発生しました');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'サウナ施設の登録中にエラーが発生しました。もう一度お試しください。']);
        }
        return redirect()->route('admin.top', ['saunaFacilityId' => $saunaFacilityId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // サウナ施設削除処理
    public function destroy(SaunaFacility $saunaFacility, int $saunaFacilityId)
    {
        $sauna = SaunaFacility::findOrFail($saunaFacilityId);
        $sauna->delete();
        return redirect()->route('admin.top');
    }
}
