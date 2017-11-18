<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Repositories\SettingRepository;

class SettingsDatabaseSeeder extends Seeder
{

    private $settingsRepository;

    public function __construct(SettingRepository $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    public function run()
    {
        $settings =[
            'core::site-name' => [
                'bg' => 'Health & Happiness',
                'en' => 'Health & Happiness',
            ],
            'core::site-name-mini' => [
                'bg' => 'Health & Happiness',
                'en' => 'Health & Happiness',
            ],
            'core::site-description' => [
                'bg' => 'Health & Happiness',
                'en' => 'Health & Happiness',
            ],
            'core::template' => 'Health',
            'core::locales' => ['en','bg'],
        ];
        $this->settingsRepository->createOrUpdate($settings);
    }
}
