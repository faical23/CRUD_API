<?php

use CRUD as GlobalCRUD;

include "connect.php";

    class CRUD extends DB{

    private $table;

    public function __construct($table){
        parent::__construct("reservation hotel");
        $this->table = $table;
    }
    public function insert($element = []){
        $columns = "";
        $values_column = "";


        $elment_length =  count($element) -1 ;
        $i=0;
        foreach ($element as $key => $value) {
                if($i < $elment_length)
                {
                    $columns .="$key,";
                    $values_column .= "'$value',";
                }
                else{
                    $columns .="$key";
                    $values_column .= "'$value'";
                }
                $i++;
        }
        $sql = "INSERT INTO $this->table ($columns) VALUES ($values_column)"; 
        echo $sql;
        echo "<br/>";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt = $this->dbh->exec($sql);
            return $stmt;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }

    }
    public function select($check = "",$conditions = []){
        $i = 0;
        $sql = "SELECT * FROM $this->table ";
            foreach ($conditions as $key => $value) {
                if($i == 0)
                {
                    $sql .= "WHERE $key LIKE '$value%'";
                }
                else{
                    $sql .= " AND $key LIKE '$value'%";
                }
                $i++;
            }

        $stmt = $this->dbh->prepare($sql);

        try{

            if($check == "check")
            {
                $stmt = $this->dbh->query($sql); 
                $count = $stmt->rowCount();
                return $count;
            }
            else{
                $stmt->execute(); 
                $result = $stmt->fetchAll();
                return $result;
            }
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete($where_id,$condition){

        $sql = "DELETE from $this->table WHERE $where_id = '$condition' ";
        echo $sql;
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }


    }
    public function update($element = [],$id,$condition){
            $i = 0;
            $sql = "UPDATE $this->table SET ";
            $elment_length =  count($element) -1 ;
            foreach ($element as $key => $value) {
                if($i == 0)
                {
                    $sql .= "$key = '$value'";
                }
                else if($i > 0){
                    $sql .= " , $key = '$value'";
                }
                $i++;
            }
            
            $sql.= " WHERE $id = '$condition'";
            try {
                $stmt = $this->dbh->prepare($sql);
                $stmt->execute();
                return $stmt;
            }
            catch(Exception $e) {
                return $e->getMessage();
            }

    } 
}

?>