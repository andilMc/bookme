<?php
namespace core\sql;

use core\sql\connexion;
class SqlRequest{

    private $mysql_connector;
    
    public function __construct() {
        include_once "connexion.php";
        $cn = new connexion();
        $cnx = $cn->getConnexion();
        $this->mysql_connector = $cnx;
    }

    public function lastInsertId(){
        return $this->mysql_connector->insert_id;
    }

    public function selectAll(Object $objet): array
    {
        $table = strtolower(get_class($objet));
        $table=explode("\\",$table);
        $table=$table[count($table)-1];
        $Obj = ucfirst($table);
        $con =$this->mysql_connector;
        $reqProprietes = $con->query("SHOW COLUMNS FROM $table ");
        $proprietes = $reqProprietes->fetch_all();
        $result = $con->query("SELECT * FROM $table");

        $list = array();

        while ( $element = $result->fetch_assoc()) {
            $class = get_class($objet);
            $obj = new $class();
            for ($j=0; $j <count($proprietes) ; $j++) { 
                $set_var ="set".ucfirst($proprietes[$j][0]);
                $obj->$set_var($element[$proprietes[$j][0]]);
            }
            array_push($list,$obj);
        }
        
       return $list;
    }
    
    public function selectBy(Object $objet,string $condition):array
    {
        $table = strtolower(get_class($objet));
        $table=explode("\\",$table);
        $table=$table[count($table)-1];
        $Obj = ucfirst($table);
        $con =$this->mysql_connector;
        $reqProprietes = $con->query("SHOW COLUMNS FROM $table ");
        $proprietes = $reqProprietes->fetch_all();
        $result = $con->query("SELECT * FROM $table WHERE ".$condition);
        $list = array();

        while ( $element = $result->fetch_assoc()) {
            $class = get_class($objet);
            $obj = new $class();
            for ($j=0; $j <count($proprietes) ; $j++) { 
                $set_var ="set".ucfirst($proprietes[$j][0]);
                $obj->$set_var($element[$proprietes[$j][0]]);
            }

            array_push($list,$obj);

        }
        
       return $list;
        
    }

    public function insert(Object $objet)
    {  
        $table = strtolower(get_class($objet));
        $table=explode("\\",$table);
        $table=$table[count($table)-1];
        $con =$this->mysql_connector;
        $reqProprietes = $con->query("SHOW COLUMNS FROM $table ");
        $proprietes = $reqProprietes->fetch_all();
        $sql = "INSERT INTO  $table(";
        $values = " VALUES (";
        
        for ($i=0; $i <count($proprietes) ; $i++) { 

            $get_val = "get".ucfirst($proprietes[$i][0]);
            $value = $objet->$get_val();

            if ($value==null){
                $value= "NULL";
            }
            if ($i==(count($proprietes)-1)) {
                $sql.="`".$proprietes[$i][0]."`)";
                if ($value=="NULL") {
                    $values.="NULL)";
                }else{
                    if ( gettype($value) =="integer" || gettype($value) == "double" ) {
                        $values.="$value)";
                    } else {
                        $values.="'$value')";
                    }
                   
                }
            } else {
                $sql.="`".$proprietes[$i][0]."`,";
                if ($value=="NULL") {
                    $values.="NULL,";
                }else{
                    if ( gettype($value) =="integer" || gettype($value) == "double" ) {
                        $values.="$value,";
                    } else {
                        $value = str_replace("'","\'",$value);
                        $values.="'$value',";
                    }
                    
                }
                
            }   
        }

        $q = $sql." ".$values;
        $insertRequest = $con->query($q);
        $last_id = $con->insert_id;
        
        return $last_id ;
    }

    public function update(Object $objet,string $condition)
    {  
        $table = strtolower(get_class($objet));
        $table=explode("\\",$table);
        $table=$table[count($table)-1];
        $con =$this->mysql_connector;
        $reqProprietes = $con->query("SHOW COLUMNS FROM $table ");
        $proprietes = $reqProprietes->fetch_all();
        $sql = "UPDATE $table SET ";
        $values = "";
        
        for ($i=0; $i <count($proprietes) ; $i++) { 
   
            $get_val = "get".ucfirst($proprietes[$i][0]);
            $value = $objet->$get_val();
  
            if ($value==null){
                $value= "NULL";
            }
            if ($i==(count($proprietes)-1)) {
                // if ($value=="NULL") {
                //     $values.="`".$proprietes[$i][0]."` = NULL";
                // }else{
                    if ($value!="NULL") {
                       
                    if ( gettype($value) =="integer" || gettype($value) == "double" ) {
                        $values.="`".$proprietes[$i][0]."` = $value";
                    } else {
                        $value = str_replace("'","\'",$value);
                        $values.="`".$proprietes[$i][0]."` = '$value'";
                    }
                   
                }
            } else {
                if ($value!="NULL") {
                //     $values.="NULL,";
                // }else{
                  
                    if ( gettype($value) =="integer" || gettype($value) == "double" ) {
                        $values.="`".$proprietes[$i][0]."` = $value,";
                    } else {
                        $value = str_replace("'","\'",$value);
                        $values.="`".$proprietes[$i][0]."` = '$value',";
                    }
                    
                }
                
            }   
        }
        
       
        $q = "$sql $values  WHERE $condition";
        // var_dump($q);
        // die;
       $insertRequest = $con->query($q);
       
       return $insertRequest ;
    }
    
    public function delete(Object $objet,string $condition)
    {
        $table = strtolower(get_class($objet));
        $table=explode("\\",$table);
        $table=$table[count($table)-1];
        $con =$this->mysql_connector;
        $sql = "DELETE FROM $table WHERE  $condition";
        $deletRequest = $con->query($sql);
        
        return $deletRequest ;
        
    }

    public function close(){
        mysqli_close($this->mysql_connector);
    }
}