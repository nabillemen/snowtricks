<?php

namespace SnowTricksBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;

class ExistingElementValidator extends ConstraintValidator
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function validate($obj, Constraint $constraint)
    {
        if(null === $obj) {
            return;
        }

        if(get_class($obj) != $constraint->fqdn ||
            get_class($obj) == $constraint->fqdn &&
            !$this->em->contains($obj)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
