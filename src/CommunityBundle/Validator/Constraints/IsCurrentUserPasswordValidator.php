<?php

namespace CommunityBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityManagerInterface;
use CommunityBundle\Entity\User;

class IsCurrentUserPasswordValidator extends ConstraintValidator
{
    private $encoder;
    private $tokenStorage;
    private $em;

    public function __construct(
        TokenStorageInterface $tokenStorage,
        UserPasswordEncoder $encoder,
        EntityManagerInterface $em
    )
    {
        $this->encoder = $encoder;
        $this->tokenStorage = $tokenStorage;
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint)
    {
        $user = $this->tokenStorage->getToken()->getUser();

        $isPasswordNull = false;
        if (!$user->getPassword()) {
            $isPasswordNull = true;
            $this->em->refresh($user);
        }

        if (!$this->encoder->isPasswordValid($user, $value)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('currentPassword')
                ->addViolation();
        }

        if ($isPasswordNull) {
            $user->setPassword();
        }
    }
}
