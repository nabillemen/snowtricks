<?php

namespace CommunityBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class IsCurrentUserPassword extends Constraint
{
    public $message;

    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
