<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayItemDetailsTest extends TestCase
{
    /** @test */
    public function the_details_page_shows_the_correct_info()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/products/v3/get-details' => $this->fake_products_details()
        ]);

        $response = $this->get(route('item', ['tcin' => '81488492', 'store_id' => '911']));

        $response->assertStatus(200);

        $response->assertSee('GROCERY');
        $response->assertSee('KIND Thins Peanut Butter Dark Chocolate - 7.4oz/10ct');
        $response->assertSee('State of Readiness: Ready to Eat');
        
    }

        private function fake_products_details()
    {
        return Http::response([
            [
  'data' => [
    'product' => [
      'tcin' => '81488492',
      'item' => [
        'dpci' => '071-20-2078',
        'assigned_selling_channels_code' => 'stores_only',
        'primary_barcode' => '602652296666',
        'product_classification' => [
          'product_type_name' => 'GROCERY',
        ],
        'product_description' => [
          'title' => 'KIND Thins Peanut Butter Dark Chocolate - 7.4oz/10ct',
          'downstream_description' => 'KIND THINS Peanut Butter Dark Chocolate bars are a thinner take on your favorite KIND bar. Each bar is crafted with sliced almonds and roasted peanuts for a chewier crunch and a lighter bite. With almonds as the #1 ingredient, these gluten free bars have a thin layer of sliced almonds and peanuts with a chocolatey coating and drizzle for the ultimate snack bar. These KIND Peanut Butter Dark chocolate thin bars are made with quality ingredients, and are great for any occasion, whether you need nutrition bars for the office or a nutritious snack for a busy day. A convenient, nutrient dense, grab-and-go snack, KIND crunchy thin granola bars make eating healthy easier. Each gluten free bar contains 4 grams of sugar, 100 calories, and is made without genetically engineered ingredients.',
          'bullet_descriptions' => [
            0 => '<B>Contains:</B> Soy, Almonds, Peanuts',
            1 => '<B>May Contain:</B> Tree Nuts',
            2 => '<B>Consistency:</B> Crunchy',
            3 => '<B>Form:</B> Bar',
            4 => '<B>State of Readiness:</B> Ready to Eat',
            5 => '<B>Package Quantity:</B> 10',
            6 => '<B>Package type:</B> Multi-Pack Single Servings',
            7 => '<B>Net weight:</B> 7.4 Ounces',
          ],
          'soft_bullets' => [
            'title' => 'highlights',
            'bullets' => [
              0 => 'Ten 0.74 oz KIND THINS Peanut Butter Dark Chocolate gluten free bars',
              1 => 'Nutrient-dense, KIND THINS nut bars made with almonds as the #1 ingredient',
              2 => 'Thin layer of sliced almonds, roasted peanuts, and a chocolatey coating and drizzle combine for delicious OU-D kosher snacks',
              3 => 'Take these thin snack bars anywhere on-the-go',
              4 => 'Chewier, crunchy, thin, KIND bars contain 4 grams of sugar, 100 calories, and are made without genetically engineered ingredients',
              5 => 'Individually wrapped snacks offer a convenient option for a quick pick-me-up',
            ],
          ],
        ],
        'compliance' => [
          'is_proposition_65' => false,
        ],
        'enrichment' => [
          'buy_url' => 'https://www.target.com/p/kind-thins-peanut-butter-dark-chocolate-7-4oz-10ct/-/A-81488492',
          'images' => [
            'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_dbff55d7-071c-465a-a511-2deba4350691',
            'alternate_image_urls' => [
              0 => 'https://target.scene7.com/is/image/Target/GUEST_9bcdb0fe-8c70-4acb-b5d7-461cf71af466',
              1 => 'https://target.scene7.com/is/image/Target/GUEST_99b657b4-28eb-414e-abb9-13c740e54b81',
              2 => 'https://target.scene7.com/is/image/Target/GUEST_62b038cd-567c-4081-a9fd-9a3c1d05c115',
              3 => 'https://target.scene7.com/is/image/Target/GUEST_921bc53c-3499-41b9-b032-f1c75a457639',
            ],
            'content_labels' => [
              0 => [
                'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_dbff55d7-071c-465a-a511-2deba4350691',
              ],
              1 => [
                'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_9bcdb0fe-8c70-4acb-b5d7-461cf71af466',
              ],
              2 => [
                'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_99b657b4-28eb-414e-abb9-13c740e54b81',
              ],
              3 => [
                'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_62b038cd-567c-4081-a9fd-9a3c1d05c115',
              ],
              4 => [
                'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_921bc53c-3499-41b9-b032-f1c75a457639',
              ],
            ],
          ],
          'nutrition_facts' => [
            'url' => 'https://redsky.target.com/v2/regulatory/tcin/81488492/nutrition_info',
          ],
        ],
        'relationship_type_code' => 'SA',
        'fulfillment' => [
          'purchase_limit' => 10,
        ],
        'product_vendors' => [
          0 => [
            'id' => '1225415',
            'vendor_name' => 'KIND LLC',
          ],
        ],
        'merchandise_type_attributes' => [
          0 => [
            'id' => '304049',
            'name' => 'wellness standard',
            'values' => [
              0 => [
                'id' => '810860',
                'name' => 'Simple Ingredients',
              ],
              1 => [
                'id' => '843042',
                'name' => 'Vegetarian',
              ],
              2 => [
                'id' => '818270',
                'name' => 'Meets Minimum Requirements',
              ],
              3 => [
                'id' => '825392',
                'name' => 'Gluten-Free',
              ],
              4 => [
                'id' => '1650863156',
                'name' => 'Contains Peanuts',
              ],
            ],
          ],
          1 => [
            'id' => '105752',
            'name' => 'primary flavors',
            'values' => [
              0 => [
                'id' => '204551',
                'name' => 'Chocolate',
              ],
              1 => [
                'id' => '223638',
                'name' => 'Peanut Butter',
              ],
            ],
          ],
          2 => [
            'id' => '107886',
            'name' => 'Targeted Audience',
            'values' => [
              0 => [
                'id' => '274456',
                'name' => 'Kids',
              ],
              1 => [
                'id' => '833496',
                'name' => 'Adult',
              ],
            ],
          ],
          3 => [
            'id' => '108900',
            'name' => 'Package Quantity',
            'values' => [
              0 => [
                'name' => '10',
              ],
            ],
          ],
          4 => [
            'id' => '115052',
            'name' => 'Legally Required Information',
            'values' => [
              0 => [
                'id' => '320842',
                'name' => 'Grocery Disclaimer',
              ],
            ],
          ],
          5 => [
            'id' => '147750',
            'name' => 'allergy statement, contains',
            'values' => [
              0 => [
                'id' => '427625',
                'name' => 'Soy',
              ],
              1 => [
                'id' => '427610',
                'name' => 'Almonds',
              ],
              2 => [
                'id' => '427635',
                'name' => 'Peanuts',
              ],
            ],
          ],
          6 => [
            'id' => '147751',
            'name' => 'allergy statement, may contain',
            'values' => [
              0 => [
                'id' => '427419',
                'name' => 'Tree Nuts',
              ],
            ],
          ],
          7 => [
            'id' => '148052',
            'name' => 'guest storage state',
            'values' => [
              0 => [
                'id' => '427856',
                'name' => 'Room Temperature',
              ],
            ],
          ],
          8 => [
            'id' => '148759',
            'name' => 'package type',
            'values' => [
              0 => [
                'id' => '429834',
                'name' => 'Multi-Pack Single Servings',
              ],
            ],
          ],
          9 => [
            'id' => '148955',
            'name' => 'store location',
            'values' => [
              0 => [
                'id' => '430614',
                'name' => 'Dry',
              ],
            ],
          ],
          10 => [
            'id' => '148964',
            'name' => 'food and drink form 1',
            'values' => [
              0 => [
                'id' => '430475',
                'name' => 'Bar',
              ],
            ],
          ],
          11 => [
            'id' => '150550',
            'name' => 'state of readiness',
            'values' => [
              0 => [
                'id' => '434744',
                'name' => 'Ready to Eat',
              ],
            ],
          ],
          12 => [
            'id' => '151551',
            'name' => 'product consistency',
            'values' => [
              0 => [
                'id' => '438138',
                'name' => 'Crunchy',
              ],
            ],
          ],
          13 => [
            'id' => '161554',
            'name' => 'Assortment Type',
            'values' => [
              0 => [
                'id' => '479462',
                'name' => 'Crossover',
              ],
            ],
          ],
          14 => [
            'id' => '303999',
            'name' => 'grocery subtype',
            'values' => [
              0 => [
                'id' => '814340',
                'name' => 'Granola Bars',
              ],
            ],
          ],
          15 => [
            'id' => '304237',
            'name' => 'net weight',
            'values' => [
              0 => [
                'name' => '7.4',
              ],
            ],
          ],
          16 => [
            'id' => '1',
            'name' => 'Item Type',
            'values' => [
              0 => [
                'id' => '440614',
                'name' => 'Snack Bars',
              ],
            ],
          ],
        ],
        'wellness_merchandise_attributes' => [
          0 => [
            'badge_url' => 'https://target.scene7.com/is/image/Target/wellness_25c25b609d1c43b7',
            'parent_id' => '304049',
            'parent_name' => 'wellness standard',
            'value_id' => '825392',
            'value_name' => 'Gluten Free',
            'wellness_description' => 'A product that has an unqualified independent third-party certification, or carries an on-pack statement relating to the finished product being gluten-free.',
          ],
        ],
        'is_cart_add_on' => true,
        'eligibility_rules' => [
          'scheduled_delivery' => [
            'is_active' => true,
          ],
          'add_on' => [
            'is_active' => true,
          ],
        ],
        'handling' => [
          'buy_unit_of_measure' => 'Each',
          'import_designation_description' => 'Made in the USA or Imported',
        ],
        'package_dimensions' => [
          'weight' => 0.57,
          'weight_unit_of_measure' => 'POUND',
          'width' => 5.5,
          'depth' => 1.81,
          'height' => 6.0,
          'dimension_unit_of_measure' => 'INCH',
        ],
        'environmental_segmentation' => [
          'is_hazardous_material' => false,
        ],
        'disclaimer' => [
          'type' => 'Grocery Disclaimer',
          'description' => 'Content on this site is for reference purposes only.  Target does not represent or warrant that the nutrition, ingredient, allergen and other product information on our Web or Mobile sites are accurate or complete, since this information comes from the product manufacturers.  On occasion, manufacturers may improve or change their product formulas and update their labels.  We recommend that you do not rely solely on the information presented on our Web or Mobile sites and that you review the product\'s label or contact the manufacturer directly if you have specific product concerns or questions.  If you have specific healthcare concerns or questions about the products displayed, please contact your licensed healthcare professional for advice or answers.  Any additional pictures are suggested servings only.',
        ],
        'formatted_return_method' => 'This item can be returned to any Target store or Target.com.',
        'return_policies_guest_message' => 'This item must be returned within 90 days of the in-store purchase, ship date or online order pickup. See return policy for details.',
        'return_policy_url' => 'https://help.target.com/help/subcategoryarticle?childcat=Return+policy&parentcat=Returns+%26+Exchanges&searchQuery=search+help',
        'cart_add_on_threshold' => 35.0,
      ],
      'price' => [
        'current_retail' => 7.99,
        'default_price' => false,
        'external_system_id' => '81488492-911-7.99-2021121518',
        'formatted_current_price' => '$7.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
        'location_id' => 911,
        'reg_retail' => 7.99,
      ],
      'free_shipping' => [
        'enabled' => false,
      ],
      'ratings_and_reviews' => [
        'statistics' => [
          'question_count' => 0,
          'rating' => [
            'average' => 3.87,
            'count' => 23,
          ],
          'review_count' => 8,
        ],
      ],
      'promotions' => [
      ],
      'store_coordinates' => [
        0 => [
          'aisle' => 40,
          'block' => 'G',
          'floor' => '1',
          'x' => 4.24,
          'y' => 33.45,
        ],
      ],
      'fulfillment' => [
        'shipping_options' => [
          'availability_status' => 'IN_STOCK',
          'loyalty_availability_status' => 'IN_STOCK',
          'available_to_promise_quantity' => 10.0,
          'minimum_order_quantity' => 1.0,
          'services' => [
            0 => [
              'is_two_day_shipping' => false,
              'is_base_shipping_method' => true,
              'shipping_method_id' => 'STANDARD',
              'cutoff' => '2021-12-22T20:00:00Z',
              'max_delivery_date' => '2021-12-28',
              'min_delivery_date' => '2021-12-28',
              'shipping_method_short_description' => 'Standard',
              'service_level_description' => 'Standard Shipping',
            ],
          ],
        ],
        'store_options' => [
          0 => [
            'location_name' => 'Blackstone and Nees Ave',
            'location_id' => '911',
            'search_response_store_type' => 'PRIMARY',
            'location_available_to_promise_quantity' => 6.0,
            'order_pickup' => [
              'pickup_date' => '2021-12-22',
              'guest_pick_sla' => 120,
              'availability_status' => 'IN_STOCK',
            ],
            'curbside' => [
              'pickup_date' => '2021-12-22',
              'guest_pick_sla' => 120,
              'availability_status' => 'IN_STOCK',
            ],
            'in_store_only' => [
              'availability_status' => 'IN_STOCK',
            ],
          ],
        ],
        'scheduled_delivery' => [
          'availability_status' => 'IN_STOCK',
          'location_available_to_promise_quantity' => 6.0,
        ],
      ],
      'taxonomy' => [
        'category' => [
          'name' => 'Granola & Cereal Bars',
          'node_id' => '4ydo1',
        ],
        'breadcrumbs' => [
          0 => [
            'name' => 'target',
            'node_id' => 'root',
          ],
          1 => [
            'name' => 'Grocery',
            'node_id' => '5xt1a',
          ],
          2 => [
            'name' => 'Snacks',
            'node_id' => '5xsy9',
          ],
          3 => [
            'name' => 'Granola & Cereal Bars',
            'node_id' => '4ydo1',
          ],
        ],
      ],
      'notify_me_enabled' => false,
      'ad_placement_url' => 'https://pubads.g.doubleclick.net/gampad/adx?m=application/json&sz=1x1&iu=/7079046/tgt/5xt1a/5xsy9/4ydo1&t=pt%3Dproductdetails%26nap%3Dand%26item%3D81488492%26cat%3D4ydo1',
    ],
  ],
]
        ], 200);
    }
    

}