<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayCategoriesTest extends TestCase
{
    // /** @test */
    //  public function the_categories_list_is_returned_properly()
    //  {
    //     //  Http::fake([
    //     //      'https://target1.p.rapidapi.com/categories/list' => $this->fake_get_categories()
    //     //  ]);

    //     //  $response = $this->get('/');

    //     //  $response->assertStatus(200);

    //     //  $response->assertSee('Grocery');
    //     //  $response->assertSee('Electronics');
    //     //  $response->assertSee('School & Office Supplies');
        
    //  }


     private function fake_get_categories(){
        return Http::response([
            [
  'title' => 'Shop All Categories',
  'components' => [
    0 => [
      'trackingId' => 'APP-105648',
      'presentation' => '/adaptive/c_app_a_0009/v01/mobile',
      'container' => [
        'keyValuePairs' => [
          'title' => 'The latest #TargetStyle',
          'type' => 'TARGET_STYLE',
        ],
        'type' => 'targetFinds',
      ],
      'tracking' => [
        'name' => 'Target Style Carousel',
        'position' => '600',
        'type' => 'c_app_a_0009_v01',
        'component' => 'APP-105648',
        'componentType' => 'UGC',
        'contentType' => 'dynamic',
      ],
      'order' => 600,
    ],
    1 => [
      'trackingId' => 'APP-103413',
      'cells' => [
        'items' => [
          4 => [
            'displayText' => 'Grocery',
            'image' => [
              'uri' => 'https://target.scene7.com/is/image/Target/Grocery190519-190910_1568137689491?qlt=80',
              'accessibilityText' => 'Grocery',
            ],
            'actions' => [
              0 => [
                'target' => 'target://landing/custom?category=5xt1a',
              ],
            ],
            'tracking' => [
              'trackingId' => 'fluid-cells-browse--Grocery',
            ],
            'decoration' => 'BOLD',
          ],
          17 => [
            'displayText' => 'Electronics',
            'image' => [
              'uri' => 'https://target.scene7.com/is/image/Target/Electronics-200310-1583876892218?qlt=80',
              'accessibilityText' => 'Electronics',
            ],
            'actions' => [
              0 => [
                'target' => 'target://landing/custom?category=5xtg6',
              ],
            ],
            'tracking' => [
              'trackingId' => 'fluid-cells-browse--Electronics',
            ],
            'decoration' => 'BOLD',
          ],
          24 => [
            'displayText' => 'School & Office Supplies',
            'image' => [
              'uri' => 'https://target.scene7.com/is/image/Target/school_office138096-180815_1534366767484?qlt=80',
              'accessibilityText' => 'School & Office Supplies',
            ],
            'actions' => [
              0 => [
                'target' => 'target://landing/custom?category=5xsxr',
              ],
            ],
            'tracking' => [
              'trackingId' => 'fluid-cells-browse--School+%26+Office+Supplies',
            ],
            'decoration' => 'BOLD',
          ],
        ],
      ],
      'presentation' => '/adaptive/c_app_a_0006/v01/mobile',
      'tracking' => [
        'name' => '11.1 New Cat Nav images',
        'position' => '1000',
        'type' => 'c_app_a_0006_v01',
        'component' => 'APP-103413',
        'componentType' => 'Fluid Cells',
        'contentType' => 'static',
      ],
      'order' => 1000,
    ],
  ],
  'expires' => '2021-12-26T08:00Z',
]
        ]);
     }
    }