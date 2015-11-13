<?php

class Discount {
    
    /**
     * 
     * @param Order $order
     * @return Order
     */
    public function apply(Order $order) {
        return $order;
    }
}
