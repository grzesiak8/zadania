<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Product;

class ProductRepository extends EntityRepository {
	
	public function getCountAvailProducts()
	{
		return count($this->findBy(['availability' => true]));
	}
	public function getNonAvailProducts()
	{
		return $this->findBy(['availability' => false]);
	}
	public function getProductsByName($name)
	{
		$entityManager = $this->getEntityManager();

		$query = $entityManager
					->getConnection()
					->query( '
						SELECT * 
						FROM product WHERE name LIKE \'%'.$name.'%\'' )
					->fetchAll();
		$temp = [];
		if(count($query) > 0) {
			foreach($query as $row) {
				$product = $this->_em->getRepository(Product::class)->find($row['id']);
				$temp[] = $product;
			}
		}
		return $temp;
	}
}