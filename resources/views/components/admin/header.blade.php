<header class="text-white-600 body-font  bg-cyan-400">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('admin.top') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <img src="{{ asset('storage/images/headerLogo.png') }}" alt="Logo" class="w-12 h-12 p-2 bg-white rounded-full border-white shadow-md animate-bounce">
        <span class="ml-3 text-3xl text-white font-bold font-kaisei">サウナアプリ管理画面</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class=" md:ml-auto">
            @csrf
            <button
                href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();"
                class="font-kaisei inline-flex items-center bg-white text-slate-500 border-0 py-1 px-3 focus:outline-none hover:bg-zinc-400 rounded hover:text-white mt-4 md:mt-0"
                >ログアウト
            </button>
        </form>
    </div>
</header>
