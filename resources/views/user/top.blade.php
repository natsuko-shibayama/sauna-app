<x-user-layout>
    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
    @endif
    <h1 class="text-center mx-3 font-kaisei md:my-8 text-3xl">今日はどこでととのう...？</h1>
    <div class="flex flex-col md:flex-row items-start md:items-center justify-center  mx-auto px-4">
        <!-- 検索フォームとボタンのラッパー -->
        <div class="w-full md:w-1/2 md:pr-4">
            <form class="mb-4" method="GET">
                <div class="relative">
                    <input
                        type="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="施設名で検索"
                        name="name"
                        value=""
                        {{-- value="{{ $name }}" --}}
                    />
                    <button type="submit" class="absolute right-2.5 bottom-2.5 text-white bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-4 py-2 hover:shadow-sm hover:translate-y-0.5 transform transition">
                        <img src="{{ asset('storage/images/searchIcon.png') }}" alt="検索アイコン" class="w-6 h-6">
                    </button>
                </div>
            </form>

            <div class="flex justify-center space-x-4 mt-4">
                <button class="bg-gray-200 p-4 rounded-lg shadow-md hover:bg-gray-300" id="user_commitment">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('storage/images/こだわり.png') }}" alt="Icon" class="w-6 h-6">
                        <span>こだわり検索</span>
                    </div>
                </button>
                <button class="bg-gray-200 p-4 rounded-lg shadow-md hover:bg-gray-300" id="user_area">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('storage/images/エリア.png') }}" alt="Icon" class="w-6 h-6">
                        <span>エリア検索</span>
                    </div>
                </button>
            </div>
        </div>

        <!-- 右側の画像 -->
        {{-- <div class="w-full md:w-1/2 mt-6 md:mt-0 md:pl-4 flex justify-center">
            <img src="{{ asset('storage/images/user.top.png') }}" alt="ユーザー画像" class="max-w-full h-auto rounded-lg shadow-md">
        </div> --}}
    </div>

    {{-- こだわり検索モーダル --}}
    <div id="user_commitmentModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="modal-content bg-white p-6 rounded-lg">
            <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="user_closeCommitModal">&times;</span>
            <h2 class="text-center text-xl font-bold mb-4">こだわり検索</h2>
            <form method="GET">
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="has_loyly" name="has_loyly"
                     {{ $has_loyly ? 'checked' : null }}
                     >
                    <label for="has_loyly">ロウリュ</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="has_water_bath" name="has_water_bath"
                    {{ $has_water_bath ? 'checked' : null }}
                    >
                    <label for="has_water_bath">水風呂</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="has_outdoor_bath" name="has_outdoor_bath"
                    {{ $has_outdoor_bath ? 'checked' : null }}
                    >
                    <label for="has_outdoor_bath">外気浴</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="has_chair" name="has_chair"
                    {{ $has_chair ? 'checked' : null }}
                    >
                    <label for="has_chair">ととのい椅子</label>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                        検索
                    </button>
                    <button type="button" id="user_kodawari_clear" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500">
                        クリア
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- エリア検索モーダル --}}
    <div id="user_areaModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="modal-content bg-white p-6 rounded-lg">
            <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="user_closeAriaModal">&times;</span>
            <h2 class="text-center text-xl font-bold mb-4">エリア検索</h2>
            <form method="GET">
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="kanagawa" name="kanagawa"
                    {{ $kanagawa ? 'checked' : null }}
                    >
                    <label for="kanagawa">神奈川</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="gunma" name="gunma"
                    {{ $gunma ? 'checked' : null }}
                    >
                    <label for="gunma">群馬</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="tokyo" name="tokyo"
                    {{ $tokyo ? 'checked' : null }}
                    >
                    <label for="tokyo">東京</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="saitama" name="saitama"
                    {{ $saitama ? 'checked' : null }}
                    >
                    <label for="saitama">埼玉</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="chiba" name="chiba"
                    {{ $chiba ? 'checked' : null }}
                    >
                    <label for="chiba">千葉</label>
                </div>
                <div class="ml-3 pb-3">
                    <input type="checkbox" id="ibaraki" name="ibaraki"
                    {{ $ibaraki ? 'checked' : null }}
                    >
                    <label for="ibaraki">茨城</label>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                        検索
                    </button>
                    <button type="button" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500" id="user_area_clear">
                        クリア
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- おすすめサウナ一覧 --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-center mx-3 font-kaisei md:my-8 text-3xl">おすすめ。</h1>
            <div class="flex -m-4 w-full">
                <div id="carousel" class="flex transition duration-300 ease-in-out whitespace-nowrap overflow-x-auto">
                    @foreach ( $saunaFacilities as $saunaFacility )
                        <div class="p-4 saunaElement" style="width:450px;">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg">
                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/'.$saunaFacility->image_path) }}" alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">施設名</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->name }}</h1>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">エリア名</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->prefecture }}</h1>
                                    {{-- <div class="flex items-center flex-wrap">
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">サウナ概要<span>▼</span></h2>
                                        <div id="accordion">
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->sauna_comment }}</h1>
                                        </div>
                                    </div> --}}
                                    <div class="flex items-center flex-wrap">
                                        {{-- <div>
                                            <p>{{ $saunaFacility->sauna_comment }}</p>
                                        </div> --}}
                                        <div class="mr-5">
                                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">ロウリュ</h2>
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->has_loyly ? "有": "無" }}</h1>
                                        </div>
                                        <div>
                                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">水風呂</h2>
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->has_water_bath ? "有": "無" }}</h1>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap">
                                        <div class="mr-5">
                                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">外気浴</h2>
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->has_outdoor_bath ? "有": "無" }}</h1>
                                        </div>
                                        <div>
                                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">ととのい椅子</h2>
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $saunaFacility->has_chair ? "有": "無" }}</h1>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap">
                                        <button
                                            onclick="location.href='{{ route('saunaFacilities', ['saunaFacilityId' => $saunaFacility->id]) }}'"
                                            class="bg-orange-500  text-white font-bold p-4 rounded-lg shadow-md hover:bg-orange-300 hover:text-black">
                                            詳細画面へ
                                        </button>
                                        <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>1.2K
                                        </span>
                                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                            </svg>6
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
