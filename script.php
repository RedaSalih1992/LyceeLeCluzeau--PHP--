
<?php
// Formation gmnf 33    Formation gestion des milieux naturel et de la faune 33 formation gmnf situe 33     et 24
// bts esf situe 33 BTS esf 33     et 24
//  Internat collège 33 internat college situe 33     et 24 

// 12 à ne pas afficher
// 9 nouv
// 13 ex
// 3 ==
// 32 ++
// 22 --
header( 'content-type: text/html; charset=utf-8' );
require 'vendor/autoload.php';
use League\Csv\Reader;

include('specialite.php');
include('resultat1.php');
$resultat1 = array();
$tab = getResultat1();
//$resultat1 = tri($resultat1);

$tab = redondanceTitre($tab);

$tab = redondanceMoteur($tab);
$tab = adjustArray($tab);
function adjustArray($tab){	
$t = array();
array_push($t,$tab[0]);
for($j = 0; $j < count($tab);$j++){

if($tab[$j]->titre != "BTS esf 24" ) {
	if($tab[$j]->titre != null){
		array_push($t,$tab[$j]);
	}
}
}
return $t;
}

function redondanceTitre($tab){		
		for($j = 0; $j < count($tab);$j++){
			if($tab[$j]->titre == "Formation gestion des milieux naturel et de la faune 33" || $tab[$j]->titre == "formation gmnf situe 33" ) {
				$tab[$j]->titre = "Formation gmnf 33";
					
			}	
			if($tab[$j]->titre == "Formation gestion des milieux naturel et de la faune 24" || $tab[$j]->titre == "formation gmnf situe 24" ) {
				$tab[$j]->titre = "Formation gmnf 24";
					
			}	
			if($tab[$j]->titre == "bts esf situe 33"){
				$tab[$j]->titre = "BTS esf 33";
			}
			if($tab[$j]->titre == "bts esf situe 24"){
				$tab[$j]->titre = "BTS esf 24";
			}
			if($tab[$j]->titre == "internat college situe 33"){
				$tab[$j]->titre = "Internat collège 33";
			}
			if($tab[$j]->titre == "internat college situe 24"){
				$tab[$j]->titre = "Internat collège 24";
			}
			if($tab[$j]->titre == "bts technico commercial situe 24"){
				$tab[$j]->titre = "BTS technico commercial 24";
			}
			if($tab[$j]->titre == "formation services aux personnes situe 24"){
				$tab[$j]->titre = "Formation services aux personnes 24";
			}

			if($tab[$j]->titre == "formation services aux personnes situe 33"){
				$tab[$j]->titre = "Formation services aux personnes 33";
			}
			
			
			if($tab[$j]->titre == "formation gestion de la faune sauvage situe 24" || $tab[$j]->titre == "formation gestion des milieux naturel et de la faune 24"){
				$tab[$j]->titre = "Formation gestion de la faune sauvage 24";
			}
			if($tab[$j]->titre == "formation gestion de la faune sauvage situe 24"){
				$tab[$j]->titre = "Formation gestion de la faune sauvage 24";
			}
			
			
			if($tab[$j]->titre == "Formation environnement/amènagement 33"){
				$tab[$j]->titre =  "formation environnement amenagement 33";
			}
			if($tab[$j]->titre == "Formation environnement/amènagement 24"){
				$tab[$j]->titre =  "formation environnement amenagement 24";
			}		
			
			if($tab[$j]->titre == "formation bac pro services situe 24"){
				$tab[$j]->titre =  "Formation bac pro services 24";
			}
			if($tab[$j]->titre == "formation bac pro services situe 33"){
				$tab[$j]->titre =  "Formation bac pro services 33";
			}
			if($tab[$j]->titre == "section sportives situe 24"){
				$tab[$j]->titre =  "Section sportives 24";
			}
            if($tab[$j]->titre == "bts technico commercial situe 33"){
				$tab[$j]->titre =  "BTS technico commercial 33";
			}			
			
			
			
		
		
		
	}
	return $tab;
}

function redondanceMoteur($tab){	
	$t = array();
	$help = array();
    $tab2 = $tab;
	$rowh = new Resultat1();
	foreach ($tab as $i => $row1) {

    
		if(array_search($row1->titre."-".$row1->moteur ,$help) == null){
			
			foreach ($tab2 as $i => $row2) {  
		           
				if($row1->titre == $row2->titre && $row1->moteur == $row2->moteur && ($row1->position < $row2->position ) ) {
				
					$row1 = $row2;		
				}
				
	  
			}
		
			array_push($t,$row1);
			array_push($help,$row1->titre."-".$row1->moteur);
	   }
	 
	 
	}
	 
	foreach ($help as $i => $row) {
		
		  
			}

	return $t;
}

function getResultat1(){

$tab1 = rapport1ToArray();
$tab2 = rapport2ToArray();
$r1 = new Resultat1();
$resultat1 = array();

for($i = 1; $i < count($tab1);$i++){

   if(!($tab1[$i]->position == 0 && $tab2[$i]->position == 0 )){
	   if ($tab1[$i]->moteur == "Bing.com France - (Tout afficher)"){
			   $r1->moteur = "bing";
		}
		if ($tab1[$i]->moteur == "fr.yahoo.com (sur tout le web)"){
			   $r1->moteur = "yahoo";
		}
		if ($tab1[$i]->moteur == "Google.fr (Le Web)"){
			   $r1->moteur = "google";
    }
	
	$r1->cle = $tab1[$i]->cle;
	
	// si le titre est vide ou le titre  finit  par ... 
	if($tab1[$i]->titre == null || (substr($tab1[$i]->titre,strlen($tab1[$i]->titre) - 3 ,strlen($tab1[$i]->titre)) == "..." )){
	
		if ( (strpos($tab1[$i]->cle, 'Cluzeau')) || (strpos($tab1[$i]->cle, 'CLUZEAU'))  ){
			if ( strlen($tab1[$i]->page) > 27 && substr($tab1[$i]->titre,0,5) == "LYCEE"  ){
				$r1->titre = str_replace("-"," ",$tab1[$i]->page);
				$r1->titre = str_replace(".html","",$r1->titre);
				$r1->titre  = substr($r1->titre,25,strlen($r1->titre));				
			}
			else{
				$r1->titre = str_replace("-"," ",$tab1[$i]->page);
				$r1->titre = str_replace(".html","",$r1->titre);
				$r1->titre  = substr($r1->titre,25,strlen($r1->titre));					
			}
		}
			// si la clé ne contient pas cluzeau
		else {			
			$r1->titre = $tab1[$i]->cle;		
		
		}
	
	}
	
	// Sinon on vérifie la clé si elle contient cluzeau alors on prend la page
    else{			
	    if(strlen($tab1[$i]->page) > 27 && substr($tab1[$i]->titre,0,5) == "LYCEE" ){
			$r1->titre = str_replace("-"," ",$tab1[$i]->page);
				$r1->titre = str_replace(".html","",$r1->titre);
				$r1->titre  = substr($r1->titre,25,strlen($r1->titre));	
				
		}
		else{
			
		
		// On vérifie si le titre contient cluzeau
		if( (strpos($tab1[$i]->titre, 'Cluzeau')) || (strpos($tab1[$i]->titre, 'CLUZEAU')) ){		
			
					$r1->titre  = substr($tab1[$i]->titre,0,strlen($tab1[$i]->titre)-22);
					$arr = explode("-", $r1->titre , 2);
					$r1->titre = substr($arr[0],0,strlen($arr[0])-1);					

		}	
		// Si le titre ne contient pas cluzeau
		else {
		
				$r1->titre = $tab1[$i]->titre ;			
			
		}
	   }
	}

	// == 
		
	 if($tab1[$i]->position === $tab2[$i]->position && !($tab1[$i]->position === '0') ){		 
	     
		   $r1->signe="="; 
		   $r1->position = $tab1[$i]->position;
		 
	   }
	   // ++
	 if($tab1[$i]->position - $tab2[$i]->position < 0  && $tab1[$i]->position > 0 ){
	
		  $r1->difference = $tab1[$i]->position - $tab2[$i]->position;
		 
		  $r1->position = $tab2[$i]->position;
	
	   }
	   // --
	   if(($tab1[$i]->position - $tab2[$i]->position ) > 0 && $tab2[$i]->position > 0 ){
		   	       
		  $r1->difference = $tab1[$i]->position - $tab2[$i]->position;
		  $r1->signe="+"; 
		 
		  $r1->position = $tab2[$i]->position;
		    
  	  
	   }
	   // nouv
	 
	    if((int)$tab2[$i]->position != null && (int)$tab1[$i]->position == null){		
		  $r1->signe="nouv"; 
		  $r1->position = $tab2[$i]->position;
		
	   }
	   // ex
	   if((int)$tab2[$i]->position == null && (int)$tab1[$i]->position != null){		  
		  $r1->signe="ex"; 
		  $r1->position = $tab1[$i]->position;	  
		   
	   }
	   
	    array_push($resultat1,$r1);
		unset($r1);
		$r1 = new Resultat1();
      }
		  
	}


return $resultat1;
}

function rapport1ToArray(){
$reader = Reader::createFromPath('Rapport1.csv');
$reader->setFlags(SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY);

$data = $reader->query();
$tab = array();
$specs1  = array();
foreach ($data as $i => $rows) {
   foreach ($rows as $j => $row) {
       $cells  =  explode(";",$row);
       $spec  =  new Specialite();
	 foreach ($cells as $k => $cell) {
		$cell = utf8_decode($cell);
		$cell = str_replace("?","è",$cell);
     	array_push($tab,$cell);	
	 }
    $spec->position = $tab[0];
	$spec->moteur = $tab[1];
    $spec->cle = $tab[2];	
	$spec->page = $tab[4];	
	$spec->titre = $tab[5];
	array_push($specs1,$spec);	
   	
    unset($tab);

    $tab = array();

	}

}
return $specs1;	
}

function rapport2ToArray(){
$reader = Reader::createFromPath('Rapport2.csv');
$reader->setFlags(SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY);

$data = $reader->query();
$tab = array();
$specs2  = array();
foreach ($data as $i => $rows) {
   foreach ($rows as $j => $row) {
       $cells  =  explode(";",$row);
       $spec  =  new Specialite();
	 foreach ($cells as $k => $cell) {
		if(!is_numeric($cell)){
		   $cell = substr($cell,1,0);
		}
		
     	array_push($tab,$cell);	
	 }
    $spec->position = $tab[0];
	$spec->titre = $tab[5];
    array_push($specs2,$spec);	
   	
    unset($tab);
    $tab = array();

	}

}
	return $specs2;
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">   
<title>LYCEE PRIVE LE CLUZEAU [28/02/2014]</title>

<style>
@font-face {
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 300;
  src: local('Oswald Light'), local('Oswald-Light'), url(https://themes.googleusercontent.com/static/fonts/oswald/v8/PJdA4diDmarBLqfQJB8vgg.woff) format('woff');
}
@font-face {
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 400;
  src: local('Oswald Regular'), local('Oswald-Regular'), url(https://themes.googleusercontent.com/static/fonts/oswald/v8/cKJn9qYJKRGi7ghmghRZYg.woff) format('woff');
}
@font-face {
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 700;
  src: local('Oswald Bold'), local('Oswald-Bold'), url(https://themes.googleusercontent.com/static/fonts/oswald/v8/ALUJa0uAU8HIGzqPWncGuw.woff) format('woff');
}

.blocTrie{
	width : 12px;
	height : 15px;
	float : right;
}

.sorting .blocTrie, .sorting_desc .blocTrie, .sorting_asc .blocTrie{
	background-repeat : no-repeat;
	background-position : right center;
}

.sorting .blocTrie{
	background-image : url(http://manager.yooda.com/images/surv4/fleshtrie_null.png);
}

.sorting_desc .blocTrie{
	background-image : url(http://manager.yooda.com/images/surv4/fleshtrie_bas.png);
}

.sorting_asc .blocTrie{
	background-image : url(http://manager.yooda.com/images/surv4/fleshtrie_haut.png);
}

.dataTables_filter{
	text-align : right;
	padding-right : 10px;
	margin-bottom : 10px;
}
</style>
 </head> <body>   <style>.Owner{color:red;font-weight:bold}/* COULEURS */
h1, h5, .tGrouping{
	color: #4f85c4;
}

h4, ul a {
	color: #768db9;
}

h1 {
	background-color: #f0f4f9;
	border: 1px solid #e2e7ee;
}

.indicator {
	/* non interpreté lors du passage en PDF */
	background: #f0f4f9 url(http://manager.yooda.com/images/surv4/bg-h5.png) repeat 0 0;
}

h6{
	color: #875f0e;
	border: 1px solid #e6dc7f;
	background-color: #fffeec;
	/* non interpreté lors du passage en PDF */
	background: -moz-linear-gradient(top,rgba(255,254,236,1),rgba(255,252,212,1));
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0,rgba(255,254,236,1)), color-stop(1,rgba(255,252,212,1)));
	filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#FFFFFEEC,EndColorStr=#FFFFFCD4);
	-ms-filter: "progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#FFFFFEEC,EndColorStr=#FFFFFCD4)";
}

/* POLICES */
body{
	font-family:Arial,Verdana,sans-serif;
}
h1, h2, h5{
	font-family: Arial,Verdana,sans-serif;
}

/* Generic */
body{
	/* non interpreté lors du passage en PDF */
	background-color: #efefef;
}

#container{
	border: 1px solid #dddddd;
	margin: 20px auto;
	padding: 10px;
	/* non interpreté lors du passage en PDF */
	width: 950px;
	position: relative;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
	background-color: #FFFFFF;
}
.indicator{
	margin: 0px 0 70px 0;
	padding: 0 0 10px;
}

#container h1.logo{
	background: #010102 url(http://seo.futurdigital.fr/img/report/bg.jpg) repeat-x 0 0;
	color: #FFFFFF;
	font-family: 'Oswald' !important;
	font-size: 24px;
	text-align: left;
}
#container h1 span{
	color: #8d8d8d;
	font-size: 16px;
	text-transform: uppercase;
}
#container h1 a{
	background:url(http://seo.futurdigital.fr/img/report/logo.png) no-repeat 0 0;
	width:194px;
	height:68px;
	float: right;
}
#container h1 span strong{
	color: #b80609;
}
#container h1 img{
	float: right;
	border:0;
}
/* Propriétés de taille et positionnement */
h1{
	font-size:25px;
	margin:0 0 25px 0;
	padding: 15px;
	text-align: center;
	/* non interpreté lors du passage en PDF */
	display: block;
	border:1px solid #e6e6e6;
	color:#b61415;
	text-transform: uppercase;
	font-family: 'Oswald' !important;
	font-weight: normal;
}
h2{
	font-size: 20px;
	margin:25px 10px;
	padding: 4px 0px;
	border-bottom: 1px solid #ddd;
	color: #444444;
}
h3{
	font-size: 14px;
	margin: 20px 10px 5px;
	color: #677da3;
}
h4{
	font-size: 11px;
	font-weight: normal;
	margin: 40px 10px 5px;
}
h5{
	font-size:25px;
	font-weight: normal;
	margin: 0;
	padding: 10px 10px 0 45px;
	background-image:url(http://seo.futurdigital.fr/img/report/puce.png);
	background-repeat:no-repeat;
	background-position:10px 13px;
	color:#b61415;
}
h6{
	position: relative;
	font-size:13px;
	margin: 15px 10px;
	padding: 10px;
	font-style: italic;
	/* non interpreté lors du passage en PDF */
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.05);
	-moz-box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.05);
	box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.05);
}

a{
	text-decoration: underline;
	color: #6288dd;
}
a:hover{
	text-decoration: none;
}
p{
	padding: 0;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	font-size: 13px;
	color: #555;
}
img{
	/* non interpreté lors du passage en PDF */
	display: block;
	position: relative;
	margin: 0 auto;
	border: 1px solid #e2e7ee;
}
ul{
	font-size: 0.9em;
	color: #202328;
	margin:5px 20px;
	padding: 4px 0;
	/* non interpreté lors du passage en PDF */
	list-style: none;
}
ul li{
	/* non interpreté lors du passage en PDF */
	padding:2px 20px;
	background: #FFFFFF url(http://manager.yooda.com/images/surv4/puce-lists.png) no-repeat 1px 3px;
}
blockquote{
	font-size: 13px;
	border-left: 2px solid #677da3;
	margin: 30px;
	padding: 0 10px;
	color: #66666;
	font-style: italic;
}

/*tableau*/
table{
	font-size:11px;
	margin: 0 auto;
	/* implicite lors du passage en PDF */
	border-collapse: collapse ;
	empty-cells: show;
	/* non interpreté lors du passage en PDF */
	border-spacing: 0px;
	width: 930px;
}
th{
	background: #ebebeb url(http://manager.yooda.com/images/surv4/bg-th.png) repeat-x 0 0;
	font-size: 13px;
	color: #525b6a;
	font-weight: normal;
	height: 30px;
	border: 1px solid #e5e5e5;
	padding:0px 10px;
}
.tEven{
	background-color:#FFFFFF;
}
.tOdd{
	background-color: #fcfcfc;
}


/*Utiliser par liste des positions*/
.tListPos{
}
td{
	border: 1px solid #e5e5e5;
	padding:6px 5px;
}
/* 1er */
.tRank1, .tEven .tRank1, .tOdd .tRank1, .tGrouping .tRank1{
	background-color:#9bda54;
}
/* 2-3 */
.tRank2, .tEven .tRank2, .tOdd .tRank2, .tGrouping .tRank2{
	background-color:#c9ef54;
}
/* 4-10 */
.tRank3, .tEven .tRank3, .tOdd .tRank3, .tGrouping .tRank3{
	background-color:#ecfe4f;
}
/* 11-20 */
.tRank4, .tEven .tRank4, .tOdd .tRank4, .tGrouping .tRank4{
	background-color:#fee357;
}
/* 20-30 */
.tRank5, .tEven .tRank5, .tOdd .tRank5, .tGrouping .tRank5{
	background-color:#fdc04a;
}
/* 30+ */
.tRank6, .tEven .tRank6, .tOdd .tRank6, .tGrouping .tRank6{
	background-color:#ef6843;
}
/* sorti */
.tRank0, .tEven .tRank0, .tOdd .tRank0, .tGrouping .tRank0{
}

.tInfoDate{
	color:#555555;
}
.tWin{
	margin-left:0.5em;
	color:#008000;
}
.tLost{
	margin-left:0.5em;
	color:#FF0000;
}
.tNew{
	margin-left:0.5em;
	color:#008000;
}
.tGone{
	margin-left:0.5em;
	color:#FF0000;
}
.tEqual{
	margin-left:0.5em;
}
.tGrouping{
	background-color:#efefef;
	font-weight:bold;
	text-align:left;
}
/*Utilisées par score positions*/
.tScorePos, .tScorePos{
	border-left:none;
	border-bottom:none;
	border-top:none;
}

/*Utilisées pour meilleur position*/
.tBestPos{
	text-align:center;
}
/*Utiliser pour nombre position*/
.tNbPos{
	text-align:center;
}
/*Utiliser pour analyse position*/
.tNbAnalysis{
	text-align:left;
}
/*Utiliser pour liste pages indexer*/
.tListPres .tList{
	background-color:#99FF66;
	text-align:center;
}
.tListPres .tNlist{
	background-color:#FFEEAA;
	text-align:center;
}
.tListLead .tOwner{
	color:#FF0000;
	font-weight:bold;
}
/*Utiliser pour l'analyse de sites leader*/
.tAnaLead .tRepSc{
	background-color:#EEEEEE;
}
/*Utiliser pour l'évolution des leaders*/
.tListLead .tRank1, .tListLead .tEven .tRank1, .tListLead  .tOdd .tRank1, .tListLead .tGrouping .tRank1{
	background-color:#88d130;
}
.tListLead .tRank2, .tListLead .tEven .tRank2, .tListLead  .tOdd .tRank2, .tListLead .tGrouping .tRank2{
	background-color:#b0e358;
}
.tListLead .tRank3, .tListLead .tEven .tRank3, .tListLead  .tOdd .tRank3, .tListLead .tGrouping .tRank3{
	background-color:#c8ee50;
}
.tListLead .tRank4, .tListLead .tEven .tRank4, .tListLead  .tOdd .tRank4, .tListLead .tGrouping .tRank4{
	background-color:#ebfe45;
}
.tListLead .tRank5, .tListLead .tEven .tRank5, .tListLead  .tOdd .tRank5, .tListLead .tGrouping .tRank5{
	background-color:#fefa45;
}
.tListLead .tRank6, .tListLead .tEven .tRank6, .tListLead  .tOdd .tRank6, .tListLead .tGrouping .tRank6{
	background-color:#fee14c;
}
.tListLead .tRank7, .tListLead .tEven .tRank7, .tListLead  .tOdd .tRank7, .tListLead .tGrouping .tRank7{
	background-color:#fdc04a;
}
.tListLead .tRank8, .tListLead .tEven .tRank8, .tListLead  .tOdd .tRank8, .tListLead .tGrouping .tRank8{
	background-color:#f9a449;
}
.tListLead .tRank9, .tListLead .tEven .tRank9, .tListLead  .tOdd .tRank9, .tListLead .tGrouping .tRank9{
	background-color:#ef6843;
}
.tListLead .tRank10, .tListLead .tEven .tRank10, .tListLead  .tOdd .tRank10, .tListLead .tGrouping .tRank10{
	background-color:#ea4c51;
}
.tListLead .tRank0, .tListLead .tEven .tRank0, .tListLead  .tOdd .tRank0, .tListLead .tGrouping .tRank0{
	background-color:#ffffff;
}
#POSstd_3_wrapper #POSstd_3_filter {
	display:block; 
}
#POSstd_3_wrapper #POSstd_3_wrapper #POSstd_3_filter {
	display:none; 
}
</style>

<div id="header">
</div>
<div id="container">
<h1 class="logo"><a href="http://www.futurdigital.fr/" target="_blank" title="Futur Digital"></a>LYCEE PRIVE LE CLUZEAU<br><span>Rapport de positionnement du <strong>28/02/2014</strong></span></h1>
<p>
<b>Futur Digital</b>
<br><a href="http://www.futurdigital.fr/">www.futurdigital.fr</a>
<br>164 ter rue d'Aguesseau
<br>92100 BOULOGNE
<br>01 49 10 05 05
<br>
<br><a href="mailto:seo@futurdigital.fr">seo@futurdigital.fr</a></p>

<h1>Meilleures positions relevées sur les outils de recherche</h1>
<div class="indicator" id="indicator-5"><h5>Positions (par mot clé)</h5>
<h6>Liste des positions obtenues au 28/02/2014 (classées par mot clé).</h6>
<table id="POSBest_5" class="tBestPos">
<tbody><tr class="tHeader">
<th>Mot clé</th>
<th>Bing France</th>
<th>Google.fr France</th>
<th>fr.yahoo.com France</th>
</tr>
<?php 

$result = array();
	
	for($i = 0; $i < count($tab);$i++){
	 
	
	 if(!array_search($tab[$i]->titre,$result ) && $tab[$i]->position != null ){
   
	  echo "<tr class='tEven'>";
	  echo "<td>".$tab[$i]->titre."</td>";
	  $mot = array();
	  $lignes = array();
	  for($j = 0; $j < count($tab);$j++){
	  if($tab[$j]->position != null && $tab[$i]->titre == $tab[$j]->titre ){
		 
		if($tab[$j]->position == 1 ){			
			$sup = "er";
		}
		else{
			$sup = "ème";
		}
		if($tab[$j]->signe == "+" || $tab[$j]->signe == "nouv" || $tab[$j]->signe == "ex" || $tab[$j]->signe == "=" ){
			$clazz = "tNew";
		}
		else{
			$clazz = "tLost";
		}
		
		if( $tab[$j]->moteur == "bing"){
			 array_push($mot,"bing");
			 $lignes[0] = $tab[$j];
		}
	
		if( $tab[$j]->moteur == "google" ){	
         	 array_push($mot,"google");
			 $lignes[1] = $tab[$j];
			
		}
		
	
		if( $tab[$j]->moteur == "yahoo" ){			
		    array_push($mot,"yahoo");
			$lignes[2] = $tab[$j];

		}
	
	
	   }
	   
	  }
	  	
		
	  if(array_search("bing",$mot)!= null && array_search("google",$mot) != null  && array_search("yahoo",$mot) != null ){
		
		  echo "<td class='tRank1' align='center'>".$lignes[0]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[0]->signe ."".$lignes[0]->difference.")</span></td>";  
		  echo "<td class='tRank1' align='center'>".$lignes[1]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[1]->signe ."".$lignes[1]->difference.")</span></td>";  
		  echo "<td class='tRank1' align='center'>".$lignes[2]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[2]->signe ."".$lignes[2]->difference.")</span></td>";  
	  }
	  if(array_search("bing",$mot) != null && array_search("google",$mot) == null  && array_search("yahoo",$mot) != null ){		 
          echo "<td class='tRank1' align='center'>".$lignes[0]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[0]->signe ."".$lignes[0]->difference.")</span></td>";  
		  echo "<td></td>";
   		  echo "<td class='tRank1' align='center'>".$lignes[2]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[2]->signe ."".$lignes[2]->difference.")</span></td>";  
	  }
	  if(array_search("bing",$mot) != null && array_search("google",$mot) != null  && array_search("yahoo",$mot) == null ){		 
          echo "<td class='tRank1' align='center'>".$lignes[0]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[0]->signe ."".$lignes[0]->difference.")</span></td>";  	  
   		  echo "<td class='tRank1' align='center'>".$lignes[1]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[1]->signe ."".$lignes[1]->difference.")</span></td>";  
		  echo "<td></td>";
	  }
	  if(array_search("bing",$mot) == null && array_search("google",$mot) != null  && array_search("yahoo",$mot) != null ){	
		
		  echo "<td></td>";
   		  echo "<td class='tRank1' align='center'>".$lignes[1]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[1]->signe ."".$lignes[1]->difference.")</span></td>";  
   		  echo "<td class='tRank1' align='center'>".$lignes[2]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[2]->signe ."".$lignes[2]->difference.")</span></td>";  
		  
	  }
	 
	 if(array_search("bing",$mot) == null && array_search("google",$mot) != null  && array_search("yahoo",$mot) == null ){		 
		  echo "<td></td>";
   		  echo "<td class='tRank1' align='center'>".$lignes[1]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[1]->signe ."".$lignes[1]->difference.")</span></td>";  
		  echo "<td></td>";
	  }
	   if(array_search("bing",$mot) == null && array_search("google",$mot) == null  && array_search("yahoo",$mot) != null ){		 
		  echo "<td></td>";
		  echo "<td></td>";
		  echo "<td class='tRank1' align='center'>".$lignes[2]->position."<sup>".$sup."</sup>&nbsp;<span class='".$clazz."'>(".$lignes[2]->signe ."".$lignes[2]->difference.")</span></td>";  

	  }
	  
	  unset($lignes);
	  $lignes = array();
	  unset($mot);
	  $mot = array();
	  echo "</tr>";
	 }
		 $result[$i] = $tab[$i]->titre;
		
	}

?>
</tbody>
</table>

</div>


</div>

</div>
<div id="footer"></div> 

</body>

</html>

