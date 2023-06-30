<?php

namespace App\Controller\Admin;

use Datetime;
use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('chambre')->renderAsNativeWidget(),
            DateTimeField::new('date_arrivee', 'Date d\'arrivée')->setFormat('d/M/Y'),
            DateTimeField::new('date_depart', 'Date de départ')->setFormat('d/M/Y'),
            MoneyField::new('prix_total', 'Total')->setCurrency('EUR')->hideOnForm(),
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            TextField::new('telephone', 'Télephone'),
            TextField::new('email', 'E-Mail'),
            DateTimeField::new('date_enregistrement', 'Date et Heure de la commande')->setFormat('d/M/Y - H:m')->hideOnForm(),
        ];
    }

    public function createEntity(string $entityFqcn) 
    {
        $commande = new $entityFqcn;
        $commande->setDateEnregistrement(new Datetime);
        return $commande;
    }
    
}
