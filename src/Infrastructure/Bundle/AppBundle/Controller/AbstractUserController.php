<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 12:36
 */

namespace Infrastructure\Bundle\AppBundle\Controller;

use Application\Command\User\DeleteUserCommand;
use Application\Query\ShowUserQuery;
use Application\Query\UserQuery;
use Domain\User\User;
use Infrastructure\Bundle\AppBundle\Form\UserType;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Application\Command\User\CreateUserCommand;

abstract class AbstractUserController
{
    private $twig;
    private $commandBus;
    private $formFactory;
    private $urlGenerator;

    public function __construct(\Twig_Environment $twig, CommandBus $commandBus, FormFactoryInterface $formFactory, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->commandBus = $commandBus;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    public function indexAction()
    {
        $users = $this->commandBus->handle(new UserQuery());

        return new Response($this->twig->render('@App/user/index.html.twig', [
            "users" => $users,
        ]));
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

    public function showAction(Request $request)
    {
        $user = $this->commandBus->handle(new ShowUserQuery($request->get('id')));

        return new Response($this->twig->render('@App/user/show.html.twig', [
            'user' => $user,
        ]));
    }

    public function deleteAction(Request $request)
    {
        $userId = $request->get('id');

        $users = $this->commandBus->handle(new UserQuery());

        $command = new DeleteUserCommand($userId);
        $this->commandBus->handle($command);

        return $this->redirectRoute('user_index', [
            'users' => $users
        ]);
    }

    abstract protected static function getRoutePrefix();

    private function redirectRoute($name, array $params, $type = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return new RedirectResponse(
            $this->urlGenerator->generate(sprintf('%s%s', $this->getRoutePrefix(), $name), $params, $type)
        );
    }
}