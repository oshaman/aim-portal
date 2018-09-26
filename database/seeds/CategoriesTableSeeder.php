<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['slug'=>'Budіvnictvo-zhitlovih-budinkіv', 'created_at'=>Carbon::now()],
                ['slug'=>'Dizajn-іnterjеru', 'created_at'=>Carbon::now()],
                ['slug'=>'Prodazh-ta-arenda-neruhomostі', 'created_at'=>Carbon::now()],
                ['slug'=>'Remont-restavracіja-ta-rekonstrukcіja', 'created_at'=>Carbon::now()],
                ['slug'=>'Budіvelna-tehnіka-ta-obladnannja', 'created_at'=>Carbon::now()],
                ['slug'=>'Budіvel-nі-materіali', 'created_at'=>Carbon::now()],
                ['slug'=>'Vodozabezpechennja', 'created_at'=>Carbon::now()],
                ['slug'=>'Teplozabezpechennja', 'created_at'=>Carbon::now()],
                ['slug'=>'Ozdobljuvalnі-roboti', 'created_at'=>Carbon::now()],
                ['slug'=>'Arhіtektura-ta-proektuvannja', 'created_at'=>Carbon::now()],
                ['slug'=>'Neruhomіst', 'created_at'=>Carbon::now()],
                ['slug'=>'Elektromontazh', 'created_at'=>Carbon::now()],
            ]
        );
    }
}
//
//'name'=>'Будівництво житлових будинків',
//'name'=>'Дизайн інтер\'єру',
//'name'=>'Продаж та аренда нерухомості',
//'name'=>'Ремонт, реставрація та реконструкція',
//'name'=>'Будівельна техніка та обладнання',
//'name'=>'Будівельні матеріали',
//'name'=>'Водозабезпечення',
//'name'=>'Теплозабезпечення',
//'name'=>'Оздоблювальні роботи',
//'name'=>'Архітектура та проектування',
//'name'=>'Нерухомість',
//'name'=>'Електромонтаж',