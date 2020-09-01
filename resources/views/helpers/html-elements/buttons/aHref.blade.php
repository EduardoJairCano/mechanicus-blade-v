<a href="{!! route($route, $obj ?? null) !!}"
   class="{!! $classForButton ?? '' !!}"
   title="{!! $title ?? '' !!}">
    <span class="{!! $classForText ?? '' !!}">
        {!! $message ?? '' !!}
    </span>
</a>
