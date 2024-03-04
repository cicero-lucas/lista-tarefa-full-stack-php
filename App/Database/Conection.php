<?php 
    namespace App\Database;
    use PDO;
    use PDOException;

    class Conection{
        private static $instanciaBanco;

        public static function getInstanciaDb():PDO{

            if(empty(self::$instanciaBanco)){
                try {

                    self::$instanciaBanco = new PDO (DBDRIVE.': host='.DBHOST.';dbname='.DBNAME, DBUSER,DBPASS,[
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        
                        PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL
                    ]);

                } catch (PDOException $e) {
                    var_dump("ERO0!".$e->getMessage());
                }
                
                
            }
            return self::$instanciaBanco;
        }

        protected function __construct(){

        }

        private function __clone()
        {
            
        }
    }

  


?>