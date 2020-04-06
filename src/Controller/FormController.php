<?php

namespace App\Controller;

use App\Entity\MaxNumber;
use App\Form\MaxNumberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function new(Request $request)
    {
        $number = new MaxNumber();

        $form = $this->createForm(MaxNumberType::class, $number);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $number = intval($form['number']->getData());
            $function = new MaxNumberType();
            $maxValue = $function->getMaxNumber($number);
            
            return $this->render('form/index.html.twig', [
                'number_form' => $form->createView(),
                'input_value' => $number,
                'max_value' => $maxValue,
                'is_max_value' => true
            ]);
        }

        return $this->render('form/index.html.twig', [
            'number_form' => $form->createView(),
            'is_max_value' => false
        ]);
    }
}
