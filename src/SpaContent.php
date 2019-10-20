<?php

namespace Abzudev\LaravelSpaSeo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Nesk\Puphpeteer\Puppeteer;
use Sunra\PhpSimple\HtmlDomParser;

class SpaContent
{
    /**
     * @param Illuminate\Http\Request $request
     * @return array|null
     */
    public static function getHtmlContent(Request $request)
    {
        if (!$request->has('render_vue_content')) {
            return self::checkCache($request);
        }

        return null;
    }

    /**
     * @param Illuminate\Http\Request $request
     * @return mixed
     */
    public static function checkCache(Request $request)
    {
        $url = $request->fullUrlWithQuery(['render_vue_content' => 'true']);

        $route = DIRECTORY_SEPARATOR . rtrim($request->path(), DIRECTORY_SEPARATOR);

        if (array_key_exists($route, config('spaseo.routes', []))) {
            $cacheTime = config('spaseo.routes')[$route];
        } else {
            $cacheTime = config('spaseo.cache_lifetime', 60);
        }

        $cacheKey = $url . '-rendered_html';

        $content = \Cache::get($cacheKey);

        if (is_null($content)) {

            $content = self::captureHtml($url);

            \Cache::put($cacheKey, $content, Carbon::now()->addMinutes($cacheTime));
        };

        return $content;
    }

    public static function captureHtml($url)
    {
        $puppeteer = new Puppeteer();

        $browser = $puppeteer->launch();
        $page = $browser->newPage();
        $page->goto($url);
        $html = $page->content();

        $browser->close();

        $dom = HtmlDomParser::str_get_html($html);
        $domContent = $dom->find('div')[0];
        $content = $domContent->innertext();

        return $content;
    }
}
