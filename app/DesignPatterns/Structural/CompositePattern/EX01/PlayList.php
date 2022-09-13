<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX01;

class PlayList implements Music
{
    protected array $songs;
    protected int $currentTrack= 0;

    public function addSong(Music $music)
    {
        $this->songs[]= $music;

    }

    public function play()
    {
        return $this->songs[$this->currentTrack]->play();
    }

    public function next()
    {
        if(isset($this->songs[$this->currentTrack+1]))
        {
            $this->currentTrack++;
        }
    }

    public function previous()
    {
        if(!$this->currentTrack == 0)
        {
            $this->currentTrack--;
        }
    }
}
