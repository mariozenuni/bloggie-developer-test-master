<?php
namespace Database\Seeders;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Random
        Blog::factory()->count(150)->create();

        // Live
        Blog::factory([
            'expired_at'   => null,
            'published_at' => Carbon::yesterday(),
        ])->count(1)->create();

        // Live and Featured
        Blog::factory([
            'expired_at'   => null,
            'featured_at'  => Carbon::yesterday(),
            'published_at' => Carbon::yesterday(),
        ])->count(1)->create();

        // Live but featured in the future
        Blog::factory([
            'expired_at'   => null,
            'featured_at'  => Carbon::now()->addDays(12),
            'published_at' => Carbon::yesterday(),
        ])->count(1)->create();

        // Live - Expires in the future
        Blog::factory([
            'expired_at'   => Carbon::now()->addDays(12),
            'published_at' => Carbon::yesterday(),
        ])->count(1)->create();

        // Expired
        Blog::factory([
            'expired_at'   => Carbon::yesterday(),
            'published_at' => Carbon::now()->subDays(12),
        ])->count(3)->create();

        // Featured, but Expired so not visible
        Blog::factory([
            'expired_at'   => Carbon::yesterday(),
            'featured_at'  => Carbon::now()->subDays(1),
            'published_at' => Carbon::now()->subDays(12),
        ])->count(3)->create();

    }

}
