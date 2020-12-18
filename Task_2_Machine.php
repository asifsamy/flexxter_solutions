<?php 

/**
* To connect with database
* Database class is required
*/
$filepath = realpath(dirname(__FILE__)); 
include_once ($filepath.'/Database.php');

class Machine {
	/**
	* Machine's unique id
	* @var int $id
	*/
	public $id;
	/**
	* Machine's title
	* @var string $title
	*/
	public $title;

	/**
	* to hold the object of the Database class
	*/
	public $db;
    /**
	* For holding Error Message
	*@var string $error
	*/
	public $error;

	/**
	* assigns the machine to the given employee (checks the machine out)
	* @param Employee $employee the employee who wants to check out the machi
	ne
	*/
	public function checkout(Employee $employee) : void
	{
		$this->db = new Database();

        
		$employeeId = $employee->id;
		$machineId = $this->id;
		$checkedOutDate = date(DATE_ATOM);

		/**
		* if data collected from user input/request
		* $employeeId = mysqli_real_escape_string($this->db->link, $data['employeeId']);
		* $machineId = mysqli_real_escape_string($this->db->link, $data['machineId']);
		*/

		if ($employeeId == "" || $machineId == "" || $checkedOutDate == "") {
       	   $this->errormsg = "Fields must not be empty";
		} else {
			$query = "INSERT INTO tblMachineAllocations(employeeID, machineID, checkedOutDate) VALUES('$employeeId', '$machineId', '$checkedOutDate')";
		}

		$insert_allocation = $this->db->insert($query);

		if (!$insert_allocation) {
			$this->errormsg = "Allocation Insertion Unsuccessful!";
		}

	/**
	* Indicates that no employee has taken the machine with them
	* and that the employee put the machine back to the warehouse
	*/
	public function back_to_warehouse() : void
	{
		$this->db = new Database();

		$machineId = $this->id;
		$returnedDate = date(DATE_ATOM);

		$query = "UPDATE tblMachineAllocations SET status = 'Returned', returnedDate = '$returnedDate'  WHERE  machineId = '$machineId' ORDER BY machineAllocationId DESC LIMIT 1";


		$update_allocation = $this->db->update($query);

		if (!$update_allocation) {
			$this->errormsg = "Update Allocation Unsuccessful!";
		}
	}

}

?>