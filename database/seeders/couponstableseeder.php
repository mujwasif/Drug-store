<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class couponstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        coupon::created([
            'code'=>'ABC50',
            'type'=>'fixed',
            'value'=>'50',
        ]); 
        
        coupon::created([
            'code'=>'EFG10',
            'type'=>'percent',
            'value'=>'10',
        ]);    

        
    }
}
