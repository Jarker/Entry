<?php

namespace Jarker\Entry\Console\Commands;

use Illuminate\Console\Command;

class GenerateCommand extends Command
{
    protected $signature = 'entry-code:generate {count}';
    protected $description = 'Generates X amount of entry codes.';

    public function handle(\Jarker\Entry\Models\EntryCode $model, \Jarker\Entry\Services\EntryCode $generator)
    {
        $count = $this->argument('count');

        for ($i = 0; $i < $count; $i++) {
            $model::create(['code' => $generator->generate()]);
        }

        $this->info(sprintf('Generated %d entry codes successfully', $count));
    }
}
