<?php

namespace App\Form;

use App\Entity\Shop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shopName', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('shopFirstAddress', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('shopSecondAddress', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false])
            ->add('shopThirdAddress', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false])
            ->add('postcode', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('firstPhoneNumber', NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('secondPhoneNumber', NumberType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false])
            ->add('emailAddress', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('password', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('primaryContact', TextareaType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false])
            ->add('status', ChoiceType::class,[
                'attr' => ['class' => 'form-control'],
                'required' => false,
                'choices' =>[
                    'select an option' => null,
                    'Active' => 'active',
                    'Inactive' => 'inactive'
                ]])
            ->add('band', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Shop::class,
        ]);
    }
}
