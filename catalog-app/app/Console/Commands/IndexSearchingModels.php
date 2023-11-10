<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Laravel\Scout\Console\SyncIndexSettingsCommand;

final class IndexSearchingModels extends Command
{
    protected $signature = 'scout:update';

    protected $description = 'Index entities with your search engine (Meilisearch)';

    protected array $models = [
        Movie::class
    ];

    public function handle(): void
    {
        foreach ($this->models as $model) {
            $this->call('scout:flush', ['model' => $model]);
            $this->call('scout:import', ['model' => $model]);
        }

        $this->call(SyncIndexSettingsCommand::class);
    }
}
