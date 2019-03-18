<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {
	
	public function getCountAvail()
	{
		return count($this->findBy(['availability' => true]));
	}
	public function getNonAvail()
	{
		return $this->findBy(['availability' => false]);
	}
	public function getByName($name)
	{
		return $this->_em->createQueryBuilder('o')
				->select('o')
				->from('App\Product','o')
				->where('o.name LIKE ?1')
				->setParameter('1', '%'.$name.'%')
				->getQuery()
				->getResult();
	}
}