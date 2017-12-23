<?php

namespace CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user",
 *      uniqueConstraints={
 *          @UniqueConstraint(
 *              name="unique_full_name",
 *              columns={"firstname", "lastname"}
 *          )
 *      }
 * )
 * @ORM\Entity(repositoryClass="CommunityBundle\Repository\UserRepository")
 * @UniqueEntity(
 *      fields={"firstname", "lastname"},
 *      message="user.full_name.not_unique",
 *      groups={"Registration", "ProfileEdition"}
 * )
 * @UniqueEntity(
 *      "email",
 *      message="user.email.not_unique",
 *      groups={"Registration"}
 * )
 * @UniqueEntity(
 *      "password",
 *      message="user.password.not_unique",
 *      groups={"Registration", "PasswordReset"}
 * )
 */
class User implements UserInterface
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
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\Length(
     *      min=2,
     *      max=50,
     *      minMessage="user.firstname.min",
     *      maxMessage="user.firstname.max",
     *      groups={"Registration", "ProfileEdition"}
     * )
     * @Assert\NotBlank(
     *      message="user.firstname.not_blank",
     *      groups={"Registration", "ProfileEdition"}
     * )
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\Length(
     *      min=2,
     *      max=50,
     *      minMessage="user.lastname.min",
     *      maxMessage="user.lastname.max",
     *      groups={"Registration", "ProfileEdition"}
     * )
     * @Assert\NotBlank(
     *      message="user.lastname.not_blank",
     *      groups={"Registration", "ProfileEdition"}
     * )
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email(
     *      strict=false,
     *      message="user.email.invalid",
     *      groups={"Registration"}
     * )
     * @Assert\NotBlank(message="user.email.not_blank", groups={"Registration"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, unique=true)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="Avatar", cascade={"all"}, fetch="EAGER", orphanRemoval=true)
     * @Assert\Valid()
     */
    private $avatar;

    /**
     * @Assert\NotBlank(
     *      message="user.password.not_blank",
     *      groups={"Registration", "PasswordReset"}
     * )
     */
    private $plainPassword;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set avatar
     *
     * @param \CommunityBundle\Entity\Avatar $avatar
     *
     * @return User
     */
    public function setAvatar(\CommunityBundle\Entity\Avatar $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        $this->password = null;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Get avatar
     *
     * @return \CommunityBundle\Entity\Avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    public function getSalt()
    {

    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }
}
