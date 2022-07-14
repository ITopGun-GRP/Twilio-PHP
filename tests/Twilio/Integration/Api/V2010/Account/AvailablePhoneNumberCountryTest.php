<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Api\V2010\Account;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class AvailablePhoneNumberCountryTest extends HolodeckTestCase {
    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->availablePhoneNumbers->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/AvailablePhoneNumbers.json'
        ));
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [
                    {
                        "beta": false,
                        "country": "Denmark",
                        "country_code": "DK",
                        "subresource_uris": {
                            "local": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers/DK/Local.json"
                        },
                        "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers/DK.json"
                    }
                ],
                "end": 1,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->availablePhoneNumbers->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [],
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->availablePhoneNumbers->read();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->availablePhoneNumbers("US")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/AvailablePhoneNumbers/US.json'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "beta": null,
                "country": "United States",
                "country_code": "US",
                "subresource_uris": {
                    "local": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers/US/Local.json",
                    "toll_free": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers/US/TollFree.json"
                },
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/AvailablePhoneNumbers/US.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->availablePhoneNumbers("US")->fetch();

        $this->assertNotNull($actual);
    }
}