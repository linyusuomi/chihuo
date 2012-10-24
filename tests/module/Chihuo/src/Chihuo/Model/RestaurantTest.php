<?php

namespace Chihuo\Model;

use PHPUnit_Framework_TestCase;

class RestaurantTest extends PHPUnit_Framework_TestCase
{
    public function testRestaurantInitialState()
    {
        $restaurant = new Restaurant();

        $this->assertNull($restaurant->address, '"address" should initially be null');
        $this->assertNull($restaurant->id, '"id" should initially be null');
        $this->assertNull($restaurant->phone, '"phone" should initially be null');
        $this->assertNull($restaurant->rank, '"rank" should initially be null');
        $this->assertNull($restaurant->name, '"name" should initially be null');
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $restaurant = new Restaurant();
        $data  = array('address' => 'some address',
                       'id'     => 123,
                       'phone'  => 'some phone',
                       'name'  => 'some name',
                       'rank'  => '1');

        $restaurant->exchangeArray($data);

        $this->assertSame($data['address'], $restaurant->address, '"address" was not set correctly');
        $this->assertSame($data['id'], $restaurant->id, '"id" was not set correctly');
        $this->assertSame($data['phone'], $restaurant->phone, '"phone" was not set correctly');
        $this->assertSame($data['name'], $restaurant->name, '"name" was not set correctly');
        $this->assertSame($data['rank'], $restaurant->rank, '"rank" was not set correctly');
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $restaurant = new Restaurant();

        $restaurant->exchangeArray(array('address' => 'some address',
                                    'id'     => 123,
                                    'phone'  => 'some phone',
                                    'name'  => 'some name',
                                    'rank' => '1'));
        $restaurant->exchangeArray(array());

        $this->assertNull($restaurant->address, '"address" should initially be null');
        $this->assertNull($restaurant->id, '"id" should initially be null');
        $this->assertNull($restaurant->phone, '"phone" should initially be null');
        $this->assertNull($restaurant->name, '"name" should initially be null');
        $this->assertNull($restaurant->rank, '"rank" should initially be null');
    }

    protected function setUp()
    {
        \Zend\Mvc\Application::init(include 'config/application.config.php');
    }
}