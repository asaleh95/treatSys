<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Artisan::call('passport:install');
        // $this->call([
            // DoctorSeeder::class
            // HospitalSeeder::class
        // ]);
        // Doctor::factory()->count(25)->has(Image::factory())->create();
        // Hospital::factory()->count(25)->has(Image::factory(3))->create();
        Pharmacy::factory()->count(25)->has(Image::factory(3))->create();

        foreach (Pharmacy::all() as $pharmacy) {
            $pharmacy->workingHours()->create(['from' => '09:00 PM', 'to' => '10:00 PM']);
            $pharmacy->vacations()->create(['day' => '0']);
        }

        // Hospital::factory(25)
        //     ->has(Doctor::factory(20)->has(Image::factory()))
        //     ->has(Image::factory(7))
        //     ->create();
    }
}
