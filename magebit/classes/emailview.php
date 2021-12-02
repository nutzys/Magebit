<?php

class emailview extends email {

    public function showEmail($email){
        $result = $this->getEmail($email);
        return $result;
    }

    public function getOrder($post){
        $result = $this->getEmailOrder($post);
        return $result;
    }

}
