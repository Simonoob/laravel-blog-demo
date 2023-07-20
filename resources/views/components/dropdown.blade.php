@props(['trigger'])
<div x-data="{ show: false }" @click.away="show = false" class="w-fit relative">

    {{-- trigger --}}

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- links --}}
    <div x-show="show" class="absolute mt-2 bg-gray-100 rounded-xl w-full z-50 max-h-52 overflow-auto">
        {{ $slot }}
    </div>
</div>
