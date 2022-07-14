<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Video\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class RecordingTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Recordings/RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "processing",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T21:00:00Z",
                "date_deleted": "2015-07-30T22:00:00Z",
                "sid": "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "source_sid": "MTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "size": 0,
                "url": "https://video.twilio.com/v1/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "audio",
                "duration": 0,
                "container_format": "mka",
                "codec": "OPUS",
                "track_name": "A name",
                "offset": 10,
                "status_callback": "https://mycallbackurl.com",
                "status_callback_method": "POST",
                "grouping_sids": {
                    "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                },
                "media_external_location": "https://www.twilio.com",
                "encryption_key": "public_key",
                "links": {
                    "media": "https://video.twilio.com/v1/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->recordings->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Recordings'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "recordings": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Recordings?Status=completed&SourceSid=source_sid&MediaType=audio&GroupingSid=RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Recordings?Status=completed&SourceSid=source_sid&MediaType=audio&GroupingSid=RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "recordings"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->recordings->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "recordings": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "completed",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T21:00:00Z",
                        "date_deleted": "2015-07-30T22:00:00Z",
                        "sid": "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "source_sid": "MTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "size": 23,
                        "type": "audio",
                        "duration": 10,
                        "container_format": "mka",
                        "codec": "OPUS",
                        "track_name": "A name",
                        "offset": 10,
                        "status_callback": "https://mycallbackurl.com",
                        "status_callback_method": "POST",
                        "grouping_sids": {
                            "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "participant_sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        },
                        "media_external_location": "https://www.twilio.com",
                        "encryption_key": "public_key",
                        "url": "https://video.twilio.com/v1/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "links": {
                            "media": "https://video.twilio.com/v1/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Recordings?Status=completed&DateCreatedAfter=2017-01-01T00%3A00%3A01Z&DateCreatedBefore=2017-12-31T23%3A59%3A59Z&SourceSid=source_sid&MediaType=audio&GroupingSid=RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Recordings?Status=completed&DateCreatedAfter=2017-01-01T00%3A00%3A01Z&DateCreatedBefore=2017-12-31T23%3A59%3A59Z&SourceSid=source_sid&MediaType=audio&GroupingSid=RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "recordings"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->recordings->read();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://video.twilio.com/v1/Recordings/RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->video->v1->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}