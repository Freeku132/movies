<div class="mt-8">
    <a href="{{route('tv.show' , $tv['id'])}}">
        <img src="{{$tv['poster_path']}}" alt="poster_img" class="hover:opacity-50 transition ease-in-out duration-100"/>
        <div class="mt-2">
            <a href="{{route('tv.show' , $tv['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$tv['name']}} ({{$tv['original_name']}})</a>
            <div class="mt-1 flex items-center text-gray-400 text-sm">
                            <span class="ml-1">
                            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                            </span>
                <span class="ml-1">{{$tv['vote_average']}}</span>
                <span class="mx-2">|</span>
                <span class="">{{$tv['first_air_date']}}</span>
            </div>
            <div class=" flex items-center text-gray-400 text-xs">
                <span>{{$tv['genres']}} </span>
                {{--                @foreach($movie['genres'] as $genre){{$genre['genres']}}@if(!$loop->last),@endif @endforeach--}}
            </div>
        </div>
    </a>
</div>
