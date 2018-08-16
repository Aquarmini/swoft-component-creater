<?php

namespace Swoftx\Creater\Commands;

use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;

/**
 * This is a Component Command for Swoft
 * @Command(coroutine=false)
 * @package App\Commands
 */
class ComponentCommand
{
    /**
     * Init Component
     * @Usage {command}
     * @Example {command}
     * @param Input  $input
     * @param Output $output
     * @return int
     */
    public function initialize(Input $input, Output $output): int
    {
        $output->colored('Ther Component Init Success!');
        return 0;
    }
}