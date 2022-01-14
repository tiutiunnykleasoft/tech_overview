<?php

enum Products : int
{
    case Phone = 500;
    case Laptop = 1500;
    case PC = 2500;
}

class Main
{
    public function retrievePrice(Products $products)
    {
        return $products->value;
    }
}

$main = new Main();
$result = $main->retrievePrice(Products::Phone);