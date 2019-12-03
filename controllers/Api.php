<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{
//get date of birth 
    Public function DOB(){
        $this->load->model('User_model');
        $result=$this->User_model->getDobDetails();
        echo "<table border='1'>";
        foreach ($result as $value) {
            echo "<tr>";
            echo "<td>".$value->fullname."</td>";
            echo "<td>".$value->email."</td>";
            if($value->dob<1){
                echo "<td>Nill</td>";
            }else{
                echo "<td>".date('d F Y',$value->dob)."</td>";
            }
            
            echo "</tr>";

    }
    echo "</table>";

}
}