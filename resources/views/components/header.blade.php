@props(['icon', 'id'])
<header class='navbar bg-primary'>
    <div class='flex-1'>
        <a href="{{ route('posts.index') }}"><h1 class="p-4 text-3xl font-bold text-white">ひとこと掲示板</h1></a>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            @isset($icon)
                <label tabindex="0" class="avatar">
                    <div class="w-16 rounded">
                        <img src={{ asset('storage/'.$icon) }} alt="アイコン画像">
                    </div>
                </label>
            @else
                <label tabindex="0" class="avatar placeholder">
                    <div class="bg-white text-black w-16 rounded">
                        <span class="text-xl">no<br>image</span>
                    </div>
                </label>
            @endisset
            <ul tabindex="0" class='mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-200 rounded-box w-52 relative'>
                <li>
                    <a href="">マイページ</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="py-4">
                        @csrf
                        
                        <x-dropdown-link-daisyui
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                        >
                            {{ __('Log out') }}
                        </x-dropdown-link-daisyui>
                    </form>
                </li>
                <li>
                    <a href="">退会</a>
                </li>
            </ul>
        </div>
    </div>
</header>
