<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<script language="JavaScript">
document.write('<link href="css.css" rel="stylesheet" type="text/css"/>');
</script>
  <title>Aplicación Multimedia(titulo)</title>
</head>
<body>
<?php
$language="es";
if(isset($_GET["type"]) && isset($_GET["id"]) && isset($_GET["service"])){
	$id = $_GET["id"]; //identificador del recurso
	$type = $_GET["type"]; //tipo de recurso: película, dvd, disco o vinillo
	$service = $_GET["service"]; //tipo de servicio: información, compra, evento (cine, concierto).
	//echo "<script>window.location='http://www.google.es';</script>";
	if($type=="film"){
		?>
		<a name="inicio"></a>
		<ul id="menu">
		  <!--<li><a href="#sinopsis">Sinopsis</a></li>
		  <li><a href="#artist">Actores</a></li>
		  <li><a href="#trailers">Trailers</a></li>	
		  <li><a href="#others">Noticias asociadas</a></li>	-->
		<?php
		echo '<li><a href="http://monitor03.lab.it.uc3m.es/~labalum2/Aplication_web/Aplication.php?id='.$id.'&type='.$type.'&service='.$service.'&part=sinopsis">Sinopsis</a></li>';
		echo '<li><a href="http://monitor03.lab.it.uc3m.es/~labalum2/Aplication_web/Aplication.php?id='.$id.'&type='.$type.'&service='.$service.'&part=actores">Actores</a></li>';
		echo '<li><a href="http://monitor03.lab.it.uc3m.es/~labalum2/Aplication_web/Aplication.php?id='.$id.'&type='.$type.'&service='.$service.'&part=media">Media</a></li>';
		echo '<li><a href="http://monitor03.lab.it.uc3m.es/~labalum2/Aplication_web/Aplication.php?id='.$id.'&type='.$type.'&service='.$service.'&part=enlaces">Enlaces</a></li>';
		echo '</ul>';
		include("FilmAPI.lib");
		$film = new Film();
		if(isset($_GET["part"])){
			$part=$_GET["part"];
		}else{
			$part="sinopsis";
		}
		$tittle = $film->getTittle($id);
		switch($part){
			case "sinopsis":
			echo "<p>".$tittle."</p>";
			$synopsis = $film-> getSynopsis($id);
			if($synopsis != null){
				echo "<p>".$synopsis."</p>";
			}else{
				echo "<p> Actualmente synopsis no disponible </p>";
			}
			break;
			case "actores":
			$aArtistas = $film-> getActors($id);
			if($aArtistas != null){
				foreach($aArtistas as $artista){
					echo "<p><a href='http://".$artista['web']."' target='popup' onclick='window.open(\'\', \'popup\', \'width=200, height=100\')'><img src='.".$artista['image']."' alt='Imagen del artista' id='img'/></a></p>";
					echo "<p>".$artista['name']." ".$artista['surname']." interpreta a ".$artista['role'].".</p>";
				}
			}
			break;
			case "media":
			$aMedias = $film->getMedia($id);
			if($aMedias != null){
				echo "dentro";
				$j=0;
				echo "<p>Sonido:</p>";
				foreach($aMedias as $media){
		                        if(preg_match("/(\w+)$/",$row["ubicacion"], $coincidencia)){ 
						if($coincidencia[0]="mp4"){
                                			$aVideo[] = $j;
                        			}elseif($coincidencia[0]="mp3"){
							if($media["remote"]){
						
							}else{
								echo "<p><audio src='../media/mp3/".$media['path']."' controls>Tu navegador no soporta html5</audio></p>";
								echo "<p>Características: tamaño=".$media['size']."</p>";
								echo "<p><a href='../media/mp3/".$media['path']."'>descargar canción</a></p>";
							}//embebido
						}
						$j++;
					}
				}
				if($j=count($aMedias)){
					echo "<p>No hay ningun sonido disponible actualmente</p>";
				}
				echo "<p>Videos:</p>";
				if($aVideo){
					foreach($aVideo as $video){
						if($aMedias[$video]["remote"]){
			
						}else{
							echo "<p><video src='../media/mp3/".$aMedias[$video]['path']."' controls>Tu navegador no soporta html5</video></p>";
							echo "<p>Características: tamaño=".$aMedias[$video]['size']."</p>";
							echo "<p><a href='../media/mp3/".$aMedias[$video]['path']."'>descargar video</a></p>";
						}
					}
				}else{
					echo "<p>No hay ningún video disponible actualmente</p>";
				}
			}
			echo "<p>Prueba</p>";
			$mp4 = "increibles.mp4";
		        if(preg_match("/(\w+)$/",$mp4, $coincidencia)){ 
				echo "la extensión es:".$coincidencia[0];
			}	
			echo "<p>Los increibles</p>";
			//echo "<p><embed src='../media/mp4/increibles.mp4' showcontrols=1 clicktoplay=1 autostart='true' loop='true'><p>";
			echo "<p>Canción de los increibles:</p>";
			echo "<p><audio src='../media/mp3/Coming Home.mp3' controls><a href=><Descargar canción</a></audio></p>";
			echo "<p>Video de los increibles:</p>";
			echo "<video src='../media/mp4/increibles.mp4' width='300' heigth='300' controls='controls'>Tu browser no soporta este tag HTML5</video>";
			break;
			case "enlaces":
			break;		
	
			/*case "enlaces":
			<p><a name="links"></a>Enlaces:</p>
			<p> > <a href="http://www.filmaffinity.com/es/film456221.html">Página oficial</a></p>
			<p> > <a href="http://www.filmaffinity.com/es/film456221.html">Transformers (Film Affinity)</a></p>
			<p><a name="trailers"></a>Trailers:</p>
			<p><a name="others"></a>Noticias asociadas:</p>
			break;*/
		}
	}
}else{
	echo "Url mal formada";
}
?>
</body>
