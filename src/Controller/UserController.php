<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\UserStatus;
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
    public function subscribe()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $statusRepository = $this->getDoctrine()
            ->getRepository(UserStatus::class);


        $user = new User();
        $user->setSubscriptionBirthday(new \DateTime(date("Y-m-d")));
        $user->setName("Kegler");
        $user->setFirstname("Adrien");
        $user->setBirthday(new \DateTime("1998-04-19"));
        $user->setMail("adrien.kegler@gmail.com");
        $user->setPassword(password_hash("password", PASSWORD_DEFAULT));
        $user->setStatus($statusRepository->find(1));


        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'message' => 'You registered !'
        ]);
    }
}
