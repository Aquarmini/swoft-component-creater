<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoftx\Creater\Common;

class Writer
{
    protected $component;

    protected $name;

    protected $description;

    protected $namespace;

    protected $auther;

    protected $email;

    public function __construct($component, $name, $description, $namespace, $auther, $email)
    {
        $this->component = $component;
        $this->name = $name;
        $this->description = $description;
        $this->namespace = $namespace;
        $this->auther = $auther;
        $this->email = $email;
    }

    public function handle($dst)
    {
        $dir = opendir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..') && ($file != '.git')) {
                if (is_dir($dst . '/' . $file)) {
                    $this->handle($dst . '/' . $file);
                } else {
                    $this->write($dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function write($file)
    {
        $content = file_get_contents($file);
        foreach ($this as $i => $v) {
            $content = str_replace("{{{$i}}}", $v, $content);
        }
        file_put_contents($file, $content);
    }
}
