<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Category;
use App\Entity\Product;

class CategoryRepository extends EntityRepository {
	
	public function getCountProductsByCategory($categoryId) 
	{
		$category = $this->_em->getRepository(Category::class)->find($categoryId);
		return count($category->getProducts());
	}
	public function getProductsByCategory($categoryId) 
	{
		$entityManager = $this->getEntityManager();

		$query = $entityManager
					->getConnection()
					->query( '
						SELECT cp.* 
						FROM category_product cp
						LEFT JOIN product p ON p.id = cp.product_id
						WHERE category_id = '.$categoryId.' 
						ORDER by p.name' )
					->fetchAll();
		$temp = [];
		if(count($query) > 0) {
			foreach($query as $row) {
				$product = $this->_em->getRepository(Product::class)->find($row['product_id']);
				$temp[] = $product;
			}
		}
		return $temp;
	}
}