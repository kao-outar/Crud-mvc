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

            $data = Array ("name"=>$name,
                            "price"=>$price,
                            "description"=>$description,
                            "qty"=>$qty,
            );
        $db = new Product();
        if($db->insertProduct($data))
        {
            View::load("product/add",["success"=>"Data Created Successfully"]);
        }
        }
        else
        {
            View::load("product/add");
        }
    }
}