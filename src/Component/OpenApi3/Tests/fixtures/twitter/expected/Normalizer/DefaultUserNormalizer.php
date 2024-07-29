<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Jane\Component\OpenApi3\Tests\Expected\Runtime\Normalizer\CheckArray;
use Jane\Component\OpenApi3\Tests\Expected\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class DefaultUserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('format', $data)) {
                $object->setFormat($data['format']);
                unset($data['format']);
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }
            if (\array_key_exists('username', $data)) {
                $object->setUsername($data['username']);
                unset($data['username']);
            }
            if (\array_key_exists('protected', $data)) {
                $object->setProtected($data['protected']);
                unset($data['protected']);
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('withheld', $data)) {
                $object->setWithheld($this->denormalizer->denormalize($data['withheld'], \Jane\Component\OpenApi3\Tests\Expected\Model\UserWithheld::class, 'json', $context));
                unset($data['withheld']);
            }
            if (\array_key_exists('profile_image_url', $data)) {
                $object->setProfileImageUrl($data['profile_image_url']);
                unset($data['profile_image_url']);
            }
            if (\array_key_exists('location', $data)) {
                $object->setLocation($data['location']);
                unset($data['location']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('description', $data)) {
                $object->setDescription($data['description']);
                unset($data['description']);
            }
            if (\array_key_exists('entities', $data)) {
                $object->setEntities($this->denormalizer->denormalize($data['entities'], \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUserFieldsEntities::class, 'json', $context));
                unset($data['entities']);
            }
            if (\array_key_exists('most_recent_tweet_id', $data)) {
                $object->setMostRecentTweetId($data['most_recent_tweet_id']);
                unset($data['most_recent_tweet_id']);
            }
            if (\array_key_exists('pinned_tweet_id', $data)) {
                $object->setPinnedTweetId($data['pinned_tweet_id']);
                unset($data['pinned_tweet_id']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('format') && null !== $object->getFormat()) {
                $data['format'] = $object->getFormat();
            }
            $data['id'] = $object->getId();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['name'] = $object->getName();
            $data['username'] = $object->getUsername();
            $data['protected'] = $object->getProtected();
            $data['verified'] = $object->getVerified();
            if ($object->isInitialized('withheld') && null !== $object->getWithheld()) {
                $data['withheld'] = $this->normalizer->normalize($object->getWithheld(), 'json', $context);
            }
            if ($object->isInitialized('profileImageUrl') && null !== $object->getProfileImageUrl()) {
                $data['profile_image_url'] = $object->getProfileImageUrl();
            }
            if ($object->isInitialized('location') && null !== $object->getLocation()) {
                $data['location'] = $object->getLocation();
            }
            $data['url'] = $object->getUrl();
            $data['description'] = $object->getDescription();
            if ($object->isInitialized('entities') && null !== $object->getEntities()) {
                $data['entities'] = $this->normalizer->normalize($object->getEntities(), 'json', $context);
            }
            if ($object->isInitialized('mostRecentTweetId') && null !== $object->getMostRecentTweetId()) {
                $data['most_recent_tweet_id'] = $object->getMostRecentTweetId();
            }
            if ($object->isInitialized('pinnedTweetId') && null !== $object->getPinnedTweetId()) {
                $data['pinned_tweet_id'] = $object->getPinnedTweetId();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class => false];
        }
    }
} else {
    class DefaultUserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class;
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('format', $data)) {
                $object->setFormat($data['format']);
                unset($data['format']);
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }
            if (\array_key_exists('username', $data)) {
                $object->setUsername($data['username']);
                unset($data['username']);
            }
            if (\array_key_exists('protected', $data)) {
                $object->setProtected($data['protected']);
                unset($data['protected']);
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('withheld', $data)) {
                $object->setWithheld($this->denormalizer->denormalize($data['withheld'], \Jane\Component\OpenApi3\Tests\Expected\Model\UserWithheld::class, 'json', $context));
                unset($data['withheld']);
            }
            if (\array_key_exists('profile_image_url', $data)) {
                $object->setProfileImageUrl($data['profile_image_url']);
                unset($data['profile_image_url']);
            }
            if (\array_key_exists('location', $data)) {
                $object->setLocation($data['location']);
                unset($data['location']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('description', $data)) {
                $object->setDescription($data['description']);
                unset($data['description']);
            }
            if (\array_key_exists('entities', $data)) {
                $object->setEntities($this->denormalizer->denormalize($data['entities'], \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUserFieldsEntities::class, 'json', $context));
                unset($data['entities']);
            }
            if (\array_key_exists('most_recent_tweet_id', $data)) {
                $object->setMostRecentTweetId($data['most_recent_tweet_id']);
                unset($data['most_recent_tweet_id']);
            }
            if (\array_key_exists('pinned_tweet_id', $data)) {
                $object->setPinnedTweetId($data['pinned_tweet_id']);
                unset($data['pinned_tweet_id']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('format') && null !== $object->getFormat()) {
                $data['format'] = $object->getFormat();
            }
            $data['id'] = $object->getId();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['name'] = $object->getName();
            $data['username'] = $object->getUsername();
            $data['protected'] = $object->getProtected();
            $data['verified'] = $object->getVerified();
            if ($object->isInitialized('withheld') && null !== $object->getWithheld()) {
                $data['withheld'] = $this->normalizer->normalize($object->getWithheld(), 'json', $context);
            }
            if ($object->isInitialized('profileImageUrl') && null !== $object->getProfileImageUrl()) {
                $data['profile_image_url'] = $object->getProfileImageUrl();
            }
            if ($object->isInitialized('location') && null !== $object->getLocation()) {
                $data['location'] = $object->getLocation();
            }
            $data['url'] = $object->getUrl();
            $data['description'] = $object->getDescription();
            if ($object->isInitialized('entities') && null !== $object->getEntities()) {
                $data['entities'] = $this->normalizer->normalize($object->getEntities(), 'json', $context);
            }
            if ($object->isInitialized('mostRecentTweetId') && null !== $object->getMostRecentTweetId()) {
                $data['most_recent_tweet_id'] = $object->getMostRecentTweetId();
            }
            if ($object->isInitialized('pinnedTweetId') && null !== $object->getPinnedTweetId()) {
                $data['pinned_tweet_id'] = $object->getPinnedTweetId();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\OpenApi3\Tests\Expected\Model\DefaultUser::class => false];
        }
    }
}