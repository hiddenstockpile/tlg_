<?php
/*
 *	Class NotFoundController - manages NotFoundView processes
 */
include_once(VIEW_DIR . '/NotFoundView.php');
class NotFoundController{
	
	/*
	 * define our properties needed
	 */
	public $pObjResponse;
	
	/*
	 * constructor, initialise NotFoundController
	 * @param Object
	 */
	public function __construct(Response $aObjResponse)
	{
		$this->pObjResponse = $aObjResponse;		
	}
	
	/*
	 * This function handles the Page to be displayed by the ShowPostView	 
	 */
	public function Index()
	{
		$this->SetShowPage();
	}
	
	/*
	 * This function is called locally to manage the Page to be displayed by the NotFoundView	 
	 */
	private function SetShowPage()
	{
		$this->pObjResponse->SetTitle('NotFound Page');
		$strBody = '';
		
		$objNotFoundView = new NotFoundView;
		$strBody .= $objNotFoundView->GetPage();
		$this->pObjResponse->SetBody($strBody);
		
		$this->pObjResponse->SetTemplate('tp-notfound.php');
		
	}
}