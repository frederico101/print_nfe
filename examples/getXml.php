<?php
$servername = "";
$username = "";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


if($_POST){

    $product = $_POST['produto'];



   

        $stmt = $pdo->prepare('SELECT * FROM notas_fiscais WHERE pedido = :pedido');
        $stmt->bindValue(':pedido', $product);
        $stmt->execute();
        $data = $stmt->fetchAll();
        echo"<pre>";
        print_r($data);
        echo"</pre>";
        foreach($data as $row){
     
         $url = $row['xml'];
         $pedido = $row['pedido'];
             
        }




function executeGetFiscalDocuments($url){
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($curl_handle);

    if (curl_error($curl_handle)) 
	{
		$error_msg = curl_error($curl_handle);
		echo $error_msg;
	}
    
    curl_close($curl_handle);
    
    return $response;

}

      $retorno = executeGetFiscalDocuments($url );


      echo json_encode($pedido, true);
    
      $file = fopen( 'xml/'.$pedido.'.xml', 'w');

     fwrite($file, $retorno);

     fclose($test);

    } //end of if