<!DOCTYPE html> 
<html> 
	<head> 
	<title>Dream Sfx</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <script src="http://jquery.offput.ca/js/jquery.timers.js"></script>
	<style type="text/css">
	  div.players { font-size: 30px; }
	  #mystyle .day { background-image: url("http://www.worldpeace-uk.org/wp-content/uploads/2013/07/smiley-face.jpg"); background-repeat:no-repeat; background-size: 100% auto; }
	  #mystyle .night { background: black; padding: 2px;}
	  #mystyle .fight { background: red; }
	</style>
	<script type="text/javascript">
		Player1 ='<object type="application/x-shockwave-flash" data="dewplayer-mini.swf?mp3='
		Player2 ='" width="20" height="20" id="dewplayer-mini"><param name="flashvars" value="autostart=1&amp;autoreplay=1&amp;volume='
		Player3 ='" /><param name="wmode" value="transparent" /></object>'
		
		function clear_all () { $("div.players").html("&nbsp;"); }

		function launch (Fmusique, Vmusique, Fambiance, Vambiance) {
			
		  if (Vmusique!=0)
		  {
		  	clear_all();
		  	$("div.players").append("M: "+Player1+Fmusique+Player2+Vmusique+Player3);
		  }

		  if (Vambiance!=0)
		  {
			$("div.players").append(" A1: "+Player1+Fambiance+Player2+Vambiance+Player3);
			$(this).oneTime(6000, function() { $("div.players").append(" A2: "+Player1+Fambiance+Player2+Vambiance+Player3); }); 
		  }
		}
	</script>
</head> 

<body>
<div data-role="page">
	<center>
	<h3><i>DreamSFX</i></h3><hr>
	<div data-role="content" id="mystyle">
	    <div class="players">&nbsp;</div>
		<a href='#' onclick='clear_all()' data-role="button">Stop</a>
		<hr>
		<div data-role="controlgroup" data-type="horizontal" style="width:100%">
			<a href="#" onclick='' data-role="button">General</a>
			<a href="#" onclick='' data-role="button">Autres</a>
		</div>
		
        <strong>Ville</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_theme_nwn.mp3", 100, "ambiance/al_pl_marketday.mp3", 50)' data-role="button" class="day">&nbsp;</a>
			<a href="#" onclick='launch("musique/mus_citydocknite.mp3", 100, "ambiance/al_pl_citynite.mp3", 35)' data-role="button" class="night"><img src="http://www.worldpeace-uk.org/wp-content/uploads/2013/07/smiley-face.jpg" width=20 /></a>
			<a href="#" onclick='launch("musique/mus_gendungeon1.mp3", 100, "ambiance/al_pl_slumday1.mp3", 40)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_bat_city2.mp3", 40, "ambiance/al_pl_slumnite.mp3", 40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_aribeth.mp3", 80, "", 0)' data-role="button">CO</a>
		</div>
		<strong>Interieur</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_store.mp3",100,"ambiance/al_cv_houseamb1.mp3",60)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_richhouse.mp3",70,"ambiance/al_cv_houseamb2.mp3",60)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_cityslumnite.mp3",70,"ambiance/al_cv_hauntamb2.mp3",60)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_theme_chap2.mp3",80,"ambiance/al_cv_hauntamb3.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_forboss.mp3",50,"",0)' data-role="button">CO</a>
		</div>
		<strong>Auberge</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_tavern1.mp3",50,"ambiance/al_pl_tavhubbub2.mp3",60)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_tavern2.mp3",80,"ambiance/al_pl_whispers.mp3",60)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_cityslumday.mp3",80,"ambiance/al_pl_tavhubbub1.mp3",40)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_theme_chap1.mp3",80,"ambiance/al_pl_bordello2.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_city1.mp3",60,"",0)' data-role="button">CO</a>
		</div>
		<strong>Forêt</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_forestday1.mp3",70,"ambiance/al_na_frstdyamb2.mp3",40)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_forestnite.mp3",70,"ambiance/al_na_frstntamb1.mp3",40)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_forestday2.mp3",70,"ambiance/al_na_frstdyscr1.mp3",40)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_ruralnite.mp3",70,"ambiance/al_na_frstntscr1.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_forest1.mp3",70,"",0)' data-role="button">CO</a>
		</div>
		<strong>Plaine</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_ruralday1.mp3",100,"ambiance/al_na_frstdyamb1.mp3",40)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_citydockday.mp3",60,"ambiance/al_na_frstntamb1.mp3",40)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_crypt2.mp3",100,"ambiance/al_na_frstdyscr1.mp3",40)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_ruralnite.mp3",100,"ambiance/al_na_frstntscr1.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_rural1.mp3",100,"",0)' data-role="button">CO</a>
		</div>
		<strong>Désert</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_dd_shadowgua.mp3",100,"ambiance/al_wt_windsoft1.mp3",40)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/Song\ Of\ Complaint.mp3",100,"ambiance/al_wt_windsoft1.mp3",30)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_theme_chap4.mp3",100,"ambiance/al_wt_windsoft1.mp3",20)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_theme_chap4.mp3",100,"ambiance/al_wt_windsoft1.mp3",20)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_dung3.mp3",100,"",0)' data-role="button">CO</a>
		</div>
		<strong>Montagne</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_ruralday2.mp3",100,"ambiance/al_wt_windsoft1.mp3",30)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_citymarket.mp3",100,"ambiance/al_wt_windsoft1.mp3",30)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_mines2.mp3",100,"ambiance/al_wt_windsoft1.mp3",30)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_theme_chap3.mp3",60,"ambiance/al_wt_windsoft1.mp3",30)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_lizboss.mp3",60,"",0)' data-role="button">CO</a>
		</div>
		<strong>Grotte</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_mines1.mp3",100,"ambiance/al_cv_caveamb2.mp3",40)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_citynite.mp3",100,"ambiance/al_cv_caveamb3.mp3",60)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_sewer.mp3",50,"ambiance/al_cv_cryptamb2.mp3",70)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_sewer.mp3",100,"ambiance/al_cv_cryptamb3.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_forest2.mp3",70,"",0)' data-role="button">CO</a>
		</div>
		<strong>Monde onirique</strong>
        <div data-role="controlgroup" data-type="horizontal">
			<a href="#" onclick='launch("musique/mus_templegood2.mp3",40,"ambiance/al_mg_airlab1.mp3",40)' data-role="button">JT</a>
			<a href="#" onclick='launch("musique/mus_templegood.mp3",40,"ambiance/al_mg_magicint4.mp3",40)' data-role="button">NT</a>
			<a href="#" onclick='launch("musique/mus_crypt1.mp3",100,"ambiance/al_mg_pitcry1.mp3",20)' data-role="button">JA</a>
			<a href="#" onclick='launch("musique/mus_templeevil.mp3",50,"ambiance/al_mg_pitcry1.mp3",40)' data-role="button">NA</a>
			<a href="#" onclick='launch("musique/mus_bat_dragon.mp3",30,"ambiance/al_pl_templesday.mp3",40)' data-role="button">CO</a>
		</div>
		
		<div data-role="controlgroup">
			Vent
			<a href='#' onclick='launch("",0,"ambiance/al_wt_windsoft1.mp3",100)' data-role="button">Vent faible</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_windmed1.mp3",100)' data-role="button">Vent moyen</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_windstrng1.mp3",100)' data-role="button">Vent fort</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_windforst1.mp3",100)' data-role="button">Vent en foret</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_gustgrass1.mp3",100)' data-role="button">Vent en plaine</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_gustchasm1.mp3",100)' data-role="button">Vent en montagne</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_gustcavrn1.mp3",100)' data-role="button">Vent en caverne</a>
		</div>
		<div data-role="controlgroup">
			Meteo
			<a href='#' onclick='launch("",0,"ambiance/al_wt_rainlight1.mp3",100)' data-role="button">Pluie faible</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_rainhard1.mp3",100)' data-role="button">Pluie forte</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_stormlg1.mp3",100)' data-role="button">Tempete faible</a>
			<a href='#' onclick='launch("",0,"ambiance/al_wt_stormsm1.mp3",100)' data-role="button">Tempete forte</a>
		</div>
		<div data-role="controlgroup">
			Lieu
			<a href='#' onclick='launch("",0,"ambiance/al_pl_townday1.mp3",100)' data-role="button">Camp calme</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_townday2.mp3",100)' data-role="button">Camp bruyant</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_townnite.mp3",100)' data-role="button">Camp de nuit</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_blacksmith.mp3",100)' data-role="button">Forge</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_templesday.mp3",100)' data-role="button">MonastÃ¨re</a>
			<a href='#' onclick='launch("",0,"ambiance/al_mg_waterlab1.mp3",100)' data-role="button">Laboratoire</a>
		</div>
		<div data-role="controlgroup">
			Evenements
			<a href='#' onclick='launch("",0,"ambiance/al_pl_riot1.mp3",100)' data-role="button">Emeute</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_combat1.mp3",100)' data-role="button">Guerre</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_combat2.mp3",100)' data-role="button">Guerre magique</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_riot2.mp3",100)' data-role="button">Emeute de l'interieur</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_combatmuf1.mp3",100)' data-role="button">Guerre de l'interieur</a>
			<a href='#' onclick='launch("",0,"ambiance/al_pl_combatmuf2.mp3",100)' data-role="button">Guerre magique de l'interieur</a>
		</div>
    </div>
	</center>
      
</div><!-- /page -->
</body>
</html>