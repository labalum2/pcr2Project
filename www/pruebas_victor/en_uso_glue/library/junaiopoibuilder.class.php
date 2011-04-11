<?php
require_once '../library/responses.class.php';
require_once '../library/poitools.php';

class POIBuilder
{
	public $host=HOST;        	
	public $user=USER;        	
	public $pass=PASSWORD;    	
	public $database=DATABASE;  
	
	public $dblink = null;
	
	public function __construct()
	{
		// get connection with mysql
		$this->dblink = @mysql_connect($this->host,$this->user,$this->pass);
		
		// select and open database
		mysql_select_db($this->database,$this->dblink);
	}
	
	/**
	 * Access the database defined in the config.php and create a valid junaio xml output
	 * @param $query $SQL query to retrieve information
	 * @param $informationColumns Array defining which column in your databasetable represents which information for the POI
	 * @return string
	 */
	public function createOutput($query, $informationColumns)
	{
		$outputCreator = new OutputCreator();
		$constantsArray = array();
		
		$databaseOutput = $this->select($query);
		
		//remove all elements that have not been set
		foreach($informationColumns as $key => $value) 
		{
		  if($value == "" || $value == NULL) 
		  	unset($informationColumns[$key]);
		  else if($value[0] == "!")
		  	$constantsArray[$key] = substr($value, 1);	  
		  		
		}; 
		
		//if no data was retrieved from the database, return an empty xml output
		if(count($databaseOutput) == 0) 
		{
			$outputCreator->create(true, true, NULL);
			exit;
		}
		
		$amount = count($databaseOutput);
		
		foreach($databaseOutput as $count => $entry)
		{
			//default settings
			$poi = new SinglePOI();
			$poi->setInteractionType("click");
			//$poi->setOrientation("0,0,0"); THIS IS COMMENTED BECAUSE LATER IT IS MODIFIED BY THE DB
			//THIS IS THE BEGINNING OF OUR CUSTOM CODE
			$poi->setLocation("0,0,0");
			$poi->setScale("1");
			//$poi->setForce3d("true");
			//THIS IS THE END OF OUR CUSTOM CODE

			//set POI ID
			if(array_key_exists('id', $informationColumns))
				$poi->setPoiid((string)$entry[$informationColumns['id']]);	
			else
				trigger_error("POI ID is mandatory");

			// set POI name	
			if(array_key_exists('name', $constantsArray))
				$poi->setName((string)$constantsArray['name']);	
			else if(array_key_exists('name', $informationColumns))
				$poi->setName((string)$entry[$informationColumns['name']]);	
			
			// set POI description	
			if(array_key_exists('description', $constantsArray))
				$poi->setDescription((string)$constantsArray['description']);	
			else if(array_key_exists('description', $informationColumns))
				$poi->setDescription((string)$entry[$informationColumns['description']]);	
			
//THIS IS THE BEGINNING OF OUR CUSTOM CODE		
			// set scale
			if(array_key_exists('scale', $constantsArray))
				$poi->setScale((string)$constantArray['scale']);
			else if(array_key_exists('scale', $informationColumns))
				$poi->setScale((string)$entry[$informationColumns['scale']]);

			// set translation 
			if(array_key_exists('translation', $constantsArray))
				$poi->setTranslation((string)$constantArray['translation']);
			else if(array_key_exists('translation', $informationColumns))
				$poi->setTranslation((string)$entry[$informationColumns['translation']]);
	
			// set orientation 
			if(array_key_exists('orientation', $constantsArray))
				$poi->setOrientation((string)$constantArray['orientation']);
			else if(array_key_exists('orientation', $informationColumns))
				$poi->setOrientation((string)$entry[$informationColumns['orientation']]);
				
			// set 3D model resources
			if(array_key_exists('resource', $constantsArray))
				$poi->setResource((string)$constantArray['resource']);
			else if(array_key_exists('resource', $informationColumns))
				$poi->setResource((string)$entry[$informationColumns['resource']]);

			// set force3D true or false
			if(array_key_exists('force3d', $constantsArray))
				$poi->setForce3d((string)$constantArray['force3d']);
			else if(array_key_exists('force3d', $informationColumns))
				$poi->setForce3d((string)$entry[$informationColumns['force3d']]);

			// set Behaviour 1 -idle- length
			if(array_key_exists('behaviour1length', $constantsArray))
				$poi->setBehaviour1length((string)$constantArray['behaviour1length']);
			else if(array_key_exists('behaviour1length', $informationColumns))
				$poi->setBehaviour1length((string)$entry[$informationColumns['behaviour1length']]);
				
//THIS IS THE END OF OUR CUSTOM CODE

			// set POI enable routing	
			if(array_key_exists('enablerouting', $constantsArray))
				$poi->setShowNavigateToButton((string)$constantsArray['enablerouting']);
			else if(array_key_exists('enablerouting', $informationColumns))
				$poi->setShowNavigateToButton((string)$entry[$informationColumns['enablerouting']]);

			// set POI author
			if(array_key_exists('author', $constantsArray))
				$poi->setAuthor((string)$constantsArray['author']);
			else if(array_key_exists('author', $informationColumns))
				$poi->setAuthor((string)$entry[$informationColumns['author']]);
				
//WE DO NOT TAKE LOCATION FROM THE POIS (SEE DEFAULT VALUES) SO THE FOLLOWING LINES ARE COMMENTED OUT
			//set POI position
			//if(array_key_exists('latitude', $informationColumns) && array_key_exists('longitude', $informationColumns))
			//	$poi->setLocation(trim((string)$entry[$informationColumns['latitude']]).",". trim((string)$entry[$informationColumns['longitude']]).",0");	
			//else
			//	trigger_error("POI latitude and longitude are mandatory");
			
			//set POI mime type
			if(array_key_exists('mimetype', $constantsArray))
				$poi->setMIMEType((string)$constantsArray['mimetype']);
			else if(array_key_exists('mimetype', $informationColumns))
				$poi->setMIMEType((string)$entry[$informationColumns['mimetype']]);	
			else
				trigger_error("POI mime-type is mandatory");
			
			//set POI main resource
			if(array_key_exists('mainresourcepath', $constantsArray))
				$poi->setMainResource((string)$constantsArray['mainresourcepath']);
			else if(array_key_exists('mainresourcepath', $informationColumns))
				$poi->setMainResource((string)$entry[$informationColumns['mainresourcepath']]);	
							
			//set POI thumbpath
			if(array_key_exists('thumbpath', $constantsArray))
				$poi->setThumbpath((string)$constantsArray['thumbpath']);
			else if(array_key_exists('thumbpath', $informationColumns))
				$poi->setThumbpath((string)$entry[$informationColumns['thumbpath']]);	
					
			//set POI icon
			if(array_key_exists('iconpath', $constantsArray))
				$poi->setIcon((string)$constantsArray['iconpath']);
			else if(array_key_exists('iconpath', $informationColumns))
				$poi->setIcon((string)$entry[$informationColumns['iconpath']]);	
							
			//set POI phone number
			if(array_key_exists('phonenumber', $constantsArray))
				$poi->setPhone((string)$constantsArray['phonenumber']);
			else if(array_key_exists('phonenumber', $informationColumns))
				$poi->setPhone((string)$entry[$informationColumns['phonenumber']]);	
			
			//set POI email address
			if(array_key_exists('mail', $constantsArray))
				$poi->setMail((string)$constantsArray['mail']);
			else if(array_key_exists('mail', $informationColumns))
				$poi->setMail((string)$entry[$informationColumns['mail']]);	
				
			//set POI homepage
			if(array_key_exists('homepage', $constantsArray))
				$poi->setHomepage((string)$constantsArray['homepage']);
			else if(array_key_exists('homepage', $informationColumns))
				$poi->setHomepage((string)$entry[$informationColumns['homepage']]);				
			
			//create the xml
			if($amount == 1)
				$outputCreator->create(true, true, $poi);
			else //more than one POI available
			{
				if($count == 0) //first POI -> start
					$outputCreator->create(true, false, $poi);
				else if($count == $amount - 1) //last POI -> end
					$outputCreator->create(false, true, $poi);
				else
					$outputCreator->create(false, false, $poi);
			}
		}			
	}
	
	private function select($query)
	{
		try
		{
			$result = mysql_query($query,$this->dblink) or die(mysql_error());
		}
		catch(Exception $e)
		{
			Response::send(Response::SQL, mysql_error());
		}
		
	 	if ( mysql_num_rows($result) > 0)
	    {
	    	//add all found poiis to an array and return
	    	$data = array();
	    	while($row = mysql_fetch_array($result)){
				$data[] = $row;
			}	    	
	    	
	    	return $data;
	    }
	    else
	    	return array();
	}
}

?>