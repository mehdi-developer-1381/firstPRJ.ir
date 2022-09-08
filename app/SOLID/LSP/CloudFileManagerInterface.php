<?php

namespace App\SOLID\LSP;

interface CloudFileManagerInterface extends FileManagerInterface
{
    public function download();

    public function reload();

    public function openNewPage();

}
