<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\UserStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

class UserController extends Controller
{
    public function index()
    {
        return $this->json(getdate());
    }


    public function register(Request $request)
    {
        $post = json_decode($request->getContent(), true);

        $entityManager = $this->getDoctrine()->getManager();

        $statusRepository = $this->getDoctrine()
            ->getRepository(UserStatus::class);

        $duplicata = $this->getDoctrine()->getRepository(User::class)->findOneByEMail($post["email"]);
        if (!empty($duplicata)) {
            return new JsonResponse(["message" => "This e-mail is already recorded", "userPrompt" => true], 409);
        }


        $user = new User();
        $user->setSubscriptionBirthday(new \DateTime(date("Y-m-d")));
        $user->setName($post["name"]);
        $user->setFirstname($post["firstName"]);
        $user->setBirthday(new \DateTime($post["birthday"]));
        $user->setMail($post["email"]);
        $user->setPassword(password_hash($post["password"], PASSWORD_DEFAULT));
        $user->setStatus($statusRepository->find(1));

        $entityManager->persist($user);
        $entityManager->flush();
        return $this->json([
            'message' => 'You registered !'
        ]);
    }


    public function getUser($id = null)
    {
        $user = $this->json($this->getDoctrine()
            ->getRepository(User::class)
            ->findOneById($id));

        return empty($user)
            ? new JsonResponse(["message" => "No user found with this ID", "userPrompt" => false], 404)
            : $user;
    }
}
