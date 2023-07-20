@props(['name'])
<div>
    <x-form.label name="{{ $name }}" />
    <textarea name="{{ $name }}" id="body" required class="border-2 border-gray-200 p-2 w-full rounded-md">
    {{ $slot ?? old($name) }}
    </textarea>
    <x-form.error name="{{ $name }}" />
</div>
