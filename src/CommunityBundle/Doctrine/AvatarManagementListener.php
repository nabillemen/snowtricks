<?php

namespace CommunityBundle\Doctrine;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Utils\Resizer;
use CommunityBundle\Entity\Avatar;

class AvatarManagementListener
{
    private $avatarDir;

    public function __construct($avatarDir)
    {
        $this->avatarDir = $avatarDir;
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $avatar = $eventArgs->getObject();

        if(!($avatar instanceof Avatar)) {
            return;
        }

        $this->save($avatar);
    }

    public function postUpdate(LifecycleEventArgs $eventArgs)
    {
        $avatar = $eventArgs->getObject();

        if(!($avatar instanceof Avatar)) {
            return;
        }

        $this->remove($this->avatarDir . $avatar->getOldName());
        $this->save($avatar);
    }

    public function postRemove(LifecycleEventArgs $eventArgs)
    {
        $avatar = $eventArgs->getObject();

        if(!($avatar instanceof Avatar)) {
            return;
        }

        $this->remove($this->avatarDir . $avatar->getName());
    }

    private function save(Avatar $avatar)
    {
        if(null !== $avatar->getFile()) {
            $avatar->getFile()->move($this->avatarDir, $avatar->getName());
            Resizer::crop($this->avatarDir . $avatar->getName(), 60, 60);
        }
    }

    private function remove($absolutePath)
    {
        if(file_exists($absolutePath)) {
            unlink($absolutePath);
        }
    }
}
