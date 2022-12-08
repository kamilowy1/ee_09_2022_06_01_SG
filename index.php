<!DOCTYPE html>
<html lang="pl">
<head> 
<meta charset="utf-8">
<title> Forum o psach </title>
<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
 
    <div id="baner">
    <h1> Forum miłośników psów </h1>
    </div>


       <div id="lewy">
       <img src="Avatar.png" alt="Użytkownik forum"> <br />
       <?php
       
       //połącznie z bazą
       $server = "localhost";
       $user = "root";
       $passwd = "";
       $dbname = "forumpsy";
       
       $conn = mysqli_connect($server, $user, $passwd, $dbname);
       /*
       if (!$conn) {
         die ("fatal error:".mysqli_error($conn));
       } echo "jest ok"; 
       */
       //pobranie wartosci z bazy 
       $sql = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta, pytania WHERE konta.id=pytania.konta_id AND pytania.id=1";
       $zapytanie = mysqli_query($conn,$sql);
       while ($wiersz = mysqli_fetch_row($zapytanie)){
         echo "<h4>Użytkownik: $wiersz[0]</h4>";
         echo "<p>$wiersz[1] postów na forum </p>";
         echo "<p>$wiersz[2]</p>"; 
       }

       ?>
       <video controls loop>
        <source src="video.mp4" type="video/mp4"> 
       </video>
       </div>
         
             <div id="prawy">
             <form action="index.php" method="get">
                <textarea name="odpowiedz" id="odpowiedz" cols="40" rows="4"></textarea> <br />
                <input type="submit" value="Dodaj odpowiedź"/>
             </form>
             <?php
             if (!empty($_GET['odpowiedz'])) {
               $odp = $_GET['odpowiedz'];
               $zapytanie2 = "INSERT INTO odpowiedzi VALUES (NULL,'1','5','$odp')";
               $wynik = mysqli_query($conn,$zapytanie2);
             }
             ?>

             <h2> Odpowiedzi na pytanie</h2>
             <?php
              $sql2 = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM konta,odpowiedzi WHERE konta.id=odpowiedzi.konta_id AND odpowiedzi.Pytania_id=1";
              $zapytanie3 = mysqli_query($conn,$sql2);
               echo "<ol>";
               while ($wiersz3 = mysqli_fetch_row($zapytanie3)) {
                  echo "<li> $wiersz3[1] <em>$wiersz3[2]</em><hr></li>";
               } echo "</ol>";
               mysqli_close($conn);
             ?>



             </div> 
             
                <div id="stopka">
                 <p> Autor: 000000000</p>
                 <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
                </div>








</body>
</html>