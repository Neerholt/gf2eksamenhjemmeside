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
        <title>Fejl ved login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
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

    #main{
        width: 930px;
    }
    
    #loginform{
        color: black;
    }
   #footer{
        clear: both;
        padding: 3px;
        text-align: right;
    }
  
    
</style>
 <!--Hele hjemmesidens layout slut-->       

 <!--Start:Style til login text feltet-->
 <style>
.formcss {
  background-color: #FFFFFF;
  border: 3px;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.formcss {background-color: gainsboro;} 
</style>
<!--Slut:Style til login text feltet-->

 <!--Start:Style til login knappen-->
 <style> 
.logincss {
  background-color: #f44336; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


</style>   
 <!--slut:Style til login text knappen-->
 
         <br /> <br /> <br /> <br /> <br /> <br /> <br />
        <div id="container"><!--Div start container-->
            <div id="header"><!--Div start header-->
             
                <h1><strong>Fejl ved login</strong></h1>
             </div>
   
            <!--Div slut header-->
            <div id="content"><!--Div start content-->
               
                <div id="main"><!--Div start main-->
                    <div id="loginform"><!--Div start loginform-->
                        <ul>
                            
                            
                            <center><h3>Der sket en fejl da du prøvet at logge ind, prøv igen.</h3></center>
                            
                            <center><form action="index.php" method="get">
                                <input class="logincss" type="submit" value="Tilbage">
                            </form></center>
                        </ul>
                        
                    </div><!--Div slut loginform-->
                  
                </div><!--Div slut main-->
            </div><!--Div slut content-->
            
            <div id="footer"><!--Div start footer-->
 
                <hr>
               <p>Victor Neerholt & Frederik Vilhelmsen &copy; <?php echo date("Y"); ?> </p>
              

            </div><!--Div slut footer-->
        </div><!--Div slut container-->

    </body>
</html>
