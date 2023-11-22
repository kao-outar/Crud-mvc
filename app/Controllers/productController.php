<?php


class ProductController
{
    public function index()
    {
        $db = new Product();
        $data['products'] = $db->getAllProducts();
        View::load('product/index',$data);
    }

    public function add()
    {
        View::load("product/add");
    }
    public function store()
    {
        if(isset($_POST['submit']))
        {
            $name= $_POST['name'];
            $price= $_POST['price'];
            $description= $_POST['description'];
            $qty= $_POST['qty'];

            echo $name . "----" .$price . "----". $description . "----". $qty;
        }
        // View::load("product/add");
    }
}