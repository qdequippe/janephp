<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class GistFullhistoryItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\GistFullhistoryItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\GistFullhistoryItem::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\GistFullhistoryItem();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\GistFullhistoryItemConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('version', $data)) {
                $object->setVersion($data['version']);
                unset($data['version']);
            }
            if (\array_key_exists('user', $data) && $data['user'] !== null) {
                $object->setUser($this->denormalizer->denormalize($data['user'], \Github\Model\GistFullhistoryItemUser::class, 'json', $context));
                unset($data['user']);
            }
            elseif (\array_key_exists('user', $data) && $data['user'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('change_status', $data)) {
                $object->setChangeStatus($this->denormalizer->denormalize($data['change_status'], \Github\Model\GistFullhistoryItemChangeStatus::class, 'json', $context));
                unset($data['change_status']);
            }
            if (\array_key_exists('committed_at', $data)) {
                $object->setCommittedAt($data['committed_at']);
                unset($data['committed_at']);
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
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['version'] = $object->getVersion();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['user'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
            }
            if ($object->isInitialized('changeStatus') && null !== $object->getChangeStatus()) {
                $data['change_status'] = $this->normalizer->normalize($object->getChangeStatus(), 'json', $context);
            }
            if ($object->isInitialized('committedAt') && null !== $object->getCommittedAt()) {
                $data['committed_at'] = $object->getCommittedAt();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\GistFullhistoryItemConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\GistFullhistoryItem::class => false];
        }
    }
} else {
    class GistFullhistoryItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\GistFullhistoryItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\GistFullhistoryItem::class;
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
            $object = new \Github\Model\GistFullhistoryItem();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\GistFullhistoryItemConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('version', $data)) {
                $object->setVersion($data['version']);
                unset($data['version']);
            }
            if (\array_key_exists('user', $data) && $data['user'] !== null) {
                $object->setUser($this->denormalizer->denormalize($data['user'], \Github\Model\GistFullhistoryItemUser::class, 'json', $context));
                unset($data['user']);
            }
            elseif (\array_key_exists('user', $data) && $data['user'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('change_status', $data)) {
                $object->setChangeStatus($this->denormalizer->denormalize($data['change_status'], \Github\Model\GistFullhistoryItemChangeStatus::class, 'json', $context));
                unset($data['change_status']);
            }
            if (\array_key_exists('committed_at', $data)) {
                $object->setCommittedAt($data['committed_at']);
                unset($data['committed_at']);
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
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['version'] = $object->getVersion();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['user'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
            }
            if ($object->isInitialized('changeStatus') && null !== $object->getChangeStatus()) {
                $data['change_status'] = $this->normalizer->normalize($object->getChangeStatus(), 'json', $context);
            }
            if ($object->isInitialized('committedAt') && null !== $object->getCommittedAt()) {
                $data['committed_at'] = $object->getCommittedAt();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\GistFullhistoryItemConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\GistFullhistoryItem::class => false];
        }
    }
}