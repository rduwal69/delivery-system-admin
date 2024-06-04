<?php

namespace App\Form;

use App\Entity\ShopOrder;
use Symfony\Bundle\MakerBundle\Doctrine\RelationOneToMany;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderNumber', TextType::class, ['attr' => ['class' => 'form-control']])
//            ->add('dateOfOrder', DateType::class,[
//                'required' => false
//            ])
            ->add('deliveryAddress', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('total', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('discount', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('grandTotal', TextType::class, ['attr' => ['class' => 'form-control']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShopOrder::class,
            'csrf_protection' => false
        ]);
    }
}
