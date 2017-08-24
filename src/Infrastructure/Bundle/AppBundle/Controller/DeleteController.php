<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Command\User\DeleteUserCommand;
use Application\Query\ListUserQuery;
use Symfony\Component\HttpFoundation\Request;

class DeleteController extends AbstractUserController
{
    public function deleteAction(Request $request)
    {
        $userId = $request->get('id');

        $command = new DeleteUserCommand($userId);
        $this->commandBus->handle($command);

        return $this->redirectRoute('user_index');
    }
}
