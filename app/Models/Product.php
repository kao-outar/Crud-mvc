<?php



class Product extends DB
{
    private $table ="products";
    private $conn;


    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function getAllProducts()
    {
        return $this->conn->get($this->table);
    }

    public function insertProduct($data)
    {
        return $this->conn->insert($this->table,$data);
    }

    public function deleteProduct($id)
    {
        $db = $this->conn->where('id', $id);
        return $db->delete($this->table);
    }
}