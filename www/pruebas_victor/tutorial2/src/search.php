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
    <name><![CDATA[Foto Carlos III]]></name>
    
    <description><![CDATA[[Mi uni (foto incluida)]]></description>  

    <l>40.332848,-3.764648,0</l>
    <o>0,0,0</o>
    
    <mime-type>image/png</mime-type>

    <mainresource>http://3.bp.blogspot.com/_bLvGLuuUIZw/TNXaLOBL0aI/AAAAAAAAC0o/DhFWx_TM8oY/s1600/carlosIII.jpg</mainresource>

    <thumbnail>http://a3.twimg.com/profile_images/857277162/Acr_nimoUC3M_normal.jpg</thumbnail>
    <icon>http://userserve-ak.last.fm/serve/64/1921775.jpg</icon> 

    </poi>

<poi id=\"2\" interactionfeedback=\"none\">
    <name><![CDATA[Sonido Carlos III]]></name>
    
    <description><![CDATA[[Un sonido en la uni]]></description>  

    <l>40.332185,-3.766868,0</l>
    <o>0,0,0</o>
    
    <mime-type>audio/mp3</mime-type>

    <mainresource>http://monitor03.lab.it.uc3m.es/~labalum2/media/mp3/Coming%20Home.mp3</mainresource>

    <thumbnail>http://a3.twimg.com/profile_images/857277162/Acr_nimoUC3M_normal.jpg</thumbnail>
    <icon>http://userserve-ak.last.fm/serve/64/1921775.jpg</icon> 

    </poi>

<poi id=\"3\" interactionfeedback=\"none\">
    <name><![CDATA[Video Carlos III]]></name>
    
    <description><![CDATA[[Un video en la uni]]></description>  

    <l>40.333089,-3.765908,0</l>
    <o>0,0,0</o>
    
    <mime-type>video/mp4</mime-type>

    <mainresource>http://monitor03.lab.it.uc3m.es/~labalum2/media/mp4/russian-red-fantasia-leganes-29-10-2009-uc3m-hd.mp4</mainresource>

    <thumbnail>http://a3.twimg.com/profile_images/857277162/Acr_nimoUC3M_normal.jpg</thumbnail>
    <icon>http://userserve-ak.last.fm/serve/64/1921775.jpg</icon> 

    </poi>



</results>";

?>
