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
    /** @test */
    public function the_details_page_shows_the_correct_recommended_items_details()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/products/list-recommended' => $this->fake_recommended_item_details()
        ]);

        $response = $this->get(route('item', ['tcin' => '81488492', 'store_id' => '911']));

        $response->assertStatus(200);

        $response->assertSee('KIND Thins Caramel Almond Sea Salt - 7.4oz');
        $response->assertSee('$7.99');
        $response->assertSee('IN STOCK');        
    }

      /** @test */
    public function the_details_page_shows_the_correct_reviews()
    {
        Http::fake([
            'https://target1.p.rapidapi.com/reviews/v2/list' => $this->fake_reviews()
        ]);

        $response = $this->get(route('item', ['tcin' => '81488492', 'store_id' => '911', 'reviewedId' => '81488492', 'sortBy' => 'most_recent', 'size' => '30', 'page' => '0', 'hasOnlyPhotos' => 'false', 'verifiedOnly' => 'false']));

        $response->assertStatus(200);

        $response->assertSee('My box MUST have been rancid because there is no way a product should taste like that. It was like chewing an old cabinet. I couldn’t even swallow the one bite I had. Kind bars are usually good, so I’m not sure if this is a bad flavor or a bad box. I love the snack size which is why I gave it two stars, but I’m returning my box.');
        $response->assertSee('Ki');
        $response->assertSee('2021-12-16');        
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

   private function fake_recommended_item_details()
   {
     return Http::response([
      [
  'placement_id' => 'pdpdroidh1',
  'category_id' => '4ydo1',
  'strategy_id' => 'pdpdroidh1',
  'strategy_name' => 'blender_product_2_service',
  'strategy_description' => 'More to consider',
  'products' => [
    0 => [
      'tcin' => '81488491',
      'dpci' => '071-20-2077',
      'title' => 'KIND Thins Dark Chocolate Nuts Sea Salt - 7.4oz/10ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-thins-dark-chocolate-nuts-sea-salt-7-4oz-10ct/-/A-81488491',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_81f4f0e3-e2cd-4d55-a691-4e5d3e985f34',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_81f4f0e3-e2cd-4d55-a691-4e5d3e985f34',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_88592914-e949-4a65-a9fd-c97d3c8be471',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_81f8d7fb-6cba-4a37-856e-5ce6226eefec',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.36,
      'price' => [
        'tcin' => '81488491',
        'location_id' => 911,
        'formatted_current_price' => '$7.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'reviews' => [
        'average_overall_rating' => 4.69,
        'total_review_count' => 36,
      ],
      'is_sponsored_sku' => false,
    ],
    1 => [
      'tcin' => '83086057',
      'dpci' => '071-20-0643',
      'title' => 'KIND Thins Caramel Almond Sea Salt - 7.4oz',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-thins-caramel-almond-sea-salt-7-4oz/-/A-83086057',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_99c2243a-be05-4545-9a91-898dc3391794',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_99c2243a-be05-4545-9a91-898dc3391794',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_d739c61a-3324-4551-bac5-b07e3c7c2af6',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_b3e75833-a3f2-4a79-9446-e46d247cf61a',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_344687f8-ef40-4007-99ec-88c280306c17',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_372093b7-969e-4dd8-91a5-613e615e6fe9',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_d7907dbb-b7ab-4ce7-a7e7-d79cd1ae3702',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_ec9936a3-0a1b-45f6-ae77-f581cb2514c2',
          6 => 'https://target.scene7.com/is/image/Target/GUEST_8c0e6211-c5df-4347-be9d-17f707d3475a',
          7 => 'https://target.scene7.com/is/image/Target/GUEST_21ea5852-e205-486c-9a3e-f3ffd02167dc',
          8 => 'https://target.scene7.com/is/image/Target/GUEST_1f23601f-7eed-4b5d-aa09-0911ff9a4580',
          9 => 'https://target.scene7.com/is/image/Target/GUEST_165b48dd-dcdc-4e5d-9c34-787638e3e86c',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.1,
      'price' => [
        'tcin' => '83086057',
        'location_id' => 911,
        'formatted_current_price' => '$7.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 3.5,
        'total_review_count' => 2,
      ],
      'is_sponsored_sku' => false,
    ],
    2 => [
      'tcin' => '15027059',
      'dpci' => '071-20-0586',
      'title' => 'KIND Healthy Grains Dark Chocolate Chunk, Gluten Free Granola Bars - 5ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-healthy-grains-dark-chocolate-chunk-gluten-free-granola-bars-5ct/-/A-15027059',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_1f60de34-0db5-4e1e-a23d-adaf5a9635ad',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_1f60de34-0db5-4e1e-a23d-adaf5a9635ad',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_bab3113f-8f5a-4632-9864-4d33acdcc9b9',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_e304ce35-6694-476b-bad8-95c590aa43b2',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_072dadb5-861e-4060-af46-04f18473b524',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.43,
      'price' => [
        'tcin' => '15027059',
        'location_id' => 911,
        'formatted_current_price' => '$3.89',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.6,
        'total_review_count' => 599,
      ],
      'is_sponsored_sku' => false,
    ],
    3 => [
      'tcin' => '81488515',
      'dpci' => '071-20-2079',
      'title' => 'KIND Mini Chewy Peanut Butter + Dark Chocolate - 16.2oz/20ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-mini-chewy-peanut-butter-dark-chocolate-16-2oz-20ct/-/A-81488515',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_409ade2a-e8cb-44f3-b433-722d1b1f4b1d',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_409ade2a-e8cb-44f3-b433-722d1b1f4b1d',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_985b704b-66e1-4367-8e74-8cfa8fbd3da2',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_13122576-ca34-4186-93fb-df00a7f16813',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_46df3088-6605-4b03-9e31-591cd8e97fbc',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_d7163686-b922-4b08-96f7-06c0e7f5e7ee',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_64dae0c3-008d-4da7-8f56-95ff90d15cb1',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_4c64f4a6-c12e-4357-ae61-46be4c5a9b9f',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 2.76,
      'price' => [
        'tcin' => '81488515',
        'location_id' => 911,
        'formatted_current_price' => '$13.29',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.38,
        'total_review_count' => 8,
      ],
      'is_sponsored_sku' => false,
    ],
    4 => [
      'tcin' => '81647167',
      'dpci' => '071-20-0550',
      'title' => 'Quaker Chewy Dipps &#38; Chocolate Chip Granola Bars Bundle',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/quaker-chewy-dipps-38-chocolate-chip-granola-bars-bundle/-/A-81647167',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_898e21d3-3f81-4a74-bde3-bb1b25b7d9e3',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_898e21d3-3f81-4a74-bde3-bb1b25b7d9e3',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_ad5d4adc-66f1-4063-9190-1458d9d52b47',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_6ec9aa25-c54e-4a35-834f-5bbdc3a54699',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_35abecac-4b30-4459-8707-d340580c1394',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '3888533',
          'name' => 'QUAKER OATS COMPANY',
        ],
      ],
      'product_brand' => [
        'brand' => 'Quaker',
      ],
      'box_percent_filled_display' => 2.68,
      'price' => [
        'tcin' => '81647167',
        'location_id' => 3991,
        'formatted_current_price' => '$7.49',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'OUT_OF_STOCK',
      'reviews' => [
        'average_overall_rating' => 1.0,
        'total_review_count' => 1,
      ],
      'is_sponsored_sku' => false,
    ],
    5 => [
      'tcin' => '17078504',
      'dpci' => '071-20-0532',
      'title' => 'Nature\'s Bakery Raspberry Fig Bar - 6ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/nature-s-bakery-raspberry-fig-bar-6ct/-/A-17078504',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_922e0399-60a8-49f2-9729-7a9aee6b9784',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_922e0399-60a8-49f2-9729-7a9aee6b9784',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_e13f4cda-3293-4281-b344-99b9d45cafab',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_d2f1bd03-bf56-4d12-8745-947484c4376d',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_c8b363a8-293e-4289-9e71-c4c8abc83512',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_e69adfc9-eeca-439d-bafb-f6cc9e14a63e',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1321490',
          'name' => 'NATURE\'S BAKERY LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'Nature\'s Bakery',
      ],
      'box_percent_filled_display' => 2.19,
      'price' => [
        'tcin' => '17078504',
        'location_id' => 911,
        'formatted_current_price' => '$2.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.77,
        'total_review_count' => 240,
      ],
      'is_sponsored_sku' => false,
    ],
    6 => [
      'tcin' => '21496169',
      'dpci' => '071-20-0565',
      'title' => 'KIND Dark Chocolate Cocoa Protein Breakfast Bars - 4ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-dark-chocolate-cocoa-protein-breakfast-bars-4ct/-/A-21496169',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_00a62409-924d-4142-8c0e-acad4e4612a3',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_00a62409-924d-4142-8c0e-acad4e4612a3',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_f9057344-a549-4fbe-937b-0530a9db0b54',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_9a52c3bf-f5eb-49f4-b737-88a9e4eaa177',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.49,
      'price' => [
        'tcin' => '21496169',
        'location_id' => 911,
        'formatted_current_price' => '$3.59',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.68,
        'total_review_count' => 111,
      ],
      'is_sponsored_sku' => false,
    ],
    7 => [
      'tcin' => '53141964',
      'dpci' => '071-20-1865',
      'title' => 'Quaker Chewy Chocolate Chip Granola Bars - 18ct/15.2OZ',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/quaker-chewy-chocolate-chip-granola-bars-18ct-15-2oz/-/A-53141964',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_2b9b9ede-313d-4c92-a70b-0585e7b11532',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_2b9b9ede-313d-4c92-a70b-0585e7b11532',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_3a1b64f6-781a-4c54-ac5a-01594091fb5a',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_558f7152-c18a-410f-ba27-6bb0110874be',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_ccdf32b4-fce5-4a09-b444-d242f0369421',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_bbb986ab-e797-4b1f-ae12-dd1dc728d593',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_309c20c5-f72b-4ccd-9218-08d390b41506',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_6fdf7ee2-4284-41b4-835b-0db442de272d',
          6 => 'https://target.scene7.com/is/image/Target/GUEST_0d965c87-eaf3-4948-b12e-b6dc08ecd329',
          7 => 'https://target.scene7.com/is/image/Target/GUEST_6abec7d2-6a6d-43f8-bb23-cfa71610a377',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '3888533',
          'name' => 'QUAKER OATS COMPANY',
        ],
      ],
      'product_brand' => [
        'brand' => 'Quaker',
      ],
      'box_percent_filled_display' => 2.6,
      'price' => [
        'tcin' => '53141964',
        'location_id' => 911,
        'formatted_current_price' => '$4.49',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.56,
        'total_review_count' => 1540,
      ],
      'is_sponsored_sku' => false,
    ],
    8 => [
      'tcin' => '78324919',
      'dpci' => '071-20-1406',
      'title' => 'KIND Minis Peanut Butter Dark Chocolate + Peanut Butter - 20ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-minis-peanut-butter-dark-chocolate-peanut-butter-20ct/-/A-78324919',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_b0aff5a0-b631-4e42-9c6a-c41b3e9427ed',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_b0aff5a0-b631-4e42-9c6a-c41b3e9427ed',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_16f43508-e8f7-455b-9a93-f1e574875de5',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_885ad5b2-bc70-4b53-a5ed-fae34946d45c',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_73e6ff6f-5013-4780-a7ce-b13d0838a6ce',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_7392bf59-6651-4a6d-aa46-aa74328b63a1',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_be0887ef-b23e-40e9-b3ea-23a73e646312',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 2.59,
      'price' => [
        'tcin' => '78324919',
        'location_id' => 911,
        'formatted_current_price' => '$13.29',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.47,
        'total_review_count' => 15,
      ],
      'is_sponsored_sku' => false,
    ],
    9 => [
      'tcin' => '78324922',
      'dpci' => '071-20-1421',
      'title' => 'KIND Minis Salted Caramel Dark Chocolate + Dark Chocolate Almond Coconut - 20ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-minis-salted-caramel-dark-chocolate-dark-chocolate-almond-coconut-20ct/-/A-78324922',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_0589cb24-8456-4fde-b5f6-14b6f8587fba',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_0589cb24-8456-4fde-b5f6-14b6f8587fba',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_337396af-fc8d-4e4d-b57e-856fdbbb99dc',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_b6973da1-d335-48f1-adba-8e27c16a746f',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_3092d5e9-8d38-48a3-b4a2-dc9db8d2e6c1',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_050ff5a3-cb6e-4738-9d6c-39d2adcc3ab2',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_790770ef-3a89-4ea4-802d-0924df952794',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_7392bf59-6651-4a6d-aa46-aa74328b63a1',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 3.07,
      'price' => [
        'tcin' => '78324922',
        'location_id' => 911,
        'formatted_current_price' => '$13.29',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.77,
        'total_review_count' => 31,
      ],
      'is_sponsored_sku' => false,
    ],
    10 => [
      'tcin' => '78324920',
      'dpci' => '071-20-6507',
      'title' => 'KIND Minis Dark Chocolate &#38; Caramel Almond - 20ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-minis-dark-chocolate-38-caramel-almond-20ct/-/A-78324920',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_2b828631-c0f3-46ef-9b4a-4284cfd0beb3',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_2b828631-c0f3-46ef-9b4a-4284cfd0beb3',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_60f5a783-f6a2-4916-8157-6186cb415fc7',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_e2614063-4069-4d4d-8600-5b8f23eedc15',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_58332b7f-6edb-47c1-a9d0-362f63863f0f',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_138fe33b-068c-42fe-95bb-50e3b26a3d02',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_66123c96-5900-4f3f-b4c5-8f94f47c9465',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_8fbed16a-4d9a-405b-a0ba-6acbc909ce72',
          6 => 'https://target.scene7.com/is/image/Target/GUEST_f14a4c6e-3a6a-4d8c-981a-b555f03c03c1',
          7 => 'https://target.scene7.com/is/image/Target/GUEST_7392bf59-6651-4a6d-aa46-aa74328b63a1',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 2.45,
      'price' => [
        'tcin' => '78324920',
        'location_id' => 911,
        'formatted_current_price' => '$13.29',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.83,
        'total_review_count' => 41,
      ],
      'is_sponsored_sku' => false,
    ],
    11 => [
      'tcin' => '76201441',
      'dpci' => '071-20-9498',
      'title' => 'Nature\'s Bakery Strawberry Crumble Bar - 6ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/nature-s-bakery-strawberry-crumble-bar-6ct/-/A-76201441',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_dc4dde9a-0fce-4bd8-82bd-8aa589543870',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_dc4dde9a-0fce-4bd8-82bd-8aa589543870',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_e1701ddb-7597-4085-96e2-7e689642278f',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_fc9a5f73-8c28-4435-a328-5d92d438ced1',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_389e4edc-74a4-408f-9d38-923421ad133e',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_9435aed9-2bc0-46e5-8885-d469dafab866',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1321490',
          'name' => 'NATURE\'S BAKERY LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'Nature\'s Bakery',
      ],
      'box_percent_filled_display' => 1.43,
      'price' => [
        'tcin' => '76201441',
        'location_id' => 911,
        'formatted_current_price' => '$2.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.71,
        'total_review_count' => 156,
      ],
      'is_sponsored_sku' => false,
    ],
    12 => [
      'tcin' => '12935938',
      'dpci' => '071-20-0684',
      'title' => 'Nature Valley Crunchy Variety Pack Granola Bars - 12ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/nature-valley-crunchy-variety-pack-granola-bars-12ct/-/A-12935938',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_7bf0f30a-0fd3-427e-8a79-e36c3a69ec7c',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_7bf0f30a-0fd3-427e-8a79-e36c3a69ec7c',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_62ed3a64-14f5-4cd9-b24b-d32a91afc1af',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_ce0224d5-89e0-4c62-b50d-74e1ba894d2d',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_5ba89706-427c-4d65-8194-931133d2154e',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_edd4d0a7-20cb-422b-8510-62a89db0adaa',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_028a6106-51ac-4d5b-ac75-26f2724f2aab',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_e0785ba2-356c-4388-94d5-a8c00afe7425',
          6 => 'https://target.scene7.com/is/image/Target/GUEST_35ee2deb-687f-48e5-898a-c55f4754e10d',
          7 => 'https://target.scene7.com/is/image/Target/GUEST_d19fed13-e33f-492b-9e67-f3d34b17fd76',
          8 => 'https://target.scene7.com/is/image/Target/GUEST_e02b0766-ae5e-4e97-a5de-129ab17788d4',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '2330590',
          'name' => 'GENERAL MILLS INC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'Nature Valley',
      ],
      'box_percent_filled_display' => 3.75,
      'price' => [
        'tcin' => '12935938',
        'location_id' => 911,
        'formatted_current_price' => '$5.79',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.68,
        'total_review_count' => 40,
      ],
      'is_sponsored_sku' => false,
    ],
    13 => [
      'tcin' => '21496166',
      'dpci' => '071-20-0562',
      'title' => 'KIND Honey Oat Breakfast Bars - 4pk of 2 Bars',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-honey-oat-breakfast-bars-4pk-of-2-bars/-/A-21496166',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_93b78b63-1802-4e71-9307-4523afd3d60d',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_93b78b63-1802-4e71-9307-4523afd3d60d',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_d0fafe6f-4da5-4bd4-9479-eadced22c175',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_7825ede9-894e-4e85-b4df-2373e631590c',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.4,
      'price' => [
        'tcin' => '21496166',
        'location_id' => 911,
        'formatted_current_price' => '$3.59',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.38,
        'total_review_count' => 56,
      ],
      'is_sponsored_sku' => false,
    ],
    14 => [
      'tcin' => '21496167',
      'dpci' => '071-20-0563',
      'title' => 'KIND Peanut Butter Breakfast Bars - 4ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-peanut-butter-breakfast-bars-4ct/-/A-21496167',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_b4188374-5cd1-4d4d-8288-c33b932a5b44',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_b4188374-5cd1-4d4d-8288-c33b932a5b44',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_5b09c04a-8bfe-4f83-a65d-91e809bc033c',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_673d0179-40e1-4e6f-b05b-5d0b509719f6',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.51,
      'price' => [
        'tcin' => '21496167',
        'location_id' => 911,
        'formatted_current_price' => '$3.59',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.59,
        'total_review_count' => 123,
      ],
      'is_sponsored_sku' => false,
    ],
    15 => [
      'tcin' => '13781127',
      'dpci' => '071-20-0470',
      'title' => 'Nature Valley Crunchy Oats &#39;N Honey Granola Bars - 24ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/nature-valley-crunchy-oats-39-n-honey-granola-bars-24ct/-/A-13781127',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_996fcd76-0a37-4470-a21f-7b8c7dd053d5',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_996fcd76-0a37-4470-a21f-7b8c7dd053d5',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_b3968c73-741c-4aaf-aa58-766f922afdfa',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_072d5079-8c16-4da5-bde6-2db64eef91a3',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_8cb971fb-ea85-4c39-bd46-468162bccf4a',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_8383e0d5-9257-410a-ab64-862ec49d7dbe',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_2e6493d6-10ba-4c74-bf62-54321fba6162',
          5 => 'https://target.scene7.com/is/image/Target/GUEST_038bed57-226b-4ff1-bef6-6acc4eac439e',
          6 => 'https://target.scene7.com/is/image/Target/GUEST_4921fbc5-4a96-41aa-b9d5-b7abb55b9e74',
          7 => 'https://target.scene7.com/is/image/Target/GUEST_3f830029-6326-42fe-bf17-8d698542aef2',
          8 => 'https://target.scene7.com/is/image/Target/GUEST_f0ea5685-234d-4d9f-be47-0268be99a072',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '2330590',
          'name' => 'GENERAL MILLS INC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'Nature Valley',
      ],
      'box_percent_filled_display' => 3.04,
      'price' => [
        'tcin' => '13781127',
        'location_id' => 911,
        'formatted_current_price' => '$5.79',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.74,
        'total_review_count' => 73,
      ],
      'is_sponsored_sku' => false,
    ],
    16 => [
      'tcin' => '16602631',
      'dpci' => '071-20-0676',
      'title' => 'Kind Dark Chocolate Nuts & Sea Salt Nutrition Bars 12ct / 1.4oz',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-dark-chocolate-nuts-sea-salt-nutrition-bars-12ct-1-4oz/-/A-16602631',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_2343a963-e650-44fd-a6ad-b139e3285a1a',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_2343a963-e650-44fd-a6ad-b139e3285a1a',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_72b5e706-0ae0-4291-a5ae-d7f03acdbf34',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_25531fce-e0f2-45de-90af-085828306b56',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_7a1a0329-12ee-425c-8b96-8614a297f4ab',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_7392bf59-6651-4a6d-aa46-aa74328b63a1',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 2.95,
      'price' => [
        'tcin' => '16602631',
        'location_id' => 911,
        'formatted_current_price' => '$14.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.46,
        'total_review_count' => 112,
      ],
      'is_sponsored_sku' => false,
    ],
    17 => [
      'tcin' => '78324915',
      'dpci' => '071-20-1398',
      'title' => 'KIND Minis Dark Chocolate Cherry - 10ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-minis-dark-chocolate-cherry-10ct/-/A-78324915',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_b0e201df-7b3a-431b-8132-a32b19afdd03',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_b0e201df-7b3a-431b-8132-a32b19afdd03',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_c6ea0d8e-ddea-4b09-bd08-14c23040c5e3',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_cf8fb9f8-bf36-4c2e-900f-ce37ba89681c',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_e63b792f-d0b9-4f04-b3cb-f08613f36114',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_9087b8b2-fb68-4324-a008-9c10c839eb97',
          4 => 'https://target.scene7.com/is/image/Target/GUEST_2bea9935-5b59-44b2-ac92-d27b50d0f665',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.35,
      'price' => [
        'tcin' => '78324915',
        'location_id' => 911,
        'formatted_current_price' => '$7.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.67,
        'total_review_count' => 302,
      ],
      'is_sponsored_sku' => false,
    ],
    18 => [
      'tcin' => '21496165',
      'dpci' => '071-20-0561',
      'title' => 'KIND Blueberry Almond Breakfast Bars - 4pk of 2 Bars',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-blueberry-almond-breakfast-bars-4pk-of-2-bars/-/A-21496165',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_6dd14f9d-0fe0-414a-a68d-87b7514fc1de',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_6dd14f9d-0fe0-414a-a68d-87b7514fc1de',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_3ecc6f51-2fc7-4d49-ba04-e3165f5c8396',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_75ce51d6-0dc1-4c95-be08-3f3fdc6eaf87',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_c4b3c8a9-d9fb-4ecd-b4c7-4acde6d94602',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.44,
      'price' => [
        'tcin' => '21496165',
        'location_id' => 911,
        'formatted_current_price' => '$3.59',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.46,
        'total_review_count' => 65,
      ],
      'is_sponsored_sku' => false,
    ],
    19 => [
      'tcin' => '52244646',
      'dpci' => '071-20-1712',
      'title' => 'KIND Almond Butter Protein Breakfast Bars - 4pk of 2 Bars',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-almond-butter-protein-breakfast-bars-4pk-of-2-bars/-/A-52244646',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_f67868ec-6e52-4996-9404-73d392b22ed7',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_f67868ec-6e52-4996-9404-73d392b22ed7',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_1e81e983-2a08-4f5a-9548-ae2b48872530',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_1cc2c2e3-d523-4fa1-bc8b-3216c9314900',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.48,
      'price' => [
        'tcin' => '52244646',
        'location_id' => 911,
        'formatted_current_price' => '$3.59',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.59,
        'total_review_count' => 106,
      ],
      'is_sponsored_sku' => false,
    ],
    20 => [
      'tcin' => '78324917',
      'dpci' => '071-20-8691',
      'title' => 'KIND Minis Dark Chocolate Nuts Sea Salt - 0.6 / 10ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-minis-dark-chocolate-nuts-sea-salt-0-6-10ct/-/A-78324917',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_ddd9fd13-b77b-4742-9441-7407ce0e04e5',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_ddd9fd13-b77b-4742-9441-7407ce0e04e5',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_2b258202-cb63-49e3-bea2-b5b1e0f4381c',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_cfc44291-aedd-4daa-84e0-895004bac443',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_629345d2-4063-4078-a149-02231d9685f7',
          3 => 'https://target.scene7.com/is/image/Target/GUEST_7392bf59-6651-4a6d-aa46-aa74328b63a1',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.28,
      'price' => [
        'tcin' => '78324917',
        'location_id' => 911,
        'formatted_current_price' => '$7.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.67,
        'total_review_count' => 765,
      ],
      'is_sponsored_sku' => false,
    ],
    21 => [
      'tcin' => '54444622',
      'dpci' => '071-20-1353',
      'title' => 'MadeGood Chocolate Chip Granola Bars - 6ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/madegood-chocolate-chip-granola-bars-6ct/-/A-54444622',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_6993d013-dd7a-4bd6-9eab-da36f4dc5d1b',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_6993d013-dd7a-4bd6-9eab-da36f4dc5d1b',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_a4d89cd6-9f3f-40b5-942e-2cbcfae67c62',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_22fe11ee-26c6-490b-a367-954b2d3fbe47',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1983736',
          'name' => 'MadeGood Foods Inc.',
        ],
      ],
      'product_brand' => [
        'brand' => 'MadeGood',
      ],
      'box_percent_filled_display' => 1.09,
      'price' => [
        'tcin' => '54444622',
        'location_id' => 911,
        'formatted_current_price' => '$3.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.64,
        'total_review_count' => 143,
      ],
      'is_sponsored_sku' => false,
    ],
    22 => [
      'tcin' => '15027061',
      'dpci' => '071-20-0589',
      'title' => 'KIND Healthy Grains Oats &#38; Honey, Gluten Free Granola Bars - 5ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/kind-healthy-grains-oats-38-honey-gluten-free-granola-bars-5ct/-/A-15027061',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_7351d3e4-94dc-4e1c-b99d-315833cbfa39',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_7351d3e4-94dc-4e1c-b99d-315833cbfa39',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_9a4eae1b-5080-46c0-b805-a66f9bece80a',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_9d1c08ba-a248-42b4-a4fb-0e3c992b0bdd',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_88d173b2-4451-4853-8c84-e164021a4ed2',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1225415',
          'name' => 'KIND LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'KIND',
      ],
      'box_percent_filled_display' => 1.34,
      'price' => [
        'tcin' => '15027061',
        'location_id' => 911,
        'formatted_current_price' => '$3.89',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.66,
        'total_review_count' => 305,
      ],
      'is_sponsored_sku' => false,
    ],
    23 => [
      'tcin' => '17078503',
      'dpci' => '071-20-0531',
      'title' => 'Nature\'s Bakery Blueberry Fig Bar - 6ct',
      'relationship_type' => 'Stand Alone',
      'buy_url' => 'https://www.target.com/p/nature-s-bakery-blueberry-fig-bar-6ct/-/A-17078503',
      'primary_image_url' => 'https://target.scene7.com/is/image/Target/GUEST_36312349-0308-43c3-ad20-51332fd0a5bc',
      'images' => [
        'primaryUri' => 'https://target.scene7.com/is/image/Target/GUEST_36312349-0308-43c3-ad20-51332fd0a5bc',
        'alternateUris' => [
          0 => 'https://target.scene7.com/is/image/Target/GUEST_acf299db-4eda-4a86-bdcd-c01b5d507fac',
          1 => 'https://target.scene7.com/is/image/Target/GUEST_cddb6caf-999e-4de9-a29a-a992181e1f1b',
          2 => 'https://target.scene7.com/is/image/Target/GUEST_d3df4377-3c48-454a-910b-2a39a070206a',
        ],
      ],
      'is_marketplace' => false,
      'product_vendors' => [
        0 => [
          'id' => '1321490',
          'name' => 'NATURE\'S BAKERY LLC',
        ],
        1 => [
          'id' => '1213676',
          'name' => 'STORE ONLY DUMMY VENDOR',
        ],
      ],
      'product_brand' => [
        'brand' => 'Nature\'s Bakery',
      ],
      'box_percent_filled_display' => 1.85,
      'price' => [
        'tcin' => '17078503',
        'location_id' => 911,
        'formatted_current_price' => '$2.99',
        'formatted_current_price_type' => 'reg',
        'is_current_price_range' => false,
      ],
      'crush_info' => [
        'enabled' => false,
      ],
      'availability_status' => 'IN_STOCK',
      'pick_up_in_store' => true,
      'ship_to_store' => false,
      'store' => [
        'availability_status' => 'IN_STOCK',
        'pick_up_in_store' => true,
        'ship_to_store' => false,
      ],
      'reviews' => [
        'average_overall_rating' => 4.86,
        'total_review_count' => 180,
      ],
      'is_sponsored_sku' => false,
    ],
  ],
]
     ], 200);
   }

    private function fake_reviews()
    {
      return Http::response([
[
  'page' => 0,
  'size' => 30,
  'total_results' => 8,
  'results' => [
    0 => [
      'id' => '0f2858ac-22d3-4711-9b05-9f2299da4028',
      'external_id' => 'r119988_16396828PevaEGHcuA',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '7968494184',
        'nickname' => 'Ki',
      ],
      'title' => 'Easily spoiled?',
      'text' => 'My box MUST have been rancid because there is no way a product should taste like that. It was like chewing an old cabinet. I couldn’t even swallow the one bite I had. Kind bars are usually good, so I’m not sure if this is a bad flavor or a bad box. I love the snack size which is why I gave it two stars, but I’m returning my box.',
      'is_verified' => false,
      'is_recommended' => false,
      'feedback' => [
        'helpful' => 0,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-12-16T19:27:08.000+00:00',
      'modified_at' => '2021-12-17T17:58:18.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 2,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
        0 => 'Taste',
        1 => 'Value',
        2 => 'Quality',
      ],
      'SecondaryRatings' => [
        'Taste' => [
          'Id' => 'Taste',
          'Value' => 1,
          'Label' => 'taste',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Value' => [
          'Id' => 'Value',
          'Value' => 2,
          'Label' => 'value',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Quality' => [
          'Id' => 'Quality',
          'Value' => 2,
          'Label' => 'quality',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
      ],
      'BadgesOrder' => [
      ],
      'Badges' => [
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    1 => [
      'id' => '1f6bb5e4-7c3e-4d37-a6ed-cf951ade6480',
      'external_id' => 'r119988_16288678sxL9RN7peX',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '1687404555',
        'nickname' => 'Scary S',
      ],
      'title' => 'Meh, just okay.',
      'text' => 'They were okay. Really small and not big flavor and textures like the larger bars have.',
      'is_verified' => false,
      'is_recommended' => false,
      'feedback' => [
        'helpful' => 0,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-08-13T15:17:36.000+00:00',
      'modified_at' => '2021-08-14T02:06:08.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 3,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
        0 => 'Taste',
        1 => 'Value',
        2 => 'Quality',
      ],
      'SecondaryRatings' => [
        'Taste' => [
          'Id' => 'Taste',
          'Value' => 3,
          'Label' => 'taste',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Value' => [
          'Id' => 'Value',
          'Value' => 3,
          'Label' => 'value',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Quality' => [
          'Id' => 'Quality',
          'Value' => 3,
          'Label' => 'quality',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
      ],
      'BadgesOrder' => [
      ],
      'Badges' => [
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    2 => [
      'id' => 'df45c15e-f701-43e6-af83-621b0cd2d490',
      'external_id' => 'r119988_162396134g7QUVrZVz',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '2502336401',
        'nickname' => 'Terrie',
      ],
      'title' => 'Not hitting the mark with this one!',
      'text' => 'Not enough substance... go with the original bars.',
      'is_verified' => false,
      'feedback' => [
        'helpful' => 2,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-06-17T20:22:08.000+00:00',
      'modified_at' => '2021-08-13T15:14:39.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 1,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
        0 => 'Quality',
        1 => 'Taste',
        2 => 'Value',
      ],
      'SecondaryRatings' => [
        'Quality' => [
          'Id' => 'Quality',
          'Value' => 3,
          'Label' => 'quality',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Taste' => [
          'Id' => 'Taste',
          'Value' => 1,
          'Label' => 'taste',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Value' => [
          'Id' => 'Value',
          'Value' => 1,
          'Label' => 'value',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
      ],
      'BadgesOrder' => [
      ],
      'Badges' => [
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    3 => [
      'id' => '94e80f85-9220-41d7-a319-43bc084495cb',
      'external_id' => 'r119988_16225603WOBZ4sMNmb',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '3275498790',
        'nickname' => 'destinylane',
      ],
      'title' => 'Not as good as the original bar',
      'text' => 'Not sure why but these don\'t taste like the original bar at all. They don\'t have much taste at all.',
      'is_verified' => true,
      'feedback' => [
        'helpful' => 2,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-06-01T15:13:15.000+00:00',
      'modified_at' => '2021-08-13T15:14:46.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 2,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
      ],
      'SecondaryRatings' => [
      ],
      'BadgesOrder' => [
        0 => 'verifiedPurchaser',
      ],
      'Badges' => [
        'verifiedPurchaser' => [
          'Id' => 'verifiedPurchaser',
          'ContentType' => 'REVIEW',
          'BadgeType' => 'Custom',
        ],
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    4 => [
      'id' => 'dc6e0cfe-f0af-400b-a4fc-09d9bc331f98',
      'external_id' => 'r119988_16206734URQRWYBVik',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '1846157459',
        'nickname' => 'Sarah',
      ],
      'title' => 'Will buy again!',
      'text' => 'So yummy! Love that these aren’t as hard as most Kind bars are. Taste is great! Perfect little snack.',
      'is_verified' => true,
      'is_recommended' => true,
      'feedback' => [
        'helpful' => 3,
        'unhelpful' => 1,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-05-10T19:03:58.000+00:00',
      'modified_at' => '2021-12-16T19:27:25.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 5,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
        0 => 'Quality',
        1 => 'Value',
        2 => 'Taste',
      ],
      'SecondaryRatings' => [
        'Quality' => [
          'Id' => 'Quality',
          'Value' => 5,
          'Label' => 'quality',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Value' => [
          'Id' => 'Value',
          'Value' => 5,
          'Label' => 'value',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Taste' => [
          'Id' => 'Taste',
          'Value' => 5,
          'Label' => 'taste',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
      ],
      'BadgesOrder' => [
        0 => 'verifiedPurchaser',
      ],
      'Badges' => [
        'verifiedPurchaser' => [
          'Id' => 'verifiedPurchaser',
          'ContentType' => 'REVIEW',
          'BadgeType' => 'Custom',
        ],
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    5 => [
      'id' => 'd5f1b4db-48a1-47e5-af0e-e429194afa11',
      'external_id' => 'r119988_16196404s0IbXQtfqE',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '20047936695',
        'nickname' => 'Alice',
      ],
      'title' => 'kind thin bars',
      'text' => 'Very good taste great product',
      'is_verified' => true,
      'is_recommended' => true,
      'feedback' => [
        'helpful' => 0,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-04-28T20:07:49.000+00:00',
      'modified_at' => '2021-04-28T20:38:54.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 5,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
      ],
      'SecondaryRatings' => [
      ],
      'BadgesOrder' => [
        0 => 'verifiedPurchaser',
      ],
      'Badges' => [
        'verifiedPurchaser' => [
          'Id' => 'verifiedPurchaser',
          'ContentType' => 'REVIEW',
          'BadgeType' => 'Custom',
        ],
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    6 => [
      'id' => '4a48154f-8b42-4ad5-b0b6-d9cbe5723a36',
      'external_id' => 'ad256065-034a-54f4-b0a8-e60a4d105dc3',
      'is_syndicated' => true,
      'channel' => 'BV',
      'author' => [
        'external_id' => '7a0f6b1b-2b40-5dec-8b91-2cf244e846db',
        'nickname' => 'catg1',
      ],
      'title' => 'These taste great. They',
      'text' => 'These taste great. They make a perfect snack. I would recommend these to anyone. Will purchase again. I think these areuch better than regular granola bars.',
      'is_verified' => false,
      'feedback' => [
        'helpful' => 1,
        'unhelpful' => 0,
        'inappropriate' => 1,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-04-26T05:20:01.000+00:00',
      'modified_at' => '2021-12-16T19:27:35.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 5,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
      ],
      'SecondaryRatings' => [
      ],
      'BadgesOrder' => [
      ],
      'Badges' => [
      ],
      'SourceClient' => 'influenster.com',
      'SyndicationSource' => [
        'id' => 'influenster',
        'logo' => 'https://contentorigin.bazaarvoice.com/influenster/default/influenster.png',
        'name' => 'influenster.com',
      ],
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
    7 => [
      'id' => 'b0c236fd-a358-47fc-842c-83757002a859',
      'external_id' => 'r119988_16152291bv0CUk1JU6',
      'is_syndicated' => false,
      'channel' => 'TARGET',
      'author' => [
        'external_id' => '1680817236',
        'nickname' => 'MPayne',
      ],
      'text' => 'These were delicious!',
      'is_verified' => true,
      'is_recommended' => true,
      'feedback' => [
        'helpful' => 0,
        'unhelpful' => 0,
        'inappropriate' => 0,
      ],
      'status' => 'APPROVED',
      'submitted_at' => '2021-03-08T18:46:28.000+00:00',
      'modified_at' => '2021-03-08T19:39:55.000+00:00',
      'photos' => [
      ],
      'tags' => [
      ],
      'reviewer_attributes' => [
      ],
      'ClientResponses' => [
      ],
      'Entities' => [
      ],
      'Tcin' => '81488492',
      'Rating' => 5,
      'RatingRange' => 5,
      'SecondaryRatingsOrder' => [
        0 => 'Value',
        1 => 'Quality',
        2 => 'Taste',
      ],
      'SecondaryRatings' => [
        'Value' => [
          'Id' => 'Value',
          'Value' => 5,
          'Label' => 'value',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Quality' => [
          'Id' => 'Quality',
          'Value' => 5,
          'Label' => 'quality',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
        'Taste' => [
          'Id' => 'Taste',
          'Value' => 5,
          'Label' => 'taste',
          'ValueRange' => 5,
          'DisplayType' => 'NORMAL',
        ],
      ],
      'BadgesOrder' => [
        0 => 'verifiedPurchaser',
      ],
      'Badges' => [
        'verifiedPurchaser' => [
          'Id' => 'verifiedPurchaser',
          'ContentType' => 'REVIEW',
          'BadgeType' => 'Custom',
        ],
      ],
      'SourceClient' => 'targetcom',
      'IsRatingsOnly' => false,
      'ClientResponseCount' => 0,
    ],
  ],
  'first_page' => true,
  'last_page' => true,
  'total_pages' => 1,
]
      ], 200);
    }
}