<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once '../bootstrap.php';
use NFePHP\DA\NFe\Danfe;
use NFePHP\DA\Legacy\FilesFolders;
require_once "connection.php";




    $result =[];
 if($_GET){
    $pedido = $_GET['prod'];
   
       


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
      
    

        function get_data($url) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $data = curl_exec($ch);
            if (curl_error($ch)) 
            {
                $error_msg = curl_error($ch);
                echo $error_msg;
            }
            
            curl_close($ch);
            return $data;
        }


        $returned_content = get_data($url);
   

        $file = "xml/$pedido.xml";
        //  if(file_exists($file))
         
               $files = fopen( $file, 'w');

               fwrite($files, $returned_content);
     
                 fclose($files);
           
     
//name a file with the order number
$xml = "xml/$pedido.xml";

$docxml = FilesFolders::readFile($xml);

$logo = 'data://text/plain;base64,'. base64_encode(file_get_contents('images/logo.jpg'));

try {
    $danfe = new Danfe($docxml, 'P', 'A4', $logo, 'I', '');
    $id = $danfe->montaDANFE();
    $pdf = $danfe->render();
    //o pdf pode ser exibido como view no browser
    //salvo em arquivo
    //ou setado para download forçado no browser 
    //ou ainda gravado na base de dados
    $arquivo = $xml;
    header('Content-Type: application/pdf');
   // header('Content-Disposition: attachment;filename="'.$arquivo.'"');
  //  header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
  //  header('Cache-Control: max-age=1');
    echo $pdf;
} catch (InvalidArgumentException $e) {
    echo "Ocorreu um erro durante o processamento :" . $e->getMessage();
} 
} 
         $result = "Insira um numero de pedido valido";