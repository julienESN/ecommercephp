<?php
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $discountedPrice;
    private $stockQuantity;
  
    public function __construct($id, $name, $description, $price, $discountedPrice, $stockQuantity) {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->price = $price;
      $this->discountedPrice = $discountedPrice;
      $this->stockQuantity = $stockQuantity;
    }
  
    // ... getters and setters for each attribute ...
  
    public function getPrice() {
      return $this->price;
    }
  
    public function getDiscountedPrice() {
      return $this->discountedPrice;
    }
  
    public function getStockQuantity() {
      return $this->stockQuantity;
    }
  }
  

?>
