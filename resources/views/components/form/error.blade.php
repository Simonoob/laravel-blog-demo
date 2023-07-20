@props(['name'])
@error($name)
    <p class="text-red-600 text-xs rounded-md ring-2 ring-red-200 bg-red-50 p-2 mt-2">
        {{ $message }}
    </p>
@enderror
