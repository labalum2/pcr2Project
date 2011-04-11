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
 
require_once '../library/junaiopoibuilder.class.php';

$poiBuilder = new POIBuilder();

//if you just have one table to retrieve information from you can put the name here to use a standard query for selecting all columns
//otherwise, you can set a specific query in the search.php 
$tablename = "POI_Search_temp";

//define, which of the fiels in your SQL Database hold which information for the POI
//only non empty fields will be considered
/*
 * HINT: if you want to use a constant value for all your POIs, start with an exclamation mark "!"
 * NOT supported for: id, longitude, latitude
 * e.g.
 * $informationColumns = array(
 * 		...
 * 		'mimetype' => "!text/plain"
 * 		...
 * );
 */
 
$informationColumns = array(
	'id' => "codPoi",		//unique alphanummeric value expected from this column
	'name' => "nombre",	//string for the name of the poi
	'author' => "!pcr2011g2", //string author
	//'latitude' => "!0", //number latitude
	//'longitude' => "!0", //number longitude
	'translation' => "translation", //translation del poi
	'orientation' => "orientacion", //orientacion del poi
	//'scale' => "!0", //escala del poi
	'mimetype' => "mimeType", //mime-type (see http://www.junaio.com/publisher/returnparameters)
	'mainresourcepath' => "mainResource", //only needed if mime-type != text/plain
	'resource' => "resource" //THIS IS MADE BY US. Only required if there is a 3D model
);

/*
 *  HINT:
 *  If you have set your table name, all existing information from this table in your databse will be retrieved
 *  Especially for large databases you should limit the return by using the users position and a radius!
 *  Approximate limitation by radius:
 *  
 *  e.g. $radius = 10000 //radius in meters
 *       $lat = latitude of users position
 *       $lng = longitude of users position
 *       
 *  //this is an approximation of meter in latitude and longitude difference
 *  $distanceLLA = (float).01 * $radius / 1112;
 *  $boundingBoxLatitude = array((float)$lat - $distanceLLA, (float)$lat + $distanceLLA);
 *  $boundingBoxLongitude = array((float)$lng - $distanceLLA, (float)$lng + $distanceLLA);
 *	
 *	$aResults = array();
 *
 *	$query = sprintf(
 *			'SELECT * FROM $tablename WHERE Latitude BETWEEN %s AND %s AND Longitude BETWEEN %s AND %s',
 *			min($boundingBoxLatitude), max($boundingBoxLatitude), min($boundingBoxLongitude), max($boundingBoxLongitude)
 *		); 
 */

//you can optionaly define a query or alter that query
//if you have not set a table name, you have to add a SQL query yourself
if(isset($tablename) && !empty($tablename))
	$query = "SELECT * FROM $tablename";
else
	$query = "";
	
if(empty($query))
{
	echo "Missing SQL Query! Please either set a tablename or a SQL query";
	exit;
}

$poiBuilder->createOutput($query, $informationColumns);

?>
