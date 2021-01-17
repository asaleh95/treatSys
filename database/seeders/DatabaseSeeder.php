<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\Lab;
use App\Models\Pharmacy;
use App\Models\Ray;
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
        Doctor::factory()->count(25)->has(Image::factory())->create();
        Hospital::factory()->count(25)->has(Image::factory(7))->create();
        Pharmacy::factory()->count(25)->has(Image::factory(7))->create();
        Lab::factory()->count(25)->has(Image::factory(7))->create();
        Ray::factory()->count(25)->has(Image::factory(7))->create();

        $pharmacies = Pharmacy::all();
        $hospitals = Hospital::all();
        $rays = Ray::all();
        $labs = Lab::all();

        for ($i=0; $i < 25; $i++) {
            $pharmacies[$i]->workingHours()->create(['from' => '09:00 PM', 'to' => '10:00 PM']);
            $pharmacies[$i]->vacations()->create(['day' => '0']);
            $hospitals[$i]->workingHours()->create(['from' => '09:00 PM', 'to' => '10:00 PM']);
            $hospitals[$i]->vacations()->create(['day' => '0']);
            $rays[$i]->workingHours()->create(['from' => '09:00 PM', 'to' => '10:00 PM']);
            $rays[$i]->vacations()->create(['day' => '0']);
            $labs[$i]->workingHours()->create(['from' => '09:00 PM', 'to' => '10:00 PM']);
            $labs[$i]->vacations()->create(['day' => '0']);
        }

        Admin::factory()->create();
        Artisan::call('passport:client', ['--password' => true, '--no-interaction' => true, '--name' => 'Admin', '--provider' => 'admins']);
        Artisan::call('passport:client', ['--password' => true, '--no-interaction' => true, '--name' => 'User', '--provider' => 'users']);

        // Hospital::factory(25)
        //     ->has(Doctor::factory(20)->has(Image::factory()))
        //     ->has(Image::factory(7))
        //     ->create();
    }
}
