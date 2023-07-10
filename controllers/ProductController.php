<?php
require_once 'Database.php';
class ProductController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getProductsByCategory($category) {
        try {
            $conn = $this->db->connect();

            // Récupération des produits
            $sql = "SELECT * FROM products WHERE category = :category";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':category', $category);
        
            // If the execute fails, return false
            if (!$stmt->execute()) {
                return false;
            }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("ProductController::getProductsByCategory: " . $e->getMessage());
            return false;
        }
    }
}
//  Use this following instance when i need it like in men category
// $productController = new ProductController();
// $menProducts = $productController->getProductsByCategory('men');
// $featuredProducts = $productController->getProductsByCategory('featured');
// $womentProducts = $productController->getProductsByCategory('women');


?>