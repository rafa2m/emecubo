<?php
    class DbConnect{
        private $host = 'desarrollando-web.es';
        private $dbname = 'notificaciones';
        private $user = 'notificaciones';
        private $pass = 'e1dCs@41';

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