<?php
    class DbConnect{
        private $host = 'db732013555.db.1and1.com';
        private $dbname = 'db732013555';
        private $user = 'dbo732013555';
        private $pass = 'Pa56word';

        public function connect(){
            try{
                $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbname, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(PDOException $e){
                echo 'Database Error: ' . $e->getMessage();
            }
        }
    }
?>