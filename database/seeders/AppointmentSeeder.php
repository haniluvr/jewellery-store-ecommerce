<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $locations = ['Paris Flagship', 'Place Vendôme', 'Avenue Montaigne', 'Saint-Germain-des-Prés'];
        $services = ['Jewelry Discovery', 'Bespoke Consultation', 'Gift Advisory', 'After-Sales Service'];

        for ($i = 0; $i < 20; $i++) {
            $user = $users->random();
            Appointment::create([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'location' => $locations[array_rand($locations)],
                'service_type' => $services[array_rand($services)],
                'appointment_date' => Carbon::now()->addDays(rand(1, 30)),
                'appointment_time' => sprintf('%02d:00:00', rand(10, 18)),
                'status' => 'confirmed',
                'notes' => 'Preferred contact via '.$user->email,
            ]);
        }
    }
}
