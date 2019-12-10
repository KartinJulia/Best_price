
<?php

class DatabaseAdaptor {
    private $DB; // The instance variable used in every method
    // Connect to an existing data based named 'first'
    public function __construct() {
        $dataBase =
        'mysql:dbname=db_final;charset=utf8;host=127.0.0.1';
        $user =
        'root';
        $password =
        ''; // Empty string with XAMPP install
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }

    } // . . .
    // Use a different database

    public function getItem ($item) {
        $stmt = $this->DB->prepare( "SELECT * FROM items WHERE brand LIKE('%$item%') OR model LIKE('%$item%');");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function postItem ($brand,$model,$price,$conditions) {
        $stmt = $this->DB->prepare( "INSERT INTO items (brand,model,price,conditions) VALUES ('$brand', '$model', '$price', '$conditions');");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // public function getActors ($arr) {
    //     $stmt = $this->DB->prepare( "SELECT first_name,last_name FROM actors WHERE first_name LIKE ('%" . $arr . "%') OR last_name LIKE ('%" . $arr . "%')" );
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function getMovies ($arr) {
    //     $stmt = $this->DB->prepare( "SELECT name FROM movies WHERE name LIKE ('%" . $arr . "%')" );
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    //
    // public function getRoles ($arr) {
    //     $stmt = $this->DB->prepare( "SELECT role FROM roles WHERE role LIKE ('%" . $arr . "%')" );
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }






} // End class DatabaseAdaptor


?>
