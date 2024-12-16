<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void {
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar PHP");
    $todolistRepository->todolist[2] = new Todolist("Belajar PHP OOP");
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
}
function tetsAddTodolist(): void {
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("BELAJAT PHP");
    $todolistService->addTodolist("BELAJAT PHP OOP");
    $todolistService->showTodolist();
}
function testRemoveTodolist(): void {
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("BELAJAT PHP");
    $todolistService->addTodolist("BELAJAT PHP OOP");
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(4);
    $todolistService->showTodolist();
}

testShowTodolist();
tetsAddTodolist();
testRemoveTodolist();