<?php

namespace Chihuo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Chihuo\Model\Restaurant; 

class RestaurantController extends AbstractActionController
{
    protected $restaurantTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'restaurants' => $this->getRestaurantTable()->fetchAll(),
        ));
    }
    
    public function getRestaurantTable()
    {
        if (!$this->restaurantTable) {
            $sm = $this->getServiceLocator();
            $this->restaurantTable = $sm->get('Chihuo\Model\RestaurantTable');
        }
        return $this->restaurantTable;
    }

    
}