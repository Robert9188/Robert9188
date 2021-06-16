<div class="m-4">
    <div class="container overflow-y-auto max-h-[65vh]">
        @foreach($dashContent as $content)
            <div id="{{$content['id']}}" class="h-96">
                <div class="">
                    {{$content['content']}}
                </div>
            </div>
        @endforeach
    </div>
</div>
