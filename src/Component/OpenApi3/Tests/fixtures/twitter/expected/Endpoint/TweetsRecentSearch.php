<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class TweetsRecentSearch extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    protected $accept;
    /**
     * Returns Tweets from the last 7 days that match a search query.
     *
     * @param array $queryParameters {
     *     @var string $query One query/rule/filter for matching Tweets. Up to 512 characters.
     *     @var string $start_time YYYY-MM-DDTHH:mm:ssZ. The oldest UTC timestamp (from most recent 7 days) from which the Tweets will be provided. Timestamp is in second granularity and is inclusive (i.e. 12:00:01 includes the first second of the minute).
     *     @var string $end_time YYYY-MM-DDTHH:mm:ssZ. The newest, most recent UTC timestamp to which the Tweets will be provided. Timestamp is in second granularity and is exclusive (i.e. 12:00:01 excludes the first second of the minute).
     *     @var string $since_id Returns results with a Tweet ID greater than (that is, more recent than) the specified ID.
     *     @var string $until_id Returns results with a Tweet ID less than (that is, older than) the specified ID.
     *     @var int $max_results The maximum number of search results to be returned by a request.
     *     @var string $next_token This parameter is used to get the next 'page' of results. The value used with the parameter is pulled directly from the response provided by the API, and should not be modified.
     *     @var string $format Format for all the objects returned as part of the response, including expansions.
     *     @var string $tweet.format Format for all [Tweet](#Tweet) objects returned in response. Can be used together with other format parameters to expand or reduce Tweet objects only.
     *     @var string $user.format Format for all [User](#User) objects returned in response. Can be used together with other format parameters to expand or reduce User objects only.
     *     @var string $place.format Format for all place objects returned in response.
     *     @var array $expansions A comma separated list of fields to expand.
     * }
     * @param array $accept Accept content header application/json|application/problem+json
     */
    public function __construct(array $queryParameters = [], array $accept = [])
    {
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/labs/1/tweets/search';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'application/problem+json']];
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['query', 'start_time', 'end_time', 'since_id', 'until_id', 'max_results', 'next_token', 'format', 'tweet.format', 'user.format', 'place.format', 'expansions']);
        $optionsResolver->setRequired(['query']);
        $optionsResolver->setDefaults(['max_results' => 10]);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('start_time', ['string']);
        $optionsResolver->addAllowedTypes('end_time', ['string']);
        $optionsResolver->addAllowedTypes('since_id', ['string']);
        $optionsResolver->addAllowedTypes('until_id', ['string']);
        $optionsResolver->addAllowedTypes('max_results', ['int']);
        $optionsResolver->addAllowedTypes('next_token', ['string']);
        $optionsResolver->addAllowedTypes('format', ['string']);
        $optionsResolver->addAllowedTypes('tweet.format', ['string']);
        $optionsResolver->addAllowedTypes('user.format', ['string']);
        $optionsResolver->addAllowedTypes('place.format', ['string']);
        $optionsResolver->addAllowedTypes('expansions', ['array']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\TweetSearchResponse|\Jane\Component\OpenApi3\Tests\Expected\Model\Error
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Jane\Component\OpenApi3\Tests\Expected\Model\TweetSearchResponse', 'json');
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Jane\Component\OpenApi3\Tests\Expected\Model\Error', 'json');
        }
        if (mb_strpos($contentType, 'application/problem+json') !== false) {
            return json_decode($body);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}