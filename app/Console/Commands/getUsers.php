<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\RandomUserController;

class GetUsers extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'randomuser:getUsers {num?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get users from https://randomuser.me';

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
     * @return int
     */
    public function handle()
    {
        $num = (($this->argument('num') == 10) || ($this->argument('num') == NULL)) ? 10 : (int) $this->argument('num');
        $controller = new RandomUserController();
        $users = $controller->getUsers($num);

        if ($controller->insertUsers($users)) {
            echo 'Succes! ' . $num . ' users inserted!';
        } else {
            echo 'An error has occurred in the connection.';
        }
    }
}
