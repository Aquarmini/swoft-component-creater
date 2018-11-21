<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
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
     * @Example {command} limingxinleo/swoft-test --description=测试组件 --namespace=Swoftx\\\\TestComponent\\\\ --author=李铭昕 --email=limingxin@swoft.org
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
        $author = $input->getOpt('author', 'SwoftDeveloper');
        $email = $input->getOpt('email', 'developer@swoft.org');

        $dst = getcwd();
        $tpl = $input->getOpt('tpl', 'swoft');
        $tpl = alias('@template/' . $tpl);

        if (!check_dir($dst)) {
            $output->writeln('<error>The Component Dir is not Empty!</error>', true, true);
        }

        copy_dir($tpl, $dst);

        $writer = new Writer($component, $name, $description, $namespace, $author, $email);
        $writer->handle($dst);

        $output->writeln('<success>The Component Init Success!!</success>', true);
        return 0;
    }
}
