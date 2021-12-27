<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewItemsTest extends TestCase
{
   /** @test */
    public function the_index_page_shows_the_correct_info()
    {   
      Http::fake([
            'https://target1.p.rapidapi.com/products/v2/list' => $this->fakeProductsList(),
        ]);

        $response = $this->get(route('/'));

        $response->assertStatus(200);

        $response->assertSee('Organic Bananas - 2lb Bag');

    }

     /** @test */
    public function the_index_page_shows_the_correct_categories()
    {   
      Http::fake([
            'https://target1.p.rapidapi.com/categories/list' => $this->fakeCategoriesList(),
        ]);

        $response = $this->get(route('/'));

        $response->assertSee('Grocery');
        $response->assertSee('Electronics');
        $response->assertSee('School & Office Supplies');

    }

    private function fakeProductsList(){
        return Http::response([
                'results' => [
    'search' => [
      'products' => [
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
],
    200,);
    }

    private function fakeCategoriesList(){
      return Http::response(
        ['results' =>[
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
],
],200);
    }
        }