<?php

namespace SnowTricksBundle\Doctrine;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Utils\Resizer;
use SnowTricksBundle\Entity\Image;

class ImageManagementListener
{
    private $imageDir;

    public function __construct($imageDir)
    {
        $this->imageDir = $imageDir;
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image)) {
            return;
        }

        $this->save($image);
    }

    public function postRemove(LifecycleEventArgs $eventArgs)
    {
        $image = $eventArgs->getObject();

        if(!($image instanceof Image)) {
            return;
        }

        $this->remove($this->imageDir . $image->getName());
    }

    private function save(Image $image)
    {
        if(null !== $image->getFile()) {
            $image->getFile()->move($this->imageDir, $image->getName());
            Resizer::crop($this->imageDir . $image->getName(), 640, 360);
        }
    }

    private function remove($absolutePath)
    {
        if(file_exists($absolutePath)) {
            unlink($absolutePath);
        }
    }
}
