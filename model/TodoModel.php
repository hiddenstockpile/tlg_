<?php 

class TodoModel extends Database{
	

	protected $pArrFields = [
		'title' => '',
		'description' => '',
		'status' => 'not_started'
	];
	protected $pStrTable = 'todo';


	public function __construct($aArrData)
	{

		$this->pArrFields = [
			'title' => $aArrData['title'],
			'description' => $aArrData['description'],
			'status' => $aArrData['status']
		];

		$this->SetConnection();
		$this->SetTableName($this->pStrTable);
	}

	public function SetTitle($aStrValue)
	{
		$this->pArrFields['title'] = $aStrValue;
	}
	public function SetDescription($aStrValue)
	{
		$this->pArrFields['description'] = $aStrValue;
	}
	public function SetStatus($aStrValue)
	{
		$this->pArrFields['status'] = $aStrValue;
	}

	public function DataInsert()
	{
		return $this->InserValues($this->pArrFields);
	}

	public function GetDataById($aMixID)
	{
		return $this->GetByID($aMixID);
	}

}