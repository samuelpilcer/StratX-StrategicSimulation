<?php
    
    if (isset($_POST['identifiant']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';
        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {
                $didPlay=0;
                $req4 = $bdd->query("SELECT player FROM Bet WHERE year = ".$annee."");
                while ($donnees = $req4->fetch())
                {
                    if($donnees['player']==$id){$didPlay=1;}
                }

                if ($didPlay==0){
                    include 'getYear.php';
                    $req = $bdd->query("SELECT id, year, nom, description FROM MnA WHERE year = ".$annee."");
                
                    while ($donnees = $req->fetch())
                    {   

                        if (isset($_POST[$donnees['id']]) AND isset($_POST[$donnees['id']."Cap"]))
                        {
                            $req2 = $bdd->prepare('INSERT INTO Bet(year, idCompany, player, value, CapIncrease) VALUES(:year, :idCompany, :player, :value, :CapIncrease)');
                            $req2->execute(array(
                                        'year' => $annee,
                                        'idCompany' => $donnees['id'],
                                        'player' => $player,
                                        'value' => $_POST[$donnees['id']],
                                        'CapIncrease' =>$_POST[$donnees['id']."Cap"]
                            ));
                        }
                    }

                    $req = $bdd->query("SELECT player FROM Bet WHERE year = ".$annee."");
                    $CGplayed=0;
                    $Atosplayed=0;
                    $TCSplayed=0;
                    $Accentureplayed=0;
                    while ($donnees = $req->fetch())
                    {
                        if($donnees['player']==1){$CGplayed=1; }
                        if($donnees['player']==2){$Atosplayed=1; }
                        if($donnees['player']==3){$TCSplayed=1; }
                        if($donnees['player']==4){$Accentureplayed=1; }
                    }
                    if (($Accentureplayed==1) AND ($CGplayed==1) AND ($TCSplayed==1) AND ($Atosplayed==1))
                    {
                            $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND step = 1");

                            while ($data = $req->fetch())
                            {
                                    $req3 = $bdd->prepare('INSERT INTO Positions(year, step, player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO) VALUES(:year, :step, :player, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS,:ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)');


                                    $req3->execute(array(
                                            'year' => $annee,
                                            'step' => 3,
                                            'player' => $data['player'],
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    ));
                            
                            }

                            $req = $bdd->query("SELECT value, player FROM Dette WHERE year = ".$annee." AND step = 1");

                            while ($donnees = $req->fetch())
                            {
                                $req2 = $bdd->prepare('INSERT INTO Dette(player,year,step,value) VALUES(:player, :year, :step, :value)');
                                $req2->execute(array(
                                                    'player' => $donnees['player'],
                                                    'year' => $annee,
                                                    'step' => 3,
                                                    'value' => $donnees['value']*1.02
                                        ));
                            }


                            $req = $bdd->query("SELECT player, nbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND step = 1");

                            while ($donnees = $req->fetch())
                            {
                                $req3 = $bdd->prepare('INSERT INTO Capital(player,year,step,NbActions,dividende,prix) VALUES(:player, :year, :step, :NbActions, :dividende, :prix)');
                                $req3->execute(array(
                                                    'player' => $donnees['player'],
                                                    'year' => $annee,
                                                    'step' => 3,
                                                    'NbActions' => $donnees['nbActions'],
                                                    'dividende' => $donnees['dividende'],
                                                    'prix' => $donnees['prix']
                                        ));
                            }


                            $req6 = $bdd->query("SELECT idCompany FROM Bet WHERE year = ".$annee."");

                            $indices=array();

                            while ($donnees = $req6->fetch())
                            {
                                
                                if (in_array($donnees['idCompany'],$indices))
                                {}
                                else
                                {
                                    array_push($indices, $donnees['idCompany']);
                                }
                            }

// On créée les CA en step 3 qu'on actualisera ensuite



                            foreach ($indices as $ind)
                            {
                            		$req = $bdd->query("SELECT reservePrice FROM MnA WHERE year = ".$annee." AND id = ".$ind);

									$reservePrice=0;
                                    
                                    while ($donnees = $req->fetch())
                                    {
                                        $reservePrice=$donnees['reservePrice'];
                                    }
                                    
                                    
                                    $req = $bdd->query("SELECT player, idCompany, value, CapIncrease, year FROM Bet WHERE year = ".$annee." AND idCompany = ".$ind);

                                    $i=1;
                                    $value=0;
                                    $cap=0;

                                    while ($donnees = $req->fetch())
                                    {
                                        if ($donnees['value']>$value)
                                        {
                                            $i=$donnees['player'];
                                            $value=$donnees['value'];
                                            $cap=$donnees['CapIncrease'];
                                        }
                                    }

									if ($value >= $reservePrice)
									{
                                    $req2 = $bdd->prepare('INSERT INTO Integrations(year,player,idCompany,value, CapIncrease) VALUES(:year, :player, :idCompany, :value, :CapIncrease)');
                                    $req2->execute(array(
                                                            'year' => $annee,
                                                            'player' => $i,
                                                            'idCompany' => $ind,
                                                            'value' => $value,
                                                            'CapIncrease' => $cap
                                                ));
                                    

                                    // i integre la boite d'indice ind. pour la valeur value dont une partie cap est prise sur une augmentation de capital

                                    // Augmentation de capital

                                    
                                    // Trois modifications de la structure du capital. Une par M&A (step 3), l'autre par les buybacks (step 4), l'autre par une décision de l'arbitre concernant le prix (t+1, step 1).

                                    $req = $bdd->query("SELECT nbActions, prix FROM Capital WHERE year = ".$annee." AND step = 3 AND player = ".$i);


                                    while ($donnees = $req->fetch())
                                    {
                                        $req3 = $bdd->prepare("UPDATE Capital SET NbActions=:NbActions WHERE player = ".$i." AND year = ".$annee." AND step = 3");
                                        $req3->execute(array(
                                                            'NbActions' => $donnees['nbActions']+$cap/$donnees['prix']
                                                ));
                                    }

                                    // Achat pris en compte dans la dette
                                    // La dette nette, c'est l'opposé du Cashflow. Elle est augmentée par les versements d'intérêts et les acquisitions (step 3), puis par les dividendes, et les buybacks, puis augmentée en fin de période grâce au résultat final après impôts (t+1, step 1).

                                    $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND step = 3 AND player = ".$i);


                                    while ($donnees = $req->fetch())
                                    {
                                        $req2 = $bdd->prepare("UPDATE Dette SET value=:value WHERE player = ".$i." AND year = ".$annee." AND step = 3");
                                        $req2->execute(array(
                                                            'value' => $donnees['value'] + $value - $cap
                                                ));
                                    }



                                    
                                    
                                    // On recupere les chiffres d'affaires de la boite qui achete

                                    $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND step = 3 AND player = ".$i);

                                    while ($data = $req->fetch())
                                    {
                                        $EBITs=array(
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
                                        );
                                    }
                                    
                                    $NAorg=$EBITs["NA_CS"]+$EBITs["NA_NEW"]+$EBITs["NA_OS"]+$EBITs["NA_INFRA"]+$EBITs['NA_BPO'];
                                    $EMEAorg=$EBITs["EMEA_CS"]+$EBITs["EMEA_NEW"]+$EBITs["EMEA_OS"]+$EBITs["EMEA_INFRA"]+$EBITs['EMEA_BPO'];
                                    $ROWorg=$EBITs["ROW_CS"]+$EBITs["ROW_NEW"]+$EBITs["ROW_OS"]+$EBITs["ROW_INFRA"]+$EBITs['ROW_BPO'];

                                    // Effet sur les marges

                                    $req = $bdd->query("SELECT margin, NA, EMEA, ROW, CS, NEW, OS, INFRA, BPO FROM MnA WHERE year = ".$annee." AND id = ".$ind);

                                    while ($donnees = $req->fetch())
                                    {
                                        $margin=$donnees['margin'];
                                        $NAint=$donnees['NA'];
                                        $EMEAint=$donnees['EMEA'];
                                        $ROWint=$donnees['ROW'];
                                        $CSint=$donnees['CS'];
                                        $NEWint=$donnees['NEW'];
                                        $OSint=$donnees['OS'];
                                        $INFRAint=$donnees['INFRA'];
                                        $BPOint=$donnees['BPO'];
                                    }


                                    $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$i);
                                    while ($donnees = $req4->fetch())
                                    {
                                        $NAmargin=$donnees['NA'];
                                        $EMEAmargin=$donnees['EMEA'];
                                        $ROWmargin=$donnees['ROW'];
                                    }


                                    $req10=$bdd->prepare("UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=".$annee." AND player=".$i."");
                                    $req10->execute(array(
                                        'NA' => ($margin*$NAint+$NAmargin*$NAorg)/($NAint+$NAorg),
                                        'EMEA' => ($margin*$EMEAint+$EMEAmargin*$EMEAorg)/($EMEAint+$EMEAorg),
                                        'ROW' => ($margin*$ROWint+$ROWmargin*$ROWorg)/($ROWint+$ROWorg)
                                    ));


                                    // Effet sur l'EBIT en step 3
                                    // On calcule l'EBIT en t=1 à partir de celui en t=0 et des priorités géographico-sectorielles. Après acquisition, on a un ebit en t=2. t+1 & step 0 -> le même.

                                    $req3 = $bdd->prepare("UPDATE Positions SET NA_CS=:NA_CS, EMEA_CS=:EMEA_CS, ROW_CS=:ROW_CS, NA_NEW=:NA_NEW, EMEA_NEW=:EMEA_NEW, ROW_NEW=:ROW_NEW, NA_OS=:NA_OS, EMEA_OS=:EMEA_OS, ROW_OS=:ROW_OS, NA_INFRA=:NA_INFRA, EMEA_INFRA=:EMEA_INFRA, ROW_INFRA=:ROW_INFRA, NA_BPO=:NA_BPO, EMEA_BPO=:EMEA_BPO, ROW_BPO=:ROW_BPO WHERE year=".$annee." AND step = 3 AND player = ".$i);
                        

                                    $req3->execute(array(
                                            'NA_CS' => $EBITs['NA_CS'] + $NAint*$CSint/100,
                                            'EMEA_CS' => $EBITs['EMEA_CS'] + $EMEAint*$CSint/100,
                                            'ROW_CS' => $EBITs['ROW_CS'] + $ROWint*$CSint/100,
                                            'NA_NEW' => $EBITs['NA_NEW'] + $NAint*$NEWint/100,
                                            'EMEA_NEW' => $EBITs['EMEA_NEW'] + $EMEAint*$NEWint/100,
                                            'ROW_NEW' => $EBITs['ROW_NEW'] + $ROWint*$NEWint/100,
                                            'NA_OS' => $EBITs['NA_OS'] + $NAint*$OSint/100,
                                            'EMEA_OS' => $EBITs['EMEA_OS'] + $EMEAint*$OSint/100,
                                            'ROW_OS' => $EBITs['ROW_OS'] + $ROWint*$OSint/100,
                                            'NA_INFRA' => $EBITs['NA_INFRA'] + $NAint*$INFRAint/100,
                                            'EMEA_INFRA' => $EBITs['EMEA_INFRA'] + $EMEAint*$INFRAint/100,
                                            'ROW_INFRA' => $EBITs['ROW_INFRA'] + $ROWint*$INFRAint/100,
                                            'NA_BPO' => $EBITs['NA_BPO'] + $NAint*$BPOint/100,
                                            'EMEA_BPO' => $EBITs['EMEA_BPO'] + $EMEAint*$BPOint/100,
                                            'ROW_BPO' => $EBITs['ROW_BPO'] + $ROWint*$BPOint/100
                                    ));

									}

                                    // Rajouter un passage pour comptabiliser l'intégration dans les revenus de la boite.
                                    // calcul de l'EBIT total
                            
                            
                            }



                            // On calcule les EBIT après M&A !

                            $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND step = 3");
                            while ($positions = $req->fetch())
                            {
                        


                                $NA_CS = $positions['NA_CS'];
                                $EMEA_CS = $positions['EMEA_CS'];
                                $ROW_CS = $positions['ROW_CS'];
                                $NA_NEW = $positions['NA_NEW'];
                                $EMEA_NEW = $positions['EMEA_NEW'];
                                $ROW_NEW = $positions['ROW_NEW'];
                                $NA_OS = $positions['NA_OS'];
                                $EMEA_OS = $positions['EMEA_OS'];
                                $ROW_OS = $positions['ROW_OS'];
                                $NA_INFRA = $positions['NA_INFRA'];
                                $EMEA_INFRA = $positions['EMEA_INFRA'];
                                $ROW_INFRA = $positions['ROW_INFRA'];
                                $NA_BPO = $positions['NA_BPO'];
                                $EMEA_BPO = $positions['EMEA_BPO'];
                                $ROW_BPO = $positions['ROW_BPO'];


                                $req16 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$positions['player']);
                                
                                $margin=array(
                                        'NA' => 0,
                                        'EMEA' => 0,
                                        'ROW' => 0
                                    );

                                while ($mgn = $req16->fetch())
                                {
                                    $margin['NA']=$mgn['NA'];
                                    $margin['EMEA']=$mgn['EMEA'];
                                    $margin['ROW']=$mgn['ROW'];
                                }


                                $req5 = $bdd->prepare('INSERT INTO EBIT(year, player, step, EBIT) VALUES(:year, :player, :step, :EBIT)');
                        
                                
                                $req5->execute(array(
                                    'year' => $annee,
                                    'player' => $positions['player'],
                                    'step' => 3,
                                    'EBIT' => ($margin['NA']*($NA_CS+$NA_NEW+$NA_OS+$NA_INFRA+$NA_BPO) + $margin['EMEA']*($EMEA_CS+$EMEA_NEW+$EMEA_OS+$EMEA_INFRA+$EMEA_BPO) + $margin['ROW']*($ROW_CS+$ROW_NEW+$ROW_OS+$ROW_INFRA+$ROW_BPO))/100
                                ));

                                $req5 = $bdd->prepare('INSERT INTO EBIT(year, player, step, EBIT) VALUES(:year, :player, :step, :EBIT)');
                        
                                
                                $req5->execute(array(
                                    'year' => $annee+1,
                                    'player' => $positions['player'],
                                    'step' => 1,
                                    'EBIT' => ($margin['NA']*($NA_CS+$NA_NEW+$NA_OS+$NA_INFRA+$NA_BPO) + $margin['EMEA']*($EMEA_CS+$EMEA_NEW+$EMEA_OS+$EMEA_INFRA+$EMEA_BPO) + $margin['ROW']*($ROW_CS+$ROW_NEW+$ROW_OS+$ROW_INFRA+$ROW_BPO))/100
                                ));


                            }





                            $req3 = $bdd->prepare('INSERT INTO EndYear(year,step) VALUES(:year, :step)');
                            $req3->execute(array(
                                        'year' => $annee,
                                        'step' => 4
                            ));
                    }
                }
        }
    }
?>