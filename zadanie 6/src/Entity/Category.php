<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity(repositoryClass="App\Repository\CategoryRepository")
 * @Table(name="category")
 */
class Category
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
     * @ManyToMany(targetEntity="Product")
     * @JoinTable(name="category_product",
     *      joinColumns={@JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="product_id", referencedColumnName="id")}
     *      )
     */
    private $products;

    public function __construct()
    {
		 $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getProducts()
	{
		return $this->products;
	}
}