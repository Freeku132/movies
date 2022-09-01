<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public $genres;
    public function __construct($movie)
    {
        $this->movie = $movie;
    }


    public function movie()
    {
            $crew = collect($this->movie['credits']['crew'])->take(2);
            $cast = collect($this->movie['credits']['cast'])->take(10);
            $images = collect($this->movie['images']['backdrops'])->take(15);

            return collect($this->movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path'],
                'vote_average' => $this->movie['vote_average']*10 . ' %',
                'release_date' => \Carbon\Carbon::parse($this->movie['release_date'])->format('M d, Y'),
                'crew' => $crew,
                'cast' => $cast,
                'images' => $images,
                'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', ')
            ])->only([
                'id',
                'title',
                'tagline',
                'videos',
                'original_title',
                'poster_path',
                'vote_average',
                'release_date',
                'genres',
                'overview',
                'crew',
                'cast',
                'images'
            ]);

    }
}
