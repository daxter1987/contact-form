<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConfigureComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dax:configure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates composer file in project to be able to use classes and components in vendor folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $project_composer_json = file_get_contents("composer.json");

        $project_composer_array = json_decode($project_composer_json, 1);

        if(empty($project_composer_array['autoload']['psr-4']["daxter1987\\Controllers\\"])){
            $project_composer_array['autoload']['psr-4']["daxter1987\\Controllers\\"] = "vendor/daxter1987/contactform/src/Http/Controllers/";
        }

        if(empty($project_composer_array['autoload']['psr-4']["daxter1987\\Models\\"])){
            $project_composer_array['autoload']['psr-4']["daxter1987\\Models\\"] = "vendor/daxter1987/contactform/src/Http/Models/";
        }

        $composer_file = 'composer.json';
        $handle = fopen($composer_file, 'w') or die('Cannot open file:  '.$composer_file);
        $data = json_encode($project_composer_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        fwrite($handle, $data);
    }
}
