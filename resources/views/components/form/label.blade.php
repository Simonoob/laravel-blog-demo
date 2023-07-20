@props(['name'])
<label for="{{ $name }}" class="block capitalize font-bold text-xs text-gray-700">

    {{ ucwords($name) }}
</label>
