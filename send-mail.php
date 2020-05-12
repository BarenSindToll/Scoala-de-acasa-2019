<script src = js/main.js></script>
<?php
    $metoda = $_SERVER['REQUEST_METHOD']
    echo "Metoda invocata este: $metoda <br>";
    if($metoda == "POST")
    {
      if(isset($_POST['Trimite'])&&empty($_SESSION['valoare']))
      {
        $varNume=$_POST['Nume'];
        $varEMail=$_POST['Email'];
        $varMesaj=$_POST['Mesaj'];
        $servername="192.168.0.4";
        $username="avit";

      }
      $conn = new mysql($servername,$username,$dbname);
      if($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
      }
      $sql = "INSERT INTO PCONTACT(Numr, Email, Mesaj)
      VALUES('$varNume','$varEMail', '$varMesaj')";

      if($conn->query($sql) === TRUE){
        eco "New record created successfully";
      }
      else{
        echo "Error:".$sql."<br>". $conn->error;
      }
?>
