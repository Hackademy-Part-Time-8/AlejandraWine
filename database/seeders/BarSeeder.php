<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bares = array(
            array(
                'name' => 'The Enchanted Emporium',
                'description' => 'A mystical oasis where potions and mixology create otherworldly experiences.'
            ),
            array(
                'name' => 'The Glimmering Gastronomer',
                'description' => 'Explore a celestial menu of cocktails, where stars align in every sip.'
            ),
            array(
                'name' => 'The Majestic Masquerade',
                'description' => 'Unveil the hidden flavors behind ornate masks of mixology delight.'
            ),
            array(
                'name' => 'The Whimsical Whiskey Wonderland',
                'description' => 'Step into a whimsical wonderland of rare whiskies and magical concoctions.'
            ),
            array(
                'name' => 'The Ephemeral Elixir Enclave',
                'description' => 'Sip on elixirs that transcend time and space in this ethereal sanctuary.'
            ),
            array(
                'name' => 'The Radiant Rainforest Retreat',
                'description' => 'Immerse yourself in lush greenery while savoring exotic cocktails inspired by the rainforest.'
            ),
            array(
                'name' => 'The Astral Alchemist Lounge',
                'description' => 'Witness mixology turned into alchemy, as drinks shimmer and transform like stars.'
            ),
            array(
                'name' => 'The Glittering Goblet Gala',
                'description' => 'A dazzling soirée of elegant libations served in sparkling goblets.'
            ),
            array(
                'name' => 'The Celestial Serenade Speakeasy',
                'description' => 'A hidden gem where melodies and mixology harmonize for an unforgettable night.'
            ),
            array(
                'name' => 'The Opulent Oceanic Oasis',
                'description' => 'Dive into a world of marine-inspired cocktails in a bar adorned with oceanic extravagance.'
            ),
            array(
                'name' => 'The Flamboyant Firefly Lounge',
                'description' => 'Experience the enchantment of glowing cocktails and a magical ambiance.'
            ),
            array(
                'name' => 'The Velvet Vortex Vault',
                'description' => 'Be mesmerized by swirling vortex patterns and signature drinks that redefine elegance.'
            ),
            array(
                'name' => 'The Crowned Cognac Court',
                'description' => 'A regal gathering of premium cognacs and refined cocktails fit for kings and queens.'
            ),
            array(
                'name' => 'The Crystal Caravan Carouse',
                'description' => 'Embark on a journey of crystal-inspired cocktails, a caravan of delight.'
            ),
            array(
                'name' => 'The Ornate Orchid Boudoir',
                'description' => 'Sip on floral-infused drinks amidst an opulent boudoir adorned with exquisite orchids.'
            ),
            array(
                'name' => 'The Grand Galactical Gala',
                'description' => 'A celestial affair where cosmic cocktails and stardust shimmer under dimmed lights.'
            ),
            array(
                'name' => 'The Plush Paradox Parlour',
                'description' => 'Delight in the paradoxical world of plush decor and daring mixology experiments.'
            ),
            array(
                'name' => 'The Luminous Libation Lounge',
                'description' => 'An illuminating experience of innovative drinks served in a softly glowing ambiance.'
            ),
            array(
                'name' => 'The Golden Gatsby Grotto',
                'description' => 'Step back in time to the roaring twenties and indulge in Gatsby-esque cocktails.'
            ),
            array(
                'name' => 'The Pearl Pinnacle Piazza',
                'description' => 'An elevated experience of pearly cocktails in a luxurious rooftop piazza setting.'
            ),
        );
        
        foreach($bares as $bar){
            DB::table('bars')->insert([
                'name' =>$bar['name'],
                'description'=>$bar['description'],
            ]);
        }
    }
}
