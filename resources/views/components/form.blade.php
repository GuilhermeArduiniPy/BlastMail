@props([
'post' => null,
])

@php
$method = $post ? 'post' : 'get';
@endphp

<form {{$attributes}} method="{{$method}}">
    @csrf
    {{ $slot }}
</form>