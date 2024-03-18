<?php

namespace App\Controller\Admin;

use App\Entity\Candidate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidate::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description')
            
            AssociationField::new('user'),

            TextField::new('firstName'),
            TextField::new('lastName'),
            TextField::new('adress'),
            TextField::new('country'),
            TextField::new('nationality'),
            BooleanField::new('isPassportValid'),
            AssociationField::new('passportFile'),
            AssociationField::new('curriculumVitae'),
            AssociationField::new('profilPicture'),
            TextField::new('currentLocation'),
            DateField::new('birthAt'),
            TextField::new('placeOfBirth'),
            AssociationField::new('gender'),
            BooleanField::new('isAvailable'),
            AssociationField::new('category'),
            AssociationField::new('experience'),
            TextEditorField::new('shortDescription'),
            TextEditorField::new('notes'),
            TextField::new('country'),
            DateField::new('createdAt'),
            DateField::new('updatedAt'),
            DateField::new('deletedAt'),


            
        ];
    }
    
}
