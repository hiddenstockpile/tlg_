<?php
/*
 *	Class TodoController - manages TodoView processes
 */
include_once(VIEW_DIR . '/TodoView.php');
include_once(MODEL_DIR . '/TodoModel.php');
class TodoController{
	
	/*
	 * define our properties needed
	 */
	public $pObjResponse;

	public $UriID;
	
	/*
	 * constructor, initialise Controller
	 * @param Object
	 */
	public function __construct(Response $aObjResponse, $aMixUriID = null)
	{
		$this->pObjResponse = $aObjResponse;	
		$this->UriID = $aMixUriID;
	}
	
	/*
	 * This function handles the Page to be displayed by the Todo page	 
	 */
	public function Index()
	{
		$this->SetShowPage();
	}

	public function Api()
	{
		$strMethod = $_SERVER['REQUEST_METHOD'];
		$strProcessFunc = 'Todo__' . $strMethod;

		$arrResult = ['Not_Found' => $strProcessFunc];
		if (true == method_exists($this, $strProcessFunc))
		{
			
			$arrInput = json_decode(file_get_contents('php://input'),true);
			$arrResult = $this->$strProcessFunc($arrInput, $this->UriID);
		}

		$this->pObjResponse->SetJsonResponse($arrResult);
		$this->pObjResponse->GetJsonResponse();
	}

	private function Todo__GET($aArrInput, $aMixId = null)
	{
		$objTodoModel = new TodoModel($aArrInput);

		if (null == $aMixId)
			$arrResult = $objTodoModel->GetAll();
		else
			$arrResult = $objTodoModel->GetDataById($aMixId);

		return ['Todo__GET' => $arrResult];
	}

	private function Todo__POST($aArrInput, $aMixId)
	{

		$objTodoModel = new TodoModel($aArrInput);
		$arrResult = $objTodoModel->DataInsert();
		return ['Todo__POST' => $arrResult];
	}

	private function Todo__PATCH($aArrInput, $aMixId)
	{

		return ['Todo__PATCH'];
	}

	private function Todo__DELETE($aArrInput, $aMixId)
	{

		return ['Todo__DELETE'];
	}

	/*
	 * This function is called locally to manage the Page to be displayed by the TodoView	 
	 */
	private function SetShowPage()
	{
		$this->pObjResponse->SetTitle('Todo Page');
		$strBody = '';
		
		$objView = new TodoView;
		$strBody .= $objView->GetPage();
		$this->pObjResponse->SetBody($strBody);
		
		$this->pObjResponse->SetTemplate('tp-todo.php');
		
	}


}