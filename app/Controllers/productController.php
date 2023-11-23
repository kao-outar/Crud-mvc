<?php


class ProductController
{
    public function index()
    {
        $db = new Product();
        $data['products'] = $db->getAllProducts();
        View::load('product/index',$data);
    }
    //Add new product - view add page
    public function add()
    {
        View::load("product/add");
    }

    //Get Data from form and store product info
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

    //edit product
    public function edit($id)
    {
        $db = new Product();
        if($db->getRow($id))
        {
            $data['row'] = $db->getRow($id);
           View::load("product/edit", $data);
        }
        else
        {
            echo "error";
        }
    }


    // delete product
    public function delete($id)
    {
        $db = new Product();
        if($db->deleteProduct($id))
        {
            View::load('product/delete');
        }
        else
        {
            echo "error";
        }
    }
}