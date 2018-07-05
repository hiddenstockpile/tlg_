<?php
/*
 *	Class Serve - Serves the page and render it
 */
class Serve{
	/*
	 * define our properties needed
	 */
	private $pObjRouting;
	private $pObjResponse;
	/*
	 * constructor, initialise Serve
	 * @param Object, Object
	 */
	public function __construct(Routing $aObjRouting, Response $aObjResponse)
	{
		$this->pObjRouting = $aObjRouting;
		$this->pObjResponse = $aObjResponse;
	}
	
	/*
	 * Sets what controller to use and include it
	 * 
	 */
	public function Request()
	{
		$arrRouteData = $this->pObjRouting->GetRoute();
		$strController = $this->GetValueByIndex(Route::CONTROLLER, $arrRouteData, null);
		$strAction = $this->GetValueByIndex(Route::ACTION, $arrRouteData, null);
		if (null != $strController)
		{
			//add validation if file exists
			$strControllerFile = CONTROLLER_DIR . "/" . $strController .'.php';
			if (true == file_exists($strControllerFile))
			{
				include_once($strControllerFile);
				$mixUriID = $this->pObjRouting->GetUriID();
				$objController = new $strController($this->pObjResponse, $mixUriID);
				$objController->$strAction();
			}
		}
		else
		{
			
			$strController = 'NotFoundController';
			$strAction = 'Index';
			$strControllerFile = CONTROLLER_DIR . "/". $strController .'.php';
			include_once($strControllerFile);
			$objController = new $strController($this->pObjResponse);
			$objController->$strAction();
		}

		if (false === $this->pObjRouting->IsApi())
		{
			require_once( TEMPLATE_DIR . '/default.php');
		}
}

	
	/*
	 * Gets the title that was set in the Response object
	 * @return String
	 */
	public function GetTitle()
	{
		return $this->pObjResponse->GetTitle();
	}
	
	/*
	 * Gets the header that was set in the Response object
	 * @return String
	 */
	public function GetHeader()
	{
		return $this->pObjResponse->GetHeader();
	}
	
	/*
	 * Gets the body that was set in the Response object
	 * @return String
	 */
	public function GetBody()
	{
		return $this->pObjResponse->GetBody();
	}
	
	/*
	 * Gets the footer that was set in the Response object
	 * @return String
	 */
	public function GetFooter()
	{
		return $this->pObjResponse->GetFooter();
	}
	
	/*
	 * Gets the template file to used if set in the Response object
	 * @return String
	 */
	public function GetTemplate()
	{
		return $this->pObjResponse->GetTemplate();
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