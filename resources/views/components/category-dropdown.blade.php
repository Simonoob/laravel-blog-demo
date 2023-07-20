<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button class="relative flex justify-between items-center bg-gray-100 rounded-xl py-2 px-3 text-sm font-semibold w-full min-w-full">
                {{ isset($currentCategory)  ? ucwords($currentCategory->name) : 'Categories'}}
                <x-icon name="down-arrow" class="relative pointer-events-none" />
            </button>
        </x-slot>
        <x-dropdown-item href="/?{{http_build_query(request()->except('category', 'page'))}}" :active="!isset($currentCategory)">All</x-dropdown-item>
        @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}" :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ucwords($category->name)}}</x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
