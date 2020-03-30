<?php
namespace name\uimanager;

abstract class CustomUI
{

    abstract public function getData();

    abstract public function handle($value);
}