<?php

class emailsort extends emailcontrol{
    public $email;

    public function devideEmail(){

        $sql = "SELECT * FROM magebit";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        for($x = 0; $x < count($result);$x++){
            $inpEmails[] = $result[$x]["email"];
        }
        foreach($inpEmails as $oneEmail){
            $newString = substr($oneEmail, strpos($oneEmail, "@") + 1);
            $newArray[] = $newString;
        }

        return array_unique($newArray);
    }
}