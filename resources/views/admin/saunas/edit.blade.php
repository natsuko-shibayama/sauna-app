<x-admin-layout>
    <div class="max-w-4xl mx-auto py-8">

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">サウナ情報編集</h1>
                    {{-- カスタムエラーメッセージの表示 --}}
                    @if ($errors->has('error'))
                        <div class="alert text-red">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                </div>
                <div class="lg:w-full md:w-full mx-auto">
                    <form action="{{ route('admin.saunas.update', ['saunaFacilityId' => $saunaFacility->id]) }}" method="POST" class="space-y-6　flex flex-wrap -m-2" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">施設名</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $saunaFacility->name)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            {{-- 施設名のエラーメッセージ --}}
                            @error('name')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="postal_code" class="leading-7 text-sm text-gray-600">郵便番号</label>
                                <input
                                    type="text"
                                    id="postal_code"
                                    name="postal_code"
                                    value="{{ old('postal_code', $saunaFacility->postal_code) }}"
                                    {{-- value="{{ is_null(old('postal_code')) ? $saunaFacility->postal_code  : old('postal_code') }}" --}}
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                            </div>
                            {{-- 郵便番号のエラーメッセージ --}}
                            @error('postal_code')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="prefecture" class="leading-7 text-sm text-gray-600">都道府県</label>
                                <input
                                    type="text"
                                    id="prefecture"
                                    name="prefecture"
                                    value="{{ old('prefecture',$saunaFacility->prefecture )}}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                            </div>
                            {{-- 都道府県のエラーメッセージ --}}
                            @error('prefecture')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="city" class="leading-7 text-sm text-gray-600">市区町村</label>
                                <textarea id="city" name="city" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('city', $saunaFacility->city) }}</textarea>
                            </div>
                            {{-- 市区町村のエラーメッセージ --}}
                            @error('city')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="address" class="leading-7 text-sm text-gray-600">それ以降の住所</label>
                                <textarea id="address" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('address', $saunaFacility->address)}}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="access" class="leading-7 text-sm text-gray-600">アクセス</label>
                                <textarea id="access" name="access" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('access',$saunaFacility->access ) }}</textarea>
                            </div>
                            {{-- アクセスのエラーメッセージ --}}
                            @error('access')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="location_map" class="leading-7 text-sm text-gray-600">地図</label>
                                <textarea id="location_map" name="location_map" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('location_map', $saunaFacility->location_map) }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">料金</label>
                                <textarea id="price" name="price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('price', $saunaFacility->price) }}</textarea>
                            </div>
                            {{-- 料金のエラーメッセージ --}}
                            @error('price')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="image_path" class="leading-7 text-sm text-gray-600">画像</label>
                                <input type="file" id="image_path" name="image_path" value="{{ old('image_path', $saunaFacility->image_path)}}" class="col-span-2  p-2 rounded-lg">
                                @if ($saunaFacility->image_path)
                                    <img src="{{ asset('storage/'.$saunaFacility->image_path) }}" alt="サウナ画像" class="mt-2 h-32">
                                @endif
                            </div>
                        </div>

                        <div class="lg:w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">種類</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">温度</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">備考</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">操作</th>
                                    </tr>
                                </thead>
                                <tbody id="sauna-table-body">
                                    @php
                                        $rows = $saunas->count();
                                    @endphp

                                    @for ($i = 0; $i < $rows; $i++)
                                        @php
                                            $sauna = $saunas[$i];
                                        @endphp

                                        <tr>
                                            <td class="px-4 py-3">
                                                <select name="sauna_type[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    @php
                                                        $saunaType = old('sauna_type.'.$i) ?? $sauna->type;
                                                    @endphp
                                                    <option value="1" {{ $saunaType == '1' ? 'selected' : '' }}>乾式サウナ（ドライサウナ）</option>
                                                    <option value="2" {{ $saunaType == '2' ? 'selected' : '' }}>湿式サウナ（スチームサウナ）</option>
                                                    <option value="3" {{ $saunaType == '3' ? 'selected' : '' }}>湿式サウナ（ミストサウナ）</option>
                                                    <option value="4" {{ $saunaType == '4' ? 'selected' : '' }}>ロウリュサウナ</option>
                                                </select>
                                                <!-- Validation Error for sauna_type -->
                                                @error('sauna_type.' . $i)
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td class="px-4 py-3">
                                                <input type="text" name="temperature[]" value="{{ old('temperature.' . $i, $sauna->temperature)  }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <!-- Validation Error for temperature -->
                                                @error('temperature.' . $i)
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td class="px-4 py-3">
                                                <textarea name="note[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                                >{{ old('note.' . $i, $sauna->note) }}</textarea>
                                                <!-- Validation Error for note -->
                                                @error('note.' . $i)
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td class="px-4 py-3">
                                                <button type="button" class="remove-row bg-red-500 text-white px-4 py-2 rounded">削除</button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <button type="button" id="add-row" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">追加</button>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="saunaComment" class="leading-7 text-sm text-gray-600">サウナの備考</label>
                                <textarea id="saunaComment" name="saunaComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('saunaComment', $saunaFacility->sauna_comment) }}</textarea>
                            </div>
                            {{-- サウナ備考のエラーメッセージ --}}
                            @error('saunaComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasLoyly1" class="leading-7 text-sm text-gray-600">ロウリュ有</label>
                                <input
                                    type="radio"
                                    id="hasLoyly1"
                                    name="hasLoyly"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    value="1"
                                    {{ old('hasLoyly', $saunaFacility->has_loyly) == '1' ? 'checked' : ''}}
                                >
                                <label for="hasLoyly0" class="leading-7 text-sm text-gray-600">ロウリュ無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasLoyly0"
                                    name="hasLoyly"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasLoyly', $saunaFacility->has_loyly) == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- ロウリュのエラーメッセージ --}}
                            @error('hasLoyly')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="loylyComment" class="leading-7 text-sm text-gray-600">ロウリュの備考</label>
                                <textarea id="loylyComment" name="loylyComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('loylyComment', $saunaFacility->loyly_comment) }}</textarea>
                            </div>
                            {{-- ロウリュ備考のエラーメッセージ --}}
                            @error('loylyComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasWaterbath1" class="leading-7 text-sm text-gray-600">水風呂有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasWaterbath1"
                                    name="hasWaterbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasWaterbath', $saunaFacility->has_water_bath) == '1' ? 'checked' : '' }}
                                >
                                <label for="hasWaterbath0" class="leading-7 text-sm text-gray-600">水風呂無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasWaterbath0"
                                    name="hasWaterbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasWaterbath', $saunaFacility->has_water_bath) == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- 水風呂有無のエラーメッセージ --}}
                            @error('hasWaterbath')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="waterbathComment" class="leading-7 text-sm text-gray-600">水風呂の備考</label>
                                <textarea id="waterbathComment" name="waterbathComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('waterbathComment', $saunaFacility->water_bath_comment) }}</textarea>
                            </div>
                            {{-- 水風呂備考のエラーメッセージ --}}
                            @error('waterbathComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasOutdoorbath1" class="leading-7 text-sm text-gray-600">外気浴有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasOutdoorbath1"
                                    name="hasOutdoorbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasOutdoorbath', $saunaFacility->has_outdoor_bath) == '1' ? 'checked' : '' }}
                                >
                                <label for="hasOutdoorbath0" class="leading-7 text-sm text-gray-600">外気浴無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasOutdoorbath0"
                                    name="hasOutdoorbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasOutdoorbath', $saunaFacility->has_outdoor_bath) == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- 外気浴のエラーメッセージ --}}
                            @error('hasOutdoorbath')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasChair1" class="leading-7 text-sm text-gray-600">ととのい椅子有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasChair1"
                                    name="hasChair"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasChair', $saunaFacility->has_chair) == '1' ? 'checked' : '' }}
                                >
                                <label for="hasChair0" class="leading-7 text-sm text-gray-600">ととのい椅子無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasChair0"
                                    name="hasChair"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasChair', $saunaFacility->has_chair) == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- ととのい椅子のエラーメッセージ --}}
                            @error('hasChair')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="chairComment" class="leading-7 text-sm text-gray-600">ととのい椅子の備考</label>
                                <textarea id="chairComment" name="chairComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('chairComment', $saunaFacility->chair_comment) }}</textarea>
                            </div>
                            {{-- ととのい椅子備考のエラーメッセージ --}}
                            @error('chairComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <button
                                type="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

</x-admin-layout>

