<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Department.php";
    require_once "src/Division.php";
    require_once "src/Employee.php";

    $server = 'mysql:host=localhost:8889;dbname=death_star_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class EmployeeTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Department::deleteAll();
            Division::deleteAll();
            Employee::deleteAll();
        }

        function testGetName()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);

            //Act
            $result = $test_employee->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $new_name = "R2D2";

            //Act
            $test_employee->setName($new_name);
            $result = $test_employee->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function testGetRank()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);

            //Act
            $result = $test_employee->getRank();

            //Assert
            $this->assertEquals($rank, $result);
        }

        function testSetRank()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $new_rank = "Captain";

            //Act
            $test_employee->setRank($new_rank);
            $result = $test_employee->getRank();

            //Assert
            $this->assertEquals($new_rank, $result);
        }

        function testGetSpecies()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);

            //Act
            $result = $test_employee->getSpecies();

            //Assert
            $this->assertEquals($species, $result);
        }

        function testSetSpecies()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $new_species = "Bothan";

            //Act
            $test_employee->setSpecies($new_species);
            $result = $test_employee->getSpecies();

            //Assert
            $this->assertEquals($new_species, $result);
        }

        function testGetPay()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);

            //Act
            $result = $test_employee->getPay();

            //Assert
            $this->assertEquals($pay, $result);
        }

        function testSetPay()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $new_pay = 1000;

            //Act
            $test_employee->setPay($new_pay);
            $result = $test_employee->getPay();

            //Assert
            $this->assertEquals($new_pay, $result);
        }

        function testGetRecord()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);

            //Act
            $result = $test_employee->getRecord();

            //Assert
            $this->assertEquals($record, $result);
        }

        function testSetRecord()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $new_record = "Making great strides";

            //Act
            $test_employee->setRecord($new_record);
            $result = $test_employee->getRecord();

            //Assert
            $this->assertEquals($new_record, $result);
        }

        function testGetId()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            //Act
            $result = $test_employee->getId();

            //Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            //Act
            $executed = $test_employee->save();

            //Assert
            $this->assertTrue($executed, "Employee not successfully saved to database");
        }

        function testGetAll()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $name2 = "Han";
            $rank2 = "General";
            $species2 = "Human";
            $pay2 = 100;
            $record2 = "Insubordinate";
            $test_employee2 = new Employee($name2, $rank2, $species2, $pay2, $record2);
            $test_employee2->save();

            //Act
            $result = Employee::getAll();

            //Assert
            $this->assertEquals([$test_employee, $test_employee2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $name2 = "Han";
            $rank2 = "General";
            $species2 = "Human";
            $pay2 = 100;
            $record2 = "Insubordinate";
            $test_employee2 = new Employee($name2, $rank2, $species2, $pay2, $record2);
            $test_employee2->save();

            //Act
            Employee::deleteAll();
            $result = Employee::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $name2 = "Han";
            $rank2 = "General";
            $species2 = "Human";
            $pay2 = 100;
            $record2 = "Insubordinate";
            $test_employee2 = new Employee($name2, $rank2, $species2, $pay2, $record2);
            $test_employee2->save();

            //Act
            $result = Employee::find($test_employee->getId());

            //Assert
            $this->assertEquals($test_employee, $result);
        }

        function testUpdateName()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $new_name = "Han";

            //Act
            $test_employee->updateName($new_name);

            //Assert
            $this->assertEquals($new_name, $test_employee->getName());
        }

        function testUpdateRank()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $new_rank = "General";

            //Act
            $test_employee->updateRank($new_rank);

            //Assert
            $this->assertEquals($new_rank, $test_employee->getRank());
        }

        function testUpdateSpecies()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $new_species = "Human";

            //Act
            $test_employee->updateSpecies($new_species);

            //Assert
            $this->assertEquals($new_species, $test_employee->getSpecies());
        }

        function testUpdatePay()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $new_pay = 100;

            //Act
            $test_employee->updatePay($new_pay);

            //Assert
            $this->assertEquals($new_pay, $test_employee->getPay());
        }

        function testUpdateRecord()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $new_record = "Good job";

            //Act
            $test_employee->updateRecord($new_record);

            //Assert
            $this->assertEquals($new_record, $test_employee->getRecord());
        }

        function test_delete()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $name2 = "Chewy";
            $rank2 = "Major";
            $species2 = "Wookie";
            $pay2 = 50;
            $record2 = "Major failure";
            $test_employee2 = new Employee($name2, $rank2, $species2, $pay2, $record2);
            $test_employee2->save();

            //Act
            $test_employee->delete();

            //Assert
            $this->assertEquals([$test_employee2], Employee::getAll());
        }

        function testAddDepartment()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $name2 = "Chewy";
            $rank2 = "Major";
            $species2 = "Wookie";
            $pay2 = 50;
            $record2 = "Major failure";
            $test_employee2 = new Employee($name2, $rank2, $species2, $pay2, $record2);
            $test_employee2->save();

            $dept_name = 'Becky';
            $test_division = new Division($dept_name);
            $test_division->save();
            $division_id = $test_division->getId();

            $dept_name = "Pilots";
            $test_department = new Department($dept_name, $division_id);
            $test_department->save();

            //Act
            $test_employee->addDepartment($test_department);

            //Assert
            $this->assertEquals([$test_department], $test_employee->getDepartments());
        }

        function testGetDepartments()
        {
            //Arrange
            $name = "Chewy";
            $rank = "Major";
            $species = "Wookie";
            $pay = 50;
            $record = "Major failure";
            $test_employee = new Employee($name, $rank, $species, $pay, $record);
            $test_employee->save();

            $dept_name = 'Becky';
            $test_division = new Division($dept_name);
            $test_division->save();
            $division_id = $test_division->getId();

            $dept_name = "Pilots";

            $test_department = new Department($dept_name, $division_id);
            $test_department->save();

            $dept_name2 = "Operations";

            $test_department2 = new Department($dept_name2, $division_id);
            $test_department2->save();

            //Act
            $test_employee->addDepartment($test_department);
            $test_employee->addDepartment($test_department2);

            //Assert
            $this->assertEquals([$test_department, $test_department2], $test_employee->getDepartments());
        }
    }
?>
