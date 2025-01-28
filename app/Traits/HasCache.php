<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasCache
{
    protected static function getCache(): array
    {
        return json_decode(Cache::get('Cache', '[]'), true);
    }

    protected static function setCache(array $cache = []): void
    {
        Cache::forget('Cache');
        Cache::rememberForever('Cache', fn () => json_encode($cache));
    }

    protected static function addCache(string $key, array $tags = []): string
    {
        $Cache = self::getCache();
        $modelCache = $Cache[self::class] ?? [];

        if (!array_filter($modelCache, fn ($item) => $item[0] === $key)) {
            $modelCache[] = [$key, $tags];
            $Cache[self::class] = array_values($modelCache);
            self::setCache($Cache);
        }

        return $key;
    }

    public static function delCache(?array $keys = null, ?array $tags = null): void
    {
        $Cache = self::getCache();

        if (!isset($Cache[self::class])) return;

        $modelCache = $Cache[self::class];

        if ($keys) {
            $modelCache = array_filter(
                $modelCache,
                fn ($item) => !in_array($item[0], $keys)
            );

            foreach ($keys as $key) {
                Cache::forget($key);
            }
        }

        if ($tags) {
            foreach ($tags as $tag) {
                $modelCache = array_filter(
                    $modelCache,
                    function ($item) use ($tag) {
                        if (in_array($tag, $item[1])) {
                            Cache::forget($item[0]);
                            return false;
                        }
                        return true;
                    }
                );
            }
        }

        $Cache[self::class] = array_values($modelCache);
        self::setCache($Cache);
    }
}
