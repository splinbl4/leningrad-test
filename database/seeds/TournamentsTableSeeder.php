<?php

declare(strict_types=1);

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Tournament::class, 1)->create();
    }
}
