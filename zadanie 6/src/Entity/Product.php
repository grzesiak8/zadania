<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity(repositoryClass="App\Repository\ProductRepository")
 * @Table(name="product")
 */
class Product
{
    /** 
	 *  @Id 
	 *  @Column(type="integer") 
	 *  @GeneratedValue 
	 */
    private $id;

    /**
     *  @Column(type="string", length=255)
     */
    private $name;

    /**
     *  @Column(type="integer")
     */
    private $price;
	
	/**
     *  @Column(type="boolean")
     */
    private $availability;


    public function __construct()
    {
        
    }
	public function setName($name)
	{
		$this->name = $name;
	}
}