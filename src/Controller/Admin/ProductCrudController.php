<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield TextField::new('name');
        yield TextField::new('description');
        yield ImageField::new('imageName')
            ->setBasePath($this->getParameter('app.path.product_images'))->onlyOnIndex();
        yield VichImageField::new('imageFile')->hideOnIndex();
        yield AssociationField::new('offers')->autocomplete()->onlyOnIndex();
    }

}
