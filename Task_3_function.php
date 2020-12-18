<?php

/**
* To connect with database
* Database class is required
*/
$filepath = realpath(dirname(__FILE__)); 
include_once ($filepath.'/Database.php');

function getCheckedOutMachines($employeeName='Sandy')
{
	$db = new Database();

	$surname = $employeeName;

	$query = "SELECT tblMachines.machineId, tblMachines.title FROM ((tblMachines LEFT JOIN tblMachineAllocations ON tblMachines.machineId = tblMachineAllocations.machineId) LEFT JOIN tblEmployess ON tblEmployess.employeeId = tblMachineAllocations.employeeId) WHERE tblEmployess.surname = '$surname' AND tblMachineAllocations.status = 'Checkedout';

	$machine_info = $db->select($query);

	$machines[] = new Machine();

	if ($machine_info) {
		 $i = 0;	
         while ($result = $machine_info->fetch_assoc()) {
            $machines[i]->id = $result['machineId'];
            $machines[i]->title = $result['title'];
            $i++;
         }
      }

	return $machines;
}

?>