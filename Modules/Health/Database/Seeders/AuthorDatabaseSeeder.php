<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Health\Entities\Author;
use Modules\Health\Repositories\AuthorRepository;

class AuthorDatabaseSeeder extends Seeder
{

    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function run()
    {
        factory(Author::class)->create();
    }
}
