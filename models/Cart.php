<?php

class Cart {
  private $id;
  private $listOfProducts = [];

  public function __construct($id) {
    $this->id = $id;
  }

  // ... getters and setters for each attribute ...

  public function addProduct(Product $product) {
    $this->listOfProducts[] = $product;
  }

  public function removeProduct(Product $product) {
    $key = array_search($product, $this->listOfProducts);
    if ($key !== false) {
      unset($this->listOfProducts[$key]);
    }
  }

  public function getTotalPrice() {
    $total = 0;
    foreach ($this->listOfProducts as $product) {
      $total += $product->getDiscountedPrice();
    }
    return $total;
  }
}

?>