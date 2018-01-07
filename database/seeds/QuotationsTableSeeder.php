<?php

use App\Models\Quotation;
use App\Models\Template;
use Illuminate\Database\Seeder;

class QuotationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quotation::class, 100)->create()->each(function ($q) {
            return $q->templates()->saveMany(Template::all()->random()->take(2)->get());
        });
    }
}
