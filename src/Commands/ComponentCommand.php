<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-component-creater
 */
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
     * @Usage {command} component
     * @Example {command} limingxinleo/swoft-test
     * @param Input  $input
     * @param Output $output
     * @return int
     */
    public function initialize(Input $input, Output $output): int
    {
        $component = $input->get('name', $input->get(0));
        if (is_null($component)) {
            $output->writeln('The Component Name is required!', true, true);
        }

        list($group, $name) = explode('/', $component);
        $description = $input->getOpt('description', '');
        $namespace = $input->getOpt('namespace', 'Swoftx\\Test\\');
        $auther = $input->getOpt('auther', '李铭昕');
        $email = $input->getOpt('email', 'limingxin@swoft.org');


        $output->colored('Ther Component Init Success!');
        return 0;
    }
}
