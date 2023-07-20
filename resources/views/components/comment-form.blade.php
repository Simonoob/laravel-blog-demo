@props(['post'])
@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf
        <x-panel>
            <div>
                <img src="https://i.pravatar.cc/200?u={{ auth()->user()->id }}" alt=""
                    class="w-20 rounded-full ring-2 ring-blue-100">
            </div>
            <div class="grid gap-3 flex-1">
                <header>
                    <h3 class="font-bold">Have something to say?</h3>
                </header>
                <div class="border-b-2 border-blue-100"></div>
                <div class="flex gap-3 items-end">
                    <div class="flex-1">
                        <textarea name="body" required placeholder="What's on your mind?"
                            class="w-full border-none focus:ring-2 ring-blue-100 rounded-md focus:outline-none text-sm p-3"></textarea>
                        @error('body')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="ring-2 ring-blue-500 rounded-full text-xs font-semibold uppercase px-8 py-2 bg-blue-500 text-white hover:bg-gray-800 hover:text-white transition-colors duration-200 ease-out">Post</button>
                </div>
            </div>
        </x-panel>
    </form>
@else
    <x-panel>
        <p class="font-semibold text-sm">
            <a href="/register" class="hover:underline text-blue-500">Register</a> or <a href="/login"
                class="hover:underline text-blue-500">Log in</a> to leave a comment.
        </p>
    </x-panel>
@endauth
