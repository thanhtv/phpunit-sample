<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Url;

class UrlTest extends TestCase
{
    /**
     * Testing slug method
     * @param string $originalString String to be slug
     * @param string $expectedResult What we expect our slug result to be
     *
     * @dataProvider providerTestSlugReturnsSlugUrl
     */
    public function testSlugReturnSlugUrl($originalString, $expectedResult)
    {
        $url = new Url();

        $result = $url->slug($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestSlugReturnsSlugUrl()
    {
        return [
            [
                'Lorem Ipsum is simply dummy text.',
                'lorem-ipsum-is-simply-dummy-text'
            ],
            [
                'LOREM IPSUM IS SIMPLY DUMMY TEXT.',
                'lorem-ipsum-is-simply-dummy-text'
            ],
            [
                'Lorem1 Ipsum20 is10 simply12 dummy34 text55',
                'lorem1-ipsum20-is10-simply12-dummy34-text55'
            ],
            [
                'Lorem! @Ipsum#$ %$is() "simply dummy text.',
                'lorem-ipsum-is-simply-dummy-text'
            ],
            [
                'Giá mít Thái giảm còn vài nghìn đồng một kg',
                'gi-mt-thi-gim-cn-vi-nghn-ng-mt-kg'
            ],
            [
                '',
                ''
            ]
        ];
    }
}