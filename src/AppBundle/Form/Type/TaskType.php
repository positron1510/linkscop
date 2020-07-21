<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 02.06.16
 * Time: 18:40
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Название задачи',
                ],
            ])
            ->add('region', EntityType::class, [
                'label' => false,
                'class' => 'AppBundle\Entity\Region',
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control selectpicker',
                    'data-live-search' => 'true'
                ],
                'placeholder' => 'Выберите регион',
            ])
            ->add('top', EntityType::class, [
                'label' => false,
                'class' => 'AppBundle\Entity\Top',
                'choice_label' => 'name',
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('file', FileType::class, [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'btn-primary',
                    'placeholder' => 'Название задачи',
                    'title' => 'Загрузить CSV файл'
                ],
            ])
            ->add('textarea', TextareaType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Вставте слова как написано выше',
                    'rows' => 10
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Запустить анализ',
                'attr' => [
                    'class' => 'btn btn-success',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Task',
        ]);
    }
}