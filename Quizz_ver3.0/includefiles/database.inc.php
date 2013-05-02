<?php
               $host =		"localhost";
                $duser =		"root";
                $dpasswd =	"";
                $db =		"iqtest";
                $con = mysql_connect($host,$duser,$dpasswd);
                mysql_select_db("$db", $con);        
              ?>