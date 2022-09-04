<x-layout>
    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex lg:flex-row md:flex-col md:w-100%">
            <div class="lg:w-1/3">
                <img src="https://image.tmdb.org/t/p/w500/{{$tvShow['poster_path']}}" alt="{{$tvShow['name']}}"
                     class=" md:w-full pl-12">
            </div>
            <div class="ml-24 lg:w-1/2 md:w-full">
                <h2 class="text-4xl font-semibold">{{$tvShow['name']}}</h2>
                <div class="mt-2">
                    {{$tvShow['tagline']}}
                </div>
                <div class=" flex mt-1 items-center text-gray-400 text-sm">
                     <span class="ml-1">
                            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path
                                        d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                        data-name="star"/></g></svg>
                            </span>
                    <span class="ml-1">{{$tvShow['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y')}} </span>
                    <span class="mx-2">|</span>
                    <span class="mr-1">
                                    {{$tvShow['genres']}}
                                </span>
                    {{--                    @endforeach--}}
                </div>

                <p class="text-gray-300 mt-8 ">
                    {{$tvShow['overview']}}
                </p>

                <div class="mt-12">
                    @if($tvShow['created_by'])
                    <div class="mt-4 flex">
                        @foreach($tvShow['created_by'] as $crew)
                            <div class="mr-6">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                        @endif

                    </div>
                </div>

                <div class="mt-12">
                    <div x-data="{isOpen: false}">
                        @if (count($tvShow['videos']['results']) > 0)
                            <button
                                @click="isOpen = true"
                                href="https://youtube.com/watch?v={{$tvShow['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-orange-500 text-gray-800 rounded font-semibold px-5 py-4 hover:bg-orange-600
                        transition ease-in-out duration-150">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path
                                        d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                x-show.transition.opacity="isOpen"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @keydown.escape.window="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative"
                                                 style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                                        src="https://www.youtube.com/embed/{{ $tvShow['videos']['results'][0]['key'] }}"
                                                        style="border:0;" allow="autoplay; encrypted-media"
                                                        allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tv-cast border-b border-gray-500">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-16 ">
                @foreach($tvShow['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{route('actors.show', $cast['id'])}}">
                            <img src="https://image.tmdb.org/t/p/w500//{{$cast['profile_path']}}"
                                 alt="{{$cast['name']}}" class="hover:opacity-50 transition ease-in-out duration-100"/>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $cast['id'])}}"
                                   class="text-lg mt-2 hover:text-gray-300">{{$cast['original_name']}}</a>
                                <div class="mt-1 flex items-center text-gray-400 text-sm">
                                    <span class="ml-1">{{$cast['character']}}</span>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="tv-images border-b border-gray-500" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold mb-12">Images</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-16 ">
                @foreach($tvShow['images'] as $image)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                        isOpen = true
                        image = 'https://image.tmdb.org/t/p/original/{{$image['file_path']}}'
                        "
                            href="#">
                            <img src="https://image.tmdb.org/t/p/w500/{{$image['file_path']}}" alt="tv_image"
                                 class="hover:opacity-50 transition ease-in-out duration-100"/>
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show.transition.opacity="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
