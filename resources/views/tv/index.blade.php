<x-layout>
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-16 ">
                @foreach($popularTv as $tv)
                    <x-tv-card :tv="$tv"/>
                @endforeach
            </div>
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mt-16">Top Rated Shows</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-16 ">
                @foreach($topRatedTv as $tv)
                    <x-tv-card :tv="$tv"/>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
