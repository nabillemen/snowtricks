<?php

namespace SnowTricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="SnowTricksBundle\Repository\VideoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Video
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
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity="Trick", inversedBy="videos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    /**
     * @Assert\Regex(pattern = "#^<iframe .* src=.*></iframe>|<embed .* src=.*></embed>$#",
     *      message = "video.tag.regex")
     */
    private $tag;

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
     * Set link
     *
     * @param string $link
     *
     * @return Video
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set trick
     *
     * @param \SnowTricksBundle\Entity\Trick $trick
     *
     * @return Video
     */
    public function setTrick(\SnowTricksBundle\Entity\Trick $trick = null)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * Get trick
     *
     * @return \SnowTricksBundle\Entity\Trick
     */
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Video
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function parseTag()
    {
        preg_match('#src="(.*?)"#', $this->tag, $subpatterns);
        $this->link = isset($subpatterns[1]) ? $subpatterns[1] : '';
    }

    /**
     * @Assert\Callback()
     */
    public function completeTagValidation(ExecutionContextInterface $context)
    {
        if ($this->id === null) {
            $constraint = new NotNull(array(
                'message' => 'video.tag.null'
            ));
            $context
                ->getValidator()
                ->inContext($context)
                ->atPath('tag')
                ->validate($this->tag, $constraint)
            ;
        }
    }
}
