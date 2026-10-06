<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

interface PlatformPublisherInterface
{
    /**
     * Publish a social job.
     *
     * @param array $job  The social_jobs record.
     * @param array $blog The corresponding blogs record.
     * @return array Array containing ['external_url' => string, 'external_id' => string|null]
     * @throws \RuntimeException on API failure.
     */
    public function publish(array $job, array $blog): array;
}
