<header class="text-gray-600 body-font  bg-green-300">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('admin.top') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="{{ asset('storage/images/headerLogo.png') }}" alt="Logo" class="w-10 h-10 p-2 bg-white rounded-full border-white shadow-md animate-bounce">
        <span class="ml-3 text-xl text-gray-900">サウナアプリ管理画面</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class=" md:ml-auto">
            @csrf
            <button
                href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();"
                class="inline-flex items-center bg-green-600 text-white border-0 py-1 px-3 focus:outline-none hover:bg-green-700 rounded text-base mt-4 md:mt-0"
                >ログアウト
            </button>
        </form>
    </div>
</header>
