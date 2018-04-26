<?php

class ApiCest
{
    public function testNotFoundMethod(ApiTester $I)
    {
        $I->sendGET('/notfound');
        $I->seeResponseCodeIs(405);
        $I->seeResponseIsJson();
    }
    public function testGetProducts(ApiTester $I)
    {
        $I->sendGET('/products');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function testProductNotExists(ApiTester $I)
    {
        $I->sendPOST('/order/5');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
    }

    public function testCreateOrder(ApiTester $I)
    {
        $I->sendPOST('/order/4');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function testNotCreateOrder(ApiTester $I)
    {
        $I->sendPOST('/order/4');
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
    }


    public function testGetOrder(ApiTester $I)
    {
        $I->sendGET('/order');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function testDeleteOrder(ApiTester $I)
    {
        $I->sendDELETE('/order/4');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

}