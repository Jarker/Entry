<?php
namespace Jarker\Entry;

use \Jarker\Entry\Services\Rule;
use \Jarker\Entry\Models;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/entry-code.php', 'entry-code');

        $this->app->bind(\Jarker\Entry\Services\EntryCode::class, function($app) {
            $generator = config('entry-code.generator');
            $rules = config('entry-code.rules');

            $entryCode = new Services\EntryCode(new $generator());

            foreach ($rules as $rule) {
                $entryCode->addRule(new $rule[0](...$rule[1]));
            }

            return $entryCode;
        });
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
