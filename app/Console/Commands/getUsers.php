<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\RandomUserController;
use App\Models\RandomUsers;

class GetUsers extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'randomuser:getUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get 10 users from https://randomuser.me';

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
        $controller = new RandomUserController();
        $users = $controller->getUsers();

        $controller->insertUsers($users);

        echo 'Succes! 10 users inserted!';
    }
}
