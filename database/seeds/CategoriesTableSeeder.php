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

    public function getArr()
    {
        return [
            ['slug'=>'Budіvnictvo-zhitlovih-budinkіv', 'created_at'=>Carbon::now(), 'name'=>'Будівництво житлових будинків',],
            ['slug'=>'Dizajn-іnterjеru', 'created_at'=>Carbon::now(), 'name'=>'Дизайн інтер\'єру',],
            ['slug'=>'Prodazh-ta-arenda-neruhomostі', 'created_at'=>Carbon::now(), 'name'=>'Продаж та аренда нерухомості',],
            ['slug'=>'Remont-restavracіja-ta-rekonstrukcіja', 'created_at'=>Carbon::now(), 'name'=>'Ремонт, реставрація та реконструкція',],
            ['slug'=>'Budіvelna-tehnіka-ta-obladnannja', 'created_at'=>Carbon::now(), 'name'=>'Будівельна техніка та обладнання',],
            ['slug'=>'Budіvel-nі-materіali', 'created_at'=>Carbon::now(), 'name'=>'Будівельні матеріали',],
            ['slug'=>'Vodozabezpechennja', 'created_at'=>Carbon::now(), 'name'=>'Водозабезпечення',],
            ['slug'=>'Teplozabezpechennja', 'created_at'=>Carbon::now(), 'name'=>'Теплозабезпечення',],
            ['slug'=>'Ozdobljuvalnі-roboti', 'created_at'=>Carbon::now(), 'name'=>'Оздоблювальні роботи',],
            ['slug'=>'Arhіtektura-ta-proektuvannja', 'created_at'=>Carbon::now(), 'name'=>'Архітектура та проектування',],
            ['slug'=>'Neruhomіst', 'created_at'=>Carbon::now(), 'name'=>'Нерухомість',],
            ['slug'=>'Elektromontazh', 'created_at'=>Carbon::now(), 'name'=>'Електромонтаж',],
        ];
    }
}