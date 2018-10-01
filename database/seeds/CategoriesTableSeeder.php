<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->getArr();

        foreach ($data as $item) {
            Category::reguard();
            $category = Category::add($item);
            $category->setProperties($item['properties']);
        }
    }

    public function getArr()
    {
        return [
            ['slug' => 'socialni-poslugi', 'properties' => ['uk' => ['name' => 'Соціальні послуги'], 'ru' => ['name' => 'Соціальні послуги'],]],
            ['slug' => 'budіvnictvo', 'properties' => ['uk' => ['name' => 'Будівництво'], 'ru' => ['name' => 'Будівництво'],]],
            ['slug' => 'budіvnictvo-zhitlovih-budinkіv', 'properties' => ['uk' => ['name' => 'Будівництво житлових будинків'], 'ru' => ['name' => 'Будівництво житлових будинків'],]],
            ['slug' => 'dizajn-іnterjеru', 'properties' => ['uk' => ['name' => 'Дизайн інтер\'єру'], 'ru' => ['name' => 'Дизайн інтер\'єру'],]],
            ['slug' => 'prodazh-ta-arenda-neruhomostі', 'properties' => ['uk' => ['name' => 'Продаж та аренда нерухомості'], 'ru' => ['name' => 'Продаж та аренда нерухомості'],]],
            ['slug' => 'remont-restavracіja-ta-rekonstrukcіja', 'properties' => ['uk' => ['name' => 'Ремонт, реставрація та реконструкція'], 'ru' => ['name' => 'Ремонт, реставрація та реконструкція'],]],
            ['slug' => 'budіvelna-tehnіka-ta-obladnannja', 'properties' => ['uk' => ['name' => 'Будівельна техніка та обладнання'], 'ru' => ['name' => 'Будівельна техніка та обладнання'],]],
            ['slug' => 'budіvel-nі-materіali', 'properties' => ['uk' => ['name' => 'Будівельні матеріали'], 'ru' => ['name' => 'Будівельні матеріали'],]],
            ['slug' => 'vodozabezpechennja', 'properties' => ['uk' => ['name' => 'Водозабезпечення'], 'ru' => ['name' => 'Водозабезпечення'],]],
            ['slug' => 'teplozabezpechennja', 'properties' => ['uk' => ['name' => 'Теплозабезпечення'], 'ru' => ['name' => 'Теплозабезпечення'],]],
            ['slug' => 'ozdobljuvalnі-roboti', 'properties' => ['uk' => ['name' => 'Оздоблювальні роботи'], 'ru' => ['name' => 'Оздоблювальні роботи'],]],
            ['slug' => 'arhіtektura-ta-proektuvannja', 'properties' => ['uk' => ['name' => 'Архітектура та проектування'], 'ru' => ['name' => 'Архітектура та проектування'],]],
            ['slug' => 'neruhomіst', 'properties' => ['uk' => ['name' => 'Нерухомість'], 'ru' => ['name' => 'Нерухомість'],]],
            ['slug' => 'elektromontazh', 'properties' => ['uk' => ['name' => 'Електромонтаж'], 'ru' => ['name' => 'Електромонтаж'],]],
            ['slug' => 'ekskursiyi', 'properties' => ['uk' => ['name' => 'Екскурсії'], 'ru' => ['name' => 'Екскурсії'],]],
            ['slug' => 'bezkoshtovni-kursi', 'properties' => ['uk' => ['name' => 'Безкоштовні курси'], 'ru' => ['name' => 'Безкоштовні курси'],]],
            ['slug' => 'yuridichni-konsultaciyi', 'properties' => ['uk' => ['name' => 'Юридичні консультації'], 'ru' => ['name' => 'Юридичні консультації'],]],
        ];
    }
}
