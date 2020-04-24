<?php

namespace ToDo;

use ToDo\Database;

class Model extends Database
{
    // Load method to load all tasks with diffrent status
    public function load()
    {
        if (isset($_REQUEST['status'])) {
            if ($_REQUEST['status'] == 'Completed') {
                $query = "select * from tasks where isDone=1";
            } else if ($_REQUEST['status'] == 'Active') {
                $query = "select * from tasks where isDone = 0";
            } else {
                $query = "select * from tasks";
            }
        }
        $data  = $this->con->prepare($query);
        $data->execute();
        return $data->fetchAll();
    }

    // This is an insert fucton to insert data to database
    public function insert()
    {
        $query = "insert into tasks values(null,'" . $_REQUEST['newTodo'] . "','" . date('Y-m-d') . "','0')";
        return $this->con->exec($query);
    }

    // This method delete a single task 
    public function delete()
    {
        $query = "delete from tasks where id='" . $_REQUEST['id'] . "'";
        return $this->con->exec($query);
    }

    // This method update the status is comepte or not 
    public function isDone()
    {
        $query = "update tasks set isDone='" . $_REQUEST['isDone'] . "' where id='" . $_REQUEST['id'] . "'";
        return $this->con->exec($query);
    }

    // This method update the task text
    public function update()
    {
        $query = "update tasks set task='" . $_REQUEST['task'] . "' where id='" . $_REQUEST['id'] . "'";
        return $this->con->exec($query);
    }

    // This method clear all complete tasks
    public function clearComplete()
    {
        $query = "delete from tasks where isDone='1' ";
        return $this->con->exec($query);
    }
}
