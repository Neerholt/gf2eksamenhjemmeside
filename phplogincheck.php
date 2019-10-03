

<?php 
session_start();
$hostname="localhost"; //Host navn på min database.
$username="root"; //standard brugernavn på database for linux.
$password=""; //adgangskode.
$database_name="logineksamen"; //Navnet på min SQL database.
$tabel_name="eksamenlogin"; //Navnet på min SQL databases tabel hvor mine brugere står listet. 


$connect = mysqli_connect($hostname, $username, $password, $database_name);


//Implementer "mysqli_connect_error" for at kunne fejlfinde bedre, hvad angår forbindelses problemer med min database.
if (!$connect){
    die("Connection failed: " . mysqli_connect_error ());
}

//Sikere at vores username og password er af type "POST" for at sikere at vores username og password ikke komme til at stå oppe i vores URL.
$user = $_POST ['brugernavn'];
$pass = $_POST ['adgangskode'];
        

//Laver en streng (SQLdatabase)og smider min variabler username og password ind i denne streng
//så laver jeg en funktion som hedder "mysqli_query" som så ender med at køre min SQLdatabase streng.
$sqldatabase = "SELECT * FROM $tabel_name WHERE brugernavn = '$user' && adgangskode = '$pass'";
$outputresult = mysqli_query($connect, $sqldatabase);


//Her laver jeg en variable hvor jeg tæller hvor mange resultater jeg får. 
//Det vil sige at det ikke er nok bare at skrive det rigtig bruger navn, og så der efter 
//kommer man ind, man skal også skrive den rigtig adgangskode samt det rigtig brugernavn
//for at man få adgang til websiden.
$count = mysqli_num_rows($outputresult);


//Her laver jeg så min php funktion hvor jeg siger, at hvis count er á lig med 1(en) så har 
//man opfyld alle de krav der er og man er velkommen på siden.
if($count == 1){
    $_SESSION ['login'] = 1;
    header("location:opskrift.php");
} else {
    header("location:loginfejl.php");
}

