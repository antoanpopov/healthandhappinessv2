<?php

namespace Modules\Health\Console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Foundation\Application;
use Modules\Health\Database\Seeders\AuthorDatabaseSeeder;
use Modules\Health\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Health\Entities\Author;
use Modules\Health\Repositories\Eloquent\EloquentAuthorRepository;
use Modules\User\Repositories\UserRepository;

class DatabaseSetupCommand extends Command
{
    protected $signature = 'antoan:setup:database';
    protected $description = 'Generate migrations and seed database';

    protected $application;

    public function __construct(Application $application)
    {
        parent::__construct();
        $this->application = $application;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->line('Preparing to migrate all tables...');

        $info = [
            'first_name' => 'Antoan',
            'last_name' => 'Popov',
            'email' => 'admin@gmail.com',
            'permissions' => [
                'health.categories.index' => true,
                'health.categories.create' => true,
                'health.categories.edit' => true,
                'health.categories.destroy' => true,

                'health.posts.index' => true,
                'health.posts.create' => true,
                'health.posts.edit' => true,
                'health.posts.destroy' => true,
            ],
            'password' => '123456'
        ];

        $this->call('migrate:reset');
        $this->call('migrate');

        $user = $this->application->make(UserRepository::class)->createWithRolesFromCli($info, [1], true);
        $this->application->make(\Modules\User\Repositories\UserTokenRepository::class)->generateFor($user->id);
        $this->call('module:seed');
        $this->call('db:seed',['--class'=>AuthorDatabaseSeeder::class]);
        $this->call('db:seed',['--class'=>CategoryDatabaseSeeder::class]);
        $this->info('Admin account created!');

        $this->info('DATABASE SETUP FINISHED!');
    }
}
