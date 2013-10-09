<?php

require_once('lib/PHPJQueryCallback.php');


// get name for array or write function to get data from database;
function search($name) 
{

    // The Data
    $people = array (
        'Jane' => array (
            'address' => 'Sesame Street',
            'phone'   => '+1 555 555 5555',
            'city' => 'Somewhere Beutiful',
        )
    );

    if ( isset($people[$name]) )
        return $people[$name];
    else
        return false;
}

// process it
if (isset ($_GET['name'])) 
{
    $name = trim($_GET['name']);

    $callback = new PHPJQueryCallback();
    $callback->log($name);


    if ( $person_data = search($name) )   
    {

        foreach ($person_data as $key => $value) {
            $callback->val('#'.$key , $value); // set all data in ui
        }

        $callback->val('#method' , 'edit'); // change hidden input val to edit

        $callback->send(); // send it callback

    } else {
        $callback->after('#name', $name.' is not existed');

        $callback->val('#method' , 'add'); //change  hidden input val to add

        $callback->send();
    }
}
