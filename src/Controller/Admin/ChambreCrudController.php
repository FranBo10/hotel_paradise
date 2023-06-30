<?php

namespace App\Controller\Admin;

use Datetime;
use App\Entity\Chambre;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChambreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chambre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ChoiceField::new('titre', 'Titre')->setChoices([
                'Chambre Classique' => 'Chambre Classique',
                'Chambre Confort' => 'Chambre Confort',
                'Chambre Suite' => 'Chambre Suite'
            ]),
            TextField::new('description_courte', 'Description (Courte)'),
            TextEditorField::new('description_longue', 'Description (Longue)'),
            MoneyField::new('prix_journalier', 'Prix')->setCurrency('EUR')->setNumDecimals(2),
            ImageField::new('photo', 'Image')->setBasePath('assets/img')->setUploadDir('public/assets/img/')->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            DateTimeField::new('dateEnregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
        ];
    }

    public function createEntity(string $entityFqcn) 
    {
        $chambre = new $entityFqcn;
        $chambre->setDateEnregistrement(new Datetime);
        return $chambre;
    }

    

    
    
}
