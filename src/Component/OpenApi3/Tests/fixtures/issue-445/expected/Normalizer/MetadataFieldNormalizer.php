<?php

namespace PicturePark\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use PicturePark\API\Runtime\Normalizer\CheckArray;
use PicturePark\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class MetadataFieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \PicturePark\API\Model\MetadataField::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \PicturePark\API\Model\MetadataField::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \PicturePark\API\Model\MetadataField();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('path', $data)) {
                $object->setPath($data['path']);
            }
            if (\array_key_exists('isWritable', $data)) {
                $object->setIsWritable($data['isWritable']);
            }
            if (\array_key_exists('dataType', $data)) {
                $object->setDataType($data['dataType']);
            }
            if (\array_key_exists('availableKeyFields', $data) && $data['availableKeyFields'] !== null) {
                $values = [];
                foreach ($data['availableKeyFields'] as $value) {
                    $values[] = $value;
                }
                $object->setAvailableKeyFields($values);
            }
            elseif (\array_key_exists('availableKeyFields', $data) && $data['availableKeyFields'] === null) {
                $object->setAvailableKeyFields(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['path'] = $object->getPath();
            $data['isWritable'] = $object->getIsWritable();
            $data['dataType'] = $object->getDataType();
            if ($object->isInitialized('availableKeyFields') && null !== $object->getAvailableKeyFields()) {
                $values = [];
                foreach ($object->getAvailableKeyFields() as $value) {
                    $values[] = $value;
                }
                $data['availableKeyFields'] = $values;
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\PicturePark\API\Model\MetadataField::class => false];
        }
    }
} else {
    class MetadataFieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \PicturePark\API\Model\MetadataField::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \PicturePark\API\Model\MetadataField::class;
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
            $object = new \PicturePark\API\Model\MetadataField();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('path', $data)) {
                $object->setPath($data['path']);
            }
            if (\array_key_exists('isWritable', $data)) {
                $object->setIsWritable($data['isWritable']);
            }
            if (\array_key_exists('dataType', $data)) {
                $object->setDataType($data['dataType']);
            }
            if (\array_key_exists('availableKeyFields', $data) && $data['availableKeyFields'] !== null) {
                $values = [];
                foreach ($data['availableKeyFields'] as $value) {
                    $values[] = $value;
                }
                $object->setAvailableKeyFields($values);
            }
            elseif (\array_key_exists('availableKeyFields', $data) && $data['availableKeyFields'] === null) {
                $object->setAvailableKeyFields(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['path'] = $object->getPath();
            $data['isWritable'] = $object->getIsWritable();
            $data['dataType'] = $object->getDataType();
            if ($object->isInitialized('availableKeyFields') && null !== $object->getAvailableKeyFields()) {
                $values = [];
                foreach ($object->getAvailableKeyFields() as $value) {
                    $values[] = $value;
                }
                $data['availableKeyFields'] = $values;
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\PicturePark\API\Model\MetadataField::class => false];
        }
    }
}