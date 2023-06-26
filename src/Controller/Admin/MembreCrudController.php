<?php

namespace App\Controller\Admin;

use Datetime;
use App\Entity\Membre;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MembreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Membre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('pseudo', 'Pseudo'),
            TextField::new('password', 'Mot de passe')->setFormType(PasswordType::class)->onlyWhenCreating(),
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            TextField::new('email', 'E-Mail'),
            ChoiceField::new('civilite', 'Civilité')->setChoices([
                'Monsieur' => 'homme',
                'Madame' => 'femme',
            ]),
            ChoiceField::new('roles', 'Role')->setChoices([
                'Membre'  => 'ROLE_USER',
                'Admin' => 'ROLE_ADMIN',
            ])->setTemplatePath('admin/field/roles.html.twig')->hideOnForm(),
            DateTimeField::new('dateEnregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),

        ];
    }

    // public function persistEntity(EntityManagerInterface $entityManager, $entityInstance) :void
    // {
    //     if(!$entityInstance->getId())
    //      {
    //         $entityInstance->setPassword(
    //             $this->hasher->hashPassword(
    //                 $entityInstance, $entityInstance->getPassword()
    //             )
    //             );
    //      }
    //      $entityManager->persist($entityInstance);
    //      $entityManager->flush();
    // }

    public function createEntity(string $entityFqcn) 
    {
        $membre = new $entityFqcn;
        $membre->setDateEnregistrement(new Datetime);
        return $membre;
    }
    
}
