<?php

// module/Album/config/module.config.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Chihuo\Controller\Index' => 'Chihuo\Controller\IndexController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'chihuo' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/chihuo[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Chihuo\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'chihuo' => __DIR__ . '/../view',
        ),
    ),
);