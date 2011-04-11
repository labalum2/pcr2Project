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
			$poi->setInteractionType("none");
			$poi->setOrientation("0,0,0");
			
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
				
			//set POI position
			if(array_key_exists('latitude', $informationColumns) && array_key_exists('longitude', $informationColumns))
				$poi->setLocation(trim((string)$entry[$informationColumns['latitude']]) . "," . trim((string)$entry[$informationColumns['longitude']]) . ",0");	
			else
				trigger_error("POI latitude and longitude are mandatory");
			
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