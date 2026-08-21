<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // One fixed admin so you can always log in predictably
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@skillora.com',
        ]);

        Category::factory(8)->create();

        $clients = User::factory(10)->client()->create();
        $freelancers = User::factory(20)->freelancer()->create();

        // Freelancer hasOne Profile
        $freelancers->each(fn (User $freelancer) => Profile::factory()->create(['user_id' => $freelancer->id]));

        // 30 jobs, distributed across the 10 clients
        Job::factory(30)->create([
            'client_id' => fn () => $clients->random()->id,
        ]);

        // 50 applications linking freelancers to jobs (unique pairs)
        $created = 0;
        while ($created < 50) {
            $job = Job::inRandomOrder()->first();
            $freelancer = $freelancers->random();

            $exists = Application::where('job_id', $job->id)
                ->where('freelancer_id', $freelancer->id)
                ->exists();

            if (! $exists) {
                Application::factory()->create([
                    'job_id' => $job->id,
                    'freelancer_id' => $freelancer->id,
                ]);
                $created++;
            }
        }
    }
}
