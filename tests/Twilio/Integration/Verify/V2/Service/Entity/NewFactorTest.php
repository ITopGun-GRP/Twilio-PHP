<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Verify\V2\Service\Entity;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class NewFactorTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->verify->v2->services("VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->entities("identity")
                                     ->newFactors->create("friendly_name", "push");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['FriendlyName' => "friendly_name", 'FactorType' => "push", ];

        $this->assertRequest(new Request(
            'post',
            'https://verify.twilio.com/v2/Services/VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Entities/identity/Factors',
            null,
            $values
        ));
    }

    public function testCreatePushResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "YFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "VAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "entity_sid": "YEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "ff483d1ff591898a9942916050d2ca3f",
                "binding": {
                    "alg": "ES256",
                    "public_key": "MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAE8GdwtibWe0kpgsFl6xPQBwhtwUEyeJkeozFmi2jiJDzxFSMwVy3kVR1h/dPVYOfgkC0EkfBRJ0J/6xW47FD5vA=="
                },
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "status": "unverified",
                "factor_type": "push",
                "config": {
                    "sdk_version": "1.0",
                    "app_id": "com.example.myapp",
                    "notification_platform": "fcm",
                    "notification_token": "test_token"
                },
                "metadata": {
                    "os": "Android"
                },
                "url": "https://verify.twilio.com/v2/Services/VAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f/Factors/YFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->verify->v2->services("VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->entities("identity")
                                           ->newFactors->create("friendly_name", "push");

        $this->assertNotNull($actual);
    }

    public function testCreateTotpResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "YFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "VAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "entity_sid": "YEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "ff483d1ff591898a9942916050d2ca3f",
                "binding": {
                    "secret": "GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ",
                    "uri": "otpauth://totp/test-issuer:John%E2%80%99s%20Account%20Name?secret=GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ&issuer=test-issuer&algorithm=SHA1&digits=6&period=30"
                },
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "status": "unverified",
                "factor_type": "totp",
                "config": {
                    "alg": "sha1",
                    "skew": 1,
                    "code_length": 6,
                    "time_step": 30
                },
                "metadata": null,
                "url": "https://verify.twilio.com/v2/Services/VAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f/Factors/YFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->verify->v2->services("VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->entities("identity")
                                           ->newFactors->create("friendly_name", "push");

        $this->assertNotNull($actual);
    }
}