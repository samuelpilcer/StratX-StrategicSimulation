<?php
    
    if (isset($_POST['identifiant']) AND isset($_POST['CG']) AND isset($_POST['ATOS']) AND isset($_POST['TCS']) AND isset($_POST['ACCENTURE']))
    {
        $id=$_POST['identifiant'];
        if ($id == 123456789)
        {
                    $req = $bdd->query("SELECT nbActions, dividende FROM Capital WHERE year = ".$annee." AND step = 4 AND player = 1");
                    while ($donnees = $req->fetch())
                    {

                        $req3 = $bdd->prepare("UPDATE Capital SET prix=:prix WHERE year=".$annee." AND player = 1 AND step = 4");
                        $req3->execute(array(
                                            'prix' => $_POST["CG"]
                                    ));

                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => 1,
                                    'year' => $annee+1,
                                    'step' => 1,
                                    'nbActions' => $donnees["nbActions"],
                                    'dividende' => $donnees["dividende"],
                                    'prix' => $_POST["CG"]
                        ));
                    }

                    $req = $bdd->query("SELECT nbActions, dividende FROM Capital WHERE year = ".$annee." AND step = 4 AND player = 2");
                    while ($donnees = $req->fetch())
                    {
                        $req3 = $bdd->prepare("UPDATE Capital SET prix=:prix WHERE year=".$annee." AND player = 2 AND step = 4");
                        $req3->execute(array(
                                            'prix' => $_POST["ATOS"]
                                    ));
                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => 2,
                                    'year' => $annee+1,
                                    'step' => 1,
                                    'nbActions' => $donnees["nbActions"],
                                    'dividende' => $donnees["dividende"],
                                    'prix' => $_POST["ATOS"]
                        ));
                    }

                    $req = $bdd->query("SELECT nbActions, dividende FROM Capital WHERE year = ".$annee." AND step = 4 AND player = 3");
                    while ($donnees = $req->fetch())
                    {
                        $req3 = $bdd->prepare("UPDATE Capital SET prix=:prix WHERE year=".$annee." AND player = 3 AND step = 4");
                        $req3->execute(array(
                                            'prix' => $_POST["ACCENTURE"]
                                    ));
                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => 3,
                                    'year' => $annee+1,
                                    'step' => 1,
                                    'nbActions' => $donnees["nbActions"],
                                    'dividende' => $donnees["dividende"],
                                    'prix' => $_POST["ACCENTURE"]
                        ));
                    }

                    $req = $bdd->query("SELECT nbActions, dividende FROM Capital WHERE year = ".$annee." AND step = 4 AND player = 4");
                    while ($donnees = $req->fetch())
                    {
                        $req3 = $bdd->prepare("UPDATE Capital SET prix=:prix WHERE year=".$annee." AND player = 4 AND step = 4");
                        $req3->execute(array(
                                            'prix' => $_POST["TCS"]
                                    ));
                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => 4,
                                    'year' => $annee+1,
                                    'step' => 1,
                                    'nbActions' => $donnees["nbActions"],
                                    'dividende' => $donnees["dividende"],
                                    'prix' => $_POST["TCS"]
                        ));
                    }


                    $req = $bdd->query("SELECT player, NA, EMEA, ROW FROM Margin WHERE year = ".$annee);

                    while ($donnees = $req->fetch())
                    {
                        $req21 = $bdd->prepare("INSERT INTO Margin(year,player,NA,EMEA,ROW) VALUES(:year, :player, :NA, :EMEA, :ROW)");
                        $req21->execute(array(
                                            'year' => $annee + 1,
                                            'player' => $donnees['player'],
                                            'NA' => $donnees['NA'],
                                            'EMEA' => $donnees['EMEA'],
                                            'ROW' => $donnees['ROW']
                                ));
                    }

                    $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND step = 3");

                    while ($data = $req->fetch())
                    {
                        $req21 = $bdd->prepare("INSERT INTO Positions(year,player,step,NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO) VALUES(:year, :player, :step, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS, :ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)");
                        $req21->execute(array(
                                            "year" => $annee + 1,
                                            "player" => $data['player'],
                                            "step" => 0,
                                            "NA_CS" => $data["NA_CS"],
                                            "EMEA_CS" => $data["EMEA_CS"],
                                            "ROW_CS" => $data["ROW_CS"],
                                            "NA_NEW" => $data["NA_NEW"],
                                            "EMEA_NEW" => $data["EMEA_NEW"],
                                            "ROW_NEW" => $data["ROW_NEW"],
                                            "NA_OS" => $data["NA_OS"],
                                            "EMEA_OS" => $data["EMEA_OS"],
                                            "ROW_OS" => $data["ROW_OS"],
                                            "NA_INFRA" => $data["NA_INFRA"],
                                            "EMEA_INFRA" => $data["EMEA_INFRA"],
                                            "ROW_INFRA" => $data["ROW_INFRA"],
                                            "NA_BPO" => $data["NA_BPO"],
                                            "EMEA_BPO" => $data["EMEA_BPO"],
                                            "ROW_BPO" => $data["ROW_BPO"]
                                ));
                    }

                    $req = $bdd->query("SELECT player, year, step, value FROM Dette WHERE year = ".$annee." AND step = 3");

                    while ($donnees = $req->fetch())
                    {
                        $req21 = $bdd->prepare("INSERT INTO Dette(player, year, step, value) VALUES(:player, :year, :step, :value)");
                        $req21->execute(array(
                                            'player' => $donnees['player'],
                                            'year' => $annee + 1,
                                            'step' => 1,
                                            'value' => $donnees['value']
                                ));
                    }


                   
                    $req3 = $bdd->prepare('INSERT INTO EndYear(year,step) VALUES(:year, :step)');
                    $req3->execute(array(
                                'year' => $annee+1,
                                'step' => 1
                    ));
                    
        
        }
    }
?>