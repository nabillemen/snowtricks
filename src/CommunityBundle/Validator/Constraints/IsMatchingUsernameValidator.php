<?php

namespace CommunityBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityManagerInterface;
use CommunityBundle\Entity\User;

class IsMatchingUsernameValidator extends ConstraintValidator
{
    private $loader;

    public function __construct(EntityManagerInterface $em)
    {
        $this->loader = $em->getRepository(User::class);
    }

    public function validate($value, Constraint $constraint)
    {
        $user = $this->loader->loadUserByUsername($value);
        if (!$user) {
            $this->context->buildViolation($constraint->message)
                ->atPath('email')
                ->addViolation();
        }
    }
}
