<?php 
session_start();
include("header.php"); 
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","root","passengerinfo");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$name=$_POST['name'];
$age=$_POST['age'];
$nationality=$_POST['nationality'];
$gender=$_POST['gender'];




$sql = "INSERT INTO passengerdet( name, age, nationality, gender) VALUES ('$name','$age','$nationality','$gender')";
if(mysqli_query($conn,$sql))
{  
    echo 'Passenger added successfully';

	//$message = "Passenger added successfully";
    header('Location: pay.php');
}
	else {
        echo "<script type='text/javascript'>alert('Transaction failed')</script>";

		//$message="Transaction failed";
	}
	//echo "<script type='text/javascript'>alert('$message')</script>";


mysqli_close($conn);

}

/*if ( isset($_POST['submit'])) {
    $sql = "INSERT INTO passengerdet (name, , age,nationality, gender) 
              VALUES (:name, :age, :nationality,:gender )";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        
        ':' => $_POST[''],
        
        ':age' => $_POST['age'],
        'gender' => $_POST['gender'],
        ':nationality' => $_POST['nationality']));
    }*/
?> 
<html> 
    <head> 
    <title> Passenger Detail </title> 
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
@import url(style.css);
#logo	{ 
	border-radius: 25px;
    border: 1px solid blue; 
    width: 100px;
    height: 100px; 
}
*	{
	color: white;
}

#About_us	{ 
	border-radius: 25px;
    border: 1px solid blue; 
    width: 100px;
    height: 100px; 
}
*	{
	color: white;
}


html { 
  background:  url(img/bg4.jpg) no-repeat center center fixed;   
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#tab{
    background-color: rgba(0,0,0,0.7);
   font color: black;
}
td{
    font color: black;
}
#main	{
		width:750px;
		height: 500px;
		margin: 0 auto;
		margin-top: 30px;
		color:black;
		border-radius: 25px;
  		padding-top: 10px;
    	padding-right: 10px;
    	padding-bottom: 10px;
    	padding-left: 10px;
    	background-color: rgba(0,0,0,0.7);
	}
    #button{
       margin-left:600px;   

    }
    
</style>
</HEAD>
<BODY>

                
        <h1 align="center">Enter Passenger Details</h1>
        <form method ="post" action="PPPP.php" name="form1"> 
            <table id="tab" border ="2" align="center" cellpadding="7" cellspacing="7">
                
            
                <tr> 
                    <td><strong>Passenger 1</strong></td> 

                    <td><strong>Name</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="name"> 
                    </td>    
              

             
                     
           

                   <td><strong>Age</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="age" size="2">  
                    </td>    
               
               
                    <td><strong>Nationality</strong></td> 

                    <td>
                        <input type="radio" name="nationality" value="Indian"> Indian <br>
                        <input type="radio" name="nationality" value="Not Indian"> Not Indian
                    </td>    
                
                    <td><strong>Gender</strong></td> 

                    <td>
                        <input type="radio" name="gender" value ="Male"> Male  <br>
                        <input type="radio" name="gender" value ="Female"> Female <br>
                        <input type="radio" name="gender" value ="Other"> Other <br>         

                    </td>    
                </tr>                
                
               <!--<tr> 
                    <td><strong>Passenger 2</strong></td> 

                    <td><strong>Name</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="name[]"> 
                    </td>    
              

             
                    
           

                   <td><strong>Age</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="age[]" size="2">  
                    </td>    
               
               
                    <td><strong>Nationality</strong></td> 

                    <td>
                        <input type="radio" name="nationality[]" value="Indian"> Indian  <br>
                        <input type="radio" name="nationality[]" value="Indian"> Not Indian  <br>
                    </td>    
                
                    <td><strong>Gender</strong></td> 

                    <td>
                        <input type="radio" name="gender[]" value ="Male"> Male <br>
                        <input type="radio" name="gender[]" value ="Female"> Female <br>
                        <input type="radio" name="gender[]" value ="Other"> Other        <br>  

                    </td>    
                </tr> 

                <tr> 
                    <td><strong>Passenger 3</strong></td> 

                    <td><strong>Name</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="name[]"> 
                    </td>    
              

             
                   
           

                   <td><strong>Age</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="age[]" size="2">  
                    </td>    
               
               
                    <td><strong>Nationality</strong></td> 

                    <td>
                        <input type="radio" name="nationality[]" value="Indian"> Indian  <br>
                        <input type="radio" name="nationality[]" value="Indian"> Not Indian <br>
                    </td>    
                
                    <td><strong>Gender</strong></td> 

                    <td>
                        <input type="radio" name="gender[]" value ="Male"> Male <br>
                        <input type="radio" name="gender[]" value ="Female"> Female <br>
                        <input type="radio" name="gender[]" value ="Other"> Other        <br>  

                    </td>    
                </tr> 

                <tr> 
                    <td><strong>Passenger 4</strong></td> 

                    <td><strong>Name</strong></td> 

                    <td>
                        <input type="text" style="color:black" name="name[]"> 
                    </td>    
              

             
                      
           

                   <td><strong>Age</strong></td> 

                    <td>
                        <input type="text"  style="color:black" name="age[]" size="2">  
                    </td>    
               
               
                    <td><strong>Nationality</strong></td> 

                    <td>
                        <input type="radio" name="nationality[]" value="Indian"> Indian  <br>
                        <input type="radio" name="nationality[]" value="Indian"> Not Indian  <br>
                    </td>    
                
                    <td><strong>Gender</strong></td> 

                    <td>
                        <input type="radio" name="gender[]" value ="Male"> Male  <br>
                        <input type="radio" name="gender[]" value ="Female"> Female <br>
                        <input type="radio" name="gender[]" value ="Other"> Other        <br>  

                    </td>    
                </tr> -->

              
               
            </table>
            <INPUT TYPE="submit" name="submit" id="submit" align='' class="button">

        </form>

    </body>
</html>