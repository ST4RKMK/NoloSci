<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

#[Signature('app:run-server')]
#[Description('Command description')]
class RunServer extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $php = (new PhpExecutableFinder())->find()?: 'php85';
        $cmd =[
            [
                'name'=>'server',
                'command'=>"{$php} artisan serve --host=127.0.0.1 --port=8000 --no-reload",
                'color'=>'yellow',

            ],
            [
                'name'=>'code',
                'command'=>"{$php} artisan queue:work ",
                'color'=>'green',
            ],
            [
                'name'=>'scheduler',
                'command'=>"{$php} artisan schedule:work ",
                'color'=>'red',
            ]
        ];

        $names = array_column($cmd,'name');
        $commands = array_column($cmd,'command');
        $colors = array_column($cmd,'color');


        $longestn = max(array_map('strlen', $names));

        foreach($cmd as $command){
            $this->line(sprintf(
                '<fg=%s>[%s]</>%s%s',
                $command['color'],
                $command['name'],
                str_repeat(' ', ($longestn - strlen($command['name']))+1),
                $command['command']
            ));

        }

        $npxBin = PHP_OS_FAMILY === 'Windows' ? 'npx.cmd' : 'npx';

        $command = sprintf(
            '%s concurrently -c "%s" "%s" --names=%s --kill-others-on-fail',
            $npxBin,
            implode(',', $colors),
            implode('" "', $commands),
            implode(',', $names)
        );

        $process = Process::fromShellCommandline($command);
        $process->setTimeout(null);

        if (Process::isTtySupported()) {
            $process->setTty(true);
        }

        if (function_exists('sapi_windows_set_ctrl_handler')) {
            sapi_windows_set_ctrl_handler(function () use ($process) {
                $this->newLine();
                $this->warn('Chiusura dei servizi in corso...');
                $process->stop();
                exit;
            });
        }

        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        return $process->getExitCode();

    }
}
