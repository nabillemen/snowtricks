<?php

namespace CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Avatar
 *
 * @ORM\Table(name="avatar")
 * @ORM\Entity(repositoryClass="CommunityBundle\Repository\AvatarRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Avatar implements \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    private $name;

    /**
     * @Assert\Image(
     *      mimeTypesMessage = "avatar.file.invalid",
     *      minWidth = 60,
     *      minHeight = 60,
     *      minWidthMessage = "avatar.file.min_width",
     *      minHeightMessage = "avatar.file.min_height",
     *      minRatio = 1,
     *      maxRatio = 2,
     *      minRatioMessage = "avatar.file.ratio",
     *      maxRatioMessage = "avatar.file.ratio"
     * )
     */
    private $file;

    private $oldName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Avatar
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set file
     *
     * @param \Symfony\Component\HttpFoundation\File\File $file
     *
     * @return Avatar
     */
    public function setFile(File $file)
    {
        $this->file = $file;
        $this->setUpdatedAt(new \DateTime());

        return $this;
    }

    /**
     * Get file
     *
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function loadExtension()
    {
        if (null !== $this->file) {
            $this->extension = $this->file->guessExtension();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function loadOldName()
    {
        $this->oldName = $this->getName();
    }


    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     * @ORM\PostLoad
     */
    public function loadName()
    {
        $this->name = $this->id . (!empty($this->extension) ? '.'.$this->extension : '');
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Avatar
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getOldName()
    {
        return $this->oldName;
    }

    /**
     * @Assert\Callback()
     */
    public function completeFileValidation(ExecutionContextInterface $context)
    {
        if ($this->id === null) {
            $constraint = new NotNull(array(
                'message' => 'avatar.file.null'
            ));
            $context
                ->getValidator()
                ->inContext($context)
                ->atPath('file')
                ->validate($this->file, $constraint)
            ;
        }
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->extension,
        ));
    }

    public function unserialize($serialized)
    {
       list (
           $this->id,
           $this->extension,
       ) = unserialize($serialized);
    }
}
