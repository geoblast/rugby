<html>  
<head>  
    <title>Registo</title>  
   
    <link rel = "stylesheet" type = "text/css" href = "style.css"> 
    <style>
    body{   
        font-family: Arial, Helvetica, sans-serif;
    background: #eee;  
}  
#frm{  
    border: solid gray 1px;  
    width:25%;  
    border-radius: 2px;  
    margin: 120px auto;  
    background: white;  
    padding: 50px;  
}  
#btn{  
    color: #fff;  
    background: #337ab7;  
    padding: 7px;  
    margin-left: 70%;  
}  
.box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }


</style> 

</head>  
<body>  
    <div id = "frm">  
        <h1>Registo</h1>  
        <form name="f1" action = "inserir_registo.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="ut_user" name  = "ut_user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="ut_pass" name  = "ut_pass" />  
            </p>  
            <p>  
                <label> Email: </label>  
                <input type = "text" id ="Email" name  = "Email" />  
            </p>  
            <p>  
                <label> Nif: </label>  
                <input type = "int" id ="Nif" name  = "Nif" />  
            </p>  
            <p>     
                <input type =  "submit" id = "registo" value = "Registar" />  
            </p>  
        </form>  
    </div>  
     
    <script>  
            function validation()  
            {  
                var id=document.f1.ut_user.value;  
                var ps=document.f1.ut_pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
        
</body>     
</html>  



