<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public string $response = '{
            "id": 771737,
            "name": "FTW Hoodie",
            "date_modified": "2021-01-28T15:07:25",
            "type": "variable",
            "status": "publish",
            "catalog_visibility": "visible",
            "description": "",
            "sku": "FTW",
            "regular_price": "",
            "sale_price": "",
            "date_on_sale_from": "",
            "date_on_sale_to": "",
            "tax_class": "",
            "manage_stock": false,
            "stock_quantity": 0,
            "in_stock": true,
            "backorders": "no",
            "backorders_allowed": false,
            "backordered": false,
            "weight": "",
            "dimensions": {
                "length": "",
                "width": "",
                "height": ""
            },
            "shipping_class": "",
            "shipping_class_id": 0,
            "cross_sell_ids": [],
            "categories": [
                {
                    "id": 14328,
                    "name": "Must Sell",
                    "slug": "must-sell"
                }
            ],
            "tags": [],
            "images": [
                {
                    "id": 771748,
                    "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg",
                    "alt": "",
                    "hash": "",
                    "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-150x150.jpg",
                    "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-300x300.jpg",
                    "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg"
                }
            ],
            "attributes": [
                {
                    "id": 2,
                    "name": "Color",
                    "position": 1,
                    "visible": true,
                    "variation": true,
                    "options": [
                        "Blue",
                        "Cyan",
                        "Pink"
                    ]
                },
                {
                    "id": 3,
                    "name": "Size",
                    "position": 2,
                    "visible": true,
                    "variation": true,
                    "options": [
                        "L",
                        "M",
                        "S"
                    ]
                }
            ],
            "default_attributes": [],
            "variations": [
                {
                    "id": 771738,
                    "sku": "FTW-P-S-UNIT",
                    "description": "",
                    "regular_price": "95",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771749,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Pink"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "S"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 45,
                            "physical_stock_quantity": 45,
                            "updated_at": "2021-01-28 10:25:07"
                        }
                    ]
                },
                {
                    "id": 771739,
                    "sku": "FTW-P-M-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771749,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Pink"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "M"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": []
                },
                {
                    "id": 771740,
                    "sku": "FTW-P-L-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771749,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/pink-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/pink.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Pink"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "L"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 65,
                            "physical_stock_quantity": 65,
                            "updated_at": "2021-01-28 10:24:56"
                        }
                    ]
                },
                {
                    "id": 771741,
                    "sku": "FTW-C-S-UNIT",
                    "description": "",
                    "regular_price": "95",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771748,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Cyan"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "S"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 12,
                            "physical_stock_quantity": 12,
                            "updated_at": "2021-01-28 10:24:50"
                        }
                    ]
                },
                {
                    "id": 771742,
                    "sku": "FTW-C-M-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771748,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Cyan"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "M"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 212,
                            "physical_stock_quantity": 212,
                            "updated_at": "2021-01-28 10:24:36"
                        }
                    ]
                },
                {
                    "id": 771743,
                    "sku": "FTW-C-L-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771748,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/cyan.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Cyan"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "L"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 769344,
                            "batch_id": null,
                            "stock_quantity": 95,
                            "physical_stock_quantity": 95,
                            "updated_at": "2021-01-28 10:24:30"
                        },
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 68,
                            "physical_stock_quantity": 68,
                            "updated_at": "2021-01-28 10:24:46"
                        }
                    ]
                },
                {
                    "id": 771744,
                    "sku": "FTW-B-S",
                    "description": "",
                    "regular_price": "95",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771747,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Blue"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "S"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": []
                },
                {
                    "id": 771745,
                    "sku": "FTW-B-M-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771747,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Blue"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "M"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 80,
                            "physical_stock_quantity": 80,
                            "updated_at": "2021-01-28 10:24:18"
                        }
                    ]
                },
                {
                    "id": 771746,
                    "sku": "FTW-B-L-UNIT",
                    "description": "",
                    "regular_price": "100",
                    "sale_price": "",
                    "date_on_sale_from": "",
                    "date_on_sale_to": "",
                    "tax_class": "",
                    "manage_stock": false,
                    "stock_quantity": 0,
                    "in_stock": true,
                    "backorders": "no",
                    "backorders_allowed": false,
                    "backordered": false,
                    "weight": "",
                    "dimensions": {
                        "length": "",
                        "width": "",
                        "height": ""
                    },
                    "shipping_class": "",
                    "shipping_class_id": 0,
                    "image": [
                        {
                            "id": 771747,
                            "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg",
                            "alt": "",
                            "hash": "",
                            "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-150x150.jpg",
                            "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2021/01/blue-300x300.jpg",
                            "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2021/01/blue.jpg"
                        }
                    ],
                    "attributes": [
                        {
                            "id": 2,
                            "name": "Color",
                            "option": "Blue"
                        },
                        {
                            "id": 3,
                            "name": "Size",
                            "option": "L"
                        }
                    ],
                    "custom_fields": {
                        "to_hide": "false",
                        "cost": "",
                        "customer_tiers_on_sale": "",
                        "variation_barcode": "",
                        "variation_shelf": "",
                        "conversionrategroup": "",
                        "conversionrate": ""
                    },
                    "points_earned": "",
                    "points_required": "0",
                    "maximum_points_discount": "",
                    "inventory": [
                        {
                            "branch_id": 619740,
                            "batch_id": null,
                            "stock_quantity": 123,
                            "physical_stock_quantity": 123,
                            "updated_at": "2021-01-28 10:24:14"
                        }
                    ]
                }
            ],
            "menu_order": 0,
            "composite_layout": "",
            "composite_components": [],
            "composite_scenarios": [],
            "bundle_layout": "",
            "bundled_by": [],
            "bundled_items": [],
            "mixed_sku_volume_pricing_group": {
                "product_ids": [],
                "product_attributes": []
            },
            "custom_fields": {
                "sales_item": "false",
                "internal_sales_item": "false",
                "inventory_item": "false",
                "to_hide_during_picking_and_packing": "false",
                "source": "",
                "disallow_children_backorders": "false",
                "group": "",
                "date_valid_from": "",
                "date_valid_to": "",
                "customer_tiers": "",
                "barcode": "",
                "is_rack_barcode": "false",
                "customers": "",
                "price_tags": ""
            },
            "pricing_groups": [],
            "bulk_variation_input": {
                "bulk_variation_form": true,
                "single_variation_form": false,
                "columns": "size",
                "rows": "color"
            },
            "composite_product_details": null,
            "bundle_product_details": null,
            "group_of": 1,
            "minimum_quantity": null,
            "maximum_quantity": null,
            "_links": {
                "self": [
                    {
                        "href": "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/771737"
                    }
                ],
                "collection": [
                    {
                        "href": "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products"
                    }
                ]
            }
        }';


    public function index($page = 1)
    {
        $result = $this->list($page);
        $current_page = $page;
        // dd($result);
        return view('catalogue')->with(compact('result'))->with(compact('current_page'));
        // return view('catalogue');
    }

    public function list($page)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products?page=$page",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic Y2tfMjY4MmIzNWM0ZDlhOGI2YjZlZmZhYzEyNmFjNTUyZTBiZmIzMTVhMDpjc19jYWI4YzlhNzI5ZGZiNDljNTBjZTgwMWE5ZWE0MWI1NzdjMDBhZDcx',
            ),
        ));

        $response = curl_exec($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $http_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);
        if ($http_code == 200) {
            $arr_head = $this->get_headers_from_curl_response($response);
            $body = substr($response, $header_size);
            $arr_body = json_decode($body, false);
        } else {
            $arr_head['X-WP-Total'] = 0;
            $arr_body = '';
        }
        $result = array("header" => $arr_head, "body" => $arr_body);
        return $result;
    }
    //convert header string to array
    public function get_headers_from_curl_response($response)
    {
        $headers = array();

        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else {
                list($key, $value) = explode(': ', $line);

                $headers[$key] = $value;
            }

        return $headers;
    }

    public function details($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic Y2tfMjY4MmIzNWM0ZDlhOGI2YjZlZmZhYzEyNmFjNTUyZTBiZmIzMTVhMDpjc19jYWI4YzlhNzI5ZGZiNDljNTBjZTgwMWE5ZWE0MWI1NzdjMDBhZDcx',
                'Cookie: PHPSESSID=0qcni9758ctgo8qoq8jh3vg5uv'
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);
        // $response = $this->response;
        $detail = json_decode($response, false);
        if ($http_code == 200) {
            $variable = array();
            $variable['id'] = $detail->id;
            $variable['type'] = $detail->type;
            $variable['name'] = $detail->name;
            $variable['sku'] = $detail->sku;
            $variable['description'] = $detail->description;
            if ($detail->type == 'variable') {
                foreach ($detail->variations as $variant) {
                    if (!empty($variant->image)) {
                        $variable['images'][$variant->id] = $variant->image[0]->src;
                    } else {
                        $variable['images'][$variant->id] = $detail->images[0]->src;
                    }
                    $variable['price'][$variant->id] = $variant->regular_price;
                    $attributes = '';
                    foreach ($variant->attributes as $attr) {
                        $attributes .= $attr->name . ":" . $attr->option . "  ";
                    }
                    $variable['attribute'][$variant->id] = $attributes;
                }
            } else {
                $variable['price'] = ($detail->regular_price == '') ? 0 : $detail->regular_price;
                $variable['images'][$detail->id] = $detail->images[0]->src;
            }
            $detail = $variable;
        }
        else{
            $detail = array();
            $detail['result']=0; 
        }
        // dd($detail);
        return view('product')->with(compact('detail'));
    }

    public function checkout()
    {
        return view('checkout');
    }
}
