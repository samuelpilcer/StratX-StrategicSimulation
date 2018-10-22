<?php
    $req = $bdd->query('SELECT year FROM EndYear');
    $annee=0;
    while ($donnees = $req->fetch())
    {
            if ($donnees['year']>=$annee){$annee=$donnees['year'];}
    }

    $step=0;
    $req2 = $bdd->query("SELECT Step, year FROM EndYear WHERE year = ".$annee."");

    while ($donnees = $req2->fetch())
    {
            if ($donnees['Step']>=$step){$step=$donnees['Step'];}
    }
?>