<?php
namespace MiLocalidad\CoreBundle\Repository;

use App\Entity\Post;
use Doctrine\ORM\EntityRepository;

final class TownRepository extends EntityRepository
{
    public function findByParcialName($partial): array
    {
        $res = $this->createQueryBuilder("t")
            ->where("t.name LIKE :value")
            ->setMaxResults(5)
            ->setParameter(":value", "%" . $partial . "%")
            ->getQuery()
            ->getResult();
        $res = array_map(function($value): array {
            return [$value->getId() . $value->getName()];
        }, $res);
        return $res ?: [];
    }
}