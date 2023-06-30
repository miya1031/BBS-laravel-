@props(['icon', 'name', 'postNum', 'likedNum', 'retweetedNum'])

<div class="avatar m-2 md:m-0 dropdown dropdown-right">
    <label tabindex="0">
        @isset($icon)
            <div class="w-16 md:w-24 rounded">
                <img src="{{ asset('storage/'.$icon) }}" alt="アイコン画像">
            </div>
        @else
            <div class="bg-primary text-primary-content w-16 h-16 md:w-24 md:h-24 rounded">
                <span class="text-3xl">no<br>image</span>
            </div>
        @endisset
    </label>
    <label tabindex="0" class='dropdown-content'>
        <div class='card w-96 bg-base-100 shadow-xl'>
            @isset($icon)
                <figure><img src="{{ asset('storage/'.$icon) }}" alt="アイコン画像"></figure>
            @else
                <figure class='p-10'><span class="bg-primary text-primary-content text-3xl p-10">no<br>image</span></figure>
            @endisset
            <div class="card-body">
                <h2 class='card-title'>{{ $name }}</h2>
                <div class='flex justify-center justify-items-center w-full m-0 text-xs'>
                    <div class='w-1/3'>
                        <p>&nbsp;</p>
                        <p class='text-xs'>投稿数</p>
                        {{-- <p class='font-bold'>{{ $postNum }}</p> --}}
                    </div>
                    <div class='w-1/3'>
                        <p>いいね<br>された数</p>
                        {{-- <p class='font-bold'>{{ $likedNum }}</p> --}}
                    </div>
                    <div class='w-1/3'>
                        <p>リツイート<br>された数</p>
                        {{-- <p class='font-bold'>{{ $retweetedNum }}</p> --}}
                    </div>
                </div>
                <div class="card-actions justify-end">
                </div>
            </div>
        </div>
    </label>
</div>