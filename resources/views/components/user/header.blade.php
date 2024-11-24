<header class="text-gray-600 body-font  bg-cyan-400">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('top') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="{{ asset('storage/images/headerLogo.png') }}" alt="Logo" class="w-12 h-12 p-2 bg-white rounded-full border-white shadow-md animate-bounce">
        <span class="ml-3 text-3xl text-white font-bold font-kaisei" style="font-style: italic;">ととのいタイム。</span>
        </a>

        @auth('web')
            <div class="flex items-center md:ml-auto">
                <!-- ユーザーのアバター表示 -->
                <img src="{{ Auth::user()->avatar }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">

                <!-- ログアウトボタン -->
                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center bg-green-400 text-white border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-base"
                    >
                        ログアウト
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('auth.google') }}" class="ml-4 inline-flex items-center bg-white border border-gray-300 py-2 px-4 focus:outline-none hover:bg-gray-100 rounded text-base md:ml-auto">
                <!-- Googleアイコン（SVG） -->
                <svg class="w-6 h-6 mr-2" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.6 20.8H42V20H24v8h11.3C34.4 32.7 30.1 36 24 36c-7.5 0-13.6-6.1-13.6-13.6S16.5 8.8 24 8.8c3.5 0 6.7 1.3 9.2 3.4l6.4-6.4C35.8 2.9 30.4 0 24 0 11.5 0 2 9.5 2 22s9.5 22 22 22c11 0 20-8 20-20 0-1.3-.1-2.7-.4-4z"/>
                </svg>
                Googleでログイン
            </a>
        @endauth
        {{-- <a href="{{ route('auth.google') }}" class="btn btn-primary md:ml-auto">
            Googleでログイン
        </a> --}}
    </div>
</header>
