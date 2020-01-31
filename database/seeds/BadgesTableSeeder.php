<?php

use App\Badge;
use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            'Heart', 'Star', 'Certificate'
        ];

        foreach($badges as $name)
        {
            $badge = Badge::create(compact('name'));
            $badge->addMediaFromUrl(public_path('images/badges/'.strtolower($name).'.png'))->toMediaCollection('icon');
        }

    }
}
