<?php
/**
 * Created by PhpStorm.
 * User: mgalle19
 * Date: 5/1/2018
 * Time: 3:14 PM
 */
include("Algorithm.php");
include("Person.php");
include ("NewPerson.php");

$p1 = new Person(1,"type",'f',"religion",'location',
                    "phase1","phase2",'role');

$p2 = new NewPerson(1,"type",'f',"religion",'location',
        "phase1","phase2",'role');
al = new Algorithm($p1,$p2);