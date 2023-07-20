@props(['comment'])

<article>
    <x-panel>
        <div>
            <img src="https://i.pravatar.cc/200?u={{ $comment->user_id }}" alt=""
                class="w-20 rounded-full ring-2 ring-blue-100">
        </div>
        <div class="grid gap-3 flex-1">
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs text-gray-400">Posted <time>{{ $comment->created_at->toDayDateTimeString() }}</time>
                </p>
            </header>
            <div class="border-b-2 border-blue-100"></div>
            <p class="text-sm">{{ $comment->body }}</p>
        </div>
    </x-panel>
</article>
