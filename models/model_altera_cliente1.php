<?PHP
  @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  $id_client = $_SESSION['idclient'];

  $sql = "SELECT * FROM clients 
        WHERE (id = '$id_client')";
  $r_client = @mysqli_query($conexao, $sql); 

  while ($result = mysqli_fetch_array($r_client)) { 
    $nome = $result['name_conpany_name'];
    $rg = $result['ie_rg'];
    $cpf = $result['cpf_cnpj'];
    $end = $result['addr'];
    $cidade = $result['city'];
    $bairro = $result['district'];
    $estado = $result['states'];
    $cep = $result['zip_code'];
    $tel = $result['phone'];
    $cel = $result['cell'];
    $email = $result['email'];
  }

?>