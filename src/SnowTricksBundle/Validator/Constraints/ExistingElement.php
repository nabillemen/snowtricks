<?php

namespace SnowTricksBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ExistingElement extends Constraint
{
    public $message;
    public $fqdn;

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }
}
