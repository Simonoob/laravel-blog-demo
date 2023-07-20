<x-layout>
    <x-setting heading="Manage Posts">

        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    ID</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach ($posts as $post)
                                <tr>
                                    <td class=" px-3 py-5 text-sm text-gray-500">
                                        <a href="/posts/{{ $post->slug }}"
                                            class="hover:text-blue-500">{{ $post->title }}</a>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <span
                                            class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium">{{ $post->id }}</span>
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500">Edit</a>
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-gray-500 hover:text-red-500 ml-12 text-xs">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{ $posts->links() }}
    </x-setting>
</x-layout>
