<?php

namespace App\Form;

use App\Entity\Driver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('driverName', TextType::class, ['attr'=>['class' => 'form-control']])
            ->add('emailAddress', EmailType::class, ['attr'=>['class' => 'form-control']])
            ->add('password', TextType::class, ['attr'=>['class' => 'form-control']])
            ->add('firstPhoneNumber', NumberType::class, ['attr'=>['class' => 'form-control']])
            ->add('secondPhoneNumber', NumberType::class, [
                'attr'=>['class' => 'form-control'],
                'required' => false])
            ->add('band', TextType::class, ['attr'=>['class' => 'form-control']])
            ->add('zone', TextType::class, ['attr'=>['class' => 'form-control']])
            ->add('address', TextType::class, ['attr'=>['class' => 'form-control']])
            ->add('optionalAddress', TextType::class, [
                'attr'=>['class' => 'form-control'],
                'required' => false])
            ->add('postcode', TextType::class, ['attr'=>['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Driver::class,
        ]);
    }
}
