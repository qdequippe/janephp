<?php

namespace Jane\Component\JsonSchema\Tests\Expected\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Jane\Component\JsonSchema\Tests\Expected\Runtime\Normalizer\CheckArray;
use Jane\Component\JsonSchema\Tests\Expected\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class PatternPropertiesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return $data instanceof \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('foo', $data)) {
                $object->setFoo($data['foo']);
                unset($data['foo']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/x-.*/', (string) $key)) {
                    $object[$key] = $value;
                }
                if (preg_match('/xxxx-.*/', (string) $key)) {
                    $object[$key] = $this->denormalizer->denormalize($value, \Jane\Component\JsonSchema\Tests\Expected\Model\AdditionalProperties::class, 'json', $context);
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('foo') && null !== $object->getFoo()) {
                $data['foo'] = $object->getFoo();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/x-.*/', (string) $key)) {
                    $data[$key] = $value;
                }
                if (preg_match('/xxxx-.*/', (string) $key)) {
                    $data[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties::class => false];
        }
    }
} else {
    class PatternPropertiesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties::class;
        }
        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return $data instanceof \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties;
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
            $object = new \Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('foo', $data)) {
                $object->setFoo($data['foo']);
                unset($data['foo']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/x-.*/', (string) $key)) {
                    $object[$key] = $value;
                }
                if (preg_match('/xxxx-.*/', (string) $key)) {
                    $object[$key] = $this->denormalizer->denormalize($value, \Jane\Component\JsonSchema\Tests\Expected\Model\AdditionalProperties::class, 'json', $context);
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
            if ($object->isInitialized('foo') && null !== $object->getFoo()) {
                $data['foo'] = $object->getFoo();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/x-.*/', (string) $key)) {
                    $data[$key] = $value;
                }
                if (preg_match('/xxxx-.*/', (string) $key)) {
                    $data[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Jane\Component\JsonSchema\Tests\Expected\Model\PatternProperties::class => false];
        }
    }
}