<?php
class Database
{
    private $connection;

    function GetReadConnection()
    {
        $info = parse_ini_file("database.ini");

        $servername = $info["servername"];
        $username = $info["userread"];
        $password = $info["passwordread"];
        $database = $info["database"];

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            return $this->connection;
        } catch (PDOException $e) {
            echo("Read Connection failed: " . $e->getMessage());
            exit();
        }
    }

    // Connection methods
    function GetEditConnection()
    {
        $info = parse_ini_file("database.ini");

        $servername = $info["servername"];
        $username = $info["useredit"];
        $password = $info["passwordedit"];
        $database = $info["database"];

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            return $this->connection;
        } catch (PDOException $e) {
            echo("Edit Connection failed: " . $e->getMessage());
            exit();
        }
    }
    function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Connection failed: " . $e->getMessage());
            exit();
        }
    }

    // Products methods
    function GetProducts()
    {
        $sql = "SELECT * FROM products";
        $statement = $this->connection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function GetProductDetail($productId)
    {
        $sql = "SELECT * FROM Products WHERE ProductId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$productId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Users & Orders methods
    function GetUsers()
    {
        $sql = "SELECT * FROM users";
        $statement = $this->connection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function GetUserDetail($userId)
    {
        $sql = "SELECT * FROM users WHERE UserId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$userId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function GetOrdersForUser($userId)
    {
        $sql = "SELECT * FROM orders WHERE UserId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$userId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function GetOrderDetail($orderId)
    {
        $sql = "SELECT * FROM orders WHERE OrderId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$orderId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function GetOrderItems($orderId)
    {
        $sql = "SELECT * FROM orderitems WHERE OrderId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$orderId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Create Update Delete functions
    function CreateProduct($name, $desc, $price)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "INSERT INTO Products (Name, Description, Price) VALUES (?, ?, ?)";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$name, $desc, $price]);
    }
    
    function UpdateProduct($id, $name, $desc, $price)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "UPDATE Products SET Name=?, Description=?, Price=? WHERE ProductId = ?";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$name, $desc, $price, $id]);
    }
    
    function DeleteProduct($id)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "DELETE FROM Products WHERE ProductId = ?";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$id]);
    }
    
    function CreateUser($name)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "INSERT INTO Users (Name) VALUES (?)";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$name]);
    }
    
    function UpdateUser($id, $name)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "UPDATE Users SET Name=? WHERE UserId = ?";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$name, $id]);
    }
    
    function DeleteUser($id)
    {
        $editConnection = $this->GetEditConnection();
        $sql = "DELETE FROM Users WHERE UserId = ?";
        $statement = $editConnection->prepare($sql);
        $statement->execute([$id]);
    }
}
?>
