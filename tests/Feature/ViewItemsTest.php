<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
   /** @test */
    public function the_index_page_shows_the_correct_info()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/products/v2/list' => $this->fake_products_list()
        ]);

        
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Featured Items');
        $response->assertSee('Organic Bananas - 2lb Bag');

    }

    /** @test */
    public function the_details_page_shows_the_correct_info()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/products/v3/get-details' => $this->fake_products_list()
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
    
    private function fake_products_list()
    {
      return Http::response([
                [
  'data' => [
    'search' => [
      'ad_placement_url' => 'https://pubads.g.doubleclick.net/gampad/adx?m=application/json&sz=1x1&iu=/7079046/tgt/5xt1a&t=nap%3Dand%26pt%3Dcategory%26n_cat%3D5xt1a',
      'products' => [
        0 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '267-00-8011',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/banana-each/-/A-15013944',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_f5d0cfc3-9d02-4ee0-a6c6-ed5dc09971d1',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Banana - each',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              1 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              2 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              3 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              4 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              5 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              6 => [
                'id' => '1016514',
                'vendor_name' => 'TARGET-SUPER',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '15013944',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 471.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 471.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.25,
            'default_price' => false,
            'external_system_id' => '15013944-911-0.25-2021061515',
            'formatted_current_price' => '$0.25',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 0.25,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.29,
                'count' => 717,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 9,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        1 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '266-08-0005',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/strawberries-1lb-package/-/A-13208903',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_ce4ac41d-c124-49db-8f0f-2f472ee51815',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_d2779352-9c13-4ed2-9e38-ac6dd4a1a2c7',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '35',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369',
                  'video_sequence' => '1',
                  'video_title' => 'G&G Yogurt Bark',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Strawberries - 1lb Package',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1987529',
                'vendor_name' => 'Corona Family Farms, Inc',
              ],
              1 => [
                'id' => '1985869',
                'vendor_name' => 'Blazer Wilkinson',
              ],
              2 => [
                'id' => '1983309',
                'vendor_name' => 'Plan Berries Inc',
              ],
              3 => [
                'id' => '1983291',
                'vendor_name' => 'Better Produce, Inc.',
              ],
              4 => [
                'id' => '1983053',
                'vendor_name' => 'JDB PRO INC dba Central W',
              ],
              5 => [
                'id' => '1981774',
                'vendor_name' => 'S.C. Critchley. Inc.',
              ],
              6 => [
                'id' => '1980673',
                'vendor_name' => 'Always Fresh Farms LLC',
              ],
              7 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              8 => [
                'id' => '1980010',
                'vendor_name' => 'Meridian Fine Foods, LLC',
              ],
              9 => [
                'id' => '1978249',
                'vendor_name' => 'North Bay Produce',
              ],
              10 => [
                'id' => '1978201',
                'vendor_name' => 'Family Tree Farms',
              ],
              11 => [
                'id' => '1977831',
                'vendor_name' => 'Wishnatzki, Inc',
              ],
              12 => [
                'id' => '1976435',
                'vendor_name' => 'Red Blossom Inc.',
              ],
              13 => [
                'id' => '1972829',
                'vendor_name' => 'California Giant, Inc.',
              ],
              14 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              15 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              16 => [
                'id' => '1284087',
                'vendor_name' => 'WELL-PICT INC',
              ],
              17 => [
                'id' => '1283907',
                'vendor_name' => 'ECLIPSE BERRY FARMS LLC',
              ],
              18 => [
                'id' => '1283761',
                'vendor_name' => 'INDIANAPOLIS FRUIT CO',
              ],
              19 => [
                'id' => '1283075',
                'vendor_name' => 'LANCASTER FOODS LLC',
              ],
              20 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              21 => [
                'id' => '1273030',
                'vendor_name' => 'SUN BELLE INC.',
              ],
              22 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              23 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              24 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              25 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              26 => [
                'id' => '1262119',
                'vendor_name' => 'SUISAN COMPANY',
              ],
              27 => [
                'id' => '1254716',
                'vendor_name' => 'VEG-LAND/JBJ DISTRIB.INC.',
              ],
              28 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              29 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              30 => [
                'id' => '1251230',
                'vendor_name' => 'OK PRODUCE',
              ],
              31 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              32 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              33 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              34 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              35 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              36 => [
                'id' => '1237209',
                'vendor_name' => 'NATURIPE FARMS',
              ],
              37 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              38 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              39 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              40 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              41 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              42 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              43 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              44 => [
                'id' => '1233478',
                'vendor_name' => 'LIBERTY FRUIT COMPANY',
              ],
              45 => [
                'id' => '1233232',
                'vendor_name' => 'BUDDY\'S PRODUCE',
              ],
              46 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              47 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              48 => [
                'id' => '1231441',
                'vendor_name' => 'SANTA MARIA PRODUCE',
              ],
              49 => [
                'id' => '1231179',
                'vendor_name' => 'KEVIN GUIDRY PRODUCE',
              ],
              50 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              51 => [
                'id' => '1229259',
                'vendor_name' => 'NOGALES PRODUCE',
              ],
              52 => [
                'id' => '1228470',
                'vendor_name' => 'ASTIN STRAWBERRY EXCHANGE',
              ],
              53 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              54 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              55 => [
                'id' => '1227015',
                'vendor_name' => 'CH ROBINSON-WORLDWIDE INC',
              ],
              56 => [
                'id' => '1221095',
                'vendor_name' => 'BAKKER PRODUCE',
              ],
              57 => [
                'id' => '1219450',
                'vendor_name' => 'DRISCOLL STRAWBERRY - DFD',
              ],
              58 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              59 => [
                'id' => '1146280',
                'vendor_name' => 'CAPITOL CITY PRODUCE CO',
              ],
              60 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              61 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              62 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '13208903',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 390.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 390.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 4.49,
            'default_price' => false,
            'external_system_id' => '13208903-911-4.49-2021120805',
            'formatted_current_price' => '$4.49',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 4.49,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 2.69,
                'count' => 757,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
            2 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        2 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '261-01-0761',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/alfaros-artesano-bread-20oz/-/A-50584827',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_fded29b8-3c63-4829-be4c-8439bd901ccc',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 6,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Alfaros Artesano Bread - 20oz',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1023581',
                'vendor_name' => 'BIMBO BAKERIES USA INC',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '50584827',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 11.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 11.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.89,
            'default_price' => false,
            'external_system_id' => '50584827-911-1611959885287',
            'formatted_current_price' => '$2.89',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 2.89,
            'reg_retail' => 2.89,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.52,
                'count' => 42,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 26,
              'block' => 'G',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 26,
              'block' => 'G',
              'floor' => '01',
            ],
            2 => [
              'aisle' => 26,
              'block' => 'G',
              'floor' => '01',
            ],
            3 => [
              'aisle' => 26,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
          'is_sponsored_sku' => true,
          'sponsored_ad' => [
            'ad_source' => 'citrus',
            'click_id' => 'display_tSjocfXU9ZMh1YNGAM6nzFlT9fc1MDU4NDgyNw==',
            'click_token' => 'display_tSjocfXU9ZMh1YNGAM6nzFlT9fc1MDU4NDgyNw==',
            'impression_id' => 'display_tSjocfXU9ZMh1YNGAM6nzFlT9fc1MDU4NDgyNw==',
          ],
        ],
        3 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '224-12-4770',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/avocado-each/-/A-47095644',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_6d9d5f9f-7206-49c4-a381-6ba5a0c08504',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Avocado - each',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1990011',
                'vendor_name' => 'D.L.J. Produce Inc.',
              ],
              1 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              2 => [
                'id' => '1977164',
                'vendor_name' => 'Nature Fresh Farms Inc.',
              ],
              3 => [
                'id' => '1973872',
                'vendor_name' => 'West Pak Avocado Inc.',
              ],
              4 => [
                'id' => '1973861',
                'vendor_name' => 'Index Fresh',
              ],
              5 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              6 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              7 => [
                'id' => '1295128',
                'vendor_name' => 'CALAVO GROWERS INC',
              ],
              8 => [
                'id' => '1289574',
                'vendor_name' => 'MISSION PRODUCE INC',
              ],
              9 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              10 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              11 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              12 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              13 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              14 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              15 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              16 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              17 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              18 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              19 => [
                'id' => '1229259',
                'vendor_name' => 'NOGALES PRODUCE',
              ],
              20 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              21 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              22 => [
                'id' => '1990809',
                'vendor_name' => 'Heartland Produce Company',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '47095644',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 1042.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 1042.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.65,
            'default_price' => false,
            'external_system_id' => '47095644-911-0.65-2021092417',
            'formatted_current_price' => '$0.65',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 0.65,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.19,
                'count' => 390,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 9,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        4 => [
          'item' => [
            'assigned_selling_channels_code' => 'online_and_stores',
            'dpci' => '203-60-0096',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/purified-drinking-water-24pk-16-9-fl-oz-bottles-good-gather-8482/-/A-54407104',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_6710c306-f293-446b-bde1-d3f1ef342823',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_f33cbd8b-5af4-4bab-96fa-b6b1e05e2b30',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_2d0b7119-303d-40d4-97cb-58ef88792443_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '18',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_a30c3256-9bc8-43c3-b4c1-31366a2b1ceb',
                  'video_sequence' => '1',
                  'video_title' => 'Good & Gather™ Purified Drinking Water - 24pk/16.9 fl oz Bottles ',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 5,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Purified Drinking Water - 24pk/16.9 fl oz Bottles - Good & Gather&#8482;',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1183120',
                'vendor_name' => 'NIAGARA BOTTLING LLC',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '54407104',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 400.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 400.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.99,
            'default_price' => false,
            'external_system_id' => '434349237',
            'formatted_current_price' => '$2.99',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 2.69,
            'reg_retail' => 2.99,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.2,
                'count' => 664,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 45,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        5 => [
          'item' => [
            'assigned_selling_channels_code' => 'online_and_stores',
            'dpci' => '212-04-0899',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/hidden-valley-ranch-secret-sauce-smokehouse-12oz/-/A-78785561',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_8b4932b8-5081-4e5f-8a3f-3976ff601c4b',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_1d349a75-3472-4e40-aa85-9ee1a7db2fd6',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_49c3a532-4075-49bd-9b82-6ddc71432ca8_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '15',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_49c3a532-4075-49bd-9b82-6ddc71432ca8',
                  'video_sequence' => '1',
                  'video_title' => 'HVR Ranch Burger',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Hidden Valley Ranch Secret Sauce Smokehouse - 12oz',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1714052',
                'vendor_name' => 'CLOROX COMPANY (THE)',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '78785561',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'UNAVAILABLE',
              'location_available_to_promise_quantity' => 0.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'availability_status' => 'IN_STOCK',
              'loyalty_availability_status' => 'IN_STOCK',
              'available_to_promise_quantity' => 10.0,
              'services' => [
                0 => [
                  'cutoff' => '2021-12-22T20:00:00Z',
                  'max_delivery_date' => '2021-12-28',
                  'min_delivery_date' => '2021-12-28',
                  'is_two_day_shipping' => false,
                  'is_base_shipping_method' => true,
                  'service_level_description' => 'Standard Shipping',
                  'shipping_method_short_description' => 'Standard',
                ],
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 0.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'NOT_SOLD_IN_STORE',
                  'preferred_store_option_description' => 'available in store',
                ],
                'ship_to_store' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Ship To Store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 3.69,
            'default_price' => false,
            'external_system_id' => '78785561-911-3.69-2021081702',
            'formatted_current_price' => '$3.69',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'reg_retail' => 3.69,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.75,
                'count' => 539,
              ],
            ],
          ],
          'is_sponsored_sku' => true,
          'sponsored_ad' => [
            'ad_source' => 'criteo',
            'click_id' => 'gL-rXLdGUUeKPPTo4DNpJQ_RM',
            'click_token' => 'KWKCXCq6MxnZp5SZbOUOQCXiwy8JuyR%2fGgvT%2bCsxNYJDFdJ%2fd1L%2fW%2fLdBOLX5%2fHLs%2fB5W%2b%2byrSD3QppXg%2bJJIZ5408ytYyQozGAz9TUCFBWeoukuYGkD0pyS%2bSrysiMMAxSLRaCwX6CDl0fPdc2PhT7YiPmCKUUylPV7Zr7Kt3wSQNQi%2bCaeL026wLO7RKGqdwjFu%2f%2bHH%2f7eHe%2bCyrt%2bO3zz4LzZB0JJaLOnuHHagSooJ7h8f84kCr2RIGaHrljiSc8fLOPYv8YLfNyurP%2bH%2bdW32Z6LALxu3N5QdH5IVTWpqRTvGKdIX3z3gd7Y36yXKTD0FLTsJa8%2bTKtDYhvhLk0WPsQichJJYMp8fKslifo9wfcSGZjW0%2bjFnivzydxIIqA2nb9fOu%2bj1ojto6%2bRi%2baYzf6a%2fuOKZxGmcZ%2buhdwWsvyszVUtGBel9V3fyVqQYx6hQcVC7wgPNc%2fq6v%2bVXQ%3d%3d',
            'impression_id' => 'DL3yZpNSD0m_5aoHXu-k3w_RM',
          ],
        ],
        6 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '267-50-0005',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/organic-bananas-2lb-bag/-/A-47780315',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_90259dc9-363e-43e3-9570-93655723ec61',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Organic Bananas - 2lb Bag',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              1 => [
                'id' => '1976709',
                'vendor_name' => 'Fyffes North America',
              ],
              2 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              3 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              4 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              5 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              6 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              7 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              8 => [
                'id' => '1233724',
                'vendor_name' => 'CHIQUITA FRESH',
              ],
              9 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              10 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '47780315',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 23.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 23.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 1.59,
            'default_price' => false,
            'external_system_id' => '47780315-911-1.59-2021120623',
            'formatted_current_price' => '$1.59',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 1.59,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.01,
                'count' => 662,
              ],
            ],
          ],
        ],
        7 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '284-02-0006',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/2-milk-1gal-good-38-gather-8482/-/A-13276204',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_b733eb0f-5f2d-44c6-82d2-c7f3845e37d3',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 5,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => '2% Milk - 1gal - Good &#38; Gather&#8482;',
            ],
            'product_vendors' => [
              0 => [
                'id' => '2000725',
                'vendor_name' => 'Borden Dairy',
              ],
              1 => [
                'id' => '1998270',
                'vendor_name' => 'Nevada Dairy LLC',
              ],
              2 => [
                'id' => '1997810',
                'vendor_name' => 'Meadow Gold Dairies HI',
              ],
              3 => [
                'id' => '1996970',
                'vendor_name' => 'McArthur Next LLC',
              ],
              4 => [
                'id' => '1995391',
                'vendor_name' => 'Dean Dairy Fluid NSBT',
              ],
              5 => [
                'id' => '1995390',
                'vendor_name' => 'Dean Dairy Fluid, LLC',
              ],
              6 => [
                'id' => '1993251',
                'vendor_name' => 'Crystal Creamery',
              ],
              7 => [
                'id' => '1993170',
                'vendor_name' => 'Crystal Creamery',
              ],
              8 => [
                'id' => '1311675',
                'vendor_name' => 'COUNTRY FRESH -',
              ],
              9 => [
                'id' => '1311549',
                'vendor_name' => 'DEAN\'S INDIANA -',
              ],
              10 => [
                'id' => '1308947',
                'vendor_name' => 'LEHIGH VALLEY DAIRY',
              ],
              11 => [
                'id' => '1295542',
                'vendor_name' => 'DEAN MILK CO LOUISVIL',
              ],
              12 => [
                'id' => '1266652',
                'vendor_name' => 'BROWN\'S DAIRY',
              ],
              13 => [
                'id' => '1255485',
                'vendor_name' => 'HP HOOD LLC -',
              ],
              14 => [
                'id' => '1250558',
                'vendor_name' => 'MEADOW GOLD - HI',
              ],
              15 => [
                'id' => '1249336',
                'vendor_name' => 'ALTA DENA -',
              ],
              16 => [
                'id' => '1241965',
                'vendor_name' => 'PETERKIN DISTRIBUTORS',
              ],
              17 => [
                'id' => '1227565',
                'vendor_name' => 'DEAN ILL DAIRIES LLC',
              ],
              18 => [
                'id' => '1224296',
                'vendor_name' => 'DEAN DAIRY PRODUCTS',
              ],
              19 => [
                'id' => '1222308',
                'vendor_name' => 'OAK FARMS DAIRY -',
              ],
              20 => [
                'id' => '1221710',
                'vendor_name' => 'BERKELEY FARMS, INC_',
              ],
              21 => [
                'id' => '1221684',
                'vendor_name' => 'SCHEPPS__',
              ],
              22 => [
                'id' => '1220795',
                'vendor_name' => 'GARELICK FARMS OF NJ',
              ],
              23 => [
                'id' => '1219395',
                'vendor_name' => 'KEMPS LLC - DFD',
              ],
              24 => [
                'id' => '1212729',
                'vendor_name' => 'MEADOWBROOK DAIRYERIE',
              ],
              25 => [
                'id' => '1212046',
                'vendor_name' => 'SHENANDOAH\'S PRIDE LLC',
              ],
              26 => [
                'id' => '1203466',
                'vendor_name' => 'BROUGHTON FOODS LLC',
              ],
              27 => [
                'id' => '1196049',
                'vendor_name' => 'NORTHWEST DAIRY DIST INC',
              ],
              28 => [
                'id' => '1159918',
                'vendor_name' => 'DAIRYMENS MILK CO',
              ],
              29 => [
                'id' => '1144936',
                'vendor_name' => 'CRYSTAL CREAMERY',
              ],
              30 => [
                'id' => '1129566',
                'vendor_name' => 'MARIGOLD',
              ],
              31 => [
                'id' => '1129139',
                'vendor_name' => 'BELL/GANDY DEANS',
              ],
              32 => [
                'id' => '1129126',
                'vendor_name' => 'PRICE\'S DEANS',
              ],
              33 => [
                'id' => '1129113',
                'vendor_name' => 'CREAMLAND DEANS',
              ],
              34 => [
                'id' => '1129058',
                'vendor_name' => 'TRAUTH',
              ],
              35 => [
                'id' => '1127911',
                'vendor_name' => 'PURITY DAIRIES INC',
              ],
              36 => [
                'id' => '1127746',
                'vendor_name' => 'MAYFIELD DAIRY FARMS',
              ],
              37 => [
                'id' => '1125227',
                'vendor_name' => 'MEADOW GOLD DAIRIES',
              ],
              38 => [
                'id' => '1124053',
                'vendor_name' => 'PRAIRIE FARMS',
              ],
              39 => [
                'id' => '1105904',
                'vendor_name' => 'SHAMROCK FOODS CO_',
              ],
              40 => [
                'id' => '1093469',
                'vendor_name' => 'MEADOW GOLD ENGLEWOOD',
              ],
              41 => [
                'id' => '1093168',
                'vendor_name' => 'MURFREESBORO PURE MILK CO',
              ],
              42 => [
                'id' => '1091306',
                'vendor_name' => 'FOREMOST DAIRY',
              ],
              43 => [
                'id' => '1090776',
                'vendor_name' => 'REITER DAIRY INC',
              ],
              44 => [
                'id' => '1065109',
                'vendor_name' => 'GARELICK FARMS DIV/SU',
              ],
              45 => [
                'id' => '1061022',
                'vendor_name' => 'BYRNE DAIRY',
              ],
              46 => [
                'id' => '1053865',
                'vendor_name' => 'DAIRY FRESH FARMS INC',
              ],
              47 => [
                'id' => '1052329',
                'vendor_name' => 'BARBER DAIRIES INC',
              ],
              48 => [
                'id' => '1051906',
                'vendor_name' => 'LEHIGH VALLEY DAIRIES INC',
              ],
              49 => [
                'id' => '1051799',
                'vendor_name' => 'MCARTHUR DAIRY',
              ],
              50 => [
                'id' => '1047936',
                'vendor_name' => 'T.G.LEE FOODS INC',
              ],
              51 => [
                'id' => '1046306',
                'vendor_name' => 'DEAN FOODS N CENTRAL',
              ],
              52 => [
                'id' => '1033681',
                'vendor_name' => 'TURNER DAIRIES SBT-MERGED',
              ],
              53 => [
                'id' => '1033063',
                'vendor_name' => 'PRAIRIE FARMS DAIRY, INC.',
              ],
              54 => [
                'id' => '1027037',
                'vendor_name' => 'LIBERTY DISTRIBUTING INC.',
              ],
              55 => [
                'id' => '1024904',
                'vendor_name' => 'DEAN FOODS COMPANY',
              ],
              56 => [
                'id' => '1023060',
                'vendor_name' => 'SHENANDOAH\'S PRIDE',
              ],
              57 => [
                'id' => '1019579',
                'vendor_name' => 'SWISS DAIRIES',
              ],
              58 => [
                'id' => '1018279',
                'vendor_name' => 'PET DAIRY',
              ],
              59 => [
                'id' => '1018143',
                'vendor_name' => 'DARIGOLD INC',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '13276204',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 22.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 22.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.99,
            'default_price' => false,
            'external_system_id' => '13276204-911-2.99-2021112420',
            'formatted_current_price' => '$2.99',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 2.99,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.94,
                'count' => 392,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            2 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            3 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        8 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '288-07-0715',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/talenti-gelato-layers-confetti-cookie-10-3oz/-/A-81425801',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_e978eb4e-6b9a-43a0-aba7-7b6c7f0dff98',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_71f384f3-5904-40fd-8d7e-8ccbf7eeb7d4',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_14c8fbad-8e9f-48b0-8b57-e0b53f7403e3_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '6',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_14c8fbad-8e9f-48b0-8b57-e0b53f7403e3',
                  'video_sequence' => '1',
                  'video_title' => 'Talenti Gelato Layers For a Delicious Frozen Dessert Confetti Cookie 5 Layers in Every Jar 10.3 oz
',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Talenti Gelato Layers Confetti Cookie - 10.3oz',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1143283',
                'vendor_name' => 'UNILEVER ICE CREAM CO',
              ],
              1 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '81425801',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 2.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 2.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 4.69,
            'default_price' => false,
            'external_system_id' => '81425801-911-1612224145172',
            'formatted_current_price' => '$4.69',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 4.69,
            'reg_retail' => 4.69,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.29,
                'count' => 70,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 47,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
          'is_sponsored_sku' => true,
          'sponsored_ad' => [
            'ad_source' => 'criteo',
            'click_id' => 'EI83IqV9Yk2qkiRh29-wrg_RM',
            'click_token' => 'gjD7BerYTKmbUCgcf9AmUmsYHa6gntJ8TdaUIqeIGiDLEegvzeF9qs1hX5kGOvLX9IZ2eJhFtV2SFLVUPLW0b9hBOV0M5yt1fHE7Id7I9%2fRevXvTp%2boYykmLQC1TNye%2bEsnTLPHhN5RiLxM1g%2bp64TWEYXZj1sUD24PhVfSPf4FhfSC20E7HyfH7WtRgKN%2bIULFGoSQgraPdQiYszqN7p7od7xOvGd500DRNQPVDm7bZraMSB9Hn%2fKEgtwfL%2fedXtmJCSaLSVPQsDqa5sqHOSAQwE89s2wIrwfO8vtu%2fATsNr8Nm4jKPz0n4dEgw%2bezXR21K8ssG8hkryWE1%2fTPmOcaOl8DioTqun4HoupO63rF%2bLOPglhk%2fvBug1Ub5GjgHMPL15PasW6spJ1SNf%2fbUN2stmk7MbS8vOsgSQrQFTZWReR1Jk1OWe1G2a0LXEh4VTolJDmQD6Pk%2b20QGT2Y4yg%3d%3d',
            'impression_id' => 'ukS-w5tq20WtZg5RHyXw0Q_RM',
          ],
        ],
        9 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '266-08-4240',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/blueberries-1pt-package/-/A-13208898',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_25e44c47-409d-46d7-a19c-e797e5a82542',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_eec7b147-158e-4abc-a285-30b93c10c226',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_51cf3e22-473f-448b-9ffc-b8e91bc835dc_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '61',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_51cf3e22-473f-448b-9ffc-b8e91bc835dc',
                  'video_sequence' => '1',
                  'video_title' => 'Overnight Oats',
                  'is_list_page_eligible' => false,
                ],
                1 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_d2779352-9c13-4ed2-9e38-ac6dd4a1a2c7',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '35',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369',
                  'video_sequence' => '1',
                  'video_title' => 'G&G Yogurt Bark',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Blueberries - 1pt Package',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1985869',
                'vendor_name' => 'Blazer Wilkinson',
              ],
              1 => [
                'id' => '1983053',
                'vendor_name' => 'JDB PRO INC dba Central W',
              ],
              2 => [
                'id' => '1981774',
                'vendor_name' => 'S.C. Critchley. Inc.',
              ],
              3 => [
                'id' => '1980673',
                'vendor_name' => 'Always Fresh Farms LLC',
              ],
              4 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              5 => [
                'id' => '1980451',
                'vendor_name' => 'Alpine Fresh, Inc',
              ],
              6 => [
                'id' => '1980010',
                'vendor_name' => 'Meridian Fine Foods, LLC',
              ],
              7 => [
                'id' => '1978249',
                'vendor_name' => 'North Bay Produce',
              ],
              8 => [
                'id' => '1978201',
                'vendor_name' => 'Family Tree Farms',
              ],
              9 => [
                'id' => '1977831',
                'vendor_name' => 'Wishnatzki, Inc',
              ],
              10 => [
                'id' => '1972829',
                'vendor_name' => 'California Giant, Inc.',
              ],
              11 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              12 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              13 => [
                'id' => '1283761',
                'vendor_name' => 'INDIANAPOLIS FRUIT CO',
              ],
              14 => [
                'id' => '1283075',
                'vendor_name' => 'LANCASTER FOODS LLC',
              ],
              15 => [
                'id' => '1283033',
                'vendor_name' => 'TESTA PRODUCE INC',
              ],
              16 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              17 => [
                'id' => '1273030',
                'vendor_name' => 'SUN BELLE INC.',
              ],
              18 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              19 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              20 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              21 => [
                'id' => '1262119',
                'vendor_name' => 'SUISAN COMPANY',
              ],
              22 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              23 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              24 => [
                'id' => '1251230',
                'vendor_name' => 'OK PRODUCE',
              ],
              25 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              26 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              27 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              28 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              29 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              30 => [
                'id' => '1237209',
                'vendor_name' => 'NATURIPE FARMS',
              ],
              31 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              32 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              33 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              34 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              35 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              36 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              37 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              38 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              39 => [
                'id' => '1231179',
                'vendor_name' => 'KEVIN GUIDRY PRODUCE',
              ],
              40 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              41 => [
                'id' => '1228470',
                'vendor_name' => 'ASTIN STRAWBERRY EXCHANGE',
              ],
              42 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              43 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              44 => [
                'id' => '1227015',
                'vendor_name' => 'CH ROBINSON-WORLDWIDE INC',
              ],
              45 => [
                'id' => '1221095',
                'vendor_name' => 'BAKKER PRODUCE',
              ],
              46 => [
                'id' => '1219450',
                'vendor_name' => 'DRISCOLL STRAWBERRY - DFD',
              ],
              47 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              48 => [
                'id' => '1146280',
                'vendor_name' => 'CAPITOL CITY PRODUCE CO',
              ],
              49 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              50 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              51 => [
                'id' => '1034800',
                'vendor_name' => 'SUPERVALU NATIONAL',
              ],
              52 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '13208898',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 183.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 183.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 3.39,
            'default_price' => false,
            'external_system_id' => '13208898-911-3.39-2021111617',
            'formatted_current_price' => '$3.39',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 3.39,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.85,
                'count' => 231,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        10 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '203-60-0097',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/purified-water-1gal-good-gather-8482/-/A-54444789',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_939f41df-f4e9-4ea4-aa0f-f9f55c00e634',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_159f0e9e-6ab7-4d2f-bbaf-54447f1c88c0',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_3b009dc0-e92d-4c87-a9d3-0f3c71efa3e9_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '18',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_b11ea5ae-0a37-4bd7-aa77-cdeddf6148ba',
                  'video_sequence' => '1',
                  'video_title' => 'Good & Gather™ Purified Water - 1gal',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 5,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Purified Water - 1gal - Good & Gather&#8482;',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1183120',
                'vendor_name' => 'NIAGARA BOTTLING LLC',
              ],
              1 => [
                'id' => '1035977',
                'vendor_name' => 'AMERICAN BOTTLING CO, THE',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '54444789',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 194.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 194.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.99,
            'default_price' => false,
            'external_system_id' => '827635926',
            'formatted_current_price' => '$0.99',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.99,
            'reg_retail' => 0.99,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.31,
                'count' => 383,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 45,
              'block' => 'G',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 45,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        11 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '288-07-0806',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/ben-and-jerry-s-ice-cream-cookies-and-cream-cheesecake-16oz/-/A-50262511',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_15c8a081-6463-4691-8570-2cd54c726f6c',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Ben and Jerry\'s Ice Cream Cookies and Cream Cheesecake - 16oz',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1332900',
                'vendor_name' => 'MAUI SODA & ICE WORKS LTD',
              ],
              1 => [
                'id' => '1256646',
                'vendor_name' => 'C & S HAWAII',
              ],
              2 => [
                'id' => '1252116',
                'vendor_name' => 'EIGHT-POINT DISTRIBUTORS',
              ],
              3 => [
                'id' => '1237487',
                'vendor_name' => 'GREATLAND FOODS',
              ],
              4 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              5 => [
                'id' => '1143283',
                'vendor_name' => 'UNILEVER ICE CREAM CO',
              ],
              6 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '50262511',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 3.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 3.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 4.59,
            'default_price' => false,
            'external_system_id' => '50262511-911-4.59-2021100800',
            'formatted_current_price' => '$4.59',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 4.29,
            'reg_retail' => 4.59,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.34,
                'count' => 74,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 47,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
          'is_sponsored_sku' => true,
          'sponsored_ad' => [
            'ad_source' => 'criteo',
            'click_id' => 'QwAnAEOzhEOL7408HmbWQA_RM',
            'click_token' => 'CNoUPs1%2bZ3s5f9TM0D%2fZU%2f7cy38db2Zj2c1etrX8ifr8P46o1reg3dF8TuWISV3IuGCtX13PbCoH%2bzAIgGTrcbzXr0eQ0GtyNyAoo2YiPLD1OMck5JfpEpvuF%2bcHnkcxZSrYPQtwFiF3pRX2ti19whZCFVRwpupwrbj3gAmKYFkAGTKZ93PfCuxClSJeUgryd%2fSv%2fNw6yTThbYeywsFXwJunLSSRAqyaYW9oiB6zG2floAcXHuL07ptzQDuiv3M5he6%2fa90SXzcMFbYdpzvbJ6IJnznaYDJmVc84EpHO029HgiHMNlpobs%2fxAmA69sXlpko8rHUL7j%2b8FzwbujfQzQP4AM6E895qMXBDMe0l7FHbMj5L%2b1tvDaQ%2b8Fi%2bKaN370FxkR%2bbRmeCQnwv24TSMGekmUzjFoAf13fZzcZ8uQVpehtoG4m9zRDpA39UNjVg4w3%2fBwS29TftrwVpvzkJ%2fQ%3d%3d',
            'impression_id' => 'JXEN9aHUvE6oJvULGzYSng_RM',
          ],
        ],
        12 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '284-02-0005',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/vitamin-d-whole-milk-1gal-good-38-gather-8482/-/A-13276134',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_419f1169-a698-45a1-8d89-ad28136ba841',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 5,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Vitamin D Whole Milk - 1gal - Good &#38; Gather&#8482;',
            ],
            'product_vendors' => [
              0 => [
                'id' => '2000725',
                'vendor_name' => 'Borden Dairy',
              ],
              1 => [
                'id' => '1998270',
                'vendor_name' => 'Nevada Dairy LLC',
              ],
              2 => [
                'id' => '1997810',
                'vendor_name' => 'Meadow Gold Dairies HI',
              ],
              3 => [
                'id' => '1996970',
                'vendor_name' => 'McArthur Next LLC',
              ],
              4 => [
                'id' => '1995391',
                'vendor_name' => 'Dean Dairy Fluid NSBT',
              ],
              5 => [
                'id' => '1995390',
                'vendor_name' => 'Dean Dairy Fluid, LLC',
              ],
              6 => [
                'id' => '1993251',
                'vendor_name' => 'Crystal Creamery',
              ],
              7 => [
                'id' => '1993170',
                'vendor_name' => 'Crystal Creamery',
              ],
              8 => [
                'id' => '1311675',
                'vendor_name' => 'COUNTRY FRESH -',
              ],
              9 => [
                'id' => '1311549',
                'vendor_name' => 'DEAN\'S INDIANA -',
              ],
              10 => [
                'id' => '1308947',
                'vendor_name' => 'LEHIGH VALLEY DAIRY',
              ],
              11 => [
                'id' => '1295542',
                'vendor_name' => 'DEAN MILK CO LOUISVIL',
              ],
              12 => [
                'id' => '1266652',
                'vendor_name' => 'BROWN\'S DAIRY',
              ],
              13 => [
                'id' => '1255485',
                'vendor_name' => 'HP HOOD LLC -',
              ],
              14 => [
                'id' => '1250558',
                'vendor_name' => 'MEADOW GOLD - HI',
              ],
              15 => [
                'id' => '1249336',
                'vendor_name' => 'ALTA DENA -',
              ],
              16 => [
                'id' => '1241965',
                'vendor_name' => 'PETERKIN DISTRIBUTORS',
              ],
              17 => [
                'id' => '1227565',
                'vendor_name' => 'DEAN ILL DAIRIES LLC',
              ],
              18 => [
                'id' => '1224296',
                'vendor_name' => 'DEAN DAIRY PRODUCTS',
              ],
              19 => [
                'id' => '1222308',
                'vendor_name' => 'OAK FARMS DAIRY -',
              ],
              20 => [
                'id' => '1221710',
                'vendor_name' => 'BERKELEY FARMS, INC_',
              ],
              21 => [
                'id' => '1221684',
                'vendor_name' => 'SCHEPPS__',
              ],
              22 => [
                'id' => '1220795',
                'vendor_name' => 'GARELICK FARMS OF NJ',
              ],
              23 => [
                'id' => '1219395',
                'vendor_name' => 'KEMPS LLC - DFD',
              ],
              24 => [
                'id' => '1212729',
                'vendor_name' => 'MEADOWBROOK DAIRYERIE',
              ],
              25 => [
                'id' => '1212046',
                'vendor_name' => 'SHENANDOAH\'S PRIDE LLC',
              ],
              26 => [
                'id' => '1203466',
                'vendor_name' => 'BROUGHTON FOODS LLC',
              ],
              27 => [
                'id' => '1196049',
                'vendor_name' => 'NORTHWEST DAIRY DIST INC',
              ],
              28 => [
                'id' => '1159918',
                'vendor_name' => 'DAIRYMENS MILK CO',
              ],
              29 => [
                'id' => '1144936',
                'vendor_name' => 'CRYSTAL CREAMERY',
              ],
              30 => [
                'id' => '1129566',
                'vendor_name' => 'MARIGOLD',
              ],
              31 => [
                'id' => '1129139',
                'vendor_name' => 'BELL/GANDY DEANS',
              ],
              32 => [
                'id' => '1129126',
                'vendor_name' => 'PRICE\'S DEANS',
              ],
              33 => [
                'id' => '1129113',
                'vendor_name' => 'CREAMLAND DEANS',
              ],
              34 => [
                'id' => '1129058',
                'vendor_name' => 'TRAUTH',
              ],
              35 => [
                'id' => '1127911',
                'vendor_name' => 'PURITY DAIRIES INC',
              ],
              36 => [
                'id' => '1127746',
                'vendor_name' => 'MAYFIELD DAIRY FARMS',
              ],
              37 => [
                'id' => '1125227',
                'vendor_name' => 'MEADOW GOLD DAIRIES',
              ],
              38 => [
                'id' => '1124053',
                'vendor_name' => 'PRAIRIE FARMS',
              ],
              39 => [
                'id' => '1105904',
                'vendor_name' => 'SHAMROCK FOODS CO_',
              ],
              40 => [
                'id' => '1093469',
                'vendor_name' => 'MEADOW GOLD ENGLEWOOD',
              ],
              41 => [
                'id' => '1093168',
                'vendor_name' => 'MURFREESBORO PURE MILK CO',
              ],
              42 => [
                'id' => '1091306',
                'vendor_name' => 'FOREMOST DAIRY',
              ],
              43 => [
                'id' => '1090776',
                'vendor_name' => 'REITER DAIRY INC',
              ],
              44 => [
                'id' => '1065109',
                'vendor_name' => 'GARELICK FARMS DIV/SU',
              ],
              45 => [
                'id' => '1061022',
                'vendor_name' => 'BYRNE DAIRY',
              ],
              46 => [
                'id' => '1053865',
                'vendor_name' => 'DAIRY FRESH FARMS INC',
              ],
              47 => [
                'id' => '1052329',
                'vendor_name' => 'BARBER DAIRIES INC',
              ],
              48 => [
                'id' => '1051906',
                'vendor_name' => 'LEHIGH VALLEY DAIRIES INC',
              ],
              49 => [
                'id' => '1051799',
                'vendor_name' => 'MCARTHUR DAIRY',
              ],
              50 => [
                'id' => '1047936',
                'vendor_name' => 'T.G.LEE FOODS INC',
              ],
              51 => [
                'id' => '1046306',
                'vendor_name' => 'DEAN FOODS N CENTRAL',
              ],
              52 => [
                'id' => '1033681',
                'vendor_name' => 'TURNER DAIRIES SBT-MERGED',
              ],
              53 => [
                'id' => '1033063',
                'vendor_name' => 'PRAIRIE FARMS DAIRY, INC.',
              ],
              54 => [
                'id' => '1027037',
                'vendor_name' => 'LIBERTY DISTRIBUTING INC.',
              ],
              55 => [
                'id' => '1024904',
                'vendor_name' => 'DEAN FOODS COMPANY',
              ],
              56 => [
                'id' => '1023060',
                'vendor_name' => 'SHENANDOAH\'S PRIDE',
              ],
              57 => [
                'id' => '1019579',
                'vendor_name' => 'SWISS DAIRIES',
              ],
              58 => [
                'id' => '1018279',
                'vendor_name' => 'PET DAIRY',
              ],
              59 => [
                'id' => '1018143',
                'vendor_name' => 'DARIGOLD INC',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '13276134',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 23.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 23.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.99,
            'default_price' => false,
            'external_system_id' => '13276134-911-2.99-2021112420',
            'formatted_current_price' => '$2.99',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'reg_retail' => 2.99,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.08,
                'count' => 531,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            2 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
            3 => [
              'aisle' => 48,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        13 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '266-01-2001',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/clementines-3lb-bag/-/A-15013582',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_4dafd1cd-d2d6-4512-bd2a-2c7d97c12f48',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Clementines - 3lb Bag',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1987969',
                'vendor_name' => 'Fowler Packing Company',
              ],
              1 => [
                'id' => '1980783',
                'vendor_name' => 'Pro Citrus Network, Inc.',
              ],
              2 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              3 => [
                'id' => '1979499',
                'vendor_name' => 'Kings River Packing',
              ],
              4 => [
                'id' => '1973799',
                'vendor_name' => 'William H. Kopke Jr., Inc',
              ],
              5 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              6 => [
                'id' => '1315532',
                'vendor_name' => 'SUNWEST FRUIT CO',
              ],
              7 => [
                'id' => '1313770',
                'vendor_name' => 'GLOBAL FOODS DIRECT LLC',
              ],
              8 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              9 => [
                'id' => '1310731',
                'vendor_name' => 'WONDERFUL CITRUS',
              ],
              10 => [
                'id' => '1301106',
                'vendor_name' => 'JAC. VANDENBERG INC',
              ],
              11 => [
                'id' => '1299548',
                'vendor_name' => 'TRINITY FRUIT SALES CO.',
              ],
              12 => [
                'id' => '1296554',
                'vendor_name' => 'BEE SWEET CITRUS INC',
              ],
              13 => [
                'id' => '1294679',
                'vendor_name' => 'DUDA FARM FRESH FOODS',
              ],
              14 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              15 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              16 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              17 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              18 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              19 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              20 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              21 => [
                'id' => '1251230',
                'vendor_name' => 'OK PRODUCE',
              ],
              22 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              23 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              24 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              25 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              26 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              27 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              28 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              29 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              30 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              31 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              32 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              33 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              34 => [
                'id' => '1233478',
                'vendor_name' => 'LIBERTY FRUIT COMPANY',
              ],
              35 => [
                'id' => '1233232',
                'vendor_name' => 'BUDDY\'S PRODUCE',
              ],
              36 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              37 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              38 => [
                'id' => '1231441',
                'vendor_name' => 'SANTA MARIA PRODUCE',
              ],
              39 => [
                'id' => '1231179',
                'vendor_name' => 'KEVIN GUIDRY PRODUCE',
              ],
              40 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              41 => [
                'id' => '1229796',
                'vendor_name' => 'SEALD SWEET, LLC',
              ],
              42 => [
                'id' => '1229259',
                'vendor_name' => 'NOGALES PRODUCE',
              ],
              43 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              44 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              45 => [
                'id' => '1227316',
                'vendor_name' => 'DAYKA & HACKETT LLC',
              ],
              46 => [
                'id' => '1219133',
                'vendor_name' => 'DNE WORLD FRUIT LLC DFD',
              ],
              47 => [
                'id' => '1218710',
                'vendor_name' => 'SUN PACIFIC - DFD',
              ],
              48 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              49 => [
                'id' => '1216521',
                'vendor_name' => 'WHOLESALE PRODUCE - DFD',
              ],
              50 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              51 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              52 => [
                'id' => '1034800',
                'vendor_name' => 'SUPERVALU NATIONAL',
              ],
              53 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '15013582',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 257.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 257.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 4.49,
            'default_price' => false,
            'external_system_id' => '15013582-911-4.49-2021120923',
            'formatted_current_price' => '$4.49',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 4.49,
          ],
          'promotions' => [
            0 => [
              'promotion_id' => '108589057',
              'plp_message' => 'Buy 1, get 1 50% off with same-day order services',
              'promotion_class' => 'BOGO',
              'circle_offer' => false,
            ],
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 2.85,
                'count' => 342,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 9,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        14 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '271-10-0269',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/diet-coke-12pk-12-fl-oz-cans/-/A-12953514',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_16598c5b-812c-4e00-9e03-83f7aa9396bc',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_ade58f01-b34f-4df9-bd38-9843c2e1922e',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '30',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7',
                  'video_sequence' => '1',
                  'video_title' => 'Coca-Cola video',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 4,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Diet Coke - 12pk/12 fl oz Cans',
            ],
            'product_vendors' => [
              0 => [
                'id' => '3648087',
                'vendor_name' => 'COCACOLA GREAT PLAINS',
              ],
              1 => [
                'id' => '1979595',
                'vendor_name' => 'Reyes Coca Cola Bottling',
              ],
              2 => [
                'id' => '1979349',
                'vendor_name' => 'Liberty Coca-Cola',
              ],
              3 => [
                'id' => '1979331',
                'vendor_name' => 'COCA COLA BEV NORTHEAST',
              ],
              4 => [
                'id' => '1979272',
                'vendor_name' => 'Gusto Beverage',
              ],
              5 => [
                'id' => '1978795',
                'vendor_name' => 'ABARTA Coca-Cola Beverage',
              ],
              6 => [
                'id' => '1977878',
                'vendor_name' => 'Timber Country Coca-Cola',
              ],
              7 => [
                'id' => '1977509',
                'vendor_name' => 'Coca-Cola Southwest',
              ],
              8 => [
                'id' => '1976591',
                'vendor_name' => 'Heartland Coca-Cola',
              ],
              9 => [
                'id' => '1976428',
                'vendor_name' => 'Clark Beverage Group',
              ],
              10 => [
                'id' => '1976029',
                'vendor_name' => 'Coca-Cola BottlingHawaii',
              ],
              11 => [
                'id' => '1974775',
                'vendor_name' => 'CocaCola Beverages Duluth',
              ],
              12 => [
                'id' => '1974689',
                'vendor_name' => 'Swire Pacific Holdings, I',
              ],
              13 => [
                'id' => '1972850',
                'vendor_name' => 'Coca Cola Swire CONA',
              ],
              14 => [
                'id' => '1717994',
                'vendor_name' => 'COCACOLA RAPID CITY',
              ],
              15 => [
                'id' => '1717842',
                'vendor_name' => 'COCACOLA VIKING',
              ],
              16 => [
                'id' => '1717839',
                'vendor_name' => 'COCACOLA SACRAMENTO',
              ],
              17 => [
                'id' => '1717758',
                'vendor_name' => 'COCACOLA KOKOMO',
              ],
              18 => [
                'id' => '1717664',
                'vendor_name' => 'COCA COLA REFRESHMENTSUSA',
              ],
              19 => [
                'id' => '1717512',
                'vendor_name' => 'COCACOLA COLUMBUS',
              ],
              20 => [
                'id' => '1717350',
                'vendor_name' => 'COCACOLA TRI-CITIES',
              ],
              21 => [
                'id' => '1717208',
                'vendor_name' => 'COCACOLA CHARLOTTE',
              ],
              22 => [
                'id' => '1717046',
                'vendor_name' => 'COCACOLA SWIRE USA',
              ],
              23 => [
                'id' => '1717033',
                'vendor_name' => 'COCACOLA VIRGINIA MN',
              ],
              24 => [
                'id' => '1716966',
                'vendor_name' => 'COCACOLA BEMIDJI',
              ],
              25 => [
                'id' => '1664490',
                'vendor_name' => 'COCACOLA CHESTERMAN CO',
              ],
              26 => [
                'id' => '1336870',
                'vendor_name' => 'CORINTH COCA COLA',
              ],
              27 => [
                'id' => '1334788',
                'vendor_name' => 'GREAT LAKES COCA-COLA DST',
              ],
              28 => [
                'id' => '1334775',
                'vendor_name' => 'COCA-COLA BEV FLORIDA LLC',
              ],
              29 => [
                'id' => '1332900',
                'vendor_name' => 'MAUI SODA & ICE WORKS LTD',
              ],
              30 => [
                'id' => '1317378',
                'vendor_name' => 'COCA COLA BOTTLING CO',
              ],
              31 => [
                'id' => '1315341',
                'vendor_name' => 'COCA-COLA UNITED CONA',
              ],
              32 => [
                'id' => '1272112',
                'vendor_name' => 'RED BULL DIST CO.OF DENV',
              ],
              33 => [
                'id' => '1268391',
                'vendor_name' => 'CLARK BEVERAGE GROUP',
              ],
              34 => [
                'id' => '1267046',
                'vendor_name' => 'COCACOLA-KONA',
              ],
              35 => [
                'id' => '1254444',
                'vendor_name' => 'COCACOLA CCE-HAWAII',
              ],
              36 => [
                'id' => '1244205',
                'vendor_name' => 'COCA-COLA FORT SMITH',
              ],
              37 => [
                'id' => '1242744',
                'vendor_name' => 'COCA-COLA ODOM CORP',
              ],
              38 => [
                'id' => '1229660',
                'vendor_name' => 'COCACOLA ATLANTIC BTLG',
              ],
              39 => [
                'id' => '1227468',
                'vendor_name' => 'COCA-COLA DECATUR',
              ],
              40 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              41 => [
                'id' => '1126475',
                'vendor_name' => 'COCACOLA DURHAM',
              ],
              42 => [
                'id' => '1110180',
                'vendor_name' => 'COCACOLA LEHIGH VALLEY',
              ],
              43 => [
                'id' => '1100417',
                'vendor_name' => 'COCACOLA ROCKHILL',
              ],
              44 => [
                'id' => '1097656',
                'vendor_name' => 'COCACOLA CEDAR CITY',
              ],
              45 => [
                'id' => '1097122',
                'vendor_name' => 'COCACOLA CHAMBERS BOTTLNG',
              ],
              46 => [
                'id' => '1089266',
                'vendor_name' => 'COCA-COLA BTL CO UNITED',
              ],
              47 => [
                'id' => '1079535',
                'vendor_name' => 'GUSTO BEVERAGE CO',
              ],
              48 => [
                'id' => '1074970',
                'vendor_name' => 'COCACOLA LEHRKINDS',
              ],
              49 => [
                'id' => '1069419',
                'vendor_name' => 'COCACOLA NO. NEW ENGLAND',
              ],
              50 => [
                'id' => '1060285',
                'vendor_name' => 'COCACOLA COATESVILLE',
              ],
              51 => [
                'id' => '1051265',
                'vendor_name' => 'COCACOLA PHILADELPHIA',
              ],
              52 => [
                'id' => '1051210',
                'vendor_name' => 'COCACOLA WINONA',
              ],
              53 => [
                'id' => '1050732',
                'vendor_name' => 'COCACOLA SANTA FE',
              ],
              54 => [
                'id' => '1034868',
                'vendor_name' => 'COCACOLA OZARKS/DRPEPPER',
              ],
              55 => [
                'id' => '1031337',
                'vendor_name' => 'COCACOLA JEFFERSON',
              ],
              56 => [
                'id' => '1026708',
                'vendor_name' => 'COCACOLA CLEVELAND',
              ],
              57 => [
                'id' => '1026407',
                'vendor_name' => 'COCACOLA DURANGO',
              ],
              58 => [
                'id' => '1018800',
                'vendor_name' => 'COCACOLA TULLAHOMA',
              ],
              59 => [
                'id' => '1018321',
                'vendor_name' => 'COCACOLA LUFKIN',
              ],
              60 => [
                'id' => '1017953',
                'vendor_name' => 'COCACOLA W KENTUCKY',
              ],
              61 => [
                'id' => '1017209',
                'vendor_name' => 'COCACOLA BUFFALO',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '12953514',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 285.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 285.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 5.89,
            'default_price' => false,
            'external_system_id' => '12953514-911-5.89-2021081817',
            'formatted_current_price' => '$5.89',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 5.89,
          ],
          'promotions' => [
            0 => [
              'promotion_id' => '468858846',
              'plp_message' => 'Buy 3 for $14 with same-day order services',
              'promotion_class' => 'Mandated Multiple',
              'circle_offer' => false,
            ],
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.42,
                'count' => 3800,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 43,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        15 => [
          'item' => [
            'assigned_selling_channels_code' => 'online_and_stores',
            'dpci' => '212-14-0318',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/kraft-macaroni-38-cheese-dinner-original-7-25oz/-/A-12954218',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_d591e3c5-4517-4279-969e-164aef8ac376',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Kraft Macaroni &#38; Cheese Dinner Original - 7.25oz',
            ],
            'product_vendors' => [
              0 => [
                'id' => '2965716',
                'vendor_name' => 'KRAFT FOODS GROUP INC',
              ],
              1 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '12954218',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 46.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'availability_status' => 'IN_STOCK',
              'loyalty_availability_status' => 'IN_STOCK',
              'available_to_promise_quantity' => 10.0,
              'services' => [
                0 => [
                  'cutoff' => '2021-12-22T20:00:00Z',
                  'max_delivery_date' => '2021-12-28',
                  'min_delivery_date' => '2021-12-28',
                  'is_two_day_shipping' => false,
                  'is_base_shipping_method' => true,
                  'service_level_description' => 'Standard Shipping',
                  'shipping_method_short_description' => 'Standard',
                ],
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 46.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.99,
            'default_price' => false,
            'external_system_id' => '716031387',
            'formatted_current_price' => '$0.99',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 0.99,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.64,
                'count' => 903,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 30,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        16 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '271-10-0169',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/coca-cola-12pk-12-fl-oz-cans/-/A-12953464',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_f2a6f540-4792-43f5-85a5-33b77626e7db',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_ade58f01-b34f-4df9-bd38-9843c2e1922e',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '30',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7',
                  'video_sequence' => '1',
                  'video_title' => 'Coca-Cola video',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 4,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Coca-Cola - 12pk/12 fl oz Cans',
            ],
            'product_vendors' => [
              0 => [
                'id' => '3648087',
                'vendor_name' => 'COCACOLA GREAT PLAINS',
              ],
              1 => [
                'id' => '1979595',
                'vendor_name' => 'Reyes Coca Cola Bottling',
              ],
              2 => [
                'id' => '1979349',
                'vendor_name' => 'Liberty Coca-Cola',
              ],
              3 => [
                'id' => '1979331',
                'vendor_name' => 'COCA COLA BEV NORTHEAST',
              ],
              4 => [
                'id' => '1979272',
                'vendor_name' => 'Gusto Beverage',
              ],
              5 => [
                'id' => '1978795',
                'vendor_name' => 'ABARTA Coca-Cola Beverage',
              ],
              6 => [
                'id' => '1977878',
                'vendor_name' => 'Timber Country Coca-Cola',
              ],
              7 => [
                'id' => '1977509',
                'vendor_name' => 'Coca-Cola Southwest',
              ],
              8 => [
                'id' => '1976591',
                'vendor_name' => 'Heartland Coca-Cola',
              ],
              9 => [
                'id' => '1976428',
                'vendor_name' => 'Clark Beverage Group',
              ],
              10 => [
                'id' => '1976029',
                'vendor_name' => 'Coca-Cola BottlingHawaii',
              ],
              11 => [
                'id' => '1974775',
                'vendor_name' => 'CocaCola Beverages Duluth',
              ],
              12 => [
                'id' => '1974689',
                'vendor_name' => 'Swire Pacific Holdings, I',
              ],
              13 => [
                'id' => '1972850',
                'vendor_name' => 'Coca Cola Swire CONA',
              ],
              14 => [
                'id' => '1717994',
                'vendor_name' => 'COCACOLA RAPID CITY',
              ],
              15 => [
                'id' => '1717842',
                'vendor_name' => 'COCACOLA VIKING',
              ],
              16 => [
                'id' => '1717839',
                'vendor_name' => 'COCACOLA SACRAMENTO',
              ],
              17 => [
                'id' => '1717758',
                'vendor_name' => 'COCACOLA KOKOMO',
              ],
              18 => [
                'id' => '1717664',
                'vendor_name' => 'COCA COLA REFRESHMENTSUSA',
              ],
              19 => [
                'id' => '1717512',
                'vendor_name' => 'COCACOLA COLUMBUS',
              ],
              20 => [
                'id' => '1717350',
                'vendor_name' => 'COCACOLA TRI-CITIES',
              ],
              21 => [
                'id' => '1717208',
                'vendor_name' => 'COCACOLA CHARLOTTE',
              ],
              22 => [
                'id' => '1717046',
                'vendor_name' => 'COCACOLA SWIRE USA',
              ],
              23 => [
                'id' => '1717033',
                'vendor_name' => 'COCACOLA VIRGINIA MN',
              ],
              24 => [
                'id' => '1716966',
                'vendor_name' => 'COCACOLA BEMIDJI',
              ],
              25 => [
                'id' => '1664490',
                'vendor_name' => 'COCACOLA CHESTERMAN CO',
              ],
              26 => [
                'id' => '1336870',
                'vendor_name' => 'CORINTH COCA COLA',
              ],
              27 => [
                'id' => '1334788',
                'vendor_name' => 'GREAT LAKES COCA-COLA DST',
              ],
              28 => [
                'id' => '1334775',
                'vendor_name' => 'COCA-COLA BEV FLORIDA LLC',
              ],
              29 => [
                'id' => '1332900',
                'vendor_name' => 'MAUI SODA & ICE WORKS LTD',
              ],
              30 => [
                'id' => '1317378',
                'vendor_name' => 'COCA COLA BOTTLING CO',
              ],
              31 => [
                'id' => '1315341',
                'vendor_name' => 'COCA-COLA UNITED CONA',
              ],
              32 => [
                'id' => '1272112',
                'vendor_name' => 'RED BULL DIST CO.OF DENV',
              ],
              33 => [
                'id' => '1268391',
                'vendor_name' => 'CLARK BEVERAGE GROUP',
              ],
              34 => [
                'id' => '1267046',
                'vendor_name' => 'COCACOLA-KONA',
              ],
              35 => [
                'id' => '1254444',
                'vendor_name' => 'COCACOLA CCE-HAWAII',
              ],
              36 => [
                'id' => '1244205',
                'vendor_name' => 'COCA-COLA FORT SMITH',
              ],
              37 => [
                'id' => '1242744',
                'vendor_name' => 'COCA-COLA ODOM CORP',
              ],
              38 => [
                'id' => '1229660',
                'vendor_name' => 'COCACOLA ATLANTIC BTLG',
              ],
              39 => [
                'id' => '1227468',
                'vendor_name' => 'COCA-COLA DECATUR',
              ],
              40 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              41 => [
                'id' => '1126475',
                'vendor_name' => 'COCACOLA DURHAM',
              ],
              42 => [
                'id' => '1110180',
                'vendor_name' => 'COCACOLA LEHIGH VALLEY',
              ],
              43 => [
                'id' => '1100417',
                'vendor_name' => 'COCACOLA ROCKHILL',
              ],
              44 => [
                'id' => '1097656',
                'vendor_name' => 'COCACOLA CEDAR CITY',
              ],
              45 => [
                'id' => '1097122',
                'vendor_name' => 'COCACOLA CHAMBERS BOTTLNG',
              ],
              46 => [
                'id' => '1089266',
                'vendor_name' => 'COCA-COLA BTL CO UNITED',
              ],
              47 => [
                'id' => '1079535',
                'vendor_name' => 'GUSTO BEVERAGE CO',
              ],
              48 => [
                'id' => '1074970',
                'vendor_name' => 'COCACOLA LEHRKINDS',
              ],
              49 => [
                'id' => '1069419',
                'vendor_name' => 'COCACOLA NO. NEW ENGLAND',
              ],
              50 => [
                'id' => '1060285',
                'vendor_name' => 'COCACOLA COATESVILLE',
              ],
              51 => [
                'id' => '1051265',
                'vendor_name' => 'COCACOLA PHILADELPHIA',
              ],
              52 => [
                'id' => '1051210',
                'vendor_name' => 'COCACOLA WINONA',
              ],
              53 => [
                'id' => '1050732',
                'vendor_name' => 'COCACOLA SANTA FE',
              ],
              54 => [
                'id' => '1034868',
                'vendor_name' => 'COCACOLA OZARKS/DRPEPPER',
              ],
              55 => [
                'id' => '1031337',
                'vendor_name' => 'COCACOLA JEFFERSON',
              ],
              56 => [
                'id' => '1026708',
                'vendor_name' => 'COCACOLA CLEVELAND',
              ],
              57 => [
                'id' => '1026407',
                'vendor_name' => 'COCACOLA DURANGO',
              ],
              58 => [
                'id' => '1018800',
                'vendor_name' => 'COCACOLA TULLAHOMA',
              ],
              59 => [
                'id' => '1018321',
                'vendor_name' => 'COCACOLA LUFKIN',
              ],
              60 => [
                'id' => '1017953',
                'vendor_name' => 'COCACOLA W KENTUCKY',
              ],
              61 => [
                'id' => '1017209',
                'vendor_name' => 'COCACOLA BUFFALO',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '12953464',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 211.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 211.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 5.89,
            'default_price' => false,
            'external_system_id' => '12953464-911-5.89-2021081817',
            'formatted_current_price' => '$5.89',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 5.89,
          ],
          'promotions' => [
            0 => [
              'promotion_id' => '468858846',
              'plp_message' => 'Buy 3 for $14 with same-day order services',
              'promotion_class' => 'Mandated Multiple',
              'circle_offer' => false,
            ],
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.63,
                'count' => 6790,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 43,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        17 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '271-90-0216',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/coca-cola-20-fl-oz-bottle/-/A-12953529',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_7819ee30-1f78-46ee-a21c-d2096f99ba42',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_ade58f01-b34f-4df9-bd38-9843c2e1922e',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '30',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_ca69ea48-b3c2-40aa-b266-83da5e28dde7',
                  'video_sequence' => '1',
                  'video_title' => 'Coca-Cola video',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 4,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Coca-Cola - 20 fl oz Bottle',
            ],
            'product_vendors' => [
              0 => [
                'id' => '3648087',
                'vendor_name' => 'COCACOLA GREAT PLAINS',
              ],
              1 => [
                'id' => '1979595',
                'vendor_name' => 'Reyes Coca Cola Bottling',
              ],
              2 => [
                'id' => '1979349',
                'vendor_name' => 'Liberty Coca-Cola',
              ],
              3 => [
                'id' => '1979331',
                'vendor_name' => 'COCA COLA BEV NORTHEAST',
              ],
              4 => [
                'id' => '1979272',
                'vendor_name' => 'Gusto Beverage',
              ],
              5 => [
                'id' => '1978795',
                'vendor_name' => 'ABARTA Coca-Cola Beverage',
              ],
              6 => [
                'id' => '1977878',
                'vendor_name' => 'Timber Country Coca-Cola',
              ],
              7 => [
                'id' => '1977509',
                'vendor_name' => 'Coca-Cola Southwest',
              ],
              8 => [
                'id' => '1976591',
                'vendor_name' => 'Heartland Coca-Cola',
              ],
              9 => [
                'id' => '1976428',
                'vendor_name' => 'Clark Beverage Group',
              ],
              10 => [
                'id' => '1976029',
                'vendor_name' => 'Coca-Cola BottlingHawaii',
              ],
              11 => [
                'id' => '1974775',
                'vendor_name' => 'CocaCola Beverages Duluth',
              ],
              12 => [
                'id' => '1974689',
                'vendor_name' => 'Swire Pacific Holdings, I',
              ],
              13 => [
                'id' => '1972850',
                'vendor_name' => 'Coca Cola Swire CONA',
              ],
              14 => [
                'id' => '1717994',
                'vendor_name' => 'COCACOLA RAPID CITY',
              ],
              15 => [
                'id' => '1717842',
                'vendor_name' => 'COCACOLA VIKING',
              ],
              16 => [
                'id' => '1717839',
                'vendor_name' => 'COCACOLA SACRAMENTO',
              ],
              17 => [
                'id' => '1717758',
                'vendor_name' => 'COCACOLA KOKOMO',
              ],
              18 => [
                'id' => '1717732',
                'vendor_name' => 'COCACOLA CCE**MERGE**',
              ],
              19 => [
                'id' => '1717664',
                'vendor_name' => 'COCA COLA REFRESHMENTSUSA',
              ],
              20 => [
                'id' => '1717512',
                'vendor_name' => 'COCACOLA COLUMBUS',
              ],
              21 => [
                'id' => '1717350',
                'vendor_name' => 'COCACOLA TRI-CITIES',
              ],
              22 => [
                'id' => '1717208',
                'vendor_name' => 'COCACOLA CHARLOTTE',
              ],
              23 => [
                'id' => '1717075',
                'vendor_name' => 'COCACOLA CHATTANO--MERGE-',
              ],
              24 => [
                'id' => '1717059',
                'vendor_name' => 'COCACOLA CCE**MERGE**',
              ],
              25 => [
                'id' => '1717046',
                'vendor_name' => 'COCACOLA SWIRE USA',
              ],
              26 => [
                'id' => '1717033',
                'vendor_name' => 'COCACOLA VIRGINIA MN',
              ],
              27 => [
                'id' => '1716966',
                'vendor_name' => 'COCACOLA BEMIDJI',
              ],
              28 => [
                'id' => '1716953',
                'vendor_name' => 'COCACOLA CCE**MERGE**',
              ],
              29 => [
                'id' => '1664490',
                'vendor_name' => 'COCACOLA CHESTERMAN CO',
              ],
              30 => [
                'id' => '1336870',
                'vendor_name' => 'CORINTH COCA COLA',
              ],
              31 => [
                'id' => '1334788',
                'vendor_name' => 'GREAT LAKES COCA-COLA DST',
              ],
              32 => [
                'id' => '1334775',
                'vendor_name' => 'COCA-COLA BEV FLORIDA LLC',
              ],
              33 => [
                'id' => '1332900',
                'vendor_name' => 'MAUI SODA & ICE WORKS LTD',
              ],
              34 => [
                'id' => '1317378',
                'vendor_name' => 'COCA COLA BOTTLING CO',
              ],
              35 => [
                'id' => '1315341',
                'vendor_name' => 'COCA-COLA UNITED CONA',
              ],
              36 => [
                'id' => '1272112',
                'vendor_name' => 'RED BULL DIST CO.OF DENV',
              ],
              37 => [
                'id' => '1268391',
                'vendor_name' => 'CLARK BEVERAGE GROUP',
              ],
              38 => [
                'id' => '1267046',
                'vendor_name' => 'COCACOLA-KONA',
              ],
              39 => [
                'id' => '1254444',
                'vendor_name' => 'COCACOLA CCE-HAWAII',
              ],
              40 => [
                'id' => '1244205',
                'vendor_name' => 'COCA-COLA FORT SMITH',
              ],
              41 => [
                'id' => '1242744',
                'vendor_name' => 'COCA-COLA ODOM CORP',
              ],
              42 => [
                'id' => '1229660',
                'vendor_name' => 'COCACOLA ATLANTIC BTLG',
              ],
              43 => [
                'id' => '1227468',
                'vendor_name' => 'COCA-COLA DECATUR',
              ],
              44 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              45 => [
                'id' => '1126475',
                'vendor_name' => 'COCACOLA DURHAM',
              ],
              46 => [
                'id' => '1110180',
                'vendor_name' => 'COCACOLA LEHIGH VALLEY',
              ],
              47 => [
                'id' => '1100417',
                'vendor_name' => 'COCACOLA ROCKHILL',
              ],
              48 => [
                'id' => '1097656',
                'vendor_name' => 'COCACOLA CEDAR CITY',
              ],
              49 => [
                'id' => '1097122',
                'vendor_name' => 'COCACOLA CHAMBERS BOTTLNG',
              ],
              50 => [
                'id' => '1089266',
                'vendor_name' => 'COCA-COLA BTL CO UNITED',
              ],
              51 => [
                'id' => '1079535',
                'vendor_name' => 'GUSTO BEVERAGE CO',
              ],
              52 => [
                'id' => '1074970',
                'vendor_name' => 'COCACOLA LEHRKINDS',
              ],
              53 => [
                'id' => '1069419',
                'vendor_name' => 'COCACOLA NO. NEW ENGLAND',
              ],
              54 => [
                'id' => '1060285',
                'vendor_name' => 'COCACOLA COATESVILLE',
              ],
              55 => [
                'id' => '1051265',
                'vendor_name' => 'COCACOLA PHILADELPHIA',
              ],
              56 => [
                'id' => '1051249',
                'vendor_name' => 'COCACOLA AUGUSTA--MERGE--',
              ],
              57 => [
                'id' => '1051210',
                'vendor_name' => 'COCACOLA WINONA',
              ],
              58 => [
                'id' => '1050732',
                'vendor_name' => 'COCACOLA SANTA FE',
              ],
              59 => [
                'id' => '1034868',
                'vendor_name' => 'COCACOLA OZARKS/DRPEPPER',
              ],
              60 => [
                'id' => '1031337',
                'vendor_name' => 'COCACOLA JEFFERSON',
              ],
              61 => [
                'id' => '1026708',
                'vendor_name' => 'COCACOLA CLEVELAND',
              ],
              62 => [
                'id' => '1026407',
                'vendor_name' => 'COCACOLA DURANGO',
              ],
              63 => [
                'id' => '1018800',
                'vendor_name' => 'COCACOLA TULLAHOMA',
              ],
              64 => [
                'id' => '1018321',
                'vendor_name' => 'COCACOLA LUFKIN',
              ],
              65 => [
                'id' => '1017953',
                'vendor_name' => 'COCACOLA W KENTUCKY',
              ],
              66 => [
                'id' => '1017209',
                'vendor_name' => 'COCACOLA BUFFALO',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '12953529',
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 262.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 262.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.19,
            'default_price' => false,
            'external_system_id' => '12953529-911-2.19-2021110916',
            'formatted_current_price' => '$2.19',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 2.19,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.63,
                'count' => 6618,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 1,
              'block' => 'SC',
              'floor' => '01',
            ],
            1 => [
              'aisle' => 3,
              'block' => 'CL',
              'floor' => '01',
            ],
            2 => [
              'aisle' => 1,
              'block' => 'SC',
              'floor' => '01',
            ],
          ],
        ],
        18 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '271-95-0157',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/aquafina-pure-unflavored-water-20-fl-oz-bottle/-/A-12968797',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_f7ff7e7b-b485-446d-92eb-01d51113cc4d',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 4,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Aquafina Pure Unflavored Water - 20 fl oz Bottle',
            ],
            'product_vendors' => [
              0 => [
                'id' => '4224853',
                'vendor_name' => 'PEPSI-IND BREMERTON BTLG',
              ],
              1 => [
                'id' => '3759594',
                'vendor_name' => 'PEPSI-IND MISSOULA',
              ],
              2 => [
                'id' => '3759578',
                'vendor_name' => 'PEPSI-IND FLAGSTAFF',
              ],
              3 => [
                'id' => '3759507',
                'vendor_name' => 'PEPSI-IND COLUMBUS',
              ],
              4 => [
                'id' => '3759484',
                'vendor_name' => 'PEPSI-IND CORPUS CHRISTI',
              ],
              5 => [
                'id' => '3759390',
                'vendor_name' => 'PEPSI-IND BURLINGTON IA',
              ],
              6 => [
                'id' => '3759374',
                'vendor_name' => 'PEPSI-IND SCOTTS-MERGED-',
              ],
              7 => [
                'id' => '3759361',
                'vendor_name' => 'PEPSI-IND PASCO',
              ],
              8 => [
                'id' => '3759332',
                'vendor_name' => 'PEPSI-IND SPRINGFIELD',
              ],
              9 => [
                'id' => '3759316',
                'vendor_name' => 'PEPSI BTLG VENTURES/IDAHO',
              ],
              10 => [
                'id' => '3759303',
                'vendor_name' => 'PEPSI-IND MEDFO--MERGE--',
              ],
              11 => [
                'id' => '3759293',
                'vendor_name' => 'PEPSI-IND EUGENE',
              ],
              12 => [
                'id' => '3759251',
                'vendor_name' => 'PEPSI-IND DAVENPORT',
              ],
              13 => [
                'id' => '3759248',
                'vendor_name' => 'PEPSI-IND ROCK ISLAND',
              ],
              14 => [
                'id' => '3759219',
                'vendor_name' => 'PEPSI-IND MID WISC',
              ],
              15 => [
                'id' => '3759183',
                'vendor_name' => 'PEPSI-IND BEMIDJI',
              ],
              16 => [
                'id' => '3759141',
                'vendor_name' => 'PEPSI-IND HAMILTON',
              ],
              17 => [
                'id' => '3759125',
                'vendor_name' => 'PEPSI-WALTON',
              ],
              18 => [
                'id' => '3759028',
                'vendor_name' => 'PEPSI-IND VANCOUVER',
              ],
              19 => [
                'id' => '3758980',
                'vendor_name' => 'PEPSI-IND TOPEKA-MERGED-',
              ],
              20 => [
                'id' => '3758935',
                'vendor_name' => 'PEPSI-IND LAFAYETTE',
              ],
              21 => [
                'id' => '3758906',
                'vendor_name' => 'PEPSI-IND LEXINGTON',
              ],
              22 => [
                'id' => '3758841',
                'vendor_name' => 'PEPSI-IND ST CLOUD',
              ],
              23 => [
                'id' => '3758838',
                'vendor_name' => 'PEPSI-IND LOGANSPORT',
              ],
              24 => [
                'id' => '3758825',
                'vendor_name' => 'PEPSI-IND LINCOLN',
              ],
              25 => [
                'id' => '3758757',
                'vendor_name' => 'PEPSI-IND CASPER',
              ],
              26 => [
                'id' => '3758731',
                'vendor_name' => 'PEPSI-IND ROCHESTER',
              ],
              27 => [
                'id' => '3758728',
                'vendor_name' => 'PEPSI-IND BILLINGS',
              ],
              28 => [
                'id' => '3758702',
                'vendor_name' => 'PEPSI-IND CHEYENNE',
              ],
              29 => [
                'id' => '3758692',
                'vendor_name' => 'PEPSI-IND OSKALOOSA',
              ],
              30 => [
                'id' => '3758676',
                'vendor_name' => 'PEPSI-IND TALLAHASSEE',
              ],
              31 => [
                'id' => '3758663',
                'vendor_name' => 'PEPSI-IND DUBUQUE',
              ],
              32 => [
                'id' => '3758566',
                'vendor_name' => 'PEPSICOLA CHICAGO',
              ],
              33 => [
                'id' => '3758540',
                'vendor_name' => 'PEPSI-IND MIDAMERICA',
              ],
              34 => [
                'id' => '3758469',
                'vendor_name' => 'PEPSI-IND RAPID CITY',
              ],
              35 => [
                'id' => '3758430',
                'vendor_name' => 'PEPSI-IND CHAMPAIGN',
              ],
              36 => [
                'id' => '3758388',
                'vendor_name' => 'PEPSI-IND GREAT FALLS',
              ],
              37 => [
                'id' => '3593352',
                'vendor_name' => 'PEPSI-IND MINOT',
              ],
              38 => [
                'id' => '2982304',
                'vendor_name' => 'PEPSI-IND L&E BTLG',
              ],
              39 => [
                'id' => '2523527',
                'vendor_name' => 'PEPSI-IND S\'LAND-MERGED-',
              ],
              40 => [
                'id' => '2325411',
                'vendor_name' => 'PEPSI-IND GENERAL BEV',
              ],
              41 => [
                'id' => '2287229',
                'vendor_name' => 'PEPSI-IND G&M DIST',
              ],
              42 => [
                'id' => '2001037',
                'vendor_name' => 'Admiral Beverage NW Inc',
              ],
              43 => [
                'id' => '1303201',
                'vendor_name' => 'PEPSI BEVERAGES COMPANY',
              ],
              44 => [
                'id' => '1272112',
                'vendor_name' => 'RED BULL DIST CO.OF DENV',
              ],
              45 => [
                'id' => '1264418',
                'vendor_name' => 'ALLEN BEVERAGES, INC',
              ],
              46 => [
                'id' => '1257166',
                'vendor_name' => 'PEPSI-PBG HAWAII',
              ],
              47 => [
                'id' => '1252394',
                'vendor_name' => 'PEPSI-WINDHAM',
              ],
              48 => [
                'id' => '1249815',
                'vendor_name' => 'PEPSI-IND G.BAKER DIST',
              ],
              49 => [
                'id' => '1227031',
                'vendor_name' => 'PEPSI-IND DECATUR',
              ],
              50 => [
                'id' => '1222599',
                'vendor_name' => 'PEPSI-IND NEW HAVEN',
              ],
              51 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              52 => [
                'id' => '1167230',
                'vendor_name' => 'PEPSI-IND REFRESHMENT SER',
              ],
              53 => [
                'id' => '1156720',
                'vendor_name' => 'PEPSI-IND FITZGERALD BRO',
              ],
              54 => [
                'id' => '1153309',
                'vendor_name' => 'ODOM CORP-COD',
              ],
              55 => [
                'id' => '1137998',
                'vendor_name' => 'PEPSI-PBG NORCAL',
              ],
              56 => [
                'id' => '1137956',
                'vendor_name' => 'PEPSI-PBG DALLAS',
              ],
              57 => [
                'id' => '1137930',
                'vendor_name' => 'PEPSI-PBG PITTSBURGH',
              ],
              58 => [
                'id' => '1137684',
                'vendor_name' => 'PEPSI-PBG SO CAL',
              ],
              59 => [
                'id' => '1137626',
                'vendor_name' => 'PEPSI-PBG SALT LAKE',
              ],
              60 => [
                'id' => '1137590',
                'vendor_name' => 'PEPSI-PBG FLORIDA',
              ],
              61 => [
                'id' => '1137558',
                'vendor_name' => 'PEPSI-PBG MICHIGAN',
              ],
              62 => [
                'id' => '1137545',
                'vendor_name' => 'PEPSI-PBG PHOENIX',
              ],
              63 => [
                'id' => '1137532',
                'vendor_name' => 'PEPSI-PBG BALTIMORE',
              ],
              64 => [
                'id' => '1137529',
                'vendor_name' => 'PEPSI-PBG OKLAHOMA',
              ],
              65 => [
                'id' => '1137419',
                'vendor_name' => 'PEPSI-PBG OMAHA',
              ],
              66 => [
                'id' => '1137406',
                'vendor_name' => 'PEPSI-PBG MINNEAPOLIS',
              ],
              67 => [
                'id' => '1137309',
                'vendor_name' => 'PEPSI-PBG DENVER',
              ],
              68 => [
                'id' => '1137215',
                'vendor_name' => 'PEPSI-PBG SANANTONIO/HOUS',
              ],
              69 => [
                'id' => '1137118',
                'vendor_name' => 'PEPSI-IND LAKESIDE',
              ],
              70 => [
                'id' => '1136164',
                'vendor_name' => 'PEPSI-PAS KANSAS CITY/STL',
              ],
              71 => [
                'id' => '1134564',
                'vendor_name' => 'PEPSI-PAS MEMPHIS',
              ],
              72 => [
                'id' => '1134535',
                'vendor_name' => 'PEPSI-PAS CIN/DAYTON/INDY',
              ],
              73 => [
                'id' => '1133879',
                'vendor_name' => 'PEPSI-PAS WISC./ILLINOIS',
              ],
              74 => [
                'id' => '1129993',
                'vendor_name' => 'PEPSI-IND LEADER DIST SYS',
              ],
              75 => [
                'id' => '1119259',
                'vendor_name' => 'PEPSI-IND KALISPELL',
              ],
              76 => [
                'id' => '1109832',
                'vendor_name' => 'PEPSI-IND FLORENCE',
              ],
              77 => [
                'id' => '1101319',
                'vendor_name' => 'PEPSI-IND MARYSVILLE',
              ],
              78 => [
                'id' => '1099308',
                'vendor_name' => 'PEPSI-IND BRISTOL',
              ],
              79 => [
                'id' => '1097465',
                'vendor_name' => 'PEPSI-IND GREEN BAY',
              ],
              80 => [
                'id' => '1094138',
                'vendor_name' => 'BUFFALO ROCK COMPANY',
              ],
              81 => [
                'id' => '1088005',
                'vendor_name' => 'PEPSI-IND WORCESTER',
              ],
              82 => [
                'id' => '1087530',
                'vendor_name' => 'PEPSI-BR BUFFALO ROCK',
              ],
              83 => [
                'id' => '1075555',
                'vendor_name' => 'PEPSI-PBV DELMARVA',
              ],
              84 => [
                'id' => '1074873',
                'vendor_name' => 'PEPSI-IND HARRINGTON BTLG',
              ],
              85 => [
                'id' => '1069406',
                'vendor_name' => 'PEPSI-IND HICKORY',
              ],
              86 => [
                'id' => '1065837',
                'vendor_name' => 'PEPSI-IND GREENVILLE SC',
              ],
              87 => [
                'id' => '1059982',
                'vendor_name' => 'PEPSI-IND GENEVA CLUB',
              ],
              88 => [
                'id' => '1059542',
                'vendor_name' => 'PEPSI-IND NEW YORK',
              ],
              89 => [
                'id' => '1056820',
                'vendor_name' => 'PEPSI-IND HUDSON VALLEY',
              ],
              90 => [
                'id' => '1050033',
                'vendor_name' => 'PEPSI-IND WEINSTEIN BEV',
              ],
              91 => [
                'id' => '1047127',
                'vendor_name' => 'PEPSI-IND OGDEN',
              ],
              92 => [
                'id' => '1047114',
                'vendor_name' => 'PEPSI-IND PROVO',
              ],
              93 => [
                'id' => '1046348',
                'vendor_name' => 'PEPSI-IND MADISON',
              ],
              94 => [
                'id' => '1046296',
                'vendor_name' => 'PEPSI-IND IDAHO FALLS',
              ],
              95 => [
                'id' => '1041259',
                'vendor_name' => 'PEPSI-IND HAVRE DE GRACE',
              ],
              96 => [
                'id' => '1040674',
                'vendor_name' => 'PEPSI-IND GREENVILLE NC',
              ],
              97 => [
                'id' => '1033704',
                'vendor_name' => 'PEPSI-IND YAKIMA',
              ],
              98 => [
                'id' => '1033694',
                'vendor_name' => 'PEPSI-IND CENTRAL VA',
              ],
              99 => [
                'id' => '1031447',
                'vendor_name' => 'PEPSI-IND SAFFORD',
              ],
              100 => [
                'id' => '1025259',
                'vendor_name' => 'PEPSI-IND NEW JERSEY',
              ],
              101 => [
                'id' => '1016394',
                'vendor_name' => 'MERGED  PEPSI-IND CONWAY',
              ],
              102 => [
                'id' => '1016381',
                'vendor_name' => 'PEPSI BOTTLING VENTURES',
              ],
              103 => [
                'id' => '1010866',
                'vendor_name' => 'PEPSI-IND NORFOLK',
              ],
              104 => [
                'id' => '1010837',
                'vendor_name' => 'PEPSI-IND SALINA',
              ],
              105 => [
                'id' => '1003844',
                'vendor_name' => 'PEPSI-PBV MEADOW--MERGE--',
              ],
              106 => [
                'id' => '1002201',
                'vendor_name' => 'PEPSI-IND JACKSON',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '12968797',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 128.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 128.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.19,
            'default_price' => false,
            'external_system_id' => '12968797-911-2.19-2021091717',
            'formatted_current_price' => '$2.19',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 2.19,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.51,
                'count' => 37,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 11,
              'block' => 'CL',
              'floor' => '01',
            ],
          ],
        ],
        19 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '267-01-4053',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/lemon-each/-/A-15013629',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_3d962311-4a0b-47f9-8146-28740dfa2d53',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Lemon - each',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1980783',
                'vendor_name' => 'Pro Citrus Network, Inc.',
              ],
              1 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              2 => [
                'id' => '1973799',
                'vendor_name' => 'William H. Kopke Jr., Inc',
              ],
              3 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              4 => [
                'id' => '1310731',
                'vendor_name' => 'WONDERFUL CITRUS',
              ],
              5 => [
                'id' => '1296554',
                'vendor_name' => 'BEE SWEET CITRUS INC',
              ],
              6 => [
                'id' => '1283761',
                'vendor_name' => 'INDIANAPOLIS FRUIT CO',
              ],
              7 => [
                'id' => '1283075',
                'vendor_name' => 'LANCASTER FOODS LLC',
              ],
              8 => [
                'id' => '1283033',
                'vendor_name' => 'TESTA PRODUCE INC',
              ],
              9 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              10 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              11 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              12 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              13 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              14 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              15 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              16 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              17 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              18 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              19 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              20 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              21 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              22 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              23 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              24 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              25 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              26 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              27 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              28 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              29 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              30 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              31 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              32 => [
                'id' => '1227015',
                'vendor_name' => 'CH ROBINSON-WORLDWIDE INC',
              ],
              33 => [
                'id' => '1221095',
                'vendor_name' => 'BAKKER PRODUCE',
              ],
              34 => [
                'id' => '1219353',
                'vendor_name' => 'SUNKIST GROWERS INC - DFD',
              ],
              35 => [
                'id' => '1219133',
                'vendor_name' => 'DNE WORLD FRUIT LLC DFD',
              ],
              36 => [
                'id' => '1218710',
                'vendor_name' => 'SUN PACIFIC - DFD',
              ],
              37 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              38 => [
                'id' => '1146280',
                'vendor_name' => 'CAPITOL CITY PRODUCE CO',
              ],
              39 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              40 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              41 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '15013629',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 18.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 18.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.59,
            'default_price' => false,
            'external_system_id' => '15013629-911-0.59-2021061622',
            'formatted_current_price' => '$0.59',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 0.59,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 4.23,
                'count' => 75,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 9,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        20 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '266-08-0007',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/strawberries-2lb/-/A-17296921',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_66cd1155-2529-4ab6-88d4-e54523ff4cae',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Strawberries - 2lb',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1987529',
                'vendor_name' => 'Corona Family Farms, Inc',
              ],
              1 => [
                'id' => '1985869',
                'vendor_name' => 'Blazer Wilkinson',
              ],
              2 => [
                'id' => '1983291',
                'vendor_name' => 'Better Produce, Inc.',
              ],
              3 => [
                'id' => '1983053',
                'vendor_name' => 'JDB PRO INC dba Central W',
              ],
              4 => [
                'id' => '1981774',
                'vendor_name' => 'S.C. Critchley. Inc.',
              ],
              5 => [
                'id' => '1980673',
                'vendor_name' => 'Always Fresh Farms LLC',
              ],
              6 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              7 => [
                'id' => '1978249',
                'vendor_name' => 'North Bay Produce',
              ],
              8 => [
                'id' => '1978201',
                'vendor_name' => 'Family Tree Farms',
              ],
              9 => [
                'id' => '1977831',
                'vendor_name' => 'Wishnatzki, Inc',
              ],
              10 => [
                'id' => '1976435',
                'vendor_name' => 'Red Blossom Inc.',
              ],
              11 => [
                'id' => '1972829',
                'vendor_name' => 'California Giant, Inc.',
              ],
              12 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              13 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              14 => [
                'id' => '1273030',
                'vendor_name' => 'SUN BELLE INC.',
              ],
              15 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              16 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              17 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              18 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              19 => [
                'id' => '1262119',
                'vendor_name' => 'SUISAN COMPANY',
              ],
              20 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              21 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              22 => [
                'id' => '1237209',
                'vendor_name' => 'NATURIPE FARMS',
              ],
              23 => [
                'id' => '1228470',
                'vendor_name' => 'ASTIN STRAWBERRY EXCHANGE',
              ],
              24 => [
                'id' => '1219450',
                'vendor_name' => 'DRISCOLL STRAWBERRY - DFD',
              ],
              25 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              26 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '17296921',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'UNAVAILABLE',
              'location_available_to_promise_quantity' => 15.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 15.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
                'ship_to_store' => [
                  'availability_status' => 'UNAVAILABLE',
                  'preferred_store_option_description' => 'Ship To Store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 8.59,
            'default_price' => false,
            'external_system_id' => '17296921-911-8.59-2021120805',
            'formatted_current_price' => '$8.59',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 8.59,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 2.85,
                'count' => 59,
              ],
            ],
          ],
        ],
        21 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '266-08-4054',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/driscoll-s-raspberries-6oz-package/-/A-13208899',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_16ebad26-b7b3-4dd0-80a9-92866fc98c41',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_d2779352-9c13-4ed2-9e38-ac6dd4a1a2c7',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '35',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_2c91f55c-054d-4e00-8ecf-a3778923a369',
                  'video_sequence' => '1',
                  'video_title' => 'G&G Yogurt Bark',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Driscoll\'s Raspberries - 6oz Package',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1981774',
                'vendor_name' => 'S.C. Critchley. Inc.',
              ],
              1 => [
                'id' => '1980673',
                'vendor_name' => 'Always Fresh Farms LLC',
              ],
              2 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              3 => [
                'id' => '1980451',
                'vendor_name' => 'Alpine Fresh, Inc',
              ],
              4 => [
                'id' => '1980010',
                'vendor_name' => 'Meridian Fine Foods, LLC',
              ],
              5 => [
                'id' => '1978249',
                'vendor_name' => 'North Bay Produce',
              ],
              6 => [
                'id' => '1978201',
                'vendor_name' => 'Family Tree Farms',
              ],
              7 => [
                'id' => '1977831',
                'vendor_name' => 'Wishnatzki, Inc',
              ],
              8 => [
                'id' => '1972829',
                'vendor_name' => 'California Giant, Inc.',
              ],
              9 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              10 => [
                'id' => '1313589',
                'vendor_name' => 'CASTELLINI COMPANY LLC',
              ],
              11 => [
                'id' => '1283761',
                'vendor_name' => 'INDIANAPOLIS FRUIT CO',
              ],
              12 => [
                'id' => '1283075',
                'vendor_name' => 'LANCASTER FOODS LLC',
              ],
              13 => [
                'id' => '1283033',
                'vendor_name' => 'TESTA PRODUCE INC',
              ],
              14 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              15 => [
                'id' => '1273030',
                'vendor_name' => 'SUN BELLE INC.',
              ],
              16 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              17 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              18 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              19 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              20 => [
                'id' => '1262119',
                'vendor_name' => 'SUISAN COMPANY',
              ],
              21 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              22 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              23 => [
                'id' => '1251230',
                'vendor_name' => 'OK PRODUCE',
              ],
              24 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              25 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              26 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              27 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              28 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              29 => [
                'id' => '1237209',
                'vendor_name' => 'NATURIPE FARMS',
              ],
              30 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              31 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              32 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              33 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              34 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              35 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              36 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              37 => [
                'id' => '1233478',
                'vendor_name' => 'LIBERTY FRUIT COMPANY',
              ],
              38 => [
                'id' => '1233232',
                'vendor_name' => 'BUDDY\'S PRODUCE',
              ],
              39 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              40 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              41 => [
                'id' => '1231441',
                'vendor_name' => 'SANTA MARIA PRODUCE',
              ],
              42 => [
                'id' => '1231179',
                'vendor_name' => 'KEVIN GUIDRY PRODUCE',
              ],
              43 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              44 => [
                'id' => '1229259',
                'vendor_name' => 'NOGALES PRODUCE',
              ],
              45 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              46 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              47 => [
                'id' => '1227015',
                'vendor_name' => 'CH ROBINSON-WORLDWIDE INC',
              ],
              48 => [
                'id' => '1221095',
                'vendor_name' => 'BAKKER PRODUCE',
              ],
              49 => [
                'id' => '1219450',
                'vendor_name' => 'DRISCOLL STRAWBERRY - DFD',
              ],
              50 => [
                'id' => '1216877',
                'vendor_name' => 'DAVID OPPENHEIMER & C-DFD',
              ],
              51 => [
                'id' => '1213676',
                'vendor_name' => 'STORE ONLY DUMMY VENDOR',
              ],
              52 => [
                'id' => '1146280',
                'vendor_name' => 'CAPITOL CITY PRODUCE CO',
              ],
              53 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              54 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              55 => [
                'id' => '1034800',
                'vendor_name' => 'SUPERVALU NATIONAL',
              ],
              56 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '13208899',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 44.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 44.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 2.69,
            'default_price' => false,
            'external_system_id' => '13208899-911-2.69-2021112505',
            'formatted_current_price' => '$2.69',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 2.69,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 2.68,
                'count' => 207,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        22 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '267-01-4048',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/lime-each/-/A-15026731',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_3e3023d6-31c9-4a50-8d1e-a5a5719448ae',
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Lime - each',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1980532',
                'vendor_name' => 'Armstrong Produce, LTD',
              ],
              1 => [
                'id' => '1979876',
                'vendor_name' => 'Limonik Produce',
              ],
              2 => [
                'id' => '1334034',
                'vendor_name' => 'KULA PRODUCE',
              ],
              3 => [
                'id' => '1283761',
                'vendor_name' => 'INDIANAPOLIS FRUIT CO',
              ],
              4 => [
                'id' => '1283075',
                'vendor_name' => 'LANCASTER FOODS LLC',
              ],
              5 => [
                'id' => '1283033',
                'vendor_name' => 'TESTA PRODUCE INC',
              ],
              6 => [
                'id' => '1282296',
                'vendor_name' => 'CHARLIE\'S PRODUCE',
              ],
              7 => [
                'id' => '1264366',
                'vendor_name' => 'C.H. ROBINSON - DSD',
              ],
              8 => [
                'id' => '1263529',
                'vendor_name' => 'WHOLESALE PROD SUPPLY CO',
              ],
              9 => [
                'id' => '1263516',
                'vendor_name' => 'CH ROBINSON - LOCAL',
              ],
              10 => [
                'id' => '1262766',
                'vendor_name' => 'HILO PRODUCTS INC',
              ],
              11 => [
                'id' => '1257483',
                'vendor_name' => 'COAST PRODUCE COMPANY',
              ],
              12 => [
                'id' => '1254402',
                'vendor_name' => 'PEDDLERS SON PRODUCE CO.',
              ],
              13 => [
                'id' => '1251913',
                'vendor_name' => 'JAMES D. SWOISH, INC.',
              ],
              14 => [
                'id' => '1251230',
                'vendor_name' => 'OK PRODUCE',
              ],
              15 => [
                'id' => '1247008',
                'vendor_name' => 'TOM LANGE CO. INC.',
              ],
              16 => [
                'id' => '1243882',
                'vendor_name' => 'VINYARD FRUIT & VEGETABLE',
              ],
              17 => [
                'id' => '1240555',
                'vendor_name' => 'W.R. VERNON PRODUCE INC',
              ],
              18 => [
                'id' => '1239773',
                'vendor_name' => 'FRESHPOINT A-ONE-A',
              ],
              19 => [
                'id' => '1237364',
                'vendor_name' => 'ADAMS PRODUCE CO, INC',
              ],
              20 => [
                'id' => '1236734',
                'vendor_name' => 'NICKEY GREGORY CO',
              ],
              21 => [
                'id' => '1236695',
                'vendor_name' => 'FORD\'S PRODUCE',
              ],
              22 => [
                'id' => '1236161',
                'vendor_name' => 'GENERAL PRODUCE INC-DFD',
              ],
              23 => [
                'id' => '1234804',
                'vendor_name' => 'FRESHPOINT WEST FLORIDA',
              ],
              24 => [
                'id' => '1234765',
                'vendor_name' => 'FRESHPOINT_CENTRAL FL',
              ],
              25 => [
                'id' => '1234493',
                'vendor_name' => 'FRESHPOINT NORTH FLORIDA',
              ],
              26 => [
                'id' => '1234477',
                'vendor_name' => 'TODD\'S QUALITY TOMATOES',
              ],
              27 => [
                'id' => '1233478',
                'vendor_name' => 'LIBERTY FRUIT COMPANY',
              ],
              28 => [
                'id' => '1233232',
                'vendor_name' => 'BUDDY\'S PRODUCE',
              ],
              29 => [
                'id' => '1232217',
                'vendor_name' => 'DEL MONTE FRESH PRODUCE',
              ],
              30 => [
                'id' => '1231975',
                'vendor_name' => 'TULSA FRUIT AND VEGETABLE',
              ],
              31 => [
                'id' => '1231441',
                'vendor_name' => 'SANTA MARIA PRODUCE',
              ],
              32 => [
                'id' => '1231179',
                'vendor_name' => 'KEVIN GUIDRY PRODUCE',
              ],
              33 => [
                'id' => '1229903',
                'vendor_name' => 'BROTHERS PRODUCE',
              ],
              34 => [
                'id' => '1229259',
                'vendor_name' => 'NOGALES PRODUCE',
              ],
              35 => [
                'id' => '1228467',
                'vendor_name' => 'COMBS PRODUCE',
              ],
              36 => [
                'id' => '1228438',
                'vendor_name' => 'B CATALANI INC',
              ],
              37 => [
                'id' => '1221095',
                'vendor_name' => 'BAKKER PRODUCE',
              ],
              38 => [
                'id' => '1219353',
                'vendor_name' => 'SUNKIST GROWERS INC - DFD',
              ],
              39 => [
                'id' => '1219133',
                'vendor_name' => 'DNE WORLD FRUIT LLC DFD',
              ],
              40 => [
                'id' => '1146280',
                'vendor_name' => 'CAPITOL CITY PRODUCE CO',
              ],
              41 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
              42 => [
                'id' => '1136274',
                'vendor_name' => 'FRESHPACK PRODUCE INC',
              ],
              43 => [
                'id' => '1008218',
                'vendor_name' => 'A & Z PRODUCE COMPANY',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '15026731',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 563.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 563.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 0.35,
            'default_price' => false,
            'external_system_id' => '15026731-911-0.35-2021081112',
            'formatted_current_price' => '$0.35',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 0.35,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.52,
                'count' => 60,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 9,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
        23 => [
          'item' => [
            'assigned_selling_channels_code' => 'stores_only',
            'dpci' => '211-15-0017',
            'enrichment' => [
              'buy_url' => 'https://www.target.com/p/baby-cut-carrots-1lb-good-38-gather-8482/-/A-54556735',
              'images' => [
                'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_abaa4c53-5fd7-4a83-8275-e21fa71e5e16',
              ],
              'videos' => [
                0 => [
                  'video_captions' => [
                    0 => [
                      'caption_url' => 'https://target.scene7.com/is/content/Target/GUEST_a54afff7-366e-4605-8863-7af956200539',
                      'language' => 'EN',
                    ],
                  ],
                  'video_files' => [
                    0 => [
                      'mime_type' => 'video/mp4',
                      'video_height_pixels' => '720',
                      'video_url' => 'https://target.scene7.com/is/content/Target/GUEST_79ce3d45-1dd0-41f4-8678-8c13d2582e52_Flash9_Autox720p_2600k',
                    ],
                  ],
                  'video_length_seconds' => '18',
                  'video_poster_image' => 'https://target.scene7.com/is/image/Target/GUEST_751e4096-ceef-4de3-b702-65efcaa84c5f',
                  'video_sequence' => '1',
                  'video_title' => 'Good & Gather™ Baby-Cut Carrots - 1lb',
                  'is_list_page_eligible' => false,
                ],
              ],
            ],
            'eligibility_rules' => [
            ],
            'fulfillment' => [
              'purchase_limit' => 10,
            ],
            'handling' => [
              'buy_unit_of_measure' => 'Each',
            ],
            'item_state' => 'READY_FOR_LAUNCH',
            'product_description' => [
              'title' => 'Baby-Cut Carrots - 1lb - Good &#38; Gather&#8482;',
            ],
            'product_vendors' => [
              0 => [
                'id' => '1286218',
                'vendor_name' => 'GRIMMWAY FARMS',
              ],
              1 => [
                'id' => '1216958',
                'vendor_name' => 'BOLTHOUSE FARMS - DFD',
              ],
              2 => [
                'id' => '1142161',
                'vendor_name' => 'C & S WHOLESALE GROCERS',
              ],
            ],
            'relationship_type_code' => 'SA',
            'tcin' => '54556735',
          ],
          'circle_offers' => [
            'circle_offer_details' => [
            ],
          ],
          'fulfillment' => [
            'scheduled_delivery' => [
              'availability_status' => 'IN_STOCK',
              'location_available_to_promise_quantity' => 169.0,
              'location_id' => '911',
              'location_name' => 'Blackstone and Nees Ave',
            ],
            'shipping_options' => [
              'reason_code' => 'INVENTORY_UNAVAILABLE',
              'availability_status' => 'OUT_OF_STOCK',
              'loyalty_availability_status' => 'OUT_OF_STOCK',
              'available_to_promise_quantity' => 0.0,
              'services' => [
              ],
            ],
            'store_options' => [
              0 => [
                'location_available_to_promise_quantity' => 169.0,
                'location_id' => '911',
                'location_name' => 'Blackstone and Nees Ave',
                'search_response_store_type' => 'PRIMARY',
                'curbside' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Curbside',
                ],
                'order_pickup' => [
                  'pickup_date' => '2021-12-21',
                  'guest_pick_sla' => 120,
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'Store Pickup',
                ],
                'in_store_only' => [
                  'availability_status' => 'IN_STOCK',
                  'preferred_store_option_description' => 'available in store',
                ],
              ],
            ],
          ],
          'price' => [
            'current_retail' => 1.19,
            'default_price' => false,
            'external_system_id' => '670768762',
            'formatted_current_price' => '$1.19',
            'formatted_current_price_type' => 'reg',
            'is_current_price_range' => false,
            'location_id' => 911,
            'msrp' => 0.0,
            'reg_retail' => 1.19,
          ],
          'promotions' => [
          ],
          'ratings_and_reviews' => [
            'statistics' => [
              'rating' => [
                'average' => 3.78,
                'count' => 131,
              ],
            ],
          ],
          'store_positions' => [
            0 => [
              'aisle' => 8,
              'block' => 'G',
              'floor' => '01',
            ],
          ],
        ],
      ],
      'search_response' => [
        'typed_metadata' => [
          'count' => 20,
          'current_page' => 1,
          'offset' => 0,
          'total_pages' => 60,
          'total_results' => 12927,
        ],
        'bread_crumb_list' => [
          0 => [
            'bread_crumb_values' => [
              0 => [
                'index' => 0,
                'label' => 'Target',
              ],
              1 => [
                'category_id' => '5xt1a',
                'index' => 1,
                'label' => 'Grocery',
              ],
            ],
          ],
        ],
        'facet_list' => [
          0 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => 'Pantry',
                'url' => '/c/pantry-grocery/-/N-5xt13',
                'value' => '5xt13',
              ],
              1 => [
                'descriptor' => false,
                'display_name' => 'Snacks',
                'url' => '/c/snacks-grocery/-/N-5xsy9',
                'value' => '5xsy9',
              ],
              2 => [
                'descriptor' => false,
                'display_name' => 'Beverages',
                'url' => '/c/beverages-grocery/-/N-5xt0r',
                'value' => '5xt0r',
              ],
              3 => [
                'descriptor' => false,
                'display_name' => 'Frozen Foods',
                'url' => '/c/frozen-foods-grocery/-/N-5xszd',
                'value' => '5xszd',
              ],
              4 => [
                'descriptor' => false,
                'display_name' => 'Candy',
                'url' => '/c/candy-grocery/-/N-5xt0d',
                'value' => '5xt0d',
              ],
              5 => [
                'descriptor' => false,
                'display_name' => 'Wine, Beer & Liquor',
                'url' => '/c/wine-beer-liquor-beverages/-/N-5n5q6',
                'value' => '5n5q6',
              ],
              6 => [
                'descriptor' => false,
                'display_name' => 'Dairy',
                'url' => '/c/dairy-grocery/-/N-5xszm',
                'value' => '5xszm',
              ],
              7 => [
                'descriptor' => false,
                'display_name' => 'Breakfast & Cereal',
                'url' => '/c/breakfast-cereal-grocery/-/N-wo2mp',
                'value' => 'wo2mp',
              ],
              8 => [
                'descriptor' => false,
                'display_name' => 'Produce',
                'url' => '/c/produce-grocery/-/N-u7fty',
                'value' => 'u7fty',
              ],
              9 => [
                'descriptor' => false,
                'display_name' => 'Deli',
                'url' => '/c/deli-grocery/-/N-5hp74',
                'value' => '5hp74',
              ],
              10 => [
                'descriptor' => false,
                'display_name' => 'Bakery & Bread',
                'url' => '/c/bakery-bread-grocery/-/N-5xt19',
                'value' => '5xt19',
              ],
              11 => [
                'descriptor' => false,
                'display_name' => 'Meat & Seafood',
                'url' => '/c/meat-seafood-grocery/-/N-5xsyh',
                'value' => '5xsyh',
              ],
              12 => [
                'descriptor' => false,
                'display_name' => 'On the Go Snacks',
                'url' => '/c/on-the-go-snacks-grocery/-/N-sapts',
                'value' => 'sapts',
              ],
              13 => [
                'descriptor' => false,
                'display_name' => 'Game Day Snacks',
                'url' => '/c/game-day-snacks-grocery/-/N-y1iwu',
                'value' => 'y1iwu',
              ],
            ],
            'display_name' => 'Category',
            'expand' => true,
            'name' => 'd_categorytaxonomy',
            'type' => 'url',
          ],
          1 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => 'buy online & pick up',
                'facet_id' => '5zl7w',
                'facet_canonical' => 'buy-online-pick-up',
                'url' => '/c/grocery/buy-online-pick-up/-/N-5xt1aZ5zl7w',
                'value' => 'buy online & pick up',
              ],
              1 => [
                'descriptor' => false,
                'display_name' => 'in stores',
                'facet_id' => '5zkty',
                'facet_canonical' => 'in-stores',
                'url' => '/c/grocery/in-stores/-/N-5xt1aZ5zkty',
                'value' => 'in stores',
              ],
              2 => [
                'descriptor' => false,
                'display_name' => 'shipping',
                'facet_id' => '5zktx',
                'facet_canonical' => 'shipping',
                'url' => '/c/grocery/shipping/-/N-5xt1aZ5zktx',
                'value' => 'shipping',
              ],
              3 => [
                'descriptor' => false,
                'display_name' => 'include out of stock',
                'facet_id' => 'fwtfr',
                'facet_canonical' => 'include-out-of-stock',
                'url' => '/c/grocery/include-out-of-stock/-/N-5xt1aZfwtfr',
                'value' => 'include out of stock',
              ],
              4 => [
                'descriptor' => false,
                'display_name' => 'same day delivery',
                'facet_id' => 'cl92v',
                'facet_canonical' => 'same-day-delivery',
                'url' => '/c/grocery/same-day-delivery/-/N-5xt1aZcl92v',
                'value' => 'same day delivery',
              ],
            ],
            'display_name' => 'Shipping & Pickup',
            'expand' => true,
            'name' => 'd_channel',
            'type' => 'checkbox',
          ],
          2 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => 'Organic',
                'facet_id' => 's2ozl',
                'facet_canonical' => 'organic',
                'url' => '/c/grocery/organic/-/N-5xt1aZs2ozl',
                'value' => '0000 organic',
              ],
              1 => [
                'descriptor' => false,
                'display_name' => 'Gluten-free',
                'facet_id' => 'b8gba',
                'facet_canonical' => 'gluten-free',
                'url' => '/c/grocery/gluten-free/-/N-5xt1aZb8gba',
                'value' => '0001 gluten-free',
              ],
              2 => [
                'descriptor' => false,
                'display_name' => 'Ketogenic',
                'facet_id' => '94abm',
                'facet_canonical' => 'ketogenic',
                'url' => '/c/grocery/ketogenic/-/N-5xt1aZ94abm',
                'value' => '0002 ketogenic',
              ],
              3 => [
                'descriptor' => false,
                'display_name' => 'Vegan',
                'facet_id' => '5zlg9',
                'facet_canonical' => 'vegan',
                'url' => '/c/grocery/vegan/-/N-5xt1aZ5zlg9',
                'value' => '0003 vegan',
              ],
              4 => [
                'descriptor' => false,
                'display_name' => 'Vegetarian',
                'facet_id' => '76zjq',
                'facet_canonical' => 'vegetarian',
                'url' => '/c/grocery/vegetarian/-/N-5xt1aZ76zjq',
                'value' => '0004 vegetarian',
              ],
              5 => [
                'descriptor' => false,
                'display_name' => 'Paleo',
                'facet_id' => 'k82bz',
                'facet_canonical' => 'paleo',
                'url' => '/c/grocery/paleo/-/N-5xt1aZk82bz',
                'value' => '0005 paleo',
              ],
              6 => [
                'descriptor' => false,
                'display_name' => 'Caffeine-free',
                'facet_id' => '4wmnq',
                'facet_canonical' => 'caffeine-free',
                'url' => '/c/grocery/caffeine-free/-/N-5xt1aZ4wmnq',
                'value' => '0006 caffeine-free',
              ],
              7 => [
                'descriptor' => false,
                'display_name' => 'Cage-free',
                'facet_id' => 'id28o',
                'facet_canonical' => 'cage-free',
                'url' => '/c/grocery/cage-free/-/N-5xt1aZid28o',
                'value' => '0007 cage-free',
              ],
              8 => [
                'descriptor' => false,
                'display_name' => 'Dash',
                'facet_id' => '5yezs',
                'facet_canonical' => 'dash',
                'url' => '/c/grocery/dash/-/N-5xt1aZ5yezs',
                'value' => '0008 dash',
              ],
              9 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Dairy',
                'facet_id' => 'oomgw',
                'facet_canonical' => 'does-not-contain-dairy',
                'url' => '/c/grocery/does-not-contain-dairy/-/N-5xt1aZoomgw',
                'value' => '0009 does not contain dairy',
              ],
              10 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Egg',
                'facet_id' => '72t0u',
                'facet_canonical' => 'does-not-contain-egg',
                'url' => '/c/grocery/does-not-contain-egg/-/N-5xt1aZ72t0u',
                'value' => '0010 does not contain egg',
              ],
              11 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Fish',
                'facet_id' => 'n47lj',
                'facet_canonical' => 'does-not-contain-fish',
                'url' => '/c/grocery/does-not-contain-fish/-/N-5xt1aZn47lj',
                'value' => '0011 does not contain fish',
              ],
              12 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Peanuts',
                'facet_id' => 'ra41v',
                'facet_canonical' => 'does-not-contain-peanuts',
                'url' => '/c/grocery/does-not-contain-peanuts/-/N-5xt1aZra41v',
                'value' => '0012 does not contain peanuts',
              ],
              13 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Shellfish',
                'facet_id' => 'hp7ub',
                'facet_canonical' => 'does-not-contain-shellfish',
                'url' => '/c/grocery/does-not-contain-shellfish/-/N-5xt1aZhp7ub',
                'value' => '0013 does not contain shellfish',
              ],
              14 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Soy',
                'facet_id' => 'beu0f',
                'facet_canonical' => 'does-not-contain-soy',
                'url' => '/c/grocery/does-not-contain-soy/-/N-5xt1aZbeu0f',
                'value' => '0014 does not contain soy',
              ],
              15 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Tree Nuts',
                'facet_id' => 'mxx6n',
                'facet_canonical' => 'does-not-contain-tree-nuts',
                'url' => '/c/grocery/does-not-contain-tree-nuts/-/N-5xt1aZmxx6n',
                'value' => '0015 does not contain tree nuts',
              ],
              16 => [
                'descriptor' => false,
                'display_name' => 'Does Not Contain Wheat',
                'facet_id' => 'r4bzo',
                'facet_canonical' => 'does-not-contain-wheat',
                'url' => '/c/grocery/does-not-contain-wheat/-/N-5xt1aZr4bzo',
                'value' => '0016 does not contain wheat',
              ],
              17 => [
                'descriptor' => false,
                'display_name' => 'Fat Free',
                'facet_id' => '1yzh2',
                'facet_canonical' => 'fat-free',
                'url' => '/c/grocery/fat-free/-/N-5xt1aZ1yzh2',
                'value' => '0017 fat free',
              ],
              18 => [
                'descriptor' => false,
                'display_name' => 'Free Range',
                'facet_id' => 'aj8do',
                'facet_canonical' => 'free-range',
                'url' => '/c/grocery/free-range/-/N-5xt1aZaj8do',
                'value' => '0018 free range',
              ],
              19 => [
                'descriptor' => false,
                'display_name' => 'Grain Free',
                'facet_id' => '9qcbg',
                'facet_canonical' => 'grain-free',
                'url' => '/c/grocery/grain-free/-/N-5xt1aZ9qcbg',
                'value' => '0019 grain free',
              ],
              20 => [
                'descriptor' => false,
                'display_name' => 'Halal',
                'facet_id' => '3a3nc',
                'facet_canonical' => 'halal',
                'url' => '/c/grocery/halal/-/N-5xt1aZ3a3nc',
                'value' => '0020 halal',
              ],
              21 => [
                'descriptor' => false,
                'display_name' => 'High Protein',
                'facet_id' => 'slv6s',
                'facet_canonical' => 'high-protein',
                'url' => '/c/grocery/high-protein/-/N-5xt1aZslv6s',
                'value' => '0021 high protein',
              ],
              22 => [
                'descriptor' => false,
                'display_name' => 'Kosher',
                'facet_id' => '5zlgb',
                'facet_canonical' => 'kosher',
                'url' => '/c/grocery/kosher/-/N-5xt1aZ5zlgb',
                'value' => '0023 kosher',
              ],
              23 => [
                'descriptor' => false,
                'display_name' => 'Lactose Free',
                'facet_id' => 'e5hem',
                'facet_canonical' => 'lactose-free',
                'url' => '/c/grocery/lactose-free/-/N-5xt1aZe5hem',
                'value' => '0024 lactose free',
              ],
              24 => [
                'descriptor' => false,
                'display_name' => 'Low Fat',
                'facet_id' => 'nghi2',
                'facet_canonical' => 'low-fat',
                'url' => '/c/grocery/low-fat/-/N-5xt1aZnghi2',
                'value' => '0025 low fat',
              ],
              25 => [
                'descriptor' => false,
                'display_name' => 'Low Sodium',
                'facet_id' => '7ct93',
                'facet_canonical' => 'low-sodium',
                'url' => '/c/grocery/low-sodium/-/N-5xt1aZ7ct93',
                'value' => '0026 low sodium',
              ],
              26 => [
                'descriptor' => false,
                'display_name' => 'Mediterranean',
                'facet_id' => '7fglg',
                'facet_canonical' => 'mediterranean',
                'url' => '/c/grocery/mediterranean/-/N-5xt1aZ7fglg',
                'value' => '0028 mediterranean',
              ],
              27 => [
                'descriptor' => false,
                'display_name' => 'No Added Antibiotics',
                'facet_id' => 'w05zt',
                'facet_canonical' => 'no-added-antibiotics',
                'url' => '/c/grocery/no-added-antibiotics/-/N-5xt1aZw05zt',
                'value' => '0029 no added antibiotics',
              ],
              28 => [
                'descriptor' => false,
                'display_name' => 'No Added Sugar',
                'facet_id' => 'y4fzi',
                'facet_canonical' => 'no-added-sugar',
                'url' => '/c/grocery/no-added-sugar/-/N-5xt1aZy4fzi',
                'value' => '0030 no added sugar',
              ],
              29 => [
                'descriptor' => false,
                'display_name' => 'No Animal By-products',
                'facet_id' => 'q5wpu',
                'facet_canonical' => 'no-animal-by-products',
                'url' => '/c/grocery/no-animal-by-products/-/N-5xt1aZq5wpu',
                'value' => '0031 no animal by-products',
              ],
              30 => [
                'descriptor' => false,
                'display_name' => 'No Artificial Colors',
                'facet_id' => 'bsqti',
                'facet_canonical' => 'no-artificial-colors',
                'url' => '/c/grocery/no-artificial-colors/-/N-5xt1aZbsqti',
                'value' => '0032 no artificial colors',
              ],
              31 => [
                'descriptor' => false,
                'display_name' => 'No Artificial Flavors',
                'facet_id' => '1ss9a',
                'facet_canonical' => 'no-artificial-flavors',
                'url' => '/c/grocery/no-artificial-flavors/-/N-5xt1aZ1ss9a',
                'value' => '0033 no artificial flavors',
              ],
              32 => [
                'descriptor' => false,
                'display_name' => 'No Artificial Flavors, Colors or Preservatives',
                'facet_id' => 'eix2t',
                'facet_canonical' => 'no-artificial-flavors-colors-or-preservatives',
                'url' => '/c/grocery/no-artificial-flavors-colors-or-preservatives/-/N-5xt1aZeix2t',
                'value' => '0034 no artificial flavors, colors or preservatives',
              ],
              33 => [
                'descriptor' => false,
                'display_name' => 'No Artificial Sweeteners',
                'facet_id' => 'wjj2k',
                'facet_canonical' => 'no-artificial-sweeteners',
                'url' => '/c/grocery/no-artificial-sweeteners/-/N-5xt1aZwjj2k',
                'value' => '0035 no artificial sweeteners',
              ],
              34 => [
                'descriptor' => false,
                'display_name' => 'No High Fructose Corn Syrup',
                'facet_id' => 'nnk9e',
                'facet_canonical' => 'no-high-fructose-corn-syrup',
                'url' => '/c/grocery/no-high-fructose-corn-syrup/-/N-5xt1aZnnk9e',
                'value' => '0036 no high fructose corn syrup',
              ],
              35 => [
                'descriptor' => false,
                'display_name' => 'No Preservatives',
                'facet_id' => 'imirm',
                'facet_canonical' => 'no-preservatives',
                'url' => '/c/grocery/no-preservatives/-/N-5xt1aZimirm',
                'value' => '0037 no preservatives',
              ],
              36 => [
                'descriptor' => false,
                'display_name' => 'Non-GMO',
                'facet_id' => 'sjhan',
                'facet_canonical' => 'non-gmo',
                'url' => '/c/grocery/non-gmo/-/N-5xt1aZsjhan',
                'value' => '0038 non-gmo',
              ],
              37 => [
                'descriptor' => false,
                'display_name' => 'Pasture Raised',
                'facet_id' => 'ak6oh',
                'facet_canonical' => 'pasture-raised',
                'url' => '/c/grocery/pasture-raised/-/N-5xt1aZak6oh',
                'value' => '0040 pasture raised',
              ],
              38 => [
                'descriptor' => false,
                'display_name' => 'Plant-based',
                'facet_id' => '7vn3n',
                'facet_canonical' => 'plant-based',
                'url' => '/c/grocery/plant-based/-/N-5xt1aZ7vn3n',
                'value' => '0041 plant-based',
              ],
              39 => [
                'descriptor' => false,
                'display_name' => 'Reduced Fat',
                'facet_id' => 'n3ew5',
                'facet_canonical' => 'reduced-fat',
                'url' => '/c/grocery/reduced-fat/-/N-5xt1aZn3ew5',
                'value' => '0042 reduced fat',
              ],
              40 => [
                'descriptor' => false,
                'display_name' => 'Sodium Free',
                'facet_id' => 'p9ubl',
                'facet_canonical' => 'sodium-free',
                'url' => '/c/grocery/sodium-free/-/N-5xt1aZp9ubl',
                'value' => '0043 sodium free',
              ],
              41 => [
                'descriptor' => false,
                'display_name' => 'Soy-based',
                'facet_id' => '3cda9',
                'facet_canonical' => 'soy-based',
                'url' => '/c/grocery/soy-based/-/N-5xt1aZ3cda9',
                'value' => '0044 soy-based',
              ],
              42 => [
                'descriptor' => false,
                'display_name' => 'Sugar Free',
                'facet_id' => 'idmd0',
                'facet_canonical' => 'sugar-free',
                'url' => '/c/grocery/sugar-free/-/N-5xt1aZidmd0',
                'value' => '0045 sugar free',
              ],
              43 => [
                'descriptor' => false,
                'display_name' => 'Whole Grain',
                'facet_id' => 'hft6b',
                'facet_canonical' => 'whole-grain',
                'url' => '/c/grocery/whole-grain/-/N-5xt1aZhft6b',
                'value' => '0046 whole grain',
              ],
            ],
            'display_name' => 'Dietary Needs',
            'expand' => true,
            'name' => 'd_dietary_needs',
            'type' => 'checkbox',
          ],
          3 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => 'All Deals',
                'facet_id' => 'akkos',
                'facet_canonical' => 'all-deals',
                'url' => '/c/grocery/all-deals/-/N-5xt1aZakkos',
                'value' => 'all deals',
              ],
              1 => [
                'descriptor' => false,
                'display_name' => 'BOGO',
                'facet_id' => '55e69',
                'facet_canonical' => 'bogo',
                'url' => '/c/grocery/bogo/-/N-5xt1aZ55e69',
                'value' => 'bogo',
              ],
              2 => [
                'descriptor' => false,
                'display_name' => 'Buy and Save',
                'facet_id' => '55e6t',
                'facet_canonical' => 'buy-and-save',
                'url' => '/c/grocery/buy-and-save/-/N-5xt1aZ55e6t',
                'value' => 'buy and save',
              ],
              3 => [
                'descriptor' => false,
                'display_name' => 'GiftCard with Purchase',
                'facet_id' => '55e6u',
                'facet_canonical' => 'giftcard-with-purchase',
                'url' => '/c/grocery/giftcard-with-purchase/-/N-5xt1aZ55e6u',
                'value' => 'giftcard with purchase',
              ],
              4 => [
                'descriptor' => false,
                'display_name' => 'Sale',
                'facet_id' => '5tdv0',
                'facet_canonical' => 'sale',
                'url' => '/c/grocery/sale/-/N-5xt1aZ5tdv0',
                'value' => 'sale',
              ],
              5 => [
                'descriptor' => false,
                'display_name' => 'Weekly Ad',
                'facet_id' => '55dgn',
                'facet_canonical' => 'weekly-ad',
                'url' => '/c/grocery/weekly-ad/-/N-5xt1aZ55dgn',
                'value' => 'weekly ad',
              ],
            ],
            'display_name' => 'Deals',
            'expand' => true,
            'name' => 'd_deals',
            'type' => 'checkbox',
          ],
          4 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => '1',
                'facet_id' => '5zkq2',
                'facet_canonical' => '1',
                'url' => '/c/grocery/1/-/N-5xt1aZ5zkq2',
                'value' => '0000 1',
              ],
              1 => [
                'descriptor' => false,
                'display_name' => '2',
                'facet_id' => '5zkq3',
                'facet_canonical' => '2',
                'url' => '/c/grocery/2/-/N-5xt1aZ5zkq3',
                'value' => '0001 2',
              ],
              2 => [
                'descriptor' => false,
                'display_name' => '3',
                'facet_id' => '5zkq4',
                'facet_canonical' => '3',
                'url' => '/c/grocery/3/-/N-5xt1aZ5zkq4',
                'value' => '0002 3',
              ],
              3 => [
                'descriptor' => false,
                'display_name' => '4',
                'facet_id' => '5zkq5',
                'facet_canonical' => '4',
                'url' => '/c/grocery/4/-/N-5xt1aZ5zkq5',
                'value' => '0003 4',
              ],
              4 => [
                'descriptor' => false,
                'display_name' => '5',
                'facet_id' => '5zkq6',
                'facet_canonical' => '5',
                'url' => '/c/grocery/5/-/N-5xt1aZ5zkq6',
                'value' => '0004 5',
              ],
            ],
            'display_name' => 'Guest Rating',
            'expand' => true,
            'name' => 'd_rating',
            'type' => 'rating',
          ],
          5 => [
            'details' => [
              0 => [
                'descriptor' => false,
                'display_name' => 'only eligible items',
                'facet_id' => 'vu13f',
                'facet_canonical' => 'only-eligible-items',
                'url' => '/c/grocery/only-eligible-items/-/N-5xt1aZvu13f',
                'value' => 'only eligible items',
              ],
            ],
            'display_name' => 'FPO/APO',
            'expand' => false,
            'name' => 'd_apo_fpo',
            'type' => 'checkbox',
          ],
        ],
      ],
      'related_categories' => [
        'category' => [
          'canonical_url' => '/c/grocery/-/N-5xt1a',
          'deep_link' => 'target://product/listing?idType=ENDECA&id=5xt1a&title=Grocery',
          'experience_type' => 'grocery_aisles',
          'image_url' => 'https://target.scene7.com/is/image/Target/Grocery219475-200305_1583423555572-210803-1628012592053',
          'name' => 'Grocery',
          'node_id' => '5xt1a',
          'parent_id' => 'root',
        ],
        'children' => [
          0 => [
            'canonical_url' => '/c/grocery-deals/-/N-k4uyq',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=k4uyq&title=Grocery+Deals',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat_GroceryDeals-QUIVER-190913-1568388358907',
            'name' => 'Grocery Deals',
            'node_id' => 'k4uyq',
            'parent_id' => '5xt1a',
          ],
          1 => [
            'canonical_url' => '/c/christmas-candy-food-gifts/-/N-iywcd',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=iywcd&title=Christmas+Candy+%26+Food+Gifts',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/November_BubcatBubcat_ChristmasCandyFoodGifts-211201-1638372507406',
            'name' => 'Christmas Candy & Food Gifts',
            'node_id' => 'iywcd',
            'parent_id' => '5xt30',
          ],
          2 => [
            'canonical_url' => '/c/holiday-baking/-/N-0gxrs',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=0gxrs&title=Holiday+Baking',
            'image_url' => 'https://target.scene7.com/is/image/Target/November_BubcatBubcat_HolidayBaking-211102-1635881704620',
            'name' => 'Holiday Baking',
            'node_id' => '0gxrs',
            'parent_id' => 'iywcd',
          ],
          3 => [
            'canonical_url' => '/c/holiday-entertaining/-/N-uk5kg',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=uk5kg&title=Holiday+Entertaining',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_HolidayEntertaining-211130-1638291879359',
            'name' => 'Holiday Entertaining',
            'node_id' => 'uk5kg',
            'parent_id' => '5xt1a',
          ],
          4 => [
            'canonical_url' => '/c/produce-grocery/-/N-u7fty',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=u7fty&title=Produce',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCatProduce-QUIVER-190913-1568387503452',
            'name' => 'Produce',
            'node_id' => 'u7fty',
            'parent_id' => '5xt1a',
          ],
          5 => [
            'canonical_url' => '/c/meat-seafood-grocery/-/N-5xsyh',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xsyh&title=Meat+%26+Seafood',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_BUBCAT_May26BubCat_MeatSeafood-200526-1590506147828',
            'name' => 'Meat & Seafood',
            'node_id' => '5xsyh',
            'parent_id' => '5xt1a',
          ],
          6 => [
            'canonical_url' => '/c/beverages-grocery/-/N-5xt0r',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xt0r&title=Beverages',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat_Beverages-QUIVER-190913-1568388055602',
            'name' => 'Beverages',
            'node_id' => '5xt0r',
            'parent_id' => '5xt1a',
          ],
          7 => [
            'canonical_url' => '/c/seasonal-hot-beverages/-/N-o96f6',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=o96f6&title=Seasonal+Hot+Beverages',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_HolidayDrink-211201-1638395198250',
            'name' => 'Seasonal Hot Beverages',
            'node_id' => 'o96f6',
            'parent_id' => '4yi5p',
          ],
          8 => [
            'canonical_url' => '/c/game-day-snacks-grocery/-/N-y1iwu',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=y1iwu&title=Game+Day+Snacks',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_GameDaySnacks-210909-1631212705861',
            'name' => 'Game Day Snacks',
            'node_id' => 'y1iwu',
            'parent_id' => '5xt1a',
          ],
          9 => [
            'canonical_url' => '/c/meal-snack-ideas-for-kids/-/N-xad8e',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=xad8e&title=Meal+%26+Snack+Ideas+for+Kids',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat__KidsSNackLunch-QUIVER-190925-1569422909468',
            'name' => 'Meal & Snack Ideas for Kids',
            'node_id' => 'xad8e',
            'parent_id' => 'n8wao',
          ],
          10 => [
            'canonical_url' => '/c/meal-ideas/-/N-n8wao',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=n8wao&title=Meal+Ideas',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_MealIdeas-210909-1631212771790',
            'name' => 'Meal Ideas',
            'node_id' => 'n8wao',
            'parent_id' => '5xt1a',
          ],
          11 => [
            'canonical_url' => '/c/breakfast-cereal-grocery/-/N-wo2mp',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=wo2mp&title=Breakfast+%26+Cereal',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/10wk1_Grocery_BubcatBubcat_Cereal-201005-1601921411441',
            'name' => 'Breakfast & Cereal',
            'node_id' => 'wo2mp',
            'parent_id' => '5xt1a',
          ],
          12 => [
            'canonical_url' => '/c/dairy-grocery/-/N-5xszm',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xszm&title=Dairy',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/10wk1_Grocery_BubcatBubcat_Dairy-201005-1601921355877',
            'name' => 'Dairy',
            'node_id' => '5xszm',
            'parent_id' => '5xt1a',
          ],
          13 => [
            'canonical_url' => '/c/wine-beer-liquor-beverages/-/N-5n5q6',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5n5q6&title=Wine%2C+Beer+%26+Liquor',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_TemplateBubcat_WhiteClaw-200519-1589917959765',
            'name' => 'Wine, Beer & Liquor',
            'node_id' => '5n5q6',
            'parent_id' => '5xt1a',
          ],
          14 => [
            'canonical_url' => '/c/bakery-bread-grocery/-/N-5xt19',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xt19&title=Bakery+%26+Bread',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_BUBCAT_May26BubCat_Breads-200526-1590506074018',
            'name' => 'Bakery & Bread',
            'node_id' => '5xt19',
            'parent_id' => '5xt1a',
          ],
          15 => [
            'canonical_url' => '/c/pantry-grocery/-/N-5xt13',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xt13&title=Pantry',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/10wk1_Grocery_BubcatBubcat_Deli_2-201005-1601921482853',
            'name' => 'Pantry',
            'node_id' => '5xt13',
            'parent_id' => '5xt1a',
          ],
          16 => [
            'canonical_url' => '/c/snacks-grocery/-/N-5xsy9',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xsy9&title=Snacks',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat__ChipsSnacksCookies-QUIVER-190917-1568743086153',
            'name' => 'Snacks',
            'node_id' => '5xsy9',
            'parent_id' => '5xt1a',
          ],
          17 => [
            'canonical_url' => '/c/coffee-beverages-grocery/-/N-4yi5p',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=4yi5p&title=Coffee',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_TemplateBubcat_Coffee-201105-1604594124737',
            'name' => 'Coffee',
            'node_id' => '4yi5p',
            'parent_id' => '5xt0r',
          ],
          18 => [
            'canonical_url' => '/c/frozen-foods-grocery/-/N-5xszd',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xszd&title=Frozen+Foods',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat__FrozenFoods-QUIVER-190917-1568742985532',
            'name' => 'Frozen Foods',
            'node_id' => '5xszd',
            'parent_id' => '5xt1a',
          ],
          19 => [
            'canonical_url' => '/c/s-mores/-/N-4skst',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=4skst&title=S%27mores',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_Smores-211008-1633707360491',
            'name' => 'S\'mores',
            'node_id' => '4skst',
            'parent_id' => '5xt1a',
          ],
          20 => [
            'canonical_url' => '/c/candy-grocery/-/N-5xt0d',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5xt0d&title=Candy',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_TemplateBubcat_CandyL2-200413-1586787507593',
            'name' => 'Candy',
            'node_id' => '5xt0d',
            'parent_id' => '5xt1a',
          ],
          21 => [
            'canonical_url' => '/c/deli-grocery/-/N-5hp74',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=5hp74&title=Deli',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat_Deli-QUIVER-190913-1568387695468',
            'name' => 'Deli',
            'node_id' => '5hp74',
            'parent_id' => '5xt1a',
          ],
          22 => [
            'canonical_url' => '/c/food-gifts-baskets/-/N-54wac',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=54wac&title=Food+Gifts+%26+Baskets',
            'image_url' => 'https://target.scene7.com/is/image/Target/November_BubcatBubcat_FoodGiftsBaskets-211102-1635881722387',
            'name' => 'Food Gifts & Baskets',
            'node_id' => '54wac',
            'parent_id' => '5xt1a',
          ],
          23 => [
            'canonical_url' => '/c/on-the-go-snacks-grocery/-/N-sapts',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=sapts&title=On+the+Go+Snacks',
            'image_url' => 'https://target.scene7.com/is/image/Target/BUBCAT_2Bubcat_OntheGo-210617-1623956830369',
            'name' => 'On the Go Snacks',
            'node_id' => 'sapts',
            'parent_id' => '5xt1a',
          ],
          24 => [
            'canonical_url' => '/c/specialty-diets-grocery/-/N-nazlk',
            'deep_link' => 'target://product/listing?idType=ENDECA&id=nazlk&title=Specialty+Diets',
            'experience_type' => 'grocery_aisles',
            'image_url' => 'https://target.scene7.com/is/image/Target/Grocery_L1_BubCat_SpecialtyDiets-QUIVER-190917-1568742885858',
            'name' => 'Specialty Diets',
            'node_id' => 'nazlk',
            'parent_id' => '5xt1a',
          ],
        ],
      ],
    ],
  ],
]
            ], 200);
    }
}