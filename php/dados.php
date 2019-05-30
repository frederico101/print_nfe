<?php

if($_POST){

    $datas = $_POST['produto'];

}

   echo json_encode($datas, true);