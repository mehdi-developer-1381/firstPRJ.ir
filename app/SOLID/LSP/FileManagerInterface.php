<?php

namespace App\SOLID\LSP;

interface FileManagerInterface
{
    public function rename();

    public function move();

    public function copy();

    public function delete();

}
