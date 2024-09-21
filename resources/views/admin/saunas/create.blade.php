<x-admin-layout>
    <div class="max-w-4xl mx-auto py-8">

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">サウナ情報新規登録</h1>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <form action="{{ route('admin.saunas.store') }}" method="POST" class="space-y-6" class="flex flex-wrap -m-2">
                        @csrf
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">施設名</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                    value="{{ old('postal_code') }}"
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
                                    value="{{ old('prefecture') }}"
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
                                >{{ old('city') }}</textarea>
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
                                >{{ old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="access" class="leading-7 text-sm text-gray-600">アクセス</label>
                                <textarea id="access" name="access" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('access') }}</textarea>
                            </div>
                            {{-- アクセスのエラーメッセージ --}}
                            @error('access')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="map" class="leading-7 text-sm text-gray-600">地図</label>
                                <textarea id="map" name="map" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('map') }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">料金</label>
                                <input type="number" id="price" name="price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            {{-- 料金のエラーメッセージ --}}
                            @error('price')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                <input type="file" id="image" name="image" value="{{ old('image') }}" class="col-span-2  p-2 rounded-lg">
                            </div>
                            {{-- 画像のエラーメッセージ --}}
                            @error('image')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="saunaComment" class="leading-7 text-sm text-gray-600">サウナの備考</label>
                                <textarea id="saunaComment" name="saunaComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('saunaComment') }}</textarea>
                            </div>
                            {{-- サウナ備考のエラーメッセージ --}}
                            @error('saunaComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasLoyly" class="leading-7 text-sm text-gray-600">ロウリュ有</label>
                                <input
                                    type="radio"
                                    id="hasLoyly"
                                    name="hasLoyly"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    value="1"
                                    {{ old('hasLoyly') == '1' ? 'checked' : '' }}
                                >
                                <label for="hasLoyly" class="leading-7 text-sm text-gray-600">ロウリュ無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasLoyly"
                                    name="hasLoyly"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasLoyly') == '0' ? 'checked' : '' }}
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
                                >{{ old('loylyComment') }}</textarea>
                            </div>
                            {{-- ロウリュ備考のエラーメッセージ --}}
                            @error('loylyComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasWaterbath" class="leading-7 text-sm text-gray-600">水風呂有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasWaterbath"
                                    name="hasWaterbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasWaterbath') == '1' ? 'checked' : '' }}
                                >
                                <label for="hasWaterbath" class="leading-7 text-sm text-gray-600">水風呂無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasWaterbath"
                                    name="hasWaterbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasWaterbath') == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- 所在地のエラーメッセージ --}}
                            @error('hasWaterbath')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="waterbathComment" class="leading-7 text-sm text-gray-600">水風呂の備考</label>
                                <textarea id="waterbathComment" name="waterbathComment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                >{{ old('waterbathComment') }}</textarea>
                            </div>
                            {{-- 水風呂備考のエラーメッセージ --}}
                            @error('waterbathComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasOutdoorbath" class="leading-7 text-sm text-gray-600">外気浴有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasOutdoorbath"
                                    name="hasOutdoorbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasOutdoorbath') == '1' ? 'checked' : '' }}
                                >
                                <label for="hasOutdoorbath" class="leading-7 text-sm text-gray-600">外気浴無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasOutdoorbath"
                                    name="hasOutdoorbath"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasOutdoorbath') == '0' ? 'checked' : '' }}
                                >
                            </div>
                            {{-- 外気浴のエラーメッセージ --}}
                            @error('hasOutdoorbath')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="hasChair" class="leading-7 text-sm text-gray-600">ととのい椅子有</label>
                                <input
                                    type="radio"
                                    value="1"
                                    id="hasChair"
                                    name="hasChair"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasChair') == '1' ? 'checked' : '' }}
                                >
                                <label for="hasChair" class="leading-7 text-sm text-gray-600">ととのい椅子無</label>
                                <input
                                    type="radio"
                                    value="0"
                                    id="hasChair"
                                    name="hasChair"
                                    class="col-span-2 border border-gray-300 p-2 rounded-lg"
                                    {{ old('hasChair') == '0' ? 'checked' : '' }}
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
                                >{{ old('chairComment') }}</textarea>
                            </div>
                            {{-- ととのい椅子備考のエラーメッセージ --}}
                            @error('chairComment')
                                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-full">
                            <button
                                type="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

</x-admin-layout>
