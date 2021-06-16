<div class="pl-[.5px]">
    <ul class="space-y-3 my-4">
        @foreach($sidebarLinks as $sidebarLink)
            <li class="py-1 px-6 bg-gray-100">
                <a href="{{$sidebarLink['id']}}" class="">{{$sidebarLink['content']}}</a>
            </li>
        @endforeach
    </ul>

</div>
