<?php
/*
 *	Class Routing - Handles the route process to determine what page to load based on the entered URL by user
 */
class Routing{
	/*
	 * define our properties needed
	 */
	protected $pObjRoute;
	protected $pStrUri;
	protected $pMixUriID;
	protected $pBoolIsAPI;
	
	/*
	 * constructor, initialise Routing
	 * @param Object
	 */
	public function __construct(Route $aObjRoute)
	{
		$this->pObjRoute = $aObjRoute;
		$this->pStrUri = '';
		$this->pMixUriID = null;
		$this->pBoolIsAPI = false;
	}
	
	/*
	 * Get route handler, basically a way to determine which controller is assigned to it
	 * @return Array
	 */	
	public function GetRoute()
	{
		$arrRoutes = $this->pObjRoute->GetRoutes();
		$this->SetUri();
		$strRoute = $this->GetUri();
		$this->SetRequestIsAPI($strRoute);
		$this->SetUriID();

		if (null !== $this->pMixUriID)
		{
			$arrUriLoc = explode('/', $this->pStrUri);
			$arrUriLoc[3] = '{id}';
			$strRoute = implode('/', $arrUriLoc);
		}

		$arrHandler = $this->GetValueByIndex($strRoute, $arrRoutes, null);
		return $arrHandler;
	}

	/*
	 * Check if request is API
	 */
	public function IsApi()
	{
		return $this->pBoolIsAPI;
	}

	/*
	 * Set if requested URL is API
	 * 
	 */
	private function SetRequestIsAPI($aStrRoute)
	{
		if (false !== strpos($aStrRoute, '/api/'))
		{
			$this->pBoolIsAPI = true;	
		}
	}
	
	/*
	 * Set current URI, process which URL is requested
	 * 
	 */	
	private function SetUri()
	{
		$strScriptName = $this->GetValueByIndex('SCRIPT_NAME', $_SERVER, '');
		$strBasePath = implode('/', array_slice(explode('/', $strScriptName), 0, -1)) . '/';
		
		$strRequestUri = $this->GetValueByIndex('REQUEST_URI', $_SERVER, '');
		$strUri = substr($strRequestUri, strlen($strBasePath));
		
		if (strstr($strUri, '?')) 
		{
			$strUri = substr($strUri, 0, strpos($strUri, '?'));
		}
		
		$this->pStrUri = '/' . trim($strUri, '/');
	}


	public function GetUriID()
	{
		return $this->pMixUriID;
	}

	public function SetUriID()
	{
		$arrUriLoc = explode('/', $this->pStrUri);
		if (true == isset($arrUriLoc[3]))
		{
			$this->pMixUriID = $arrUriLoc[3];
		}
	}
	/*
	 * Get current URI, process which URL is requested
	 * @return String
	 */	
	private function GetUri()
	{
		return $this->pStrUri;
	}

	private function GetValueByIndex($aMixIndex, $aArr, $aMixReturnDefault = null)
	{	
		if (true == isset($aArr[$aMixIndex]))
		{
			return $aArr[$aMixIndex];
		}
		
		return $aMixReturnDefault;
	}
}