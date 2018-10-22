<?php
try
                {
                    $bdd = new PDO('mysql:host=stratxfryzsamuel.mysql.db;dbname=stratxfryzsamuel;charset=utf8', 'stratxfryzsamuel', 'StratX01');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }
?>