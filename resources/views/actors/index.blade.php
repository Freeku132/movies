<x-layout>
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">POPULAR ACTORS</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-16 ">
                    @foreach($popularActors as $actor)
                    <div class="actor mt-8">
                    <a href="{{route('actors.show', $actor['id'])}}">
                        <img src="{{$actor['profile_path']}}" alt="actor_img" class="hover:opacity-50 transition ease-in-out duration-100"/>
                        <div class="mt-2">
                            <a href="{{route('actors.show', $actor['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$actor['name']}}</a>
                            <div class="mt-1 flex items-center text-gray-400 text-sm truncate">
                                <div class="text-xs text-gray-400 truncate">
                                        {{$actor['known_for']}}
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
            </div>

            <div class="page-load-status">
                <div class="flex justify-center mt-20">
                    <p class="infinite-scroll-request spinner text-4xl">Loading...</p>
                </div>
                <p class="infinite-scroll-last text-xl">End of content</p>
                <p class="infinite-scroll-error mb-10 text-xl">No more pages to load</p>
            </div>
        </div>


{{--                @if($previous)--}}
{{--                    <a href="/actors/page/{{ $previous }}" class="ml-10">Previous</a>--}}
{{--                @else--}}
{{--                    <button></button>--}}
{{--                @endif--}}
{{--                @if($next)--}}
{{--                    <a href="/actors/page/{{$next}}" class="mr-10">Next</a>--}}
{{--                @else--}}
{{--                    <button></button>--}}
{{--                @endif--}}
    </div>



    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>


    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            scrollThreshold: 100,
            status: '.page-load-status',
            // history: false,
        });

        // element argument can be a selector string
        //   for an individual element

    </script>

</x-layout>

