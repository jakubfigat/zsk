<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>sredni wiek</title>
  </head>
  <body>
    <?php
      if (!isset($_POST['person']) && !isset($_POST['buttonAvg'])) {
        echo <<< FORMCOUNTPERSON
          <h3>ilosc osob w rodzinie</h3>
          <form method="post">
            <input type="number" name="person" placeholder="podaj ilosc osob">
            <input type="submit" value="zatwierdz">
          </form>
        FORMCOUNTPERSON;
      }

      if(!empty($_POST['person'])){
        echo "<h3>ilosc osob w rodzinie: $_POST[person]</h3>";
        echo <<< FORMAGEPERSON
        <form method="post">
        FORMAGEPERSON;
        $count = $_POST['person'];
          for ($i=1; $i <= $count; $i++) {
            echo "<input type='number' name='person$i' placeholder='podaj wiek osoby nr $i'><br><br>";
          }
        echo <<< FORMAGEPERSON
          <input type="submit" name="buttonAvg" value="Oblicz sredni wiek">
        </form>
        FORMAGEPERSON;
      }

      if (isset($_POST['buttonAvg'])) {
        //print_r($_POST);
        $avg = 0;
        $count = 0;
        foreach ($_POST as $key => $value) {
          //echo "$key : $value<br>";
          if ($key != 'buttonAvg') {
            $avg = $avg + $value;
            $count = $count + 1;
          }
        }
        echo "Sredni wiek: ".number_format($avg/$count, 2, " ");
      }

    ?>

  </body>
</html>
