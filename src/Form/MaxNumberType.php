<?php

namespace App\Form;

use App\Entity\MaxNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MaxNumberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class, [
                'label' => 'Enter you number:',
                'attr' => [
                    'placeholder' => 'Enter number'
                ]
            ])
            ->add('Find max number', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaxNumber::class,
        ]);
    }

    public function getMaxNumber($number) {
        $array = [0, 1];
        $maxValue = null; 

        if($number) {
            for ($i = 2; $i <= $number; $i++) {
                if($i % 2 == 0) {
                    $value = $i / 2;
                    $valueFromArray = $array[$value];
                    array_push($array, $valueFromArray);               
                }
                else {
                    $value = ($i-1) / 2;
                    $valueFromArray = $array[$value+1] + $array[$value];
                    array_push($array, $valueFromArray); 
                }
            }
            $maxValue = max($array);
            return $maxValue;
        }
        return $maxValue;
    }
}
