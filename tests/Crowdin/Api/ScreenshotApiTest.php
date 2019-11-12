<?php

namespace Crowdin\Tests\Api;

use Crowdin\Model\Screenshot;

class ScreenshotApiTest extends AbstractTestApi
{
    public function testList()
    {
        $this->mockRequestTest([
            'uri' => 'https://organization_domain.crowdin.com/api/v2/projects/2/screenshots',
            'method' => 'get',
            'response' => '{
              "data": [
                {
                  "data": {
                    "id": 2,
                    "userId": 6,
                    "url": "https://production-enterprise-screenshots.downloads.crowdin.com/992000002/6/2/middle.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIGJKLQV66ZXPMMEA%2F20190923%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20190923T093016Z&X-Amz-SignedHeaders=host&X-Amz-Expires=120&X-Amz-Signature=8df06f57594f7d1804b7c037629f6916224415e9b935c4f6619fbe002fb25e73",
                    "name": "translate_with_siri.jpg",
                    "size": {
                      "width": 267,
                      "height": 176
                    },
                    "tagsCount": 0,
                    "tags": [
                      {
                        "id": 98,
                        "screenshotId": 2,
                        "stringId": 2822,
                        "position": {
                          "x": 474,
                          "y": 147,
                          "width": 490,
                          "height": 99
                        },
                        "createdAt": "2019-09-23T09:35:31+00:00"
                      }
                    ],
                    "createdAt": "2019-09-23T09:29:19+00:00",
                    "updatedAt": "2019-09-23T09:29:19+00:00"
                  }
                }
              ],
              "pagination": [
                {
                  "offset": 0,
                  "limit": 0
                }
              ]
            }'
        ]);

        $screenshots = $this->crowdin->screenshot->list(2);

        $this->assertIsArray($screenshots);
        $this->assertCount(1, $screenshots);
        $this->assertInstanceOf(Screenshot::class, $screenshots[0]);
        $this->assertEquals(2, $screenshots[0]->getId());
    }
}
