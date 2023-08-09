<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class ImageDeleteCommand extends Command
{
    protected $defaultTable = 'Images';

    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $imageFiles = \array_diff(\scandir(WWW_ROOT . 'img' . DS), ['.', '..']);
        $imageNames = [];

        foreach ($this->fetchTable()->find('all')->select('name')->toArray() as $image) {
            $imageNames[] = $image->name;
        }

        foreach (\array_diff($imageFiles, $imageNames) as $value) {
            if (\file_exists(WWW_ROOT . 'img' . DS . $value)) {
                \unlink(WWW_ROOT . 'img' . DS . $value);
                $io->out($value);
            }
        }

        return static::CODE_SUCCESS;
    }

    public static function defaultName(): string
    {
        return 'delete_image';
    }
}
