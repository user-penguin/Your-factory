<?php


namespace App\Type;


use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreatePersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
            ->add('patronymic', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
            ->add('role', ChoiceType::class,[
                'choices' => Person::getTypes(),
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Create person',
                'attr' => [
                    'class' => 'text-field',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}