<?php

namespace SnowTricksBundle\DoctrineListeners;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use SnowTricksBundle\Utils\Resizer;
use SnowTricksBundle\Entity\Image;

class ImageManagementListener
{
    private $imageDir;
    private $resizer;

    public function __construct($imageDir, Resizer $resizer)
    {
        $this->imageDir = $imageDir;
        $this->resizer = $resizer;
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image)) {
            return;
        }

        if(null !== $image->getFile()) {
            $image->getFile()->move($this->imageDir, $image->getName());
            $this->resizer->crop($this->imageDir . $image->getName(), 640, 360);
        }
    }

    public function postRemove(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image)) {
            return;
        }

        $absolutePath = $this->imageDir . $image->getName();

        if(file_exists($absolutePath)) {
            unlink($absolutePath);
        }
    }
}
