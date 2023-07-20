<x-layout>
    <x-setting heading="Edit post '{{ $post->title }}'">
        <form action="/admin/posts/{{ $post->id }}/edit" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" value="{{ $post->title }}" />

            <x-form.input name="slug" value="{{ $post->excerpt }}" />

            <div class="flex relative gap-4 items-center">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt=""
                    class="rounded-sm w-20 h-20 object-contain">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" class="flex-1" />
            </div>

            <x-form.textarea name="excerpt">
                {{ old('body', $post->excerpt) }}
            </x-form.textarea>

            <x-form.textarea name="body">
                {{ old('body', $post->body) }}
            </x-form.textarea>


            <div>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" required
                    class="border-2 border-gray-200 p-2 w-full rounded-md">
                    @php
                        $categories = App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </div>


            <button
                class="block  capitalize font-bold text-xs text-gray-700 w-full p-4 border-2 border-gray-200 hover:border-gray-300 bg-gray-100 rounded-md"
                type="submit">
                Update
            </button>

        </form>
    </x-setting>
</x-layout>
