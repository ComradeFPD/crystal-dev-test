<?php

namespace App\Controller;


use App\Entity\Photo;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PhotosController extends AbstractController
{
    /**
     * @Route("/photos/upload", name="upload_photo")
     *
     * @param Request $request
     *
     */
    public function upload(Request $request, FileUploader $fileUploader)
    {
        $files = $request->files->get('file');
        if($files){
            foreach ($files as $file){
                $manager = $this->getDoctrine()->getManager();
                $photo = new Photo();
                $fileName = $fileUploader->upload($file);
                $photo->setPathToImage($fileName);
                $manager->persist($photo);
                $manager->flush();
            }
        }

        return $this->render('photos/upload.html.twig');
    }

    /**
     * @Route("/photos/view")
     */
    public function view()
    {
        $photos = $this->getDoctrine()->getRepository(Photo::class)->findAll();
        return $this->render('/photos/view.html.twig', [
            'photos' => $photos
        ]);
    }
}