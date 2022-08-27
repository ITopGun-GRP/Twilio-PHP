<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Routes\V2;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SipDomainTest extends HolodeckTestCase {
    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->routes->v2->sipDomains("sip_domain")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://routes.twilio.com/v2/SipDomains/sip_domain'
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://routes.twilio.com/v2/SipDomains/test.sip.twilio.com",
                "sip_domain": "test.sip.twilio.com",
                "sid": "QQaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "voice_region": "au1",
                "date_created": "2020-08-07T22:29:24Z",
                "date_updated": "2020-08-07T22:29:24Z"
            }
            '
        ));

        $actual = $this->twilio->routes->v2->sipDomains("sip_domain")->update();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->routes->v2->sipDomains("sip_domain")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://routes.twilio.com/v2/SipDomains/sip_domain'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://routes.twilio.com/v2/SipDomains/test.sip.twilio.com",
                "account_sid": "AC00000000000000000000000000000000",
                "sid": "QQ00000000000000000000000000000000",
                "sip_domain": "test.sip.twilio.com",
                "friendly_name": "string",
                "voice_region": "string",
                "date_created": "2022-06-02T22:33:47Z",
                "date_updated": "2022-06-02T22:33:47Z"
            }
            '
        ));

        $actual = $this->twilio->routes->v2->sipDomains("sip_domain")->fetch();

        $this->assertNotNull($actual);
    }
}