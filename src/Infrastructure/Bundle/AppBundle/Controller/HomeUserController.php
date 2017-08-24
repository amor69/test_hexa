<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Query\ListUserQuery;
use Symfony\Component\HttpFoundation\Response;

class HomeUserController extends AbstractUserController
{

    public function indexAction()
    {
        $users = $this->commandBus->handle(new ListUserQuery());

        return new Response($this->twig->render('@App/user/index.html.twig', [
            "users" => $users,
        ]));
    }
}
