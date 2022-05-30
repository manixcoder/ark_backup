<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Event::truncate();
        Event::create([
            'user_id' => '1',
            'heading' => 'Rock Singing Concert',
            'description' => 'There is a rocking singing concert in noida',
            'buy_link' => '#',
            'location' => 'Noida',
            'online_booking_fee' => '200',
            'event_start_time' => '1596874747',
            'event_end_time' => '1596874747',
            'longitude' => '200',
            'latitude' => '200',
        ]);
        Event::create([
            'user_id' => '1',
            'heading' => 'Comedy Concert',
            'description' => 'Delhi, India',
            'buy_link' => '#',
            'location' => 'Kapil Sharma Performing Live in Delhi',
            'online_booking_fee' => '200',
            'event_start_time' => '1596874747',
            'event_end_time' => '1596874747',
            'longitude' => '200',
            'latitude' => '200',
        ]);
        Event::create([
            'user_id' => '1',
            'heading' => 'Open Mic Concert',
            'description' => 'Delhi, India',
            'buy_link' => '#',
            'location' => 'Open Mic Singing Live in Delhi',
            'online_booking_fee' => '200',
            'event_start_time' => '1596874747',
            'event_end_time' => '1596874747',
            'longitude' => '200',
            'latitude' => '200',
        ]);
    }
}
