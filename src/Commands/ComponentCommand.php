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
use Swoftx\Creater\Common\Writer;

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
        $component = $input->get('component', $input->get(0));
        if (is_null($component)) {
            $output->writeln('<error>The Component Name is required!</error>', true, true);
        }

        $componentArray = explode('/', $component);
        $group = $componentArray[0] ?? null;
        $name = $componentArray[1] ?? null;

        if ($group == null || $name == null) {
            $output->writeln('<error>The Component Name is invalid, Please input group/name!</error>', true, true);
        }

        $description = $input->getOpt('description', '');
        $namespace = $input->getOpt('namespace', 'Swoftx\\\\Test\\\\');
        $auther = $input->getOpt('auther', '李铭昕');
        $email = $input->getOpt('email', 'limingxin@swoft.org');

        $dst = getcwd();
        $tpl = alias('@tpl');

        copy_dir($tpl, $dst);

        $writer = new Writer($component, $name, $description, $namespace, $auther, $email);
        $writer->handle($dst);

        $output->colored('Ther Component Init Success!');
        return 0;
    }
}
