<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\UserStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/api/user", name="user")
     */
    public function index()
    {
        return $this->json(getdate());
    }

    /**
     * @Route("/api/user/subscribe", name="user")
     */
    public function register(Request $request)
    {
        $post = json_decode($request->getContent(), true);

        $entityManager = $this->getDoctrine()->getManager();

        $statusRepository = $this->getDoctrine()
            ->getRepository(UserStatus::class);


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
}
