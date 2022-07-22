<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\FlexApi\V1\Interaction;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class InteractionChannelTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "type": "chat",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "closed",
                "error_code": 19025,
                "error_message": "Channel validation error",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "links": {
                    "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants",
                    "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Invites"
                }
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels'
        ));
    }

    public function testReadResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "channels": [
                    {
                        "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                        "type": "chat",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "closed",
                        "error_code": 19025,
                        "error_message": "Channel validation error",
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                        "links": {
                            "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants",
                            "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Invites"
                        }
                    },
                    {
                        "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2",
                        "type": "sms",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "active",
                        "error_code": null,
                        "error_message": null,
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2",
                        "links": {
                            "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2/Participants",
                            "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2/Invites"
                        }
                    },
                    {
                        "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa3",
                        "type": "email",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "failed",
                        "error_code": 19025,
                        "error_message": "Channel validation error",
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa3",
                        "links": {
                            "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa3/Participants",
                            "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa3/Invites"
                        }
                    },
                    {
                        "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4",
                        "type": "voice",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "setup",
                        "error_code": null,
                        "error_message": null,
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4",
                        "links": {
                            "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4/Participants",
                            "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4/Invites"
                        }
                    },
                    {
                        "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa5",
                        "type": "gbm",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "failed",
                        "error_code": 19025,
                        "error_message": "Channel validation error",
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa5",
                        "links": {
                            "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa5/Participants",
                            "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa5/Invites"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "channels"
                }
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels->read();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("close");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Status' => "close", ];

        $this->assertRequest(new Request(
            'post',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "chat",
                "status": "closed",
                "error_code": 19025,
                "error_message": "Channel validation error",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "links": {
                    "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants",
                    "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Invites"
                }
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("close");

        $this->assertNotNull($actual);
    }

    public function testUpdateStatusClosedResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "chat",
                "status": "failed",
                "error_code": 19025,
                "error_message": "Channel validation error",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "links": {
                    "participants": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants",
                    "invites": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Invites"
                }
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("close");

        $this->assertNotNull($actual);
    }
}