<?php

/**
 * @copyright  Copyright 2010 metaio GmbH. All rights reserved.
 * @link       http://www.metaio.com
 * @author     Frank Angermann
 **/

/**
 * When the channel is being viewed, a poi request will be sent
 * $_GET['l']...(optinal) Position of the user when interacting with the POI
 * $_GET['p']...(optinal) perimeter of the data requested in meters.
 * $_GET['uid']... Unique user identifier
 * $_GET['m']... (optional) limit of to be returned values
 * $_GET['page']...page number of result. e.g. m = 10: page 1: 1-10; page 2: 11-20, e.g.
 **/
 
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<results>
   <poi id=\"1\" interactionfeedback=\"none\">
    <name><![CDATA[Hello World POI]]></name>
    
    <description><![CDATA[[This is my first POI.]]></description>  

    <l>40.332119,-3.766884,0</l>
    <o>0,0,0</o>
    
    <mime-type>image/png</mime-type>
    <mainresource>http://img6.imageshack.us/img6/1010/imagenesanimalespeq.jpg</mainresource>

   


    <thumbnail>http://2.bp.blogspot.com/_UhBHaSCT2FQ/SU4-fEMR_lI/AAAAAAAAATc/7bqgYPlqDbo/s400/fondosdepantalla1.jpg</thumbnail>
    <icon>http://www.autolan.es/images/stories/MODULOS_WEB/iconos-pequenyos/icono-6to6-40x40.jpg</icon> 

    </poi>

<poi id=\"2\" interactionfeedback=\"none\">
    <name><![CDATA[Hello World POI]]></name>
    
    <description><![CDATA[[This is my first POI.]]></description>  

    <l>40.332119,-3.766884,0</l>
    <o>0,0,0</o>
    
    <mime-type>image/png</mime-type>
 <mainresource>http://2.bp.blogspot.com/_PrazR2dld4g/Sp72zxJmxSI/AAAAAAAAAog/25TyzInONeE/s320/gatos.jpg</mainresource>


    <thumbnail>http://2.bp.blogspot.com/_UhBHaSCT2FQ/SU4-fEMR_lI/AAAAAAAAATc/7bqgYPlqDbo/s400/fondosdepantalla1.jpg</thumbnail>
    <icon>http://www.autolan.es/images/stories/MODULOS_WEB/iconos-pequenyos/icono-6to6-40x40.jpg</icon> 

    </poi>

<poi id=\"3\" interactionfeedback=\"none\">
    <name><![CDATA[Hello World POI]]></name>
    
    <description><![CDATA[[This is my first POI.]]></description>  

    <l>40.332119,-3.766884,0</l>
    <o>0,0,0</o>
    
  <mime-type>video/mp4</mime-type>
    <mainresource>http://media.photobucket.com/video/happy%20birthday/muska00140/new/gracielu056.mp4</mainresource>

    <thumbnail>http://2.bp.blogspot.com/_UhBHaSCT2FQ/SU4-fEMR_lI/AAAAAAAAATc/7bqgYPlqDbo/s400/fondosdepantalla1.jpg</thumbnail>
    <icon>http://www.autolan.es/images/stories/MODULOS_WEB/iconos-pequenyos/icono-6to6-40x40.jpg</icon> 

    </poi>
</results>";

?>
