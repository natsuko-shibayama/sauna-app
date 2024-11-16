<x-user-layout>
    <h1 class="text-center mx-3 font-kaisei md:my-8 text-3xl">{{ $saunaFacility->name }}</h1>
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
                    {{ $saunaFacility->loyly_comment }}
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
        </div>
    </section>
</x-user-layout>
