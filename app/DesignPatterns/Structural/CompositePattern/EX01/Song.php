<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX01;



class Song implements Music
{
    protected $title, $artist, $path;

    /**
     * @param string $title
     * @param string $artist
     * @param string $path
     */

    public function __construct(string $title, string $artist, string $path)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->path = $path;
    }

    public function play()
    {
        echo $this->path;
    }
}
