<?php
/*
 *	Class Response - handles appropriate response : 
 *	- page display
 *	- json string
 */
Class Response{
	/*
	 * define our properties needed
	 */
	protected $pStrHeader;
	protected $pstrBody;
	protected $pStrFooter;
	protected $pStrTitle;
	protected $pStrTemplate;
	protected $pStrJsonResponse;
	/*
	 * constructor, initialise Response Properties
	 */
	
	public function __construct()
	{
		$this->pStrHeader = '';
		$this->pstrBody = '';
		$this->pStrFooter = '';
		$this->pStrTitle = '';
		$this->pStrTemplate = null;
		$this->pStrJsonResponse = '';
	}
	
	/*
	 * set the header bit of the page
	 * @param String
	 */
	public function SetHeader($aStrHeader)
	{
		$this->pStrHeader = $aStrHeader;
	}
	
	/*
	 * get the header bit of the page
	 * @return String
	 */
	public function GetHeader()
	{
		return $this->pStrHeader;
	}
	
	/*
	 * set the body bit of the page
	 * @param String
	 */
	public function SetBody($aStrBody)
	{
		$this->pstrBody = $aStrBody;
	}
	
	/*
	 * get the body bit of the page
	 * @return String
	 */
	public function GetBody()
	{
		return $this->pstrBody;
	}
	
	/*
	 * set the footer bit of the page
	 * @param String
	 */
	public function SetFooter($aStrFooter)
	{
		$this->pStrFooter = $aStrFooter;
	}
	
	/*
	 * get the footer bit of the page
	 * @return String
	 */
	public function GetFooter()
	{
		return $this->pStrFooter;
	}
	
	/*
	 * set the title bit of the page
	 * @param String
	 */
	public function SetTitle($aStrTitle)
	{
		$this->pStrTitle = $aStrTitle;
	}
	
	/*
	 * get the title bit of the page
	 * @return String
	 */
	public function GetTitle()
	{
		return $this->pStrTitle;
	}
	
	/*
	 * set the template file that will be used by the page
	 * @param String
	 */
	public function SetTemplate($aStrTemplate)
	{
		$this->pStrTemplate = $aStrTemplate;
	}
	
	/*
	 * get the template file that will be used by the page
	 * @return String
	 */
	public function GetTemplate()
	{
		return $this->pStrTemplate;
	}


	/*
	 * Set Json response for REST request
	 * @param mix values
	 */
	public function SetJsonResponse($mixData)
	{
		$this->pStrJsonResponse = json_encode($mixData);
	}

	/*
	 * Get Json response for REST request
	 * @return json string
	 */
	public function GetJsonResponse($aBoolEchoData = true)
	{
		
		if (true == $aBoolEchoData)
		{
			echo $this->pStrJsonResponse;
			return;
		}

		return $this->pStrJsonResponse;
	}
}