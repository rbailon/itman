<?php
/*
 *  Copyright (C) 2014
 *  
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class DBPDO {

	public $pdo;
	private $error;
	private $DATABASE_HOST = DATABASE_HOST;
	private $DATABASE_USER = DATABASE_USER;
	private $DATABASE_PASS = DATABASE_PASS;
	private $DATABASE_NAME = DATABASE_NAME;


	function __construct($dbHost=null, $dbUser=null, $dbPass=null, $dbName=null) {
		if ($dbHost) { $this->DATABASE_HOST = $dbHost; }
		if ($dbUser) { $this->DATABASE_USER = $dbUser; }
		if ($dbPass) { $this->DATABASE_PASS = $dbPass; }
		if ($dbName) { $this->DATABASE_NAME = $dbName; }
		$this->connect();
	}


	function prep_query($query){
		return $this->pdo->prepare($query);
	}


	function connect(){
		if(!$this->pdo){

			$dsn      = 'mysql:dbname=' . $this->DATABASE_NAME . ';host=' . $this->DATABASE_HOST;
			$user     = $this->DATABASE_USER;
			$password = $this->DATABASE_PASS;

			try {
				$this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_PERSISTENT => true));
				return true;
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				die($this->error);
				return false;
			}
		}else{
			$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			return true;
		}
	}


	function table_exists($table_name){
		$stmt = $this->prep_query('SHOW TABLES LIKE ?');
		$stmt->execute(array($this->add_table_prefix($table_name)));
		return $stmt->rowCount() > 0;
	}


	function execute($query, $values = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($values);
		return $stmt;
	}

	function fetch($query, $values = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}
		$stmt = $this->execute($query, $values);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function fetchAll($query, $values = null, $key = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}
		$stmt = $this->execute($query, $values);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Allows the user to retrieve results using a
		// column from the results as a key for the array
		if($key != null && $results[0][$key]){
			$keyed_results = array();
			foreach($results as $result){
				$keyed_results[$result[$key]] = $result;
			}
			$results = $keyed_results;
		}
		return $results;
	}

	function lastInsertId(){
		return $this->pdo->lastInsertId();
	}

}