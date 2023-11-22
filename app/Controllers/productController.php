<?php


class ProductController
{
    public function index()
    {
        $db = new Product();
        $data['products'] = $db->getAllProducts();
        View::load('product/index',$data);


    }
}