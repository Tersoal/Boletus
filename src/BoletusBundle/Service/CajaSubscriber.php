<?php

namespace BoletusBundle\Service;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use BoletusBundle\Entity\Caja;

/**
 * CajaSubscriber
 *
 */
class CajaSubscriber implements EventSubscriber
{   
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
        );
    }

    public function prePersist(LifeCycleEventArgs $args)
    {
        $this->calculateVolume($args);
    }

    public function preUpdate(LifeCycleEventArgs $args)
    {
        $this->calculateVolume($args);
    }

    public function calculateVolume($args)
    {
        $entity = $args->getObject();

        if ($entity instanceof Caja) {
            $this->setVolume($entity);
        }
    }

    public function setVolume($entity)
    {
        if (!method_exists($entity, 'setVolume')) {
            return;
        }

        $volume = $entity->getWidth() * $entity->getHeight() * $entity->getLength();

        $entity->setVolume($volume);
    }

}
