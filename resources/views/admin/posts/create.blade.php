<x-layout>
    <x-setting heading="Create a new post">
        <form action="/admin/posts" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <div>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" required
                    class="border-2 border-gray-200 p-2 w-full rounded-md">
                    @php
                        $categories = App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </div>


            <button
                class="block  capitalize font-bold text-xs text-gray-700 w-full p-4 border-2 border-gray-200 hover:border-gray-300 bg-gray-100 rounded-md"
                type="submit">
                Publish
            </button>

        </form>
    </x-setting>
</x-layout>
