CREATE TABLE tblEmployess (
  employeeId int(11) NOT NULL AUTO_INCREMENT,
  surname varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  PRIMARY KEY (employeeId)  
);

CREATE TABLE tblMachines (
  machineId int(11) NOT NULL AUTO_INCREMENT,
  title varchar(50) NOT NULL,
  PRIMARY KEY (machineId),
);

CREATE TABLE tblMachineAllocations (
  machineAllocationId int(11) NOT NULL AUTO_INCREMENT,
  employeeId int(11) NOT NULL,
  machineId int(11) NOT NULL,
  checkedOutDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  returnedDate datetime,
  status ENUM('Checkedout', 'Returned') NOT NULL DEFAULT 'Checkedout',
  PRIMARY KEY (machineAllocationId),
  FOREIGN KEY (employeeId) REFERENCES TblEmployess(employeeId),
  FOREIGN KEY (machineId) REFERENCES TblMachines(machineId) 
);

