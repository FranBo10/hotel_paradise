<?php

namespace App\Controller\Admin;

use Datetime;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo', 'Photo')
                ->setBasePath('assets/img')
                ->setUploadDir('public/assets/img/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setFormTypeOptions([
                    'required' => false
                ]),
            ChoiceField::new('ordre', 'Ordre')->setChoices([
                '1' => 1,
                '2' => 2,
                '3' => 3
            ]),
            ChoiceField::new('page', 'Page')->setChoices([
                'spa' => "Spa",
                'chambre' => 'Chambre',
                'resto' => 'Restaurant',
                'avis' => 'Avis',
                'accueil' => 'Accueil',
                'contact' => 'Contact',
                'hotel' => 'Hotel',
                'inscription' => 'Inscription'
            ]),

            DateTimeField::new('date_enregistrement', 'Date d\'enregistrement')->setFormat('d/M/Y - H:m')->hideOnForm(),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $slider = new $entityFqcn;
        $slider->setDateEnregistrement(new Datetime);
        return $slider;
    }
}
