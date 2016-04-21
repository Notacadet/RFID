<?php
require_once "C:\wamp\bin\php\php5.5.12\Tests\Tests1\Interfaces\DeleteModelDAO.php";
require_once "C:\wamp\bin\php\php5.5.12\Tests\Tests1\src\deleteModel.php";

/*
class PHPUnit_Extensions_Database_Operation_MySQL55Truncate extends PHPUnit_Extensions_Database_Operation_Truncate
{
    public function execute(PHPUnit_Extensions_Database_DB_IDatabaseConnection $connection, PHPUnit_Extensions_Database_DataSet_IDataSet $dataSet) {
        $connection->getConnection()->query("SET @PHAKE_PREV_foreign_key_checks = @@foreign_key_checks");
        $connection->getConnection()->query("SET foreign_key_checks = 0");
        parent::execute($connection, $dataSet);
        $connection->getConnection()->query("SET foreign_key_checks = @PHAKE_PREV_foreign_key_checks");
    }
}
*/
class DeleteMakesTest extends PHPUnit_Extensions_Database_TestCase
{
     public function getConnection()
    {
        $database = 'rfid_database';
        $user = 'root';
        $password = 'sqldba';
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=rfid_database', $user, $password);
        return $this->createDefaultDBConnection($pdo, $database);
    }
    /*
    public function getSetUpOperation() {
        // whether you want cascading truncates
        // set false if unsure
        $cascadeTruncates = false;
        return new PHPUnit_Extensions_Database_Operation_Composite(array(
            new PHPUnit_Extensions_Database_Operation_MySQL55Truncate($cascadeTruncates),
            PHPUnit_Extensions_Database_Operation_Factory::INSERT()
        ));
    }
    */
     protected function getDataSet() 
    {
        return $this->createXmlDataSet("modelstest_bool.xml");
    }

    public function testDeleteMakes() {
        $dataSet = new PHPUnit_Extensions_Database_DataSet_CsvDataSet();
        $delete = new deleteModel('577D1MOD177');
        $delete->deleteModel('577D1MOD177');
        $resultingTable = $this->getConnection()
            ->createQueryTable("models",
            "SELECT * FROM models");
        
        $expectedTable =  $this->createXmlDataSet("modelstest_bool_delete.xml")
            ->getTable("models");
        $this->assertTablesEqual($expectedTable, $resultingTable);   
    }
}