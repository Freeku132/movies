<div class="relative" x-data="{ isOpen: true}" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-8 "
        placeholder="Search (Press / to search)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus()
            }"
        @focus="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
        @keydown="isOpen = true"
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>

    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>

    @if(strlen($search) >= 2)
    <div
        class="absolute bg-gray-800 rounded-xl w-full mt-2 z-50"
        x-show.transition.opacity="isOpen"

    >
        <ul>
            @if($searchResults->count() == 0)
                <li class="w-full"><a href="" class="block hover:bg-gray-700 rounded-xl p-2 text-sm">No result for {{$search}}</a></li>
            @else
            @foreach($searchResults as $result)
                @if($loop->first)
                    <li class="border-b-2  border-gray-700 w-full">
                        <a href="{{route('movies.show', $result['id'])}}" class="block rounded-t-xl hover:bg-gray-700 p-2 text-sm flex items-center">
                            @if($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w500/{{$result['poster_path']}}" alt="{{$result['title']}}" width="60" height="60"/>
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif
                            <span class="ml-1">{{$result['title']}}</span>
                        </a>
                    </li>
                @elseif($loop->last)
                    <li class="">
                        <a href="{{route('movies.show', $result['id'])}}"
                           @keydown.tab="isOpen = false"
                           @keydown.shift.tab="isOpen = true"
                           class="block hover:bg-gray-700 rounded-b-xl p-2 text-sm flex itmes-center">
                            @if($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w500/{{$result['poster_path']}}" alt="{{$result['title']}}" width="60" height="60"/>
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif                            <span class="ml-1">{{$result['title']}}</span>
                        </a>
                    </li>
                @else
                    <li class="border-b-2  border-gray-700 w-full">

                        <a href="{{route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 p-2 text-sm flex items-center">
                            @if($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w500/{{$result['poster_path']}}" alt="{{$result['title']}}" width="60" height="60"/>
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif                            <span class="ml-1">{{$result['title']}}</span>
                        </a>
                    </li>
                @endif
            @endforeach
            @endif


        </ul>
    </div>
    @endif
</div>

