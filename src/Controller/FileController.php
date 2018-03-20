<?php

namespace App\Controller;

use App\Entity\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FileController extends Controller
{
    /**
     * @Route("/api/file", name="file")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FileController.php',
        ]);
    }

    public function saveFile()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $file = new File();
        $file->setName("Haloa !");
        $file->setIsPrivate(FALSE);
        $file->setPath("RandomPath");
        $file->setUploader(1);
        $file->setWeight(125631);
        $file->incrementSeen();
        $file->incrementDownloaded();


        // tell Doctrine you want to save the file (no queries yet)
        $entityManager->persist($file);

        // actually executes the queries
        $entityManager->flush();

        return json_encode($file);

    }

    public function getFile($id)
    {
        return $this->json([
            'message' => 'Your file !',
            'path' => 'src/Controller/FileController.php',
        ]);
    }
}
