<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\FlexApi\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class InsightsQuestionnairesCategoryTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['token' => "token", ];

        try {
            $this->twilio->flexApi->v1->insightsQuestionnairesCategory->create("name", $options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Name' => "name", ];

        $headers = ['Token' => "token", ];

        $this->assertRequest(new Request(
            'post',
            'https://flex-api.twilio.com/v1/Insights/QM/Categories',
            [],
            $values,
            $headers
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "category_id": "4b4e78e4-4f05-49e2-bf52-0973c5cde419",
                "name": "abc",
                "url": "https://flex-api.twilio.com/v1/Insights/QM/Categories/4b4e78e4-4f05-49e2-bf52-0973c5cde419"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->insightsQuestionnairesCategory->create("name");

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['token' => "token", ];

        try {
            $this->twilio->flexApi->v1->insightsQuestionnairesCategory("category_id")->update("name", $options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Name' => "name", ];

        $headers = ['Token' => "token", ];

        $this->assertRequest(new Request(
            'post',
            'https://flex-api.twilio.com/v1/Insights/QM/Categories/category_id',
            [],
            $values,
            $headers
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "category_id": "4b4e78e4-4f05-49e2-bf52-0973c5cde419",
                "name": "abcd",
                "url": "https://flex-api.twilio.com/v1/Insights/QM/Categories/4b4e78e4-4f05-49e2-bf52-0973c5cde419"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->insightsQuestionnairesCategory("category_id")->update("name");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['token' => "token", ];

        try {
            $this->twilio->flexApi->v1->insightsQuestionnairesCategory("category_id")->delete($options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $headers = ['Token' => "token", ];

        $this->assertRequest(new Request(
            'delete',
            'https://flex-api.twilio.com/v1/Insights/QM/Categories/category_id',
            [],
            [],
            $headers
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->flexApi->v1->insightsQuestionnairesCategory("category_id")->delete();

        $this->assertTrue($actual);
    }
}