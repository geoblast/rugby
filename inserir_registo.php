<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<?php      
    include('ligacao.php');  
    $ut_user = $_POST['ut_user'];  
    $ut_pass = $_POST['ut_pass'];
    $Email = $_POST['Email'];
    $Nif = $_POST['Nif']; 
      
        //to prevent from mysqli injection  
        $ut_user = stripcslashes($ut_user);  
        $ut_pass = stripcslashes($ut_pass);  
        $ut_user  = mysqli_real_escape_string($conn, $ut_user);  
        $ut_pass = mysqli_real_escape_string($conn, $ut_pass);  
      
        $sql = "select *from registo where ut_user = '$ut_user' and ut_pass = '$ut_pass' and Email = '$Email' and Nif = '$Nif '";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Registo successful </center></h1>";  
        }  
        else{  
            echo "<h1> Registo failed. Invalid username or password.</h1>";
             
        }     
?>


</body>

</html>