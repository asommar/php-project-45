<?php

namespace Php\Project\Cli;

use function cli\prompt;
use function cli\line;

function greetUser()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
