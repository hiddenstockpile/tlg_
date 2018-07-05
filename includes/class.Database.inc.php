<?php


class Database{

	protected $objConnection;
	protected $pStrTable;


	public function SetConnection()
	{
		$this->objConnection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		// Check connection
		if ($this->objConnection->connect_error) {
		    die("Connection failed: " . $this->objConnection->connect_error);
		} 
	}

	public function SetTableName($aStrTable)
	{
		$this->pStrTable = $aStrTable;
	}

	public function InserValues($aArrData)
	{
		
		$aArrData['date_created'] = time();
		$strSql = "INSERT INTO `" . $this->pStrTable . "` (" . implode(", ", array_keys($aArrData)) . ") VALUES ('" . implode("', '", $aArrData) . "')";

		if ($this->objConnection->query($strSql) === TRUE) 
		{
			$aArrData['id'] = $this->objConnection->insert_id;
		    return $aArrData;
		} 
		else 
		{
			//set error handler
		    return [];
		}


	}
	public function GetByID($aMixID)
	{
		$strSql = "SELECT * FROM `" . $this->pStrTable . "` WHERE id = " . $aMixID;
		$result = $this->objConnection->query($strSql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	return $row;
			}
		}
		return [];
	}

	public function GetAll()
	{
		$strSql = "SELECT * FROM `" . $this->pStrTable . "`";
		$result = $this->objConnection->query($strSql);
		$arrRecord = [];
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	array_push($arrRecord, $row);
			}

			return $arrRecord;
		}
		return [];
	}
}