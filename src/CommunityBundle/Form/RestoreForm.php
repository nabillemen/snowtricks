<?php

namespace CommunityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CommunityBundle\Entity\User;
use CommunityBundle\Validator\Constraints\IsMatchingUsername;

class RestoreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'mapped' => false,
                'constraints' => array(
                    new IsMatchingUsername(array('message' => 'email.not_matching'))
            )))
        ;

    }
}
