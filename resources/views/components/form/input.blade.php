@props(['name'])
<div>
    <x-form.label name="{{ $name }}" />
    <input name={{ $name }} id={{ $name }} {{ $attributes(['value' => old($name)]) }}
        class="border-2 border-gray-200 p-2 w-full rounded-md" />
    <x-form.error name="{{ $name }}" />
</div>
