<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Numbers\V2\RegulatoryCompliance\Bundle;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class BundleCopyTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->numbers->v2->regulatoryCompliance
                                      ->bundles("BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->bundleCopies->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Copies'
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "regulation_sid": "RNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "status": "draft",
                "valid_until": "2015-07-30T20:00:00Z",
                "email": "email",
                "status_callback": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z"
            }
            '
        ));

        $actual = $this->twilio->numbers->v2->regulatoryCompliance
                                            ->bundles("BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->bundleCopies->create();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->numbers->v2->regulatoryCompliance
                                      ->bundles("BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->bundleCopies->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Copies'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "results": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Copies?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Copies?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "results"
                }
            }
            '
        ));

        $actual = $this->twilio->numbers->v2->regulatoryCompliance
                                            ->bundles("BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->bundleCopies->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "results": [
                    {
                        "sid": "BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "regulation_sid": "RNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "friendly_name",
                        "status": "twilio-approved",
                        "email": "email",
                        "status_callback": "http://www.example.com",
                        "valid_until": "2020-07-31T01:00:00Z",
                        "date_created": "2019-07-30T22:29:24Z",
                        "date_updated": "2019-07-31T01:09:00Z"
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Copies?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://numbers.twilio.com/v2/RegulatoryCompliance/Bundles/BUaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Copies?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "results"
                }
            }
            '
        ));

        $actual = $this->twilio->numbers->v2->regulatoryCompliance
                                            ->bundles("BUXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->bundleCopies->read();

        $this->assertGreaterThan(0, \count($actual));
    }
}