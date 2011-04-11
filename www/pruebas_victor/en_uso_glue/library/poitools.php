<?php
require_once '../library/responses.class.php';

class SinglePOI
{
	/**
	 * id of the poi;
	 * @var string
	 */
	public $sPoiid = "";
	
	/**
	 * Resources;
	 * @var array of Resources
	 */
	public $sInteractionType = "";
	
	/**
	 * Name of the poi;
	 * @var string
	 */
	public $sName = "";
	
	/**
	 * POI decription;
	 * @var string
	 */
	public $sDescription = "";
	
	/**
	 * POI creator;
	 * @var string
	 */
	public $sAuthor = "";
	
	/**
	 * POI creation time;
	 * @var string
	 */
	public $sCreation = "";
	
	/**
	 * POI LLA;
	 * @var string
	 */
	public $sLocation = "";

	/**
	 * POI Orientation;
	 * @var string
	 */
	public $sOrientation = "";
	
	/**
	 * MIME type of the POI;
	 * @var string
	 */
	public $sMIMEType = "";
	
	/**
	 * Path to main resource
	 * @var string
	 */
	public $sMainResourcePath = "";
	
//THIS IS THE BEGINNING OF OUR CUSTOM CODE
	/**
	 * POI Scale;
	 * @var string
	 */
	public $sScale = "";

	/**
	 * POI Force3d;
	 * @var string
	 */
	public $sForce3d = "";
	
	/**
	 * POI Translation;
	 * @var string
	 */
	public $sTranslation = "";


	/**
	* Path to 3D model resource -skin, texture-
	* @var string
	*/
	public $sResource = "";
	
	/**
	* Path to 3D model resource -skin, texture-
	* @var string
	*/
	public $sBehaviour1length = "";
//THIS IS THE END OF OUR CUSTOM CODE
	
	/**
	 * URI to thumbnail;
	 * @var string
	 */
	public $sThumbpath = "";
	
	/**
	 * URI to icon;
	 * @var string
	 */
	public $sIcon = "";
	
	/**
	 * Phone number belonging to POI;
	 * @var string
	 */
	public $sPhone = "";
	
	/**
	 * Mail address belonging to POI;
	 * @var string
	 */
	public $sMail = "";
	
	/**
	 * Homepage belonging to POI;
	 * @var string
	 */
	public $sHomepage = "";
	
	/**
	 * Show "navigate to button" on the client
	 * @var string
	 */
	public $sShowNavigateToButton = "";
	
	public function getPoiid() { return $this->sPoiid; } 
	public function getInteractionType() { return $this->sInteractionType; } 
	public function getName() { return $this->sName; } 
	public function getDescription() { return $this->sDescription; } 
	public function getAuthor() { return $this->sAuthor; } 
	public function getCreation() { return $this->sCreation; } 
	public function getLocation() { return $this->sLocation; } 
	public function getOrientation() { return $this->sOrientation; } 
	public function getMIMEType() { return $this->sMIMEType; } 
	public function getMainResource() { return $this->sMainResourcePath; } 
	//THIS IS THE BEGINING OF OUR CUSTOM CODE
	public function getScale() { return $this->sScale; }
	public function getForce3d() { return $this->sForce3d; }
	public function getTranslation() { return $this->sTranslation; } 
	public function getResource() { return $this->sResource; }
	public function getBehaviour1length() { return $this->sBehaviour1length; }
	//THIS IS THE END OF OUR CUSTOM CODE
	public function getThumbpath() { return $this->sThumbpath; } 
	public function getIcon() { return $this->sIcon; } 
	public function getPhone() { return $this->sPhone; } 
	public function getMail() { return $this->sMail; } 
	public function getHomepage() { return $this->sHomepage; } 
	public function getShowNavigateToButton() { return $this->sShowNavigateToButton; }
		
	public function setPoiid($x) { $this->sPoiid = $x; } 
	public function setInteractionType($x) {$this->sInteractionType = $x;} 
	public function setName($x) { $this->sName = $x; } 
	public function setDescription($x) { $this->sDescription = $x; } 
	public function setAuthor($x) { $this->sAuthor = $x; } 
	public function setCreation($x) { $this->sCreation = $x; } 
	public function setLocation($x) { $this->sLocation = $x; } 
	public function setOrientation($x) { $this->sOrientation = $x; } 
	public function setMIMEType($x) { $this->sMIMEType = $x; } 
	public function setMainResource($x) { $this->sMainResourcePath = $x; } 
	//THIS IS THE BEGINNING OF OUR CUSTOM CODE
	public function setScale($x) { $this->sScale = $x; }
	public function setForce3d($x) { $this->sForce3d = $x; }
	public function setTranslation($x) { $this->sTranslation = $x; } 
	public function setResource($x) { $this->sResource = $x; }
	public function setBehaviour1length($x) { $this->sBehaviour1length = $x; }
	//THIS IS THE END OF OUR CUSTOM CODE
	public function setThumbpath($x) { $this->sThumbpath = $x; } 
	public function setIcon($x) { $this->sIcon = $x; } 
	public function setPhone($x) { $this->sPhone = $x; } 
	public function setMail($x) { $this->sMail = $x; } 
	public function setHomepage($x) { $this->sHomepage = $x; } 
	public function setShowNavigateToButton($x) { $this->sShowNavigateToButton = $x; }		
}

class OutputCreator
{
	/**
	 * 
	 * @param bool $start is this the first output -> true, false otherwise
	 * @param bool $end is this the last output -> false, true otherwise
	 * @param SinglePOI $oPoi a single POI
	 * @return unknown_type
	 */
	public function create($start, $end, $oPoi)
	{
		if($start)
		{
			ob_start();
			ob_clean();
		 	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?><results trackingurl=\"http://www.junaio.com/publisherDownload/tutorial/tracking_tutorial.xml_enc\">";
		}
		
		if(isset($oPoi))
		{
			$poi = new SimpleXMLExtended("<poi></poi>");
			$poi->addAttribute('id', (string)$oPoi->getPoiid());
			$poi->addAttribute('interactionfeedback', (string)$oPoi->getInteractionType());
			if($oPoi->getName() != "")
				$poi->addCData('name', $oPoi->getName());
			if($oPoi->getDescription() != "")
				$poi->addCData('description', $oPoi->getDescription());	
			if($oPoi->getAuthor() != "")
				$poi->addChild('author', $oPoi->getAuthor());	
			if($oPoi->getCreation() != "")
				$poi->addChild('date', $oPoi->getCreation());	
			if($oPoi->getLocation() != "")
				$poi->addChild('l', $oPoi->getLocation());

			//THIS IS THE BEGINNING OF OUR CUSTOM CODE
			if($oPoi->getTranslation() != "")
				$poi->addChild('translation', $oPoi->getTranslation());
			//THIS IS THE END OF OUR CUSTOM CODE

			if($oPoi->getOrientation() != "")
				$poi->addChild('o', $oPoi->getOrientation());
	
			//THIS IS THE BEGINNING OF OUR CUSTOM CODE
			if($oPoi->getScale() != "")
				$poi->addChild('s', $oPoi->getScale());
			if($oPoi->getForce3d() != "")
				$poi->addChild('force3d', $oPoi->getForce3d());
			//THIS IS THE END OF OUR CUSTOM CODE

			if($oPoi->getMIMEType() != "")
				$poi->addChild('mime-type', $oPoi->getMIMEType());	
			if($oPoi->getMainResource() != "")
				$poi->addChild('mainresource', $oPoi->getMainResource());

			//THIS IS THE BEGINNING OF OUR CUSTOM CODE
			if($oPoi->getResource() != "")
				$poi->addChild('resources');
				$poi->resources->addChild('resource', $oPoi->getResource());
			if($oPoi->getBehaviour1length() != "")
				$poi->addChild('behaviours');
				$poi->behaviours->addChild('behaviour');
				$poi->behaviours->behaviour->addAttribute('type', "idle"); //da error en esta linea
				$poi->behaviours->behaviour->addChild('length', $oPoi->getBehaviour1length());
			//THIS IS THE END OF OUR CUSTOM CODE

			if($oPoi->getThumbpath() != "")
				$poi->addChild('thumbnail', $oPoi->getThumbpath());	
			if($oPoi->getIcon() != "")
				$poi->addChild('icon', $oPoi->getIcon());	
			if($oPoi->getPhone() != "")
				$poi->addChild('phone', $oPoi->getPhone());	
			if($oPoi->getMail() != "")
				$poi->addChild('mail', $oPoi->getMail());	
			if($oPoi->getHomepage() != "")
				$poi->addCData('homepage', $oPoi->getHomepage());	
			if($oPoi->getShowNavigateToButton() != "")
				$poi->addChild('route', $oPoi->getShowNavigateToButton());
						
			//remove the automatically created xml declaration of the simpleXMLElement
	    	$out = $poi->asXML();
	    	$pos = strpos($out, "?>");
		    echo trim(substr($out, $pos + 2));
		}		
		    	
		if(!$end)
			ob_flush();
		else
		{	
			echo "</results>";
			ob_end_flush();
		}	
	}
}

class SimpleXMLExtended extends SimpleXMLElement
{
  
	public function addCData($sNode, $cdata_text)
	{
		$newNode = $this->addChild($sNode);
		$node= dom_import_simplexml($newNode);
		$nodeOwner = $node->ownerDocument;
		$node->appendChild($nodeOwner->createCDATASection($cdata_text));
	}
}

?>