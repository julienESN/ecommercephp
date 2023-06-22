<?php
class User {
  private $id;
  private $username;
  private $email;
  private $cart;

  public function __construct($id, $username, $email) {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->cart = new Cart($id);
  }

  // ... getters and setters for each attribute ...

  public function getCart() {
    return $this->cart;
  }

  public function addProductToCart(Product $product) {
    $this->cart->addProduct($product);
  }

  public function removeProductFromCart(Product $product) {
    $this->cart->removeProduct($product);
  }
}

?>
