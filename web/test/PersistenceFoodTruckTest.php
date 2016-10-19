<?php
require_once __DIR__.'\..\Persistence\PresistenceFoodTruck.php';
require_once __DIR__.'\..\Model\MenuItem.php';
require_once __DIR__.'\..\Model\FoodTruckManager.php';

class PersistenceFoodTruckTest extends PHPUnit_Framework_TestCase{
	protected $pft;
	
	protected function setUp(){
		$this->pft = new PersistenceFoodTruck();
	}
	
	protected function tearDown(){
		
	}
	
	public function testPersistence(){
		//1. Test Data
		$ftm = FoodTruckManager::getInstance();
		$item = new MenuItem("Burger", 10.0, 1);
		$ftm->addMenuItem($item);
		
		//2. Write Data
		$this->pft->writeDataToStore($rm);
		
		//3. Clear Data
		$ftm->delete();
		$this->assertEquals(0,count($ftm->getMenuItems()));
		
		//4. Load back
		$ftm = $this->pft->loadDataFromStore();
		
		//5. Check persistence
		$this->assertEquals(1,count($ftm->getMenuItems()));
		$myItem = $ftm->getMenuItem_index(0);
		$this->assertEquals("Burger",$myItem->getName());
		$this->assertEquals(10.0,$myItem->getPrice());
		$this->assertEquals(1,$myItem->getAmountSold());
	}
}
?>