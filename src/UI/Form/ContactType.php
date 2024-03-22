<?php

namespace App\UI\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use App\UI\Dto\ContactDto;

/**
 * 
 */
class ContactType extends AbstractType
{
    /**
     * 
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                'label' => 'votre nom :',
                'attr' => ['placeholder' => 'Votre nom '],
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                'label' => 'votre email :',
                'attr' => ['placeholder' => 'Votre email '],
                ]
            )
            ->add(
                'subject',
                TextType::class,
                [
                'label' => 'Sujet :',
                'attr' => ['placeholder' => 'Indiquez un sujet '],
                ]
            )
            ->add(
                'message',
                TextareaType::class,
                [
                'label' => 'votre message :',
                'attr' => ['placeholder' => 'Ecrivez votre message'],
                ]
            );
    }

    /**
     * Undocumented function
     *
     * @param OptionsResolver $resolver
     * 
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => ContactDTO::class,
                'empty_data' => fn(FormInterface $form) => new ContactDTO(
                    $form->get('name')->getData(),
                    $form->get('email')->getData(),
                    $form->get('subject')->getData(),
                    $form->get('message')->getData()
                ),
            ]
        );
    }
}

