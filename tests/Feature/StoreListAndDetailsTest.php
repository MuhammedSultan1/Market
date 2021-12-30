<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;


class StoreListAndDetailsTest extends TestCase
{
    /** @test */
    public function the_store_list_shows_the_right_info()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/stores/list' => $this->fake_store_list()
        ]);

        $response = $this->get(route('stores', ['zipcode' => '32244']));

        $response->assertStatus(200);

        $response->assertSee('6331 Roosevelt Blvd, Jacksonville, FL, 32244-3303');
        $response->assertSee('Open Today: 08:00 AM - 10:00 PM');
        $response->assertSee('Phone Number: 904-596-1065');        
    }

        private function fake_store_list(){
            return Http::response([
                [
  0 => [
    'place' => '32244',
    'type' => 'store',
    'within' => 50,
    'limit' => 20,
    'unit' => 'mile',
    'locale' => 'EN_US',
    'count' => 11,
    'locations' => [
      0 => [
        'location_id' => 1853,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'SuperTarget',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Ortega',
          ],
        ],
        'address' => [
          'address_line1' => '6331 Roosevelt Blvd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32244-3303',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          1 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          2 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          3 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          4 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          5 => [
            'capability_code' => 'Deli',
            'capability_name' => 'Deli',
          ],
          6 => [
            'capability_code' => 'Bakery',
            'capability_name' => 'Bakery',
          ],
          7 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          8 => [
            'capability_code' => 'Expand Grocery',
            'capability_name' => 'Expanded Grocery',
          ],
          9 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.235209,
            'longitude' => -81.695288,
            'radius' => 86.0,
          ],
          10 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          11 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 174695,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-596-1065',
        ],
        'geographic_specifications' => [
          'latitude' => 30.235,
          'longitude' => -81.6952,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2004-07-21',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2004-07-25',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 3.68,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1853',
          'geofence' => [
            'radius_in_meters' => 86,
            'center' => [
              'latitude' => 30.235209,
              'longitude' => -81.695288,
            ],
          ],
        ],
      ],
      1 => [
        'location_id' => 2233,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'SuperTarget',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Jacksonville West',
          ],
        ],
        'address' => [
          'address_line1' => '9525 Crosshill Blvd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32222-5812',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Cafe-Pizza',
            'capability_name' => 'Café-Pizza',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          3 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          4 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          5 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          6 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          7 => [
            'capability_code' => 'Deli',
            'capability_name' => 'Deli',
          ],
          8 => [
            'capability_code' => 'Bakery',
            'capability_name' => 'Bakery',
          ],
          9 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          10 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.199097,
            'longitude' => -81.825183,
            'radius' => 81.0,
          ],
          11 => [
            'capability_code' => 'Expand Grocery',
            'capability_name' => 'Expanded Grocery',
          ],
          12 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          13 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 173883,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-248-4366',
        ],
        'geographic_specifications' => [
          'latitude' => 30.199232,
          'longitude' => -81.824713,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2007-03-07',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2007-03-11',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 4.45,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '2233',
          'geofence' => [
            'radius_in_meters' => 81,
            'center' => [
              'latitude' => 30.199097,
              'longitude' => -81.825183,
            ],
          ],
        ],
      ],
      2 => [
        'location_id' => 1300,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Jacksonville Mandarin',
          ],
        ],
        'address' => [
          'address_line1' => '10490 San Jose Blvd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32257-6207',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          1 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          4 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          5 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          6 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.1883639,
            'longitude' => -81.6292222,
            'radius' => 54.0,
          ],
          7 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          8 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
          9 => [
            'capability_code' => 'Apple',
            'capability_name' => 'Apple Experience',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 126441,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-268-4334',
        ],
        'geographic_specifications' => [
          'latitude' => 30.188558,
          'longitude' => -81.629169,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2000-10-04',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2000-10-08',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 7.7,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1300',
          'geofence' => [
            'radius_in_meters' => 54,
            'center' => [
              'latitude' => 30.1883639,
              'longitude' => -81.6292222,
            ],
          ],
        ],
      ],
      3 => [
        'location_id' => 1497,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Fleming Island',
          ],
        ],
        'address' => [
          'address_line1' => '1490 County Rd 220',
          'city' => 'Orange Park',
          'county' => 'Clay',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32003-7927',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          2 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          3 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          4 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          5 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          6 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.103846,
            'longitude' => -81.70781,
            'radius' => 65.0,
          ],
          7 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          8 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
          9 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 125477,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-278-8652',
        ],
        'geographic_specifications' => [
          'latitude' => 30.104009,
          'longitude' => -81.707476,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2002-10-09',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2002-10-13',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 8.34,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1497',
          'geofence' => [
            'radius_in_meters' => 65,
            'center' => [
              'latitude' => 30.103846,
              'longitude' => -81.70781,
            ],
          ],
        ],
      ],
      4 => [
        'location_id' => 669,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Southside',
          ],
        ],
        'address' => [
          'address_line1' => '9041 Southside Blvd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32256-5484',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          6 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          7 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          8 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.194161,
            'longitude' => -81.549454,
            'radius' => 71.0,
          ],
          9 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          10 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 114373,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-464-0043',
        ],
        'geographic_specifications' => [
          'latitude' => 30.193734,
          'longitude' => -81.549105,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '1991-10-09',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '1991-10-13',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 12.33,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '669',
          'geofence' => [
            'radius_in_meters' => 71,
            'center' => [
              'latitude' => 30.194161,
              'longitude' => -81.549454,
            ],
          ],
        ],
      ],
      5 => [
        'location_id' => 1974,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Jacksonville St Johns',
          ],
        ],
        'address' => [
          'address_line1' => '4567 River City Dr',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32246-7411',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          6 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          7 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.260644,
            'longitude' => -81.525217,
            'radius' => 58.0,
          ],
          8 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          9 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
          10 => [
            'capability_code' => 'Snack Bar Pizza',
            'capability_name' => 'Snack Bar - Pizza',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 123746,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-596-0020',
        ],
        'geographic_specifications' => [
          'latitude' => 30.260515,
          'longitude' => -81.525011,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2005-03-02',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2005-03-06',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 13.96,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1974',
          'geofence' => [
            'radius_in_meters' => 58,
            'center' => [
              'latitude' => 30.260644,
              'longitude' => -81.525217,
            ],
          ],
        ],
      ],
      6 => [
        'location_id' => 645,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Regency',
          ],
        ],
        'address' => [
          'address_line1' => '444 Monument Rd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32225-6429',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          6 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          7 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.328625,
            'longitude' => -81.54808,
            'radius' => 76.0,
          ],
          8 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          9 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 119810,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-721-4909',
        ],
        'geographic_specifications' => [
          'latitude' => 30.328925,
          'longitude' => -81.548558,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '1991-11-13',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '1991-11-17',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 14.44,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '645',
          'geofence' => [
            'radius_in_meters' => 76,
            'center' => [
              'latitude' => 30.328625,
              'longitude' => -81.54808,
            ],
          ],
        ],
      ],
      7 => [
        'location_id' => 1921,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'SuperTarget',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Jacksonville East',
          ],
        ],
        'address' => [
          'address_line1' => '13740 Beach Blvd',
          'city' => 'Jacksonville',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32224-1208',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Cafe-Pizza',
            'capability_name' => 'Café-Pizza',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          3 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          4 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          5 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          6 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          7 => [
            'capability_code' => 'Deli',
            'capability_name' => 'Deli',
          ],
          8 => [
            'capability_code' => 'Bakery',
            'capability_name' => 'Bakery',
          ],
          9 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          10 => [
            'capability_code' => 'Expand Grocery',
            'capability_name' => 'Expanded Grocery',
          ],
          11 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.285468,
            'longitude' => -81.456725,
            'radius' => 62.0,
          ],
          12 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          13 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 174009,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-248-4363',
        ],
        'geographic_specifications' => [
          'latitude' => 30.285361,
          'longitude' => -81.456998,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2007-03-07',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2007-03-11',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 18.31,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1921',
          'geofence' => [
            'radius_in_meters' => 62,
            'center' => [
              'latitude' => 30.285468,
              'longitude' => -81.456725,
            ],
          ],
        ],
      ],
      8 => [
        'location_id' => 967,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Jacksonville Beach',
          ],
        ],
        'address' => [
          'address_line1' => '490 Marsh Landing Pkwy',
          'city' => 'Jacksonville Beach',
          'county' => 'Duval',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32250-5855',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          6 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          7 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          8 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.254256,
            'longitude' => -81.390444,
            'radius' => 62.0,
          ],
          9 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          10 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 113670,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-273-5581',
        ],
        'geographic_specifications' => [
          'latitude' => 30.253951,
          'longitude' => -81.390833,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '1995-07-19',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '1995-07-23',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 21.8,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '967',
          'geofence' => [
            'radius_in_meters' => 62,
            'center' => [
              'latitude' => 30.254256,
              'longitude' => -81.390444,
            ],
          ],
        ],
      ],
      9 => [
        'location_id' => 2155,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'Yulee',
          ],
        ],
        'address' => [
          'address_line1' => '463737 State Rd 200',
          'city' => 'Yulee',
          'county' => 'Nassau',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32097-8652',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Cafe-Pizza',
            'capability_name' => 'Café-Pizza',
          ],
          1 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          6 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          7 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 30.629871,
            'longitude' => -81.553451,
            'radius' => 60.0,
          ],
          8 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          9 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
          10 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 126842,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-548-1240',
        ],
        'geographic_specifications' => [
          'latitude' => 30.630008,
          'longitude' => -81.553842,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2006-07-19',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2006-07-23',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 30.87,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '2155',
          'geofence' => [
            'radius_in_meters' => 60,
            'center' => [
              'latitude' => 30.629871,
              'longitude' => -81.553451,
            ],
          ],
        ],
      ],
      10 => [
        'location_id' => 1294,
        'type_code' => 'STR',
        'type_description' => 'Store',
        'sub_type_code' => 'General Merch',
        'status' => 'Open',
        'location_names' => [
          0 => [
            'name_type' => 'Proj Name',
            'name' => 'St Augustine',
          ],
        ],
        'address' => [
          'address_line1' => '1440 US Hwy 1 S',
          'city' => 'Saint Augustine',
          'county' => 'St. Johns',
          'region' => 'FL',
          'state' => 'Florida',
          'postal_code' => '32084-4211',
        ],
        'capabilities' => [
          0 => [
            'capability_code' => 'Fresh Grocery',
            'capability_name' => 'Fresh Grocery',
          ],
          1 => [
            'capability_code' => 'Mobile',
            'capability_name' => 'Cell Phone Activation Counter',
          ],
          2 => [
            'capability_code' => 'Starbucks',
            'capability_name' => 'Starbucks',
          ],
          3 => [
            'capability_code' => 'WIC',
            'capability_name' => 'Accepts WIC',
          ],
          4 => [
            'capability_code' => 'CVS pharmacy',
            'capability_name' => 'CVS pharmacy',
          ],
          5 => [
            'capability_code' => 'Opt',
            'capability_name' => 'Optical',
          ],
          6 => [
            'capability_code' => 'Wine Beer',
            'capability_name' => 'Wine & Beer Available',
          ],
          7 => [
            'capability_code' => 'Shipt Delivery',
            'capability_name' => 'Shipt Delivery',
          ],
          8 => [
            'capability_code' => 'Drive Up',
            'capability_name' => 'Drive Up',
            'latitude' => 29.875566,
            'longitude' => -81.322492,
            'radius' => 46.0,
          ],
          9 => [
            'capability_code' => 'Store Pickup',
            'capability_name' => 'Store Pickup',
          ],
          10 => [
            'capability_code' => 'Vulnerable Shop',
            'capability_name' => 'Reserved for vulnerable guests',
          ],
        ],
        'physical_specifications' => [
          'total_building_area' => 128165,
        ],
        'contact_information' => [
          'building_area' => 'MAIN',
          'telephone_type' => 'VOICE',
          'telephone_number' => '904-810-2336',
        ],
        'geographic_specifications' => [
          'latitude' => 29.875513,
          'longitude' => -81.32241,
          'time_zone_code' => 'EST',
          'iso_time_zone' => 'America/New_York',
        ],
        'milestones' => [
          0 => [
            'milestone_code' => 'Open Date',
            'milestone_date' => '2002-03-06',
          ],
          1 => [
            'milestone_code' => 'Grand Open Date',
            'milestone_date' => '2002-03-10',
          ],
        ],
        'rolling_operating_hours' => [
          'regular_event_hours' => [
            'days' => [
              0 => [
                'sequence_number' => 1,
                'date' => '2021-12-28',
                'day_name' => 'Tuesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-28',
                    'end_date' => '2021-12-28',
                  ],
                ],
              ],
              1 => [
                'sequence_number' => 2,
                'date' => '2021-12-29',
                'day_name' => 'Wednesday',
                'is_open' => true,
                'hours' => [
                  0 => [
                    'begin_time' => '08:00:00',
                    'end_time' => '22:00:00',
                    'begin_date' => '2021-12-29',
                    'end_date' => '2021-12-29',
                  ],
                ],
              ],
            ],
          ],
        ],
        'distance' => 35.01,
        'distance_unit' => 'mile',
        'drive_up' => [
          'location_id' => '1294',
          'geofence' => [
            'radius_in_meters' => 46,
            'center' => [
              'latitude' => 29.875566,
              'longitude' => -81.322492,
            ],
          ],
        ],
      ],
    ],
  ],
]
            ], 200);
        }
}