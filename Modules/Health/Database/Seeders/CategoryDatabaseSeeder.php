<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Health\Repositories\CategoryRepository;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function run()
    {
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Позитивна психология',
            'title:en' => 'Positive Psychology',
        ]);
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Природна хигиена и здраве',
            'title:en' => 'Natural hygiene and health',
        ]);
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Здравословен начин на живот',
            'title:en' => 'Healthy lifestyle',
        ]);
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Изкуството да се храним здравословно',
            'title:en' => 'The art of eating healthy',
        ]);
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Кристал рейки',
            'title:en' => 'Crystal reiki',
        ]);
        factory(\Modules\Health\Entities\Category::class)->create([
            'title:bg' => 'Релакс',
            'title:en' => 'Relax',
        ]);
    }
}
