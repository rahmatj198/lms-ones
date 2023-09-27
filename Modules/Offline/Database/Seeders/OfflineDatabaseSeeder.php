<?php

namespace Modules\Offline\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Offline\Database\Seeders\OfflineTableSeeder;

class OfflineDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(OfflineTableSeeder::class);
    }
}
