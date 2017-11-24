<?php

namespace SnowTricksBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class ExistingOrValidElementValidator extends ConstraintValidator
{
    private $em;
    private $validator;

    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    public function validate($obj, Constraint $constraint)
    {
        if(null === $obj) {
            return;
        }

        if(get_class($obj) != $constraint->fqdn ||
            get_class($obj) == $constraint->fqdn &&
            !$this->em->contains($obj)) {
            if(!empty((string) $this->validator->validate($obj))) {
                $this->context->buildViolation($constraint->message)->addViolation();
            }
        }
    }
}
