@props(['active' => false])

@php
$classes = "block py-2 px-3 text-xs hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
if ($active) $classes .= " bg-blue-500 text-white";
@endphp

<a {{$attributes(['class'=> $classes])}}>{{$slot}}</a>
