<?php

class emailcontrol extends email {

    public function createEmail($email){
        $this->setEmail($email);
    }

    public function delEmail($id){
        $this->deleteEmail($id);
    }

}

