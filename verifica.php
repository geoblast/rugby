<?php      
    include('ligacao.php');  
    $ut_user = $_POST['ut_user'];  
    $ut_pass = $_POST['ut_pass'];  
      
        //to prevent from mysqli injection  
        $ut_user = stripcslashes($ut_user);  
        $ut_pass = stripcslashes($ut_pass);  
        $ut_user  = mysqli_real_escape_string($conn, $ut_user);  
        $ut_pass = mysqli_real_escape_string($conn, $ut_pass);  
      
        $sql = "select *from login where ut_user = '$ut_user' and ut_pass = '$ut_pass'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>