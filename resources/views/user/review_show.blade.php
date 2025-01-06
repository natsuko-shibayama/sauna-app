<x-user-layout>
    <div class="container mx-auto p-4">
        <!-- レビュー内容 -->
        <h1 class="text-2xl font-bold mb-4">口コミ詳細</h1>
        <p>投稿者: {{ $review->user->name }}</p>
        <p>訪問日: {{ $review->visit_date }}</p>
        <p>おすすめ度: {{ $review->rating }}</p>
        <p>口コミ内容: {{ $review->review }}</p>

        <!-- コメント一覧 -->
        <h2 class="text-xl font-semibold mt-6 mb-4">コメント一覧</h2>
        @if(count($review->comments) > 0)
            @foreach ($review->comments as $comment)
                <div class="border-b py-2">
                    <p>投稿者: {{ $comment->user->name }}</p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        @else
            <p class="mb-5">コメントはありません</p>
        @endif

        <!-- コメント投稿フォーム -->
        <form action="{{ route('comments.store', [$saunaFacilityId, 'reviewId' => $review->id]) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="content" rows="3" class="border p-2 w-full" placeholder="コメントを入力してください"></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">コメントを投稿</button>
        </form>
    </div>
</x-user-layout>
