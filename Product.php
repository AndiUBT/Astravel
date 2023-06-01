<?php 
include './classes/dbh.classes.php';
    class Product extends Dbh{
    public $id;
    public $title;
    public $description;
    public $price;

    public function __construct($id, $title, $description, $price){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public static function getAllProducts(){

        $dbh = new Dbh();
    $stmt = $dbh->connect()->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $product = new Product($row['id'],$row['title'], $row['description'], $row['price']);
        $products[] = $product;
    }
    return $products;

    }
    public static function addProduct($title, $description, $price) {
        $stmt = connect()->prepare("INSERT INTO products (title, description, price) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $price]);
    }

    public static function updateProduct($id, $title, $description, $price) {
        $stmt = connect()->prepare("UPDATE products SET title = ?, description = ?, price = ? WHERE id = ?");
        $stmt->execute([$title, $description, $price, $id]);
    }

    public static function deleteProduct($id) {
        $stmt = connect()->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>