@props(['myIcon', "shownPosts"])

<x-common-layout>
    <x-slot:icon>
        {{ $myIcon }}
    </x-slot:icon>
    <div class='flex flex-col xl:flex-row justify-center text-center border-y w-full border-gray-200'>
        <div class='w-full xl:w-1/2 border-x border-l-0 border-gray-200'>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
    
                <!-- Message -->
                <div>
                    <x-input-label class="p-4" for="message" :value="__('Message')" />
                    <x-textarea-input id="message" placeholder="メッセージ" type="text" name="message" :value="old('message')" required />
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Post') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class='w-full xl:w-1/2 border-y border-b-0 border-gray-200 xl:border-t-0'>
            <div  class='border-y border-t-0 border-gray-200'>
                <p class='text-2xl p-4 font-bold'>投稿一覧</p>
            </div>
            <div class='p-2'>
                @foreach ($shownPosts as $post)
                    <div class='flex flex-col p-1 hover:bg-primary-content h-auto border-b border-gray-200'>
                        <div>
                            <p class='text-primary p-2'>
                                @isset($post->retweet_name)
                                    <i class="fa-solid fa-retweet" style="color: #31c21e;"></i>&nbsp;{{ $post['retweet_name'] }}さんがリツイートしました
                                @endisset
                            </p>
                        </div>
                        <div class='flex'>
                            {{-- アイコンの表示は他のページでも用いるからコンポーネントにまとめた方が良さそう --}}
                            <div class='w-1/5'>
                                <x-icon-tab :icon="$post->icon" :name="$post->name">
                                </x-icon-tab>
                            </div>
                            <div class='flex flex-col items-start w-3/5'>
                                    <div class='flex flex-col md:flex-row'>
                                        <span class='text-xl md:text-3xl py-2 px-4 font-bold'>{{ $post->name }}</span>
                                        <span class='pl-2 text-base-300 pt-0 md:pt-2'>{{ $post->created_at }}</span>
                                    </div>
                                    <a href="" class='text-xl px-4 text-left'>{{ $post->message }}</a>
                                    <div class='pt-4 w-full'>
                                        <div class='flex justify-between justify-items-center w-full'>
                                            <div class='flex w-1/2'>
                                                <div>
                                                </div>
                                                <div class='pl-2'>
                                                </div>
                                            </div>
                                            <div class='flex w-1/2'>
                                                <div>
                                                </div>
                                                <div class='pl-2'>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                            </div>
                            <div class='flex flex-col w-1/5 h-32'>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $shownPosts->links() }}
</x-common-layout>