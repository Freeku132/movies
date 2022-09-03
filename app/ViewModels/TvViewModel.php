<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatedTv;
    public $genres;

    public function __construct($popularTv, $topRatedTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv)->dump();
    }

    public function topRatedTv()
    {
        return $this->formatTv($this->topRatedTv)->dump();
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys( function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tv)
    {



        return collect($tv)->map(function ($tv){
            $genresFormatted = collect($tv['genre_ids'])->mapWithKeys(function ($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($tv)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tv['poster_path'],
                'vote_average' => $tv['vote_average']*10 . ' %',
                'genres' => $genresFormatted,
                'first_air_date' => \Carbon\Carbon::parse($tv['first_air_date'])->format('M d, Y'),
            ])->only([
                'id',
                'name',
                'original_name',
                'poster_path',
                'vote_average',
                'genres',
                'genre_ids',
                'overview',
                'first_air_date'
            ]);
        });
    }

}
