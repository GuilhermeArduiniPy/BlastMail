@props([
'post' => null,
'flat' => false,
'delete' => null,
])

@php
$method = $post || $delete ? 'post' : 'get';

@endphp

<form {{$attributes->class(['gap-4 flex flex-col' => !$flat]) }} method="{{$method}}">
    @if($method != 'get')
    @csrf
    @endif
    @if($delete)
    @method('Delete')
    @endif
    {{ $slot }}
</form>