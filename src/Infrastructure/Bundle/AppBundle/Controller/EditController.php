<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Command\User\EditUserCommand;
use Application\Query\ShowUserQuery;
use Application\Query\ListUserQuery;
use Infrastructure\Bundle\AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditController extends AbstractUserController
{

    public function editAction(Request $request)
    {
        $user = $this->commandBus->handle(new ShowUserQuery($request->get('id')));

        $userId = $request->get('id');

        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();

        $command = new EditUserCommand($userId, $firstname, $lastname);

        $form = $this->formFactory->create(UserType::class, $command);
        $form->handleRequest($request);

        if($form->isValid()) {
            $this->commandBus->handle($command);

            return $this->redirectRoute('user_index');
        }

        return new Response($this->twig->render('@App/user/edit.html.twig', [
            'edit_form' => $form->createView(),
            'user' => $user,
        ]));
    }
}
