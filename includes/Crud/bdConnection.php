<?php 

namespace Includes\Crud;
use \PDO;

class bdConnection {
	public $dbh;
	private $host;
	private $user;
	private $password;
	private $bd;

	function __construct() {
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->bd = "gerenciazap";

		$this->connect();
	}

	private function connect() {
		$this->dbh = new PDO("mysql:host={$this->host};dbname={$this->bd}", $this->user, $this->password);
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function select($table,$params=false,$searchFields="*",$allResults=false,$between=false,$orderBy=false,$pagination=false) {
		$fields = false;
		$last = $params!=false ? array_key_last($params) : false;

		if($params!=false) {
			$identifier = ",";
			
			foreach($params as $key=>$item) {
				if($key=="identifier") {
					$identifier = $item;
				}
				else if(isset($item) && is_array($item) && $key!="identifier") {
					$allArray = explode(",",$item[0]);
					
					foreach($allArray as $chave=>$item) {
						$newArray = $key."=".$item;
						$allArray[$chave] = $newArray;
					}

					$fields .= implode(" ".$identifier." ",$allArray);
				}
				else if($key==$last) {
					$fields .= $key."='".$item."'";
				}
				else {
					$fields .= " {$identifier} ".$key."='".$item."' {$identifier} ";
				}
			}
		}

		$query = $fields != false ? "SELECT {$searchFields} FROM {$table} WHERE ({$fields})" : "SELECT {$searchFields} FROM {$table}";
		$query = $between != false ? $query." AND {$between['field']} BETWEEN '{$between['between']}' AND '{$between['and']}'" : $query;
		$query = $orderBy != false ? $query." ORDER BY {$orderBy['field']}" : $query;
		$query = $pagination != false ? $query." LIMIT {$pagination['itens']} OFFSET {$pagination['page']}" : $query;
		$connection = $this->dbh->query($query);
		$result = $allResults==false ? $connection->fetch() : $connection->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function insert($table,$params) {
		$fields = ":".implode(",:",array_keys($params));

		try {
			$query = $this->dbh->prepare("INSERT INTO {$table} VALUES($fields)");
			$query->execute($params);

			return true;
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function update($table,$params) {
		$fields = "";
		$last = array_key_last($params);

		foreach($params as $key=>$value) {
			if($key == $last) {
				$fields.=$key." = :".$key;
			}
			else if($key!="id") {
				$fields.=$key." = :".$key.",";
			}
		}

		try {
			$query = $this->dbh->prepare("UPDATE {$table} SET {$fields} WHERE id = :id");
			$query->execute($params);

			return true;
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function delete($table,$params) {
		try {
			$query = $this->dbh->prepare("DELETE FROM {$table} WHERE id = :id");
			$query->execute($params);

			return true;
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}
