<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Classes\CustomHelpers;

class PageTitleTest extends TestCase
{
    public function test_set_page_title_with_page_title(): void
    {
        $pageTitle = 'Test title';
        $expectedResult = $pageTitle . ' - ' . CustomHelpers::$appName;
        $result = CustomHelpers::setPageTitle($pageTitle);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_set_page_title_without_page_title(): void
    {
        $expectedResult = CustomHelpers::$appName;
        $result = CustomHelpers::setPageTitle();

        $this->assertEquals($expectedResult, $result);
    }
}
