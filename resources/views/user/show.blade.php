<x-user-layout>
    <div class="flex items-center justify-self-center">
        <!-- タイトル -->
        <h1 class="text-center mx-3 font-kaisei md:my-8 text-3xl">{{ $saunaFacility->name }}</h1>

        @auth('web')
            <!-- ボタン -->
            <div class="flex space-x-4">
                @if($isFavorite)
                    <form action="{{ route('favorites.destroy' , ['saunaFacilityId' => $saunaFacility->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- お気に入りボタン --}}
                        <button
                            id="favorite_button"
                            class="p-2 bg-green-500 rounded-full shadow-md hover:bg-green-200 text-white"
                        >
                            <svg class="size-6" id="favorite_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </button>
                    </form>
                @else
                    <form action="{{ route('favorites.store' , ['saunaFacilityId' => $saunaFacility->id]) }}" method="POST">
                        @csrf
                        {{-- お気に入りボタン --}}
                        <button
                            id="favorite_button"
                            class="p-2 bg-white rounded-full shadow-md hover:bg-green-500 hover:text-white"
                        >
                            <svg class="size-6" id="favorite_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </button>
                    </form>
                @endif
                {{-- 口コミボタン --}}
                <button
                    id="review_button"
                    class="p-2 bg-white rounded-full shadow-md hover:bg-blue-500 hover:text-white"
                    data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    <svg class="size-6" id="review_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </button>
            </div>
            @include('components.user.modal')
        　@endauth
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="lg:w-2/3 w-full mx-auto pb-2">
                <h3><a class="mr-2" href="{{ route('top') }}">TOP</a><span class="mr-2">></span><span>{{ $saunaFacility->name }}詳細</span></h3>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-2">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/'.$saunaFacility->image_path) }}" alt="blog">
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto pb-2">
                <h3 class="mx-1 my-4 text-xl">サウナ種類</h3>
                @if ($saunaFacility->saunas->isNotEmpty())
                <table class="table-fixed w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="w-1/4 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">種類</th>
                            <th class="w-1/4 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">温度</th>
                            <th class="w-1/2 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">備考</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saunaFacility->saunas as $sauna)
                            <tr>
                                <td class="px-4 py-3">{{ $sauna->type_name }}</td>
                                <td class="px-4 py-3">{{ $sauna->temperature }}</td>
                                <td class="px-4 py-3t">{{ $sauna->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    @else
                        <p class="text-gray-500">関連情報はありません。</p>
                    @endif
                    <div class="flex items-center mx-1 my-4">
                        <h3 class="text-xl mr-4">その他詳細</h3>
                    </div>
                    <div class="flex items-center mx-1 my-4"> {{ $saunaFacility->sauna_comment }}</div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-2">
                <div class="flex items-center mx-1 my-4">
                    <h3 class="text-xl mr-4">ロウリュ</h3>
                    <h1 class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->has_loyly ? "有": "無" }}</h1>
                </div>
                <div class="flex items-center mx-1 my-4">
                    {{ $saunaFacility->loyly_comment }}
                </div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-2">
                <div class="flex items-center mx-1 my-4">
                    <h3 class="text-xl mr-4">水風呂</h3>
                    <h1 class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->has_water_bath ? "有": "無" }}</h1>
                </div>
                <div class="flex items-center mx-1 my-4">
                    {{ $saunaFacility->water_bath_comment }}
                </div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-2">
                <div class="flex items-center mx-1 my-4">
                    <h3 class="text-xl mr-4">外気浴</h3>
                    <h1 class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->has_outdoor_bath ? "有": "無" }}</h1>
                </div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-6">
                <div class="flex items-center mx-1 my-4">
                    <h3 class="text-xl mr-4">ととのい椅子</h3>
                    <h1 class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->has_chair ? "有": "無" }}</h1>
                </div>
                <div class="flex items-center mx-1 my-4">
                    {{ $saunaFacility->chair_comment }}
                </div>
            </div>
            <div class="lg:w-2/3 w-full mx-auto pb-6 flex flex-col lg:flex-row">
                <!-- 左側: 所在地、アクセス、料金 -->
                <div class="lg:w-1/2 w-full pr-4">
                    <!-- 所在地 -->
                    <div class="mb-4">
                        <div class="flex items-center mx-1 my-4">
                            <h3 class="text-xl mr-4">所在地</h3>
                        </div>
                        <div class="flex flex-col mx-1 my-1">
                            <span>{{ $saunaFacility->postal_code }}</span>
                            <span class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->prefecture }}</span>
                            <span class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->city }}</span>
                            <span class="title-font text-lg font-medium text-gray-90">{{ $saunaFacility->address }}</span>
                        </div>
                    </div>

                    <!-- アクセス -->
                    <div class="mb-4">
                        <div class="flex items-center mx-1 my-4">
                            <h3 class="text-xl mr-4">アクセス</h3>
                        </div>
                        <div class="flex items-center mx-1 my-1">
                            {{ $saunaFacility->access }}
                        </div>
                    </div>

                    <!-- 料金 -->
                    <div class="mb-4">
                        <div class="flex items-center mx-1 my-4">
                            <h3 class="text-xl mr-4">料金</h3>
                        </div>
                        <div class="flex items-center mx-1 my-1">
                            {{ $saunaFacility->price }}
                        </div>
                    </div>
                </div>

                <!-- 右側: マップ -->
                <div class="lg:w-1/2 w-full">
                    <!-- Google Maps iframe の例 -->
                    @php
                        // フルアドレスを組み合わせる
                        $fullAddress = "{$saunaFacility->prefecture} {$saunaFacility->city} {$saunaFacility->address}";

                        // URLエンコードする
                        $encodedAddress = urlencode($fullAddress);

                        // Google Maps Embed URLを作成する
                        $googleMapsEmbedUrl = "https://www.google.com/maps/embed/v1/place?key=" . config('services.google_maps.api_key') . "&q={$encodedAddress}";
                    @endphp
                    <iframe
                        title="所在地の地図"
                        src="{{ $googleMapsEmbedUrl }}"
                        class="w-full h-64 rounded"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            {{-- 口コミ一覧 --}}
            <div class="lg:w-2/3 w-full mx-auto pb-6  lg:flex-row">
                <div class="flex items-center mx-1 my-4">
                    <h3 class="text-xl mr-4">口コミ一覧</h3>
                </div>
                <div class="flex items-center mx-1 my-4">
                    <div class="container px-5 py-24 mx-auto">
                        @foreach($saunaFacility->reviews as $review)
                            <div class="flex items-center lg:w-full mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                                <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-500 flex-shrink-0">
                                    <img src="{{ $review->user->avatar }}" alt="User Avatar" class="w-30 h-30 rounded-full mr-4">
                                </div>
                                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $review->user->name }}</h2>
                                    <div class="leading-relaxed text-base">
                                        <span class="mr-2 mb-3">訪問日:</span>
                                        <span>{{ $review->visit_date }}</span>
                                    </div>
                                    <div class="leading-relaxed text-base">
                                        <span class="mr-2 mb-3">おすすめ度:</span>
                                        <span>{{ $review->rating }}</span>
                                    </div>
                                    <div class="leading-relaxed text-base">
                                        <span class="mb-3">口コミ:</span>
                                        <div>{{ $review->review }}</div>
                                    </div>

                                </div>
                                @foreach ($saunaFacility->reviews as $review)
                                <form action="{{ in_array($review->id, $isReviewFavorites)
                                                ? route('reviewFavorites.destroy', ['saunaFacilityId' => $saunaFacility->id, 'reviewId' => $review->id])
                                                : route('reviewFavorites.store', ['saunaFacilityId' => $saunaFacility->id, 'reviewId' => $review->id]) }}"
                                      method="POST">
                                    @csrf
                                    @if(in_array($review->id, $isReviewFavorites))
                                        @method('DELETE')
                                    @endif
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-gray-200">
                                        <button
                                            type="submit"
                                            id="review_favorite"
                                            class="p-2 {{ in_array($review->id, $isReviewFavorites) ? 'bg-pink-500 text-white' : 'bg-white hover:bg-pink-500 hover:text-white' }} rounded-full shadow-md"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                    </span>
                                </form>
                            @endforeach

                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <form action="{{ route('review_show', ['saunaFacilityId' => $saunaFacility->id,'reviewId' => $review->id]) }}" method="GET">
                                        @csrf
                                        <button
                                            type="submit"
                                            id="review_comment"
                                            class="p-2 bg-white rounded-full shadow-md hover:bg-blue-500 hover:text-white"
                                        >
                                            <svg class="size-6" id="review_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
