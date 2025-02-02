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
    class DefaultPlaceFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('place_type', $data)) {
                $object->setPlaceType($data['place_type']);
                unset($data['place_type']);
            }
            if (\array_key_exists('full_name', $data)) {
                $object->setFullName($data['full_name']);
                unset($data['full_name']);
            }
            if (\array_key_exists('country', $data)) {
                $object->setCountry($data['country']);
                unset($data['country']);
            }
            if (\array_key_exists('contained_within', $data)) {
                $values = [];
                foreach ($data['contained_within'] as $value) {
                    $values[] = $value;
                }
                $object->setContainedWithin($values);
                unset($data['contained_within']);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['place_type'] = $object->getPlaceType();
            $data['full_name'] = $object->getFullName();
            $data['country'] = $object->getCountry();
            if ($object->isInitialized('containedWithin') && null !== $object->getContainedWithin()) {
                $values = [];
                foreach ($object->getContainedWithin() as $value) {
                    $values[] = $value;
                }
                $data['contained_within'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class => false];
        }
    }
} else {
    class DefaultPlaceFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class;
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
            $object = new \Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('place_type', $data)) {
                $object->setPlaceType($data['place_type']);
                unset($data['place_type']);
            }
            if (\array_key_exists('full_name', $data)) {
                $object->setFullName($data['full_name']);
                unset($data['full_name']);
            }
            if (\array_key_exists('country', $data)) {
                $object->setCountry($data['country']);
                unset($data['country']);
            }
            if (\array_key_exists('contained_within', $data)) {
                $values = [];
                foreach ($data['contained_within'] as $value) {
                    $values[] = $value;
                }
                $object->setContainedWithin($values);
                unset($data['contained_within']);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            $data['place_type'] = $object->getPlaceType();
            $data['full_name'] = $object->getFullName();
            $data['country'] = $object->getCountry();
            if ($object->isInitialized('containedWithin') && null !== $object->getContainedWithin()) {
                $values = [];
                foreach ($object->getContainedWithin() as $value) {
                    $values[] = $value;
                }
                $data['contained_within'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\OpenApi3\Tests\Expected\Model\DefaultPlaceFields::class => false];
        }
    }
}