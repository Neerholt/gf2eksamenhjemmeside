<?php include_once 'databaseConnection.php';?>

    <?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Indsendt opskrift.</title>
    </head>
    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- CSS Style link til søge funktion-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--CSS Style link til mine social media-->
<!--Hele hjemmesidens layout start-->       
  <style>
    body{
        background-color: #EEE;
    }
   
    #header{
        background-color: #999999;
        color: black;
        padding: 1px;
        text-align: center;
    }  
    
    #container{
        background-color: white;
        width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }
    
    #content{
        padding: 10px;  
    }
    
    #nav{
        width: 151px;
        float: left;
        text-align: center;
        border: 2px solid red;
    }
    
    #nav ul{
        list-style-type: none;
        padding: 0px;
    }
    
    #main{
        width: 844px;
        float: right;
    }
    
  #textkasse{
        background-color: #FFFFFF;
        width: 770px;
        border: 1px solid grey ;
        padding: 5px;
        margin: 30px;
}
    
    #footer{
        clear: both;
        padding: 3px;
        text-align: right;
    }

</style>

<!--The start of my style script to make the sign-in form look nice -->
 <style>
.formcss {
  background-color: #FFFFFF;
  border: none;
  color: black;
  padding: 7px 31px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-top: 10px;
}

.formcss {background-color: #EEE;} 
</style>
<!--The ending of my style script to make the sign-in form look nice -->

<!--The start of my css style to my button-->
 <style> 
.logincss {
  background-color: #f44336; 
  border: none;
  color: white;
  padding: 7px 31px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>   
 <!--The ending of my css style to my button-->
 
 <!--The start of my css style to my menu buttons-->
 <style>
.buttonmenu {
  background-color: #f44336;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 4px;
  cursor: pointer;
}

</style><!--The ending of my css style to my menu buttons-->

<!--The start of my "main menu container"-->
<style>
div.ex1 {
  background-color: white;
  width: 845px;
  height: 830px;
  overflow: auto;
}
</style>
<!--The end of my "main menu container"-->

<!--The start of my css nav style-->
<style>
body {
  margin: 0;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #f44336;
  color: white;
}

li a:hover:not(.active) {
  background-color: #EEE;
  color: white;
}
</style>
    
<!--The start of my css style to the searchbar-->
<style>

.topnav .search-container {
  float: left;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 10px;
  margin-left: 36px;
  font-size: 17px;
  border: none;
  background: #EEE;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 10px;
  margin-right: 20px;
  background: #f44336;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
.topnav .search-container button:hover {
  background: #ccc;
}

</style><!--The end of my css style to the searchbar-->

<!--The start of my css style to my social media buttons-->
<style>
.fa {
  padding: 20px;
  font-size: 27px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-pinterest {
  background: #cb2027;
  color: white;
}

.fa-tumblr {
  background: #2c4762;
  color: white;
}

</style><!--The end of my css style to my social media buttons-->

               
<!--The end of my css nav style-->

 <!--Hele hjemmesidens layout slut-->     
        <div id="container"><!--The start of my div "container"-->
            <div id="header"><!--The start of my div "header" -->
                <h1><strong>Kogebogen.com/Indsendt opskrift.</strong></h1>
            </div><!--The ending of my div "header"-->

           <div id="nav"><!--The start of my div "nav"-->
                <center><h2>Admin panel</h2></center>
                
                <form method="POST" action="opskrift.php">
                <input class="logincss" type="submit" name="logut" value="Tilbage">
               </form>
                
                <hr>

                <form method="POST" action="index.php">
                <input class="logincss" type="submit" name="logut" value="Log ud">
                </form>

           </div><!--The ending of my div "nav"-->
           <div id="main"><!--The start of my div "main"-->   
                <div id="main"><!--Div start main-->
                    <div class="ex1"><!--Div start More recipes -->
                     
                     <?php
                     $sql_tabel = "SELECT * FROM indsendop;"; /* Her er grunde til det virker, kan du huske det? Det virker fordi at den tager fra(FROM) database tabelen "lavopskrift"*/
                     $data = mysqli_query($connect,$sql_tabel);
                     $datacheck = mysqli_num_rows($data);
                     
                     if($data){
                         while ($row = mysqli_fetch_assoc($data)){
                             echo '<div id="textkasse">';
                             echo 'Opskrift sendt ind af &nbsp;'.$row['Navn'];
                             echo '&nbsp;'.$row['Efternavn']. ".";
                             echo '<br>';
                             echo 'Send ind den&nbsp;';
                             echo(date("d-m-Y")). ".";
                             echo '<br><br>';
                             echo $row['Besked'];
                             echo '</div>';

                         }
                     } 
                     
                     /*Du skal huske at sætte din database "datatype" til at tag minst 4000 ord */
                     
                     ?>                  
                    
                    </div> <!--Div slut More recipes -->  
           </div><!--The ending of my div "main"-->
           <div id="footer">
               <hr>
              Victor Neerholt & Frederik Vilhelmsen &copy; <?php echo date("Y"); ?> 
           </div>
        </div><!--The ending of my div "container"-->
        
    </body>
</html>
