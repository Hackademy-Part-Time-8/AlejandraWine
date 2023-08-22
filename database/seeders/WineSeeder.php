<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $wines = array(
            array(
                'name' => 'Merlot Reserve',
                'description' => 'A smooth red wine with velvety tannins and notes of ripe berries.',
                'winery' => 'Elegant Estates',
                'price' => 28.99,
                'vol' => '13.5%'
            ),
            array(
                'name' => 'Chardonnay Unoaked',
                'description' => 'An unoaked white wine with crisp acidity and flavors of green apple.',
                'winery' => 'Crisp Vineyards',
                'price' => 21.99,
                'vol' => '12%'
            ),
            array(
                'name' => 'Syrah',
                'description' => 'A bold red wine with dark fruit flavors and a touch of black pepper.',
                'winery' => 'Vineyard Classics',
                'price' => 32.99,
                'vol' => '14%'
            ),
            array(
                'name' => 'Sauvignon Blanc Reserve',
                'description' => 'A vibrant white wine with tropical fruit aromas and zesty citrus notes.',
                'winery' => 'Tropical Vines',
                'price' => 23.99,
                'vol' => '12.5%'
            ),
            array(
                'name' => 'Cabernet Franc',
                'description' => 'A medium-bodied red wine with red currant flavors and a hint of herbs.',
                'winery' => 'Heritage Wines',
                'price' => 26.99,
                'vol' => '13%'
            ),
            array(
                'name' => 'Pinot Grigio',
                'description' => 'A refreshing white wine with delicate pear and citrus notes.',
                'winery' => 'Sunshine Vineyards',
                'price' => 19.99,
                'vol' => '11.5%'
            ),
            array(
                'name' => 'Malbec Reserva',
                'description' => 'An aged red wine with layers of blackberry, cocoa, and a touch of smoke.',
                'winery' => 'Reserve Estates',
                'price' => 34.99,
                'vol' => '14.5%'
            ),
            array(
                'name' => 'Riesling',
                'description' => 'A sweet white wine with floral aromas and flavors of ripe peach.',
                'winery' => 'Sweet Harmony Wines',
                'price' => 18.99,
                'vol' => '10.5%'
            ),
            array(
                'name' => 'Zinfandel',
                'description' => 'A bold red wine with dark berry jam flavors and a hint of spice.',
                'winery' => 'Vineyard Treasures',
                'price' => 30.99,
                'vol' => '15%'
            ),
            array(
                'name' => 'Viognier',
                'description' => 'A fragrant white wine with apricot and honeysuckle notes.',
                'winery' => 'Aromatic Vines',
                'price' => 25.99,
                'vol' => '13%'
            )
            );
        foreach($wines as $wine){
            DB::table('wines')->insert([
                'name' =>$wine['name'],
                'description'=>$wine['description'],
                'winery' => $wine['winery'],
                'price' => $wine['price'],
                'vol' => $wine['vol'],
            ]);
        }
    }
}
