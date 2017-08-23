<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 14:40
 */

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Command\User\CreateUserCommand;
use Infrastructure\Bundle\AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController extends AbstractUserController
{
    public static function getRoutePrefix()
    {
    }

    public function createUser(Request $request)
    {
        $firstname = "";
        $lastname = "";

        $command = new CreateUserCommand($firstname, $lastname);

        $form = $this->formFactory->create(UserType::class, $command);
        $form->handleRequest($request);

        if($form->isValid()) {
            $this->commandBus->handle($command);

            return $this->redirectRoute('user_index', ['firstname' => $firstname, 'lastname' => $lastname]);
        }

        return new Response($this->twig->render('@App/user/new.html.twig', [
            'form' => $form->createView(),
            'firstname' => $firstname,
            'lastname' => $lastname
        ]));
    }
}