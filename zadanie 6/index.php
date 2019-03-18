<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Entity\Product;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode);

$conn = array(
    'dbname' => 'test',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
echo $entityManager->getRepository(Product::class)->getCountAvail();
print_r($entityManager->getRepository(Product::class)->getNonAvail());
print_r($entityManager->getRepository(Product::class)->getByName('qwqwqwq'));
