<?php
class email extends dbh {

    protected function getEmail($email){
        $sql = "SELECT * FROM magebit";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setEmail($email){
        $sql = "INSERT INTO magebit(email) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
    }

    protected function deleteEmail($id){
        $sql = "DELETE FROM magebit WHERE id = '$id'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getEmails(){

        if (!isset($_GET['firstpos']) or !is_numeric($_GET['firstpos'])) {
            $firstpos = 0;
        } else {
            $firstpos = (int)$_GET['firstpos'];
        }

        $sql = "SELECT * FROM magebit LIMIT $firstpos,10";
        $stmt = $this->connect()->query($sql); 
        $result = $stmt->fetchAll();
        
        $last = $firstpos - 10;
        if ($last >= 0){
            echo '<a href="'.$_SERVER['PHP_SELF'].'?firstpos='.$last.'">lastious</a>';
        }else{
            echo '<a href="'.$_SERVER['PHP_SELF'].'?firstpos='.($firstpos+10).'">Next</a>';
        }

        return $result;

    }

    public function getEmailVal($newDom){

        if (!isset($_GET['firstpos']) or !is_numeric($_GET['firstpos'])) {
            $firstpos = 0;
        } else {
            $firstpos = (int)$_GET['firstpos'];
        }

        $sql = "SELECT * FROM magebit WHERE email LIKE '%$newDom%' LIMIT $firstpos,10";
        $stmt = $this->connect()->query($sql); 
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getEmailOrd($post){
 
        if (!isset($_GET['firstpos']) or !is_numeric($_GET['firstpos'])) {
            $firstpos = 0;
        } else {
            $firstpos = (int)$_GET['firstpos'];
        }
    
        $this->var = isset($post) ? $post : 'dtof';

        if($this->var == "asc"){
            $sql ="SELECT * FROM magebit ORDER BY email ASC LIMIT $firstpos,10";
            $stmt = $this->connect()->query($sql); 
            $result = $stmt->fetchAll();
        
        }else if($this->var == "desc"){
            $sql = "SELECT * FROM magebit ORDER BY email DESC LIMIT $firstpos,10";
            $stmt = $this->connect()->query($sql); 
            $result = $stmt->fetchAll();

        }else{
            $sql = "SELECT * FROM magebit ORDER BY date_joined ASC LIMIT $firstpos,10";
            $stmt = $this->connect()->query($sql); 
            $result = $stmt->fetchAll();
        } 

        $last = $firstpos - 10;
        if ($last >= 0){
            echo '<a href="'.$_SERVER['PHP_SELF'].'?firstpos='.$last.'"></a>';
        }else{
            echo '<a href="'.$_SERVER['PHP_SELF'].'?firstpos='.($firstpos+10).'"></a>';
        }

        return $result;
    }

}