<?php

if (!function_exists('getStaticContent')) {
    function getStaticContent(string $key, ?string $locale = null, ?string $default = null, ?int $cache_duration = 3600): ?string
    {
        $locale = $locale ?? app()->getLocale();

        $content = \Illuminate\Support\Facades\DB::table('static_contents')
            ->where('key', $key)
            ->where('locale', $locale)
            ->value('content');

        return $content ?? $default;;
    }
}

if (!function_exists('setStaticContent')) {
    function setStaticContent(string $key, string|array $content, ?string $locale = null, ?string $page = null, ?string $section = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        $cache_key = "static_content.{$key}.{$locale}";

        try {
            \Illuminate\Support\Facades\DB::table('static_contents')->updateOrInsert(
                ['key' => $key, 'locale' => $locale],
                [
                    'content' => $content,
                    'page' => $page,
                    'section' => $section,
                    'updated_at' => now(),
                ]
            );

            cache()->forget($cache_key);

            cache()->put($cache_key, $content, 3600); // Default 1 hour

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
