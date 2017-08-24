<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Query\ShowUserQuery;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends AbstractUserController
{
    public function showAction(Request $request)
    {
        $user = $this->commandBus->handle(new ShowUserQuery($request->get('id')));

        return new Response($this->twig->render('@App/user/show.html.twig', [
            'user' => $user,
        ]));
    }
}
