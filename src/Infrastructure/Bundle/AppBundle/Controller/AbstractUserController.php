<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 12:36
 */

namespace Infrastructure\Bundle\AppBundle\Controller;

use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractUserController
{
    protected $twig;
    protected $commandBus;
    protected $formFactory;
    protected $urlGenerator;

    public function __construct(\Twig_Environment $twig, CommandBus $commandBus, FormFactoryInterface $formFactory, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->commandBus = $commandBus;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    abstract protected static function getRoutePrefix();

    protected function redirectRoute($name, array $params, $type = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return new RedirectResponse(
            $this->urlGenerator->generate(sprintf('%s%s', $this->getRoutePrefix(), $name), $params, $type)
        );
    }
}
