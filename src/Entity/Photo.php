<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path_to_image;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPathToImage(): ?string
    {
        return $this->path_to_image;
    }

    public function setPathToImage(string $path_to_image): self
    {
        $this->path_to_image = $path_to_image;

        return $this;
    }
}
