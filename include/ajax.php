<?php
//  use Composer Autoload to load all Classes from Classes folder

require '../vendor/autoload.php';


// This a ajax action Function call request . It will automatically Call a function of an action name
// If the action is insert a data then it will automatically call an insert function
// If it call a load action then it will automatically call load function 
// If no action call then it will automatically return 1


if ($_REQUEST['action']) {
    $_REQUEST['action']();
} else {
    echo 1;
}

// Call load method from model class to load data 
function load()
{
    $model = new ToDo\Model();
    $result = $model->load();
    echo  json_encode($result);
    die();
}



// Call insert method from model class to insert data  
function insert()
{

    $model = new ToDo\Model();
    $result = $model->insert();
    if ($result) {
        $results['status'] = 'success';
    } else {
        $results['status'] = 'failed';
    }
    echo  json_encode($results);
    die();
}


// Call delete method from model class to delete data  
function delete()
{
    $model = new ToDo\Model();
    $result = $model->delete();
    if ($result) {
        $results['status'] = 'success';
    } else {
        $results['status'] = 'failed';
    }
    echo  json_encode($results);
    die();
}


// Call isDone method from model class to change status of a task   
function isDone()
{
    $model = new ToDo\Model();
    $result = $model->isDone();
    if ($result) {
        $results['status'] = 'success';
    } else {
        $results['status'] = 'failed';
    }
    echo  json_encode($results);
    die();
}

//  Call update method from model class to update data
function update()
{
    $model = new ToDo\Model();
    $result = $model->update();
    if ($result) {
        $results['status'] = 'success';
    } else {
        $results['status'] = 'failed';
    }
    echo  json_encode($results);
    die();
}


// Call delete method from model class to clear all complete data 
function clearComplete()
{
    $model = new ToDo\Model();
    $result = $model->clearComplete();
    if ($result) {
        $results['status'] = 'success';
    } else {
        $results['status'] = 'failed';
    }
    echo  json_encode($results);
    die();
}
