CREATE TABLE Customer (
    customer_id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(255),
    phone_number VARCHAR(15),
    email VARCHAR(100)
);
CREATE TABLE MeterType (
    type_id VARCHAR(10) PRIMARY KEY,
    type_name VARCHAR(50)
);
CREATE TABLE Meter (
    meter_id VARCHAR(10) PRIMARY KEY,
    type_id VARCHAR(10),
    installation_date DATE,
    FOREIGN KEY (type_id) REFERENCES MeterType(type_id)
);
CREATE TABLE CustomerMeter (
    customer_meter_id VARCHAR(10) PRIMARY KEY,
    customer_id VARCHAR(10),
    meter_id VARCHAR(10),
    FOREIGN KEY (customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY (meter_id) REFERENCES Meter(meter_id)
);
CREATE TABLE Bill (
    bill_id VARCHAR(10) PRIMARY KEY,
    customer_meter_id VARCHAR(10),
    bill_amount DECIMAL(10,2),
    bill_date DATE,
    due_date DATE,
    FOREIGN KEY (customer_meter_id) REFERENCES CustomerMeter(customer_meter_id)
);
CREATE TABLE Complaint (
    complaint_id VARCHAR(10) PRIMARY KEY,
    customer_id VARCHAR(10),
    description TEXT,
    status VARCHAR(20),
    FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
);
CREATE TABLE Employee (
    employee_id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100),
    position VARCHAR(100)
);
CREATE TABLE ComplaintEmployee (
    complaint_employee_id VARCHAR(10) PRIMARY KEY,
    complaint_id VARCHAR(10),
    employee_id VARCHAR(10),
    FOREIGN KEY (complaint_id) REFERENCES Complaint(complaint_id),
    FOREIGN KEY (employee_id) REFERENCES Employee(employee_id)
);


INSERT INTO MeterType (type_id, type_name) VALUES
('R1', 'Residential'),
('C1', 'Commercial');


INSERT INTO Employee (employee_id, name, position) VALUES
('EY1', 'Ajay Kumar', 'Manager'),
('EY2', 'Anita Singh', 'Customer Service Representative'),
('EY3', 'Arun Kumar', 'Technician'),
('EY4', 'Deepak Patel', 'Accountant'),
('EY5', 'Gita Rao', 'Billing Specialist'),
('EY6', 'Hari Menon', 'Engineer'),
('EY7', 'Ravi Sharma', 'Customer Service Representative'),
('EY8', 'Sneha Gupta', 'Technician'),
('EY9', 'Vikram Singh', 'Billing Specialist'),
('EY10', 'Priya Patel', 'Engineer');


INSERT INTO Customer (customer_id, name, address, phone_number, email) VALUES
('CY1', 'Rahul Gupta', '123 Yelahanka New Town', '080-1111111', 'rahul@example.com'),
('CY2', 'Neha Sharma', '456 Yelahanka Old Town', '080-2222222', 'neha@example.com'),
('CY3', 'Kumar Swamy', '789 Yelahanka Extension', '080-3333333', 'kumar@example.com'),
('CY4', 'Anjali Reddy', '321 Yelahanka South', '080-4444444', 'anjali@example.com'),
('CY5', 'Sandeep Kumar', '654 Yelahanka West', '080-5555555', 'sandeep@example.com'),
('CY6', 'Shalini Singh', '987 Yelahanka North', '080-6666666', 'shalini@example.com'),
('CY7', 'Rajesh Patel', '135 Yelahanka East', '080-7777777', 'rajesh@example.com'),
('CY8', 'Pooja Sharma', '246 Yelahanka Central', '080-8888888', 'pooja@example.com'),
('CY9', 'Vijay Singh', '753 Yelahanka Industrial Area', '080-9999999', 'vijay@example.com'),
('CY10', 'Deepa Gupta', '852 Yelahanka Residential Area', '080-1010101', 'deepa@example.com'),
('CY11', 'Sunil Kumar', '963 Yelahanka Commercial Area', '080-2020202', 'sunil@example.com'),
('CY12', 'Meera Jain', '147 Yelahanka Market Street', '080-3030303', 'meera@example.com'),
('CY13', 'Anand Tiwari', '258 Yelahanka Shopping Complex', '080-4040404', 'anand@example.com'),
('CY14', 'Rita Mehra', '369 Yelahanka Business Park', '080-5050505', 'rita@example.com'),
('CY15', 'Sanjay Verma', '741 Yelahanka Tech Park', '080-6060606', 'sanjay@example.com'),
('CY16', 'Sunita Kapoor', '852 Yelahanka IT Hub', '080-7070707', 'sunita@example.com'),
('CY17', 'Rahul Singhania', '963 Yelahanka Financial District', '080-8080808', 'rahul@example.com'),
('CY18', 'Anita Gupta', '147 Yelahanka Educational Zone', '080-9090909', 'anita@example.com'),
('CY19', 'Vivek Agarwal', '258 Yelahanka Medical Center', '080-1212121', 'vivek@example.com'),
('CY20', 'Preeti Shah', '369 Yelahanka Entertainment Complex', '080-1313131', 'preeti@example.com'),
('CY21', 'Alok Tiwari', '741 Yelahanka Sports Arena', '080-1414141', 'alok@example.com'),
('CY22', 'Sarita Reddy', '852 Yelahanka Cultural Center', '080-1515151', 'sarita@example.com'),
('CY23', 'Vikas Jain', '963 Yelahanka Recreation Club', '080-1616161', 'vikas@example.com'),
('CY24', 'Anjali Mehra', '147 Yelahanka Art Gallery', '080-1717171', 'anjali@example.com'),
('CY25', 'Amit Verma', '258 Yelahanka Library', '080-1818181', 'amit@example.com'),
('CY26', 'Sarika Kapoor', '369 Yelahanka Park', '080-1919191', 'sarika@example.com'),
('CY27', 'Rohit Singh', '741 Yelahanka Lake', '080-2020202', 'rohit@example.com'),
('CY28', 'Monica Tiwari', '852 Yelahanka Zoo', '080-2121212', 'monica@example.com'),
('CY29', 'Rakesh Sharma', '963 Yelahanka Botanical Garden', '080-2222222', 'rakesh@example.com'),
('CY30', 'Nisha Patel', '147 Yelahanka Aquarium', '080-2323232', 'nisha@example.com');


INSERT INTO Meter (meter_id, type_id, installation_date) VALUES
('MY1', 'R1', '2024-01-15'),
('MY2', 'C1', '2024-02-01'),
('MY3', 'R1', '2024-02-10'),
('MY4', 'C1', '2024-02-20'),
('MY5', 'R1', '2024-03-05');


INSERT INTO CustomerMeter (customer_meter_id, customer_id, meter_id) VALUES
('CMY1', 'CY1', 'MY1'),
('CMY2', 'CY2', 'MY2'),
('CMY3', 'CY3', 'MY3'),
('CMY4', 'CY4', 'MY4'),
('CMY5', 'CY5', 'MY5'),
('CMY6', 'CY6', 'MY1'),
('CMY7', 'CY7', 'MY2'),
('CMY8', 'CY8', 'MY3'),
('CMY9', 'CY9', 'MY4'),
('CMY10', 'CY10', 'MY5'),
('CMY11', 'CY11', 'MY1'),
('CMY12', 'CY12', 'MY2'),
('CMY13', 'CY13', 'MY3'),
('CMY14', 'CY14', 'MY4'),
('CMY15', 'CY15', 'MY5'),
('CMY16', 'CY16', 'MY1'),
('CMY17', 'CY17', 'MY2'),
('CMY18', 'CY18', 'MY3'),
('CMY19', 'CY19', 'MY4'),
('CMY20', 'CY20', 'MY5'),
('CMY21', 'CY21', 'MY1'),
('CMY22', 'CY22', 'MY2'),
('CMY23', 'CY23', 'MY3'),
('CMY24', 'CY24', 'MY4'),
('CMY25', 'CY25', 'MY5'),
('CMY26', 'CY26', 'MY1'),
('CMY27', 'CY27', 'MY2'),
('CMY28', 'CY28', 'MY3'),
('CMY29', 'CY29', 'MY4'),
('CMY30', 'CY30', 'MY5');


INSERT INTO Bill (bill_id, customer_meter_id, bill_amount, bill_date, due_date) VALUES
('BY1', 'CMY1', 500.00, '2024-02-01', '2024-02-15'),
('BY2', 'CMY2', 750.00, '2024-02-05', '2024-02-20'),
('BY3', 'CMY3', 600.00, '2024-02-10', '2024-02-25'),
('BY4', 'CMY4', 900.00, '2024-02-15', '2024-03-01'),
('BY5', 'CMY5', 800.00, '2024-02-20', '2024-03-05'),
('BY6', 'CMY6', 550.00, '2024-02-25', '2024-03-10'),
('BY7', 'CMY7', 700.00, '2024-03-01', '2024-03-15'),
('BY8', 'CMY8', 850.00, '2024-03-05', '2024-03-20'),
('BY9', 'CMY9', 950.00, '2024-03-10', '2024-03-25'),
('BY10', 'CMY10', 700.00, '2024-03-15', '2024-03-30');


INSERT INTO Complaint (complaint_id, customer_id, description, status) VALUES
('CompY1', 'CY1', 'Power outage', 'Resolved'),
('CompY2', 'CY2', 'Incorrect meter reading', 'Open'),
('CompY3', 'CY3', 'Billing discrepancy', 'Open'),
('CompY4', 'CY4', 'Service interruption', 'Open'),
('CompY5', 'CY5', 'Meter malfunction', 'Resolved'),
('CompY6', 'CY6', 'Late bill', 'Open'),
('CompY7', 'CY7', 'High bill amount', 'Open'),
('CompY8', 'CY8', 'Meter reading discrepancy', 'Open'),
('CompY9', 'CY9', 'Billing error', 'Open'),
('CompY10', 'CY10', 'Service request', 'Resolved');


INSERT INTO ComplaintEmployee (complaint_employee_id, complaint_id, employee_id) VALUES
('CEY1', 'CompY1', 'EY3'),
('CEY2', 'CompY2', 'EY2'),
('CEY3', 'CompY3', 'EY5'),
('CEY4', 'CompY4', 'EY3'),
('CEY5', 'CompY5', 'EY3'),
('CEY6', 'CompY6', 'EY5'),
('CEY7', 'CompY7', 'EY2'),
('CEY8', 'CompY8', 'EY5'),
('CEY9', 'CompY9', 'EY5'),
('CEY10', 'CompY10', 'EY3');

ALTER TABLE Employee
ADD COLUMN password VARCHAR(10) CHECK (LENGTH(password) >= 6 AND LENGTH(password) <= 10);

UPDATE Employee
SET password = 'emp@one'
WHERE employee_id = 'EY1';
UPDATE Employee
SET password = 'emp@two'
WHERE employee_id = 'EY2';
UPDATE Employee
SET password = 'emp@the'
WHERE employee_id = 'EY3';
UPDATE Employee
SET password = 'emp@fou'
WHERE employee_id = 'EY4';
UPDATE Employee
SET password = 'emp@fiv'
WHERE employee_id = 'EY5';
UPDATE Employee
SET password = 'emp@six'
WHERE employee_id = 'EY6';
UPDATE Employee
SET password = 'emp@sev'
WHERE employee_id = 'EY7';
UPDATE Employee
SET password = 'emp@eig'
WHERE employee_id = 'EY8';
UPDATE Employee
SET password = 'emp@nin'
WHERE employee_id = 'EY9';
UPDATE Employee
SET password = 'emp@ten'
WHERE employee_id = 'EY10';

ALTER TABLE Customer
ADD COLUMN password VARCHAR(10) CHECK (LENGTH(password) >= 6 AND LENGTH(password) <= 10);

UPDATE Customer SET password = 'cust@one' WHERE customer_id = 'CY1';
UPDATE Customer SET password = 'cust@two' WHERE customer_id = 'CY2';
UPDATE Customer SET password = 'cust@thr' WHERE customer_id = 'CY3';
UPDATE Customer SET password = 'cust@fou' WHERE customer_id = 'CY4';
UPDATE Customer SET password = 'cust@fiv' WHERE customer_id = 'CY5';
UPDATE Customer SET password = 'cust@six' WHERE customer_id = 'CY6';
UPDATE Customer SET password = 'cust@sev' WHERE customer_id = 'CY7';
UPDATE Customer SET password = 'cust@eig' WHERE customer_id = 'CY8';
UPDATE Customer SET password = 'cust@nin' WHERE customer_id = 'CY9';
UPDATE Customer SET password = 'cust@ten' WHERE customer_id = 'CY10';
UPDATE Customer SET password = 'cust@11' WHERE customer_id = 'CY11';
UPDATE Customer SET password = 'cust@12' WHERE customer_id = 'CY12';
UPDATE Customer SET password = 'cust@13' WHERE customer_id = 'CY13';
UPDATE Customer SET password = 'cust@14' WHERE customer_id = 'CY14';
UPDATE Customer SET password = 'cust@15' WHERE customer_id = 'CY15';
UPDATE Customer SET password = 'cust@16' WHERE customer_id = 'CY16';
UPDATE Customer SET password = 'cust@17' WHERE customer_id = 'CY17';
UPDATE Customer SET password = 'cust@18' WHERE customer_id = 'CY18';
UPDATE Customer SET password = 'cust@19' WHERE customer_id = 'CY19';
UPDATE Customer SET password = 'cust@20' WHERE customer_id = 'CY20';
UPDATE Customer SET password = 'cust@21' WHERE customer_id = 'CY21';
UPDATE Customer SET password = 'cust@22' WHERE customer_id = 'CY22';
UPDATE Customer SET password = 'cust@23' WHERE customer_id = 'CY23';
UPDATE Customer SET password = 'cust@24' WHERE customer_id = 'CY24';
UPDATE Customer SET password = 'cust@25' WHERE customer_id = 'CY25';
UPDATE Customer SET password = 'cust@26' WHERE customer_id = 'CY26';
UPDATE Customer SET password = 'cust@27' WHERE customer_id = 'CY27';
UPDATE Customer SET password = 'cust@28' WHERE customer_id = 'CY28';
UPDATE Customer SET password = 'cust@29' WHERE customer_id = 'CY29';
UPDATE Customer SET password = 'cust@30' WHERE customer_id = 'CY30';

ALTER TABLE Employee ADD COLUMN salary VARCHAR(10) CHECK (LENGTH(salary) >= 5 AND LENGTH(salary) <= 10);
UPDATE Employee SET salary = '125000' WHERE employee_id = 'EY1';
UPDATE Employee SET salary = '25000' WHERE employee_id = 'EY2';
UPDATE Employee SET salary = '50000' WHERE employee_id = 'EY3';
UPDATE Employee SET salary = '42000' WHERE employee_id = 'EY4';
UPDATE Employee SET salary = '32000' WHERE employee_id = 'EY5';
UPDATE Employee SET salary = '87000' WHERE employee_id = 'EY6';
UPDATE Employee SET salary = '25000' WHERE employee_id = 'EY7';
UPDATE Employee SET salary = '50000' WHERE employee_id = 'EY8';
UPDATE Employee SET salary = '32000' WHERE employee_id = 'EY9';
UPDATE Employee SET salary = '87000' WHERE employee_id = 'EY10';