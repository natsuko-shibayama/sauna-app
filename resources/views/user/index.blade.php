<x-user-layout>
    <!-- 検索フォーム -->
    <section class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
        <h1 class="text-center text-2xl font-bold mb-6">検索条件</h1>
        <form method="GET"
            action="{{ route('search') }}"
            class="space-y-4 w-full max-w-md">
            <!-- キーワード検索 -->
            <div class="flex flex-col items-center">
                <label for="name" class="font-medium mb-2">施設名・キーワード</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ request('name') }}"
                    class="p-3 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="施設名を入力してください"
                />
            </div>
            <!-- こだわり検索 -->
            <div class="flex items-center justify-between w-full">
                <label class="font-medium">こだわり</label>
                <span class="text-gray-500">
                    {{ request('has_loyly') || request('has_water_bath') || request('has_outdoor_bath') || request('has_chair') ? '指定あり' : '指定されていません' }}
                </span>
                <button
                    type="button"
                    id="user_search_commitment"
                    class="text-sm bg-gray-200 px-4 py-2 rounded-md hover:bg-gray-300"
                >
                    変更
                </button>
            </div>
            <!-- エリア検索 -->
            <div class="flex items-center justify-between w-full">
                <label class="font-medium">エリア</label>
                <span class="text-gray-500">
                    {{ request('kanagawa') || request('gunma') || request('tokyo') || request('saitama') || request('chiba') || request('ibaraki') ? '指定あり' : '指定されていません' }}
                </span>
                <button
                    type="button"
                    id="user_search_area"
                    class="text-sm bg-gray-200 px-4 py-2 rounded-md hover:bg-gray-300"
                >
                    変更
                </button>
            </div>
            <!-- 検索・クリアボタン -->
            <div class="flex space-x-4 mt-4 justify-center">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600"
                >
                    検索
                </button>
                <button
                    type="reset"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow-md hover:bg-gray-400"
                >
                    クリア
                </button>
            </div>
        </form>

        {{-- こだわり検索モーダル --}}
        <div id="user_searchCommitmentModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="modal-content bg-white p-6 rounded-lg">
                <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="user_search_closeCommitModal">&times;</span>
                <h2 class="text-center text-xl font-bold mb-4">こだわり検索</h2>
                <form method="GET">
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="has_loyly" name="has_loyly"
                        {{-- {{ $has_loyly ? 'checked' : null }} --}}
                        >
                        <label for="has_loyly">ロウリュ</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="has_water_bath" name="has_water_bath"
                        {{-- {{ $has_water_bath ? 'checked' : null }} --}}
                        >
                        <label for="has_water_bath">水風呂</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="has_outdoor_bath" name="has_outdoor_bath"
                        {{-- {{ $has_outdoor_bath ? 'checked' : null }} --}}
                        >
                        <label for="has_outdoor_bath">外気浴</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="has_chair" name="has_chair"
                        {{-- {{ $has_chair ? 'checked' : null }} --}}
                        >
                        <label for="has_chair">ととのい椅子</label>
                    </div>
                    <div class="flex space-x-4">
                        <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                            確定
                        </button>
                        <button type="button" id="user_search_kodawari_clear" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500">
                            クリア
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- エリア検索モーダル --}}
        <div id="user_searchAreaModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="modal-content bg-white p-6 rounded-lg">
                <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="user_search_closeAriaModal">&times;</span>
                <h2 class="text-center text-xl font-bold mb-4">エリア検索</h2>
                <form method="GET">
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="kanagawa" name="kanagawa"
                        {{-- {{ $kanagawa ? 'checked' : null }} --}}
                        >
                        <label for="kanagawa">神奈川</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="gunma" name="gunma"
                        {{-- {{ $gunma ? 'checked' : null }} --}}
                        >
                        <label for="gunma">群馬</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="tokyo" name="tokyo"
                        {{-- {{ $tokyo ? 'checked' : null }} --}}
                        >
                        <label for="tokyo">東京</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="saitama" name="saitama"
                        {{-- {{ $saitama ? 'checked' : null }} --}}
                        >
                        <label for="saitama">埼玉</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="chiba" name="chiba"
                        {{-- {{ $chiba ? 'checked' : null }} --}}
                        >
                        <label for="chiba">千葉</label>
                    </div>
                    <div class="ml-3 pb-3">
                        <input type="checkbox" id="ibaraki" name="ibaraki"
                        {{-- {{ $ibaraki ? 'checked' : null }} --}}
                        >
                        <label for="ibaraki">茨城</label>
                    </div>
                    <div class="flex space-x-4">
                        <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                            確定
                        </button>
                        <button type="button" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500" id="user_search_area_clear">
                            クリア
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- サウナ一覧 -->
    <section class="mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">{{ request()->filled('name') ? request('name') : '全て' }}のサウナ一覧</h1>
        <div class="space-y-6">
            @forelse ($saunaFacilities as $saunaFacility)
                <a href="{{ route('saunaFacilities', ['saunaFacilityId' => $saunaFacility->id]) }}" class="block border rounded-lg shadow-md p-4 max-w-4xl mx-auto flex">
                    <!-- 画像 -->
                    <img
                        src="{{ asset('storage/'.$saunaFacility->image_path) }}"
                        alt="{{ $saunaFacility->name }}"
                        class="w-1/3 h-auto object-cover rounded-md"
                    />
                    <!-- 詳細情報 -->
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-bold mb-2">{{ $saunaFacility->name }}</h2>
                        <p class="text-gray-500 mb-4">エリア: {{ $saunaFacility->prefecture }}</p>
                        <div class="flex flex-wrap gap-2">
                            <!-- ロウリュ -->
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg {{ $saunaFacility->has_loyly ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-500' }}"
                            >
                                ロウリュ
                            </span>
                            <!-- 水風呂 -->
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg {{ $saunaFacility->has_water_bath ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-500' }}"
                            >
                                水風呂
                            </span>
                            <!-- 外気浴 -->
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg {{ $saunaFacility->has_outdoor_bath ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-500' }}"
                            >
                                外気浴
                            </span>
                            <!-- ととのい椅子 -->
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg {{ $saunaFacility->has_chair ? 'bg-blue-100 text-blue-600' : 'bg-gray-200 text-gray-500' }}"
                            >
                                ととのい椅子
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500">該当するサウナ施設が見つかりませんでした。</p>
            @endforelse
        </div>
    </section>
</x-user-layout>
