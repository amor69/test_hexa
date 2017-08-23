<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 23/08/17
 * Time: 10:05
 */

namespace Infrastructure\Bundle\AppBundle\Form\EventListner;


use Application\Command\HydratableCommandInterface;
use Application\CommandHydrator\CommandHydrator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PrePopulateFormDataSuscriber implements EventSubscriberInterface
{
    private $hydrator;

    public function __construct(CommandHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'onPreSetData'];
    }

    public function onPreSetData(FormEvent $event)
    {
        $formData = $event->getData();

        if (!$formData instanceof HydratableCommandInterface) {
            return;
        }

        $this->hydrator->hydrateCommand($formData);
    }
}