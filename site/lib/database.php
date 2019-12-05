<?php
class Database {
	public $host = 'localhost';
	public $user = 'root';
	public $pass = '';
	public $dbname = 'db_exam';

	public $link;
	public $error;

	public function __construct() {
		$this->dbConection();
	}

	public function dbConection() {
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if (!$this->link) {
			echo "Connection faild" . $this->link->connect_error;
			return false;
		}
	}

//    Select data or Read data

	public function select($query) {
		$result = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}

	}

	public function insert($query) {
		$insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($insert_row) {
			// header('location:index.php?msg='.urlencode('Data Insert succssfully'));
			// exit();
			echo "<span style='color:green;font-size: 20px;'>Data insert succssfully!!</span> ";
			return $insert_row;
		} else {
			// die("Error :('.$this->link->error.')" .$this->link->error);
			return false;
		}
	}

	public function update($query) {
		$insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($insert_row) {
			// header('location:index.php?msg='.urlencode('Data Insert succssfully'));
			// exit();
			echo "<span style='color:green;font-size: 20px;'>Data Update succssfully!!</span> ";
			return $insert_row;
		} else {
			// die("Error :('.$this->link->error.')" .$this->link->error);
			return false;
		}
	}

	public function delete($query) {
		$delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($delete_row) {
			// header('location:index.php?msg='.urlencode('Data Insert succssfully'));
			// exit();
			echo "<span style='color:green;font-size: 20px;'>Data Delete succssfully!!</span> ";
			return $delete_row;
		} else {
			// die("Error :('.$this->link->error.')" .$this->link->error);
			return false;
		}
	}
}

?>