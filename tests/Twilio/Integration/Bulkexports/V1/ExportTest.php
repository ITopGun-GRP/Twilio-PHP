<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Bulkexports\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ExportTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->bulkexports->v1->exports("resource_type")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://bulkexports.twilio.com/v1/Exports/resource_type'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "resource_type": "Messages",
                "url": "https://bulkexports.twilio.com/v1/Exports/Messages",
                "links": {
                    "days": "https://bulkexports.twilio.com/v1/Exports/Messages/Days"
                }
            }
            '
        ));

        $actual = $this->twilio->bulkexports->v1->exports("resource_type")->fetch();

        $this->assertNotNull($actual);
    }
}