<?php

namespace Chihuo\Model;

use PHPUnit_Framework_TestCase;
use Zend\Db\ResultSet\ResultSet;

class RestaurantTableTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        \Zend\Mvc\Application::init(include 'config/application.config.php');
    }
    
    public function testFetchAllReturnsAllRestaurants()
    {
        $resultSet        = new ResultSet();
        $mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
                                           array('select'), array(), '', false);
        $mockTableGateway->expects($this->once())
                         ->method('select')
                         ->with()
                         ->will($this->returnValue($resultSet));

        $restaurantTable = new RestaurantTable($mockTableGateway);

        $this->assertSame($resultSet, $restaurantTable->fetchAll());
    }
}
