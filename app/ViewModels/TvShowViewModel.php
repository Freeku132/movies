<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvShow;

    public function __construct($tvShow)
    {
        $this->tvShow = $tvShow;
    }

    public function tvShow()
    {
        $crew = collect($this->tvShow['credits']['crew'])->take(2);
        $cast = collect($this->tvShow['credits']['cast'])->take(10);
        $images = collect($this->tvShow['images']['backdrops'])->take(15);

        return collect($this->tvShow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->tvShow['poster_path'],
            'vote_average' => $this->tvShow['vote_average']*10 . ' %',
            'first_air_date' => \Carbon\Carbon::parse($this->tvShow['first_air_date'])->format('M d, Y'),
            'crew' => $crew,
            'cast' => $cast,
            'images' => $images,
            'genres' => collect($this->tvShow['genres'])->pluck('name')->flatten()->implode(', ')
        ])->only([
            'id',
            'name',
            'tagline',
            'videos',
            'original_name',
            'poster_path',
            'vote_average',
            'first_air_date',
            'genres',
            'overview',
            'crew',
            'cast',
            'images',
            'created_by'
        ])->dump();

    }
}
