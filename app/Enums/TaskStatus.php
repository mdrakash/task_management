<?php

namespace App\Enums;

use ArchTech\Enums\Values;
use ArchTech\Enums\InvokableCases;

enum TaskStatus: string
{
    use InvokableCases, Values;
    case ToDo = 'To Do';
    case InProgress = 'In Progress';
    case Done = 'Done';
}
