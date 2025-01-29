<button
    @php
        $type = $type ?? 'submit';
    @endphp
    type = {{$type}}
    {{$attributes->merge(['class' => "btn flex items-center justify-center gap-2 $class"])}}
>
    @if (isset($icon))
        <span>{!! $icon !!}</span>
       
    @endif
</button>