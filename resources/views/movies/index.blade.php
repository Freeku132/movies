<x-layout>
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">POPULAR MOVIES</h2>
        <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-16 ">
            @foreach($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach
        </div>
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mt-16">NOW PLAYING</h2>
        <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-16 ">
            @foreach($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie"/>
            @endforeach
        </div>
    </div>
</div>
</x-layout>
