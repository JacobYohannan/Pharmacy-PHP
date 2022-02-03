<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table {
        border-collapse: collapse;
        width: 70%;
    }

    table td,
    table th {
        border: 2px solid #ddd;
        padding: 8px;
    }


    table th {
        font-weight: bold;
   
        text-align: left;
        background-color: #007bff;
        color: white;
    }



    input[type=text],
    input[type=date],
    input[type=time],
    textarea,
    select {
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

  
    
    input[type=submit] {
        width: 30%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-3 {
        width: 50%;
    }

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: #fff;
        margin-bottom: 2%;
    }

    .alert-error {
        background-color: #f44336;
    }

    .alert-success {
        background-color: #2eb885;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

<body><br>
    <center>
        <h1>Pharmacy Management</h1><br>
         <form  name ="form" method="POST" onsubmit="return check_validation()" >

             Medicine Code :<br> <input type="text" name="code" required><br><br>

             Medicine Name :<br> <input type="text" name="name" required><br><br>

             Quantity :<br> <input type="text" name="quantity" required> <br><br>

             Unit Price :<br> <input type="text" name="unitp" required><br><br>

            <input type="submit" name="insert" value="Insert">

         </form>
    </center>
    <br><br>


<?php

require 'connect.php';

if (isset($_POST['insert'])) {
$code=$_POST['code'];
$name=$_POST['name'];
$nos=$_POST['quantity'];
$uprice=$_POST['unitp'];
$total=(int)$nos * (int)$uprice;


$sql = "insert into medicine (Mcode,Mname,Qnty,Uprice,Total)values('$code','$name','$nos','$uprice','$total')";


if(mysqli_query($conn,$sql))
{
     ?>
    <script>
        alert("Data Inserted");
        window.location.replace('index.php');
    </script>
   <?php
    
}}
?>
    <center>
        <h2>Bill Details</h2>
        <table border="1" cellpadding="15">
            
                <th>Medicine Code</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>   
            
            <?php
            require 'connect.php';
            $r = mysqli_query($conn, "select * from medicine");
            while ($row = mysqli_fetch_assoc($r)) {
                
            ?>

                <tr>
                    <td><?php echo $row['Mcode']; ?></td>
                    <td><?php echo $row['Mname']; ?></td>
                    <td><?php echo $row['Qnty']; ?></td>
                    <td><?php echo $row['Uprice']; ?></td>
                    <td><?php echo $row['Total']; ?></td>

                  
                </tr>

            <?php

            }
            ?>
        </table>
    </center>
    <script>
    function check_validation() {
        var code = document.form.code.value;
        
        var name = document.document.form.name.value;
        var qnty = document.document.form.quantity.value;
        var price = document.document.form.uprice.value;

        
        if (code== ""){
            alert("Medicine code cannot be empty");
            return false;
        }
        if (name == ""){
            alert("Medicine Name cannot be empty");
            return false;
        }
        if (qnty == "" || isNaN(qnty)){
            alert("Quantity cannot be empty and must be an integer");
            return false;
        }
        if (price == "" || isNaN(price)){
            alert("=Unit price cannot be empty and must be an integer");
            return false;
        }
       
    }
</script>
</body>

</html>