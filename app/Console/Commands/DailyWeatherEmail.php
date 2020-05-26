<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailyWeatherEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elke dag weer een vers weerbericht!';

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
        //
    }
}