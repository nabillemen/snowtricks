<?php

namespace SnowTricksBundle\DoctrineListeners;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use SnowTricksBundle\Entity\Image;

class ImageCreationListener
{
    private $imageDir;

    public function __construct($imageDir)
    {
        $this->imageDir = $imageDir;
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image))
        {
            return;
        }

        if(null !== $image->getFile())
        {
            $image->getFile()->move($this->imageDir, $image->getName());
        }
    }

    public function postRemove(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image))
        {
            return;
        }

        $absolutePath = $this->imageDir . '/' . $image->getName();

        if(file_exists($absolutePath))
        {
            unlink($absolutePath);
        }
    }
}
