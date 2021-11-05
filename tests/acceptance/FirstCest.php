<?php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/todo/index');
        $I->see('To-Do List');
    }

    //Add Task
    public function addTask(AcceptanceTester $I)
    {
        $I->amOnPage('/todo/add?');
        $I->see('Add Todo List');
        //Add task
        $I->fillField('task_title', 'Task 9');
        $I->fillField('task_description', 'Complwte task 9.');
        $I->click(['name' => 'add']);
    }
    
    //Update Task
    public function updateTask(AcceptanceTester $I)
    {
        $I->amOnPage('/todo/edit/20?');
        $I->see('Edit Todo List');
        $I->fillField('task_status','completed'); // Change the task status to completed
        $I->fillField('task_description','Complete task 9.'); // Change the task description
        $I->fillField('task_title','Task 2'); // Change the task title to completed
        $I->click(['name' => 'update']);
    }

    //delete task
    public function deleteTask(AcceptanceTester $I)
    {
        $I->amOnPage('/todo/index/21?');
        $I->see('To-Do List');
        $I->click(['name' => 'delete']);
    }
}
