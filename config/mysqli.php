<?php
    define("DB_SERVER", "localhost"); // Serveri nimi
    define("DB_USER", "root"); // Andmebaasi kasutajanimi
    define("DB_PASS", ""); // Andmebaasi parool
    define("DB_NAME", "tak_23_simple"); // Andmebaasi nimi
    define("MAXPERPAGE", 5); // Mitu kirjet lehel (5)
    
    class Db {
        // Meetod andmebaasi ühenduse loomiseks
        function dbConnect() {
            $con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            if($con->connect_errno) {
                echo "<strong>Viga andmebaasiga: </strong>" . $con->connect_error;
                return false;
            }
            mysqli_set_charset($con, "utf8");
            return $con;
        }
        
        // Andmebaasi INSERT, UPDATE ja DELETE jaoks
        public function dbQuery($sql) {
            $con = $this->dbConnect();
            if($con) {
                $res = mysqli_query($con, $sql);
                if($res === false) {
                    echo "<div><strong>Vigane SQL p&auml;ring:</strong>" . $sql . "</div>";
                    return false;
                }
                mysqli_close($con);
                return $res;
            }
            return false;
        }

        // Andmebaasist küsimise meetod. Kui SQL lause on SELECT, siis see on õige meetod selleks
        function dbGetArray($sql) {
            $res = $this->dbQuery($sql);
            if($res !== false) {
                $data = array();
                if($res) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $data[] = $row;
                    }
                    if(is_array($data) and count($data) > 0) {
                        return $data;
                    } else {
                        return false;
                    }
                } else {
                    echo "<div><strong>Viga andmebaasist k&uuml;simisega</strong></div>";
                    return false;
                }
            } else {
                return false;
            }
        }

        // Andmebaasi lisamine või uuendamisel on soovitav see väljakutsuda, et 
        // tekst saaks ümbritsetud jutumärkidega. Numbrid mitte.
        function dbFix($var) {
            if(!is_numeric($var)) {
                $var = '"'.addslashes($var).'"';
            }
            return $var;
        }

        // Vormilt saadud info kontrollimiseks. Kunagisel global variandi pärast :)
        function getVar($name) {
            $var = false;
            // Kas on olemas GET ja kas on massiiv
            if(isset($_GET) and is_array($_GET)) {
                if(isset($_GET[$name])) {
                    $var = $_GET[$name];
                }
            } else {
                global $HTTP_GET_VARS;
                if(isset($HTTP_GET_VARS[$name])) {
                    $var = $HTTP_GET_VARS[$name];
                }
            }
            // Kas on olemas POST ja kas on massiiv
            if(isset($_POST) and is_array($_POST)) {
                if(isset($_POST[$name])) {
                    $var = $_POST[$name];
                }
            } else {
                global $HTTP_POST_VARS;
                if(isset($HTTP_POST_VARS[$name])) {
                    $var = $HTTP_POST_VARS[$name];
                }
            }
            return $var;
        }

        // Näitab massiivi inimlikul kujul
        function show($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    }

    // Ilma selle reata on kogu eelnev asi mõttetu. Loome objekti Db muutujasse $database
    $database = new Db;
?>