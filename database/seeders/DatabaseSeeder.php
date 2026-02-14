<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // 
        $user = User::factory()->create(
            [
                'name' => 'rimy',
                'email'=> 'rimy@gmail.com'
            ]
        );
        Listing::factory(6)->create([
            'user_id'=> $user->id
        ]);

    }
}
