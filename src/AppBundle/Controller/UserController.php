<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * Login page
     *
     * @param Request $request
     *
     * @Route("/login", name="login", methods={"GET", "POST"})
     *
     * @return mixed
     */
    public function loginAction(Request $request)
    {
       $authenticationUtils = $this->get('security.authentication_utils');
       $error = $authenticationUtils->getLastAuthenticationError();
       $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(':auth:login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * List users
     *
     * @Route("/users", name="list_user", methods={"GET"})
     */
    public function listAction()
    {
        $users = $this->getDoctrine()->getRepository("AppBundle:User")
            ->findBy([], null, 20, 0);

        return $this->render(':user:list.html.twig', [
            'users' => $users,
            'isUser' => true,
        ]);
    }

    /**
     * Registration page
     *
     * @param Request $request
     *
     * @Route("/registration", name="registration", methods={"GET", "POST"})
     *
     * @return mixed
     */
    public function registrationAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl("registration"),
            'method' => 'post',
        ]);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('list_user');
        }

        return $this->render(':auth:registration.html.twig', [
            'form' => $form->createView(),
            'isUser' => true,
        ]);
    }
}
