<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($page = 1)
    {
        $result = $this->list($page);
        $current_page = $page;
        // dd($result);
        return view('catalogue')->with(compact('result'))->with(compact('current_page'));
        // return view('catalogue');
    }
    public function index2($page = 1)
    {
        $result = $this->list($page);
        dd($result);
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
        // $info = curl_getinfo($curl);
        // $http_code = curl_getinfo($curl, 12);
        // print_r($info['request_header']);
        // $arr = json_decode($response, false);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        curl_close($curl);

        $arr_head = $this->get_headers_from_curl_response($response);
        $body = substr($response, $header_size);
        $arr_body = json_decode($body, false);
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

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/$id",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'GET',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Basic Y2tfMjY4MmIzNWM0ZDlhOGI2YjZlZmZhYzEyNmFjNTUyZTBiZmIzMTVhMDpjc19jYWI4YzlhNzI5ZGZiNDljNTBjZTgwMWE5ZWE0MWI1NzdjMDBhZDcx',
        //         'Cookie: PHPSESSID=0qcni9758ctgo8qoq8jh3vg5uv'
        //     ),
        // ));

        // $response = curl_exec($curl);
        $response = '{
            "id": 769214,
            "name": "Graphite Pencil 1323-2B",
            "date_modified": "2020-11-02T05:40:38",
            "type": "variation",
            "status": "publish",
            "catalog_visibility": "visible",
            "description": "Most Durable and long lasting Pencil ever made. Elon Musk use this Pencils",
            "sku": "132306-UNIT",
            "regular_price": "7.2",
            "sale_price": "",
            "date_on_sale_from": "",
            "date_on_sale_to": "",
            "tax_class": "",
            "manage_stock": true,
            "stock_quantity": 0,
            "in_stock": true,
            "backorders": "yes",
            "backorders_allowed": true,
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
                },
                {
                    "id": 14326,
                    "name": "Graphite Pencils",
                    "slug": "graphite-pencils"
                }
            ],
            "tags": [],
            "images": [
                {
                    "id": 771423,
                    "src": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2020/10/132306.png",
                    "alt": "",
                    "hash": "9E4EA8EB2B0890853EA9FF77D03D4C2D",
                    "src_small": "https://myboostorder.com/wp-content/uploads/sites/446/2020/10/132306-78x180.png",
                    "src_medium": "https://myboostorder.com/wp-content/uploads/sites/446/2020/10/132306-78x180.png",
                    "src_large": "https://mangomart-autocount.myboostorder.com/wp-content/uploads/sites/446/2020/10/132306.png"
                }
            ],
            "attributes": [
                {
                    "id": 1,
                    "name": "Variations",
                    "option": "UNIT"
                }
            ],
            "default_attributes": [],
            "variations": [],
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
                "sales_item": "",
                "internal_sales_item": "",
                "inventory_item": "",
                "to_hide_during_picking_and_packing": "",
                "source": "",
                "disallow_children_backorders": "",
                "group": "",
                "date_valid_from": "",
                "date_valid_to": "",
                "customer_tiers": "",
                "barcode": "",
                "is_rack_barcode": "",
                "customers": "",
                "price_tags": ""
            },
            "pricing_groups": [],
            "composite_product_details": null,
            "bundle_product_details": null,
            "group_of": 1,
            "minimum_quantity": null,
            "maximum_quantity": null,
            "points_earned": "",
            "points_required": "0",
            "maximum_points_discount": "",
            "inventory": [
                {
                    "branch_id": 619740,
                    "batch_id": "",
                    "stock_quantity": -37,
                    "physical_stock_quantity": 1,
                    "updated_at": "2020-11-02 13:40:40"
                },
                {
                    "branch_id": 768049,
                    "batch_id": "",
                    "stock_quantity": 88,
                    "physical_stock_quantity": 88,
                    "updated_at": "2020-10-27 12:09:09"
                }
            ],
            "_links": {
                "self": [
                    {
                        "href": "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/769213"
                    }
                ],
                "collection": [
                    {
                        "href": "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products"
                    }
                ],
                "up": [
                    {
                        "href": "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/769213"
                    }
                ]
            }
        }';

        // curl_close($curl);
        $detail = json_decode($response, false);

        // dd($detail);
        return view('product')->with(compact('detail'));
    }
}
