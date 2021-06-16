@props([
'disabled' => false,
'options' => null
])


<div class="">{{$options}}</div>
<select name="state"
        id="state"
    {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
>
    @if($options !== null)
        @foreach($options as $option)
            <option value="{{$option}}">{{$option.name}}</option>
        @endforeach
    @endif
</select>
