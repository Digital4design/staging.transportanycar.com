<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => Hash::make('password'),
                'country_code' => '+44',
                'mobile' => $faker->phoneNumber,
                'profile_image' => $faker->imageUrl(100, 100, 'people'),
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->secondaryAddress,
                'postcode' => $faker->postcode,
                'town' => $faker->city,
                'county' => $faker->state,
                'outside_uk' => 'yes',
                'notification' => 1,
                'type' => 'car_transporter',
                'status' => 'active',
                'is_status' => 'approved',
                'driver_license' => null,
                'utility_bill' => null,
                'public_liability' => null,
                'motor_trade_insurance' => null,
                'goods_in_transit_insurance' => null,
                'insurance_cover' => null,
                'business_description' => $faker->sentence,
                'job_email_preference' => $faker->boolean,
                'outbid_email_unsubscribe' => $faker->boolean,
                'reset_token' => null,
                'remember_token' => null,
                'last_visited_at' => now(),
                'last_visited_on_find_job_page' => now(),
                'payment_methods' => json_encode(['PayPal', 'Credit Card']),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
                'email_sent' => 0,
                'summary_of_leads' => 1,
                'email_verification_token' => null,
                'email_verify_status' => 1,
                'user_sms_alert' => 1,
                'new_job_alert' => 1,
                'completed_job' => rand(0, 100),
            ]);
        }
    }
}

