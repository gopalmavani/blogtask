<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->count(10)->create();
    }
}
