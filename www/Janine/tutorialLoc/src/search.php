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

    <l>48.1385,11.5750,0</l>
    <o>0,0,0</o>
    
    <mime-type>text/plain</mime-type>

    <thumbnail>http://ardevcamp.junaio.com/Tutorial/html/resources/logo.jpg</thumbnail>
    <icon>http://ardevcamp.junaio.com/Tutorial/html/resources/icon.jpg</icon> 

    </poi>
</results>";

?>
