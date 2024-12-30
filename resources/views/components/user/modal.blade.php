<div id="crud-modal-background" class="hidden modal-background"></div>
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="font-kaisei text-lg font-semibold text-gray-900 dark:text-white">
                    あなたの“ととのい”エピソードを<br>教えてください！
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="reviewForm" class="p-4 md:p-5" action="{{ route('reviews.store' , ['saunaFacilityId' => $saunaFacility->id]) }}" method="POST">
                @csrf
                <!-- 訪問日 -->
                <div class="mb-4">
                    <label for="visit_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">訪問日<span class="text-red-700 pl-1">※必須</span></label>
                    <input type="date" id="visit_date" name="visit_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                </div>
                <!-- おすすめ度 -->
                <div class="rating mb-4">
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">おすすめ度<span class="text-red-700 pl-1">※必須</span></div>
                    <div class="stars flex space-x-1" id="starContainer">
                        <div class="inline-block">
                            <input id="rating1" name="rating" type="radio" value="1">
                            <label for="rating1">1</label>
                        </div>
                        <div class="inline-block">
                            <input id="rating2" name="rating" type="radio" value="2">
                            <label for="rating2">2</label>
                        </div>
                        <div class="inline-block">
                            <input id="rating3" name="rating" type="radio" value="3">
                            <label for="rating3">3</label>
                        </div>
                        <div class="inline-block">
                            <input id="rating4" name="rating" type="radio" value="4">
                            <label for="rating4">4</label>
                        </div>
                        <div class="inline-block">
                            <input id="rating5" name="rating" type="radio" value="5">
                            <label for="rating5">5</label>
                        </div>
                    </div>
                    {{-- <input type="hidden" id="ratingValue" name="rating" value="0"> --}}
                </div>

                <!-- 画像アップロード -->
                {{-- <div class="mb-4">
                    <label for="image_upload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">画像を追加</label>
                    <input type="file" id="image_upload" name="image_upload" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600">
                </div> --}}
                <!-- 口コミ -->
                <div class="mb-4">
                    <label for="review" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">口コミ<span class="text-red-700 pl-1">※必須</span></label>
                    <textarea id="review" name="review" rows="4" class="block w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white"></textarea>
                </div>
                <!-- 投稿ボタン -->
                <button type="submit" id="submitReview" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    投稿
                </button>
            </form>
        </div>
    </div>
</div>
