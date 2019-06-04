<?php

require_once 'examples/connections';


$apikey = "";

$outputType = "json";

$url = $url = 'https://bling.com.br/Api/v2/notasfiscais/' . $outputType;


function executeGetFiscalDocuments($url, $apikey){
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url . '&apikey=' . $apikey);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($curl_handle);

    if (curl_error($curl_handle)) 
	{
		$error_msg = curl_error($curl_handle);
		echo $error_msg;
	}
    
    curl_close($curl_handle);
    $retorno = json_decode($response, true);
    return $retorno;
}


    
   $retorno = executeGetFiscalDocuments($url, $apikey);

  /*   echo '<pre>';
      print_r($retorno );
      echo '</pre>';*/
      
    
     

      $total = sizeof($retorno['retorno']['notasfiscais']);
      $cliente = $pedido = $xml = NULL;
        for($i = 0; $i < $total; ++$i)
         {
          foreach($retorno['retorno']['notasfiscais'][$i] as $indice => $item){
      
              echo 'Inicio da nota: '.$indice. ' :<br><br>';
      
              foreach($item as $nomeitem=>$subitem){
                if(is_string($subitem )){
                    
                     if($nomeitem == 'numeroPedidoLoja')
                     {
                     
                     $pedido = $subitem;
                     echo 'Pedido: '.$pedido.'<br>';
                    }   
                    
                     if($nomeitem == 'xml')
                     {
                       $xml = $subitem;
                       echo 'xml: '.$xml.'<br>';
                     }
                     if($nomeitem == 'serie')
                     {
                       $serie = $subitem;
                       echo 'serie: '.$serie.'<br>';
                     }
                     if($nomeitem == 'numero')
                     {
                       $numero = $subitem;
                       echo 'numero: '.$numero.'<br>';
                     }
                
                
                
                 
                }
            }
            try{
            $stmt = $pdo->prepare( 'INSERT INTO notas_fiscais (cliente, pedido, xml, serie, numero) VALUES (:cliente, :pedido, :xml, :serie, :numero) ON DUPLICATE KEY UPDATE pedido = :pedido ');
            
            $stmt->execute(array(':cliente'=>$cliente, ':pedido'=>$pedido, ':xml'=>$xml, ':serie'=>$serie, ':numero'=>$numero));

            }catch(PDOException $e){

            echo"Erro". $e;

        }
        
        }
            
    }   