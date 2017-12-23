<?php

namespace CommunityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CommunityBundle\Entity\User;
use CommunityBundle\Validator\Constraints\IsCurrentUserPassword;

class ResetPasswordForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentPassword', PasswordType::class, array(
                'mapped' => false,
                'constraints' => array(
                    new IsCurrentUserPassword(array(
                        'message' => 'current_user.password.invalid',
                        'groups' => array('PasswordReset')
                    )
                )
            )))
            ->add('plainPassword', RepeatedType::class, array(
                'invalid_message' => 'Les champs ne correspondent pas.',
                'type' => PasswordType::class
            ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }
}
