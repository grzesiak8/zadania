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
		return $this->findBy(['name' => $name]);
	}
}