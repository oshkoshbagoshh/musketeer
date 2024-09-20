#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use League\CLImate\CLImate;

$climate = new CLImate;

$climate->out('Welcome to the Musketeer Theme CLI!');

$input = $climate->input('What\'s your name?');
$name = $input->prompt();

$climate->out("Hello, $name! Welcome to Musketeer Theme development.");

$climate->table([
    ['Task', 'Status'],
    ['Setup WordPress', 'Complete'],
    ['Create theme files', 'In Progress'],
    ['Customize design', 'Pending']
]);