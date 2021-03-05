<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\StaffType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use \DateTime;
use App\Recaptcha\RecaptchaValidator;
use Symfony\Component\Form\FormError;
use App\Entity\Config;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, RecaptchaValidator $recaptcha): Response
    {
        $repository = $this->getDoctrine()->getRepository(Config::class);
        $actualConfig = $repository->findOneBy(array(),array('id'=>'ASC'),1,0);

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if(!$recaptcha->verify( $request->request->get('g-recaptcha-response'), $request->server->get('REMOTE_ADDR') )){

                // Ajout d'une nouvelle erreur manuellement dans le formulaire
                $form->addError(new FormError('Le Captcha doit être validé !'));
            }

            if ($form->isValid()){
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                // Set regitration datetime
                $user->setlastConnexion(
                    new DateTime()
                );

                // Set initial suspended statut
                $user->setsuspended(
                    0
                );

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                // do anything else you need here, like send an email

                // message de validation d'inscription
                $this->addFlash('registerSuccess', 'Félicitation votre inscription est validé!');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'config' => $actualConfig,
        ]);
    }

    /**
     * @Route("/adduser", name="addusers")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function addUsers(Request $request, UserPasswordEncoderInterface $passwordEncoder, RecaptchaValidator $recaptcha): Response
    {
        $repository = $this->getDoctrine()->getRepository(Config::class);
        $actualConfig = $repository->findOneBy(array(),array('id'=>'ASC'),1,0);

        $user = new User();
        $form = $this->createForm(StaffType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            dump($form);

            if ($form->isValid()){
                // encode the plain password
                dump($user);

                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                // Set regitration datetime
                $user->setlastConnexion(
                    new DateTime()
                );

                // Set initial suspended statut
                $user->setsuspended(
                    0
                );

                // Set initial suspended statut
                $user->setRoles(["ROLE_ADMIN"]);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                // do anything else you need here, like send an email

                //Message de succes
                $this->addFlash('addUserSuccess', 'Nouvel utilisateur enregistré dans l\'équipe');
            }

        }

        return $this->render('main/createUser.html.twig', [
            'form' => $form->createView(),
            'config' => $actualConfig,
        ]);
    }
}
