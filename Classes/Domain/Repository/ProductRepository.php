<?php
namespace Resultify\SimpleShop\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class ProductRepository extends Repository
{
    public function getByUids(array $uids)
    {
        $query = $this->createQuery();    
        $query->matching($query->in('uid', $uids));
        
        return $query->execute();
    }
}