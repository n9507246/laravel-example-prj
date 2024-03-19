@props(['rows' => 5,  'cols'=> 20])

<textarea
    {!! $attributes->merge(
        ['class' => 'mt-1 block w-full 
            border-gray-300 focus:border-indigo-500 
            focus:ring-indigo-500 rounded-md shadow-sm',
            'rows' => $rows, 'cols' => $cols
        ]) 
    !!}
>{{$slot}}</textarea>