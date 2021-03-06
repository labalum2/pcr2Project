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

<poi id=\"4\" interactionfeedback=\"none\">
         <name><![CDATA[Modelo 3D en la uni]]></name>

         <description><![CDATA[Mi primer POI 3D!!]]></description>
         <author>Victor</author>
         <date/>

         <l>40.332030,-3.765973,0</l>
         <o>0,0,0</o>
         <minaccuracy/>
         <maxdistance/>
         <mime-type>model/md2</mime-type>
         <mainresource>http://www.junaio.com/publisherDownload/tutorial/metaioman.md2_enc</mainresource>
         <!-- force3d determines whether the 3D model will be rendered right away, or a default poi with a \"load 3D Model\" in the description shall be shown -->
         <force3d>true</force3d>
         <s>1</s>
         <behaviours>
            <behaviour type=\"idle\">
               <!-- LENGTH: 0 for looping, amount of frames otherwise -->
               <length>0</length>
               <!-- NODE_ID: name of the animation in the 3D model -->
               <node_id>frame</node_id>
            </behaviour>
         </behaviours>
         <resources>
            <resource>http://www.junaio.com/publisherDownload/tutorial/metaioman.png</resource>
         </resources>
         <thumbnail>http://a3.twimg.com/profile_images/857277162/Acr_nimoUC3M_normal.jpg</thumbnail>
         <icon>http://userserve-ak.last.fm/serve/64/1921775.jpg</icon>
         <homepage>http://www.uc3m.es/</homepage>         
        </poi>
</results>";

</results>";

?>
