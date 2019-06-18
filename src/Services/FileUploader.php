<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 17.06.2019
 * Time: 16:43
 */

namespace App\Services;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $directory;

    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    public function getDirectory()
    {
        return $this->directory;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        try{
            $file->move($this->getDirectory(), $fileName);
        } catch (FileException $e){

        }
        return $fileName;
    }
}