<?php
require_once "connection.php";
// developing...

    $result =[];


if(ISSET($_GET)){

    $pedido =  $_GET;   

    foreach( $pedido as $got_data){

           $pedido = $got_data;
      }
       


                $stmt = $pdo->prepare('SELECT * FROM notas_fiscais WHERE pedido = :pedido');
                $stmt->bindValue(':pedido', $pedido);
                $stmt->execute();
                $data = $stmt->fetchAll();
            
                foreach($data as $row){
            
                $url = $row['xml'];
                $pedido = $row['pedido'];
                $number = $row['numero'];
                $serie = $row['serie'];
                
                $data = array_map('utf8_encode', $row);             
                }
                echo json_encode($data, true);
            }else{

            echo"variavel vazia";   
         }
       
            