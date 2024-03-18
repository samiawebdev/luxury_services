<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'data-parsley-trigger' => 'change',
                    'data-parsley-error-message' => 'A valid email adress is required.',
                    'required' => true
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'required' => false
                // 'attr' => [
                //     "type" => "checkbox",
                //     'name' => 'accept-terms',
                //     'value' => 1,
                //     'id' => 'accept-terms',
                    
                // ],
                // 'constraints' => [
                //     new IsTrue([
                //         'message' => 'You should agree to our terms.',
                //     ]),
                // ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Password',
                'mapped' => false,
                'attr' => [
                'data-parsley-trigger' => 'change',
                'data-parsley-minlength' => 6,
                    'data-parsley-error-message' => 'The password must be at least 6 characters.',
                    'required' => true         
            ],

           


                // 'constraints' => [
                //     new NotBlank([
                //         'message' => 'Please enter a password',
                //     ]),
                //     new Length([
                //         'min' => 6,
                //         'minMessage' => 'Your password should be at least {{ limit }} characters',
                //         // max length allowed by Symfony for security reasons
                //         'max' => 4096,
                //     ]),
                // ],
            ])
            // -> add('firstName')
            // -> add('lastName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
