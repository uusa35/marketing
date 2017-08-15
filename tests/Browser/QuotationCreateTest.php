<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuotationCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group quotation.create
     */
    public function test_create_new_quotation_test()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                ->visit('/quotation/create')
                ->type('input[name=to]','Gentlemen')
                ->type('input[name=from]','from Ideasowners')
                ->type('input[name=receivers]','email@mail.com;anotheremail@email.com;testing@email.com')
                ->type('input[name=subject]','الموضوع عرض سعر كذا كذا كذا')
                ->type('input[name=brief]','تحية طيبة وبعد سيتم الوضع في الاعتبار كذا وكذا')
                ->type('input[name=title]','عنوان الجدول هنا')
//                ->type('textarea[name=content]','بنود عرض لاسعر هنا')
                ->type('input[name=price]',1234)
                ->type('input[name=total]',1234)
                ->type('input[name=discount]',12)
                ->type('input[name=net_total]',1234)
//                ->type('textarea[name=hints]','بعض الملاحظات لااخرى هنا')
                ->pause(10000000);
        });
    }
}
