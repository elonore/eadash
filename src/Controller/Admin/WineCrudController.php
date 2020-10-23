<?php

namespace App\Controller\Admin;

use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wine::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
