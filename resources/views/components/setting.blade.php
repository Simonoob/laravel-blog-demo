@props(['heading'])
<main class="max-w-4xl mx-auto mt-6 lg:mt-20 space-y-6">
    <section class="mx-auto space-y-6">
        <h1 class="font-bold text-xl border-b mb-8 pb-2">{{ $heading }}</h1>

        <div class="flex gap-8">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4 text-md">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/posts"
                            class="text-sm {{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts </a>
                    </li>
                    <li>
                        <a href="/admin/posts/create"
                            class="text-sm {{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New
                            Post</a>
                    </li>
                </ul>
            </aside>


            <x-panel class="grid flex-1">
                {{ $slot }}
            </x-panel>
        </div>
    </section>
</main>
