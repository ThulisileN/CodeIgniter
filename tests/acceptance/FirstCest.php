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
        $I->see('To-Do List 3');
    }

    public function addTask(AcceptanceTester $I)
    {
        $I->amOnPage('/todo/add?');
        $I->see('Add Todo List');
        $I->fillField('task_title', 'Task 4');
        //$I->click(['btn' => 'submit']);
    }
}
