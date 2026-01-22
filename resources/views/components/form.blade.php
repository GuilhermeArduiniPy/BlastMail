@props([
'post' => null,
'flat' => false,
'delete' => null,
'put' => null
])

@php
$method =( $post or $delete or $put) ? 'post' : 'get';

@endphp

<form method="{{$method}}" {{ $attributes->merge(['class' => !$flat ? 'gap-4 flex flex-col' : '']) }} >
    @if($method != 'get')
      @csrf
    @endif

    @if($delete)
            @method('Delete')
    @endif

    @if($put)
        @method('PUT')
    @endif

    {{ $slot }}
</form>
