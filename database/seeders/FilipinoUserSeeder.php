<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FilipinoUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->delete();

        $firstNames = ['Maria', 'Leonora', 'Teresa', 'Corazon', 'Imelda', 'Gloria', 'Liza', 'Sara', 'Marcos', 'Rodrigo', 'Benigno', 'Joseph', 'Fidel', 'Ramon', 'Manuel', 'Diosdado', 'Sergio', 'Jose', 'Emilio', 'Juan', 'Angelo', 'Paolo', 'Ricardo', 'Antonio', 'Cristina', 'Carmela', 'Dante', 'Elena', 'Fernando', 'Giselle'];
        $lastNames = ['Marquez', 'Santos', 'Reyes', 'Cruz', 'Bautista', 'Ocampo', 'Garcia', 'Mendoza', 'Pascual', 'Aquino', 'Duterte', 'Estrada', 'Ramos', 'Arroyo', 'Poe', 'Santiago', 'Villa', 'Luna', 'del Pilar', 'Bonifacio', 'Quezon', 'Osmeña', 'Roxas', 'Quirino', 'Magsaysay', 'Macapagal', 'Binay', 'Robredo', 'Domagoso', 'Pacquiao'];

        $cities = ['Manila', 'Quezon City', 'Cebu City', 'Davao City', 'Makati', 'Pasig', 'Taguig', 'Paranaque', 'Bacolod', 'Iloilo City', 'Cagayan de Oro', 'Zamboanga City'];
        $provinces = ['Metro Manila', 'Cebu', 'Davao del Sur', 'Negros Occidental', 'Iloilo', 'Misamis Oriental', 'Zamboanga del Sur'];

        for ($i = 0; $i < 150; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $email = Str::lower($firstName.'.'.$lastName.'.'.$i.'@example.ph');
            $city = $cities[array_rand($cities)];

            User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'username' => Str::lower($firstName.$lastName.$i),
                'email' => $email,
                'phone' => '09'.rand(100000000, 999999999),
                'region' => 'Philippines',
                'street' => rand(1, 999).' Maharlika St.',
                'barangay' => 'Barangay '.rand(1, 100),
                'city' => $city,
                'province' => $provinces[array_rand($provinces)],
                'zip_code' => (string) rand(1000, 8000),
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'is_suspended' => false,
                'newsletter_subscribed' => rand(0, 1),
                'newsletter_product_updates' => true,
                'newsletter_special_offers' => rand(0, 1),
                'marketing_emails' => rand(0, 1),
                'two_factor_enabled' => false,
            ]);
        }
    }
}
