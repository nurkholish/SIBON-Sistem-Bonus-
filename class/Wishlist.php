<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 24/04/2016
 * Time: 21:04
 */
class Wishlist implements BaseData
{
    //Koneksi
    private $conn;

    public function __construct()
    {
        $database = new Koneksi();
        $db = $database->dbKoneksi();
        $this->conn = $db;
    }
    //End Koneksi

    public function getAll()
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getById($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbwishlist WHERE id_wishlist=$id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function insert($data = array())
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbwishlist (id_wishlist,id_wish,id_customer,id_trip) VALUES (NULL,:idwish,:idcustomer,:idtrip)");
            $stmt->execute(array(
                ':idwish'=>$data['id_wish'],
                ':idcustomer'=>$data['id_customer'],
                ':idtrip' => $data['id_trip']
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function update($data = array(), $id)
    {
        try
        {
            $stmt = $this->conn->prepare("UPDATE tbwishlist SET id_trip=:idtrip WHERE id_wishlist=$id");
            $stmt->execute(array(':idtrip'=>$data['id_trip']));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbwishlist WHERE id_wishlist=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function deleteByIdWish($id)
    {
        try
        {
            $stmt = $this->conn->prepare("DELETE FROM tbwishlist WHERE id_wish=$id");
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}