@props([
'post' => null,
])

@php
$method = $post ? 'post' : 'get';
@endphp

<form {{$attributes->class(['gap-4 flex flex-col'])}} method="{{$method}}">
    @if($method != 'get')
    {
    @csrf
    }
    @endif
    {{ $slot }}
</form>