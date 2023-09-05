<?php

namespace App\Form;

use App\Entity\CommandConsole;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommandConsoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('command', TextType::class, [
                'attr' => [
                    'placeholder' => 'Écrivez votre commande après symfony console...'
                ]])
                ->add('description', TextareaType::class, [
                    'attr' => [
                        'style' => 'min-height: 400px;'
                    ]
                ])
                
            ->add('image', FileType::class)
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommandConsole::class,
        ]);
    }
}