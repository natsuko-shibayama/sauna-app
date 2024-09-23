<x-admin-layout>
    <h1 class="text-center mx-3 font-kaisei md:my-8 text-3xl">絞り込み検索</h1>

    <form class="max-w-lg mx-auto" method="GET">
        <div class="relative">
            <input
                type="search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="施設名で検索"
                name="name"
                value="{{ $name }}"
            />
            <button type="submit" class="absolute right-2.5 bottom-2.5 text-white bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-4 py-2 hover:shadow-sm hover:translate-y-0.5 transform transition">
                <img src="{{ asset('storage/images/searchIcon.png') }}" alt="検索アイコン" class="w-6 h-6">
            </button>
        </div>
    </form>

    <div class="flex justify-center space-x-4 mt-6">
        <button class="bg-gray-200 p-4 rounded-lg shadow-md hover:bg-gray-300" id="commitment">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/images/こだわり.png') }}" alt="Icon" class="w-6 h-6">
                <span>こだわり検索</span>
            </div>
        </button>
        <button class="bg-gray-200 p-4 rounded-lg shadow-md hover:bg-gray-300" id="area">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/images/エリア.png') }}" alt="Icon" class="w-6 h-6">
                <span>エリア検索</span>
            </div>
        </button>
    </div>

    {{-- こだわり検索モーダル --}}
    <div id="commitmentModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="modal-content bg-white p-6 rounded-lg">
            <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="closeCommitModal">&times;</span>
            <h2 class="text-xl font-bold mb-4">こだわり検索</h2>
            <form method="GET">
                <div>
                    <input type="checkbox" id="has_loyly" name="has_loyly" {{ $has_loyly ? 'checked' : null }}>
                    <label>ロウリュ</label>
                </div>
                <div>
                    <input type="checkbox" id="has_water_bath" name="has_water_bath" {{ $has_water_bath ? 'checked' : null }}>
                    <label>水風呂</label>
                </div>
                <div>
                    <input type="checkbox" id="has_outdoor_bath" name="has_outdoor_bath" {{ $has_outdoor_bath ? 'checked' : null }}>
                    <label>外気浴</label>
                </div>
                <div>
                    <input type="checkbox" id="has_chair" name="has_chair" {{ $has_chair ? 'checked' : null }}>
                    <label>ととのい椅子</label>
                </div>
                <div class="d-flex">
                    <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                        検索
                    </button>
                    <button type="button" id="kodawari_clear" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500">
                        クリア
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- エリア検索モーダル --}}
    <div id="areaModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="modal-content bg-white p-6 rounded-lg">
            <span class="closeModal cursor-pointer text-gray-500 text-2xl" id="closeAriaModal">&times;</span>
            <h2 class="text-xl font-bold mb-4">エリア検索</h2>
            <form method="GET">
                <div>
                    <input type="checkbox" id="kanagawa" name="kanagawa" {{ $kanagawa ? 'checked' : null }}>
                    <label>神奈川</label>
                </div>
                <div>
                    <input type="checkbox" id="gunma" name="gunma" {{ $gunma ? 'checked' : null }}>
                    <label>群馬</label>
                </div>
                <div>
                    <input type="checkbox" id="tokyo" name="tokyo" {{ $tokyo ? 'checked' : null }}>
                    <label>東京</label>
                </div>
                <div>
                    <input type="checkbox" id="saitama" name="saitama" {{ $saitama ? 'checked' : null }}>
                    <label>埼玉</label>
                </div>
                <div>
                    <input type="checkbox" id="chiba" name="chiba" {{ $chiba ? 'checked' : null }}>
                    <label>千葉</label>
                </div>
                <div>
                    <input type="checkbox" id="ibaraki" name="ibaraki" {{ $ibaraki ? 'checked' : null }}>
                    <label>茨城</label>
                </div>
                <div class="d-flex">
                    <button type="submit" class="text-white bg-green-400 p-4 rounded-lg shadow-md hover:bg-green-800">
                        検索
                    </button>
                    <button type="button" class="text-red bg-white p-4 rounded-lg shadow-md hover:text-white hover:bg-red-500" id="area_clear">
                        クリア
                    </button>
                </div>
            </form>
        </div>
    </div>


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">サウナ一覧</h1>
                <button
                    class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                    onclick="location.href='{{ route('admin.saunas.create') }}'"
                    >新規登録
                </button>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">施設名</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">都道府県</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">編集</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saunaFacilities as $saunaFacility)
                            <tr>
                                <td class="px-4 py-3">{{ $saunaFacility->name }}</td>
                                <td class="px-4 py-3">{{ $saunaFacility->prefecture }}</td>
                                <td class="px-4 py-3 text-right">
                                    <button
                                        class="flex text-white font-bold bg-green-400 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded"
                                        onclick="location.href='{{ route('admin.saunas.edit', ['saunaFacilityId' => $saunaFacility->id]) }}'"
                                        >編集
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-right text-lg text-gray-900">
                                    <form action="{{ route('admin.saunas.destroy', ['saunaFacilityId' => $saunaFacility->id])}}" method="POST">
                                        @csrf
                                        <button
                                            type="submit"
                                            onclick="return confirm('本当に削除してもよろしいですか？');"
                                            class="flex text-white font-bold bg-red-400 border-0 py-2 px-6 focus:outline-none hover:bg-red-700 rounded"
                                            >削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-admin-layout>
