<?php

/**
 * Product Order Facade
 */
class ProductOrderFacade {
    
    /**
     * @var Product
     */
    private $product = null;
    
    /**
     * @var Order
     */
    private $order = null;

    /**
     * 
     * @param Product $product
     * @param Order $order
     */
    public function __contruct(Product $product)
    {
        $this->product = $product;
        $this->order = new Order();
    }
    
    /**
     * Returns order
     * 
     * @return Order
     */
    public function getOrder() {
        return $this->order;
    }
    
    public function generateOrder() {
        if ($this->checkQuantity())
        {
            $this
                ->addToCart()
                ->calculateShipping()
                ->applyDiscount()
            ;
        }
    }
    
    /**
     * Checks the product's quantity
     * 
     * @return bool
     */
    private function checkQuantity() {
        return ($this->product->getQuantity() > 0);
    }
    
    /**
     * Adds the product to the order
     * 
     * @return ProductOrderFacade
     */
    private function addToCart() {
        $this->order->addProduct($this->product);
        return $this;
    }
    
    /**
     * Calculates the shipping charge of teh order
     * 
     * @return ProductOrderFacade
     */
    private function calculateShipping() {
        $shippingCharge = new ShippingCharge();
        $this->order = $shippingCharge->calulate($this->order);
        return $this;
    }
    
    /**
     * Applies discount to the order
     * 
     * @return ProductOrderFacade
     */
    private function applyDiscount() {
        $discount = new Discount();
        $this->order = $discount->apply($this->order);
        return $this;
    }
}