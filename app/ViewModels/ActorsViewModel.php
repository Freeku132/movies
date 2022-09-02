<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
    public $popularActors;
    public $page;
    public $popularActorsDef;

    public function __construct($popularActors, $page, $popularActorsDef)
    {
        $this->popularActors = $popularActors;
        $this->page = $page;
        $this->popularActorsDef = $popularActorsDef;
    }

    public function popularActors()
    {
//        $known_for = collect($this->popularActors)->map(function ($actor) {
//            return collect($actor['known_for'])->map(function ($movie) {
//                return ['title' => isset($movie['title']) ? $movie['title'] : $movie['name']];
//            }
//            );
//        })->dump();


        return collect($this->popularActors)->map(function ($actor) {
            $known_for =  collect($actor['known_for'])->map(function ($movie) {
                return ['title' => isset($movie['title']) ? $movie['title'] : $movie['name']];
            }
            );
            return collect($actor)->merge([
                'profile_path' => "https://image.tmdb.org/t/p/w500/{$actor['profile_path']}",
                'known_for' => $known_for->pluck('title')->implode(', ')
            ])->only([
                'name',
                'id',
                'profile_path',
                'known_for'
            ]);
        })->dump();
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page -1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page +1 : null;
    }
}
