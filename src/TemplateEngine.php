<?php

namespace CS\MailService;

use League\Plates\Engine;
use League\Uri\Schemes\Http as HttpUri;
use League\Uri\Components\Query as UriQuery;

/**
 * Description of TemplateEngine
 *
 * @author orest
 */
class TemplateEngine {

    /**
     *
     * @var Engine 
     */
    private $engine;

    public function __construct($site, $locale)
    {
        $templatesPath = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'templates', $site, $locale]);
        $this->engine = new Engine($templatesPath);
    }

    public function render($name, $data, $analyticsParams)
    {
        $this->registerAnalyticsFunction($analyticsParams);

        return $this->engine->render('body/' . $name, $data);
    }

    private function registerAnalyticsFunction($analyticsParams)
    {
        $this->engine->registerFunction('analyticsLink', function ($uri, $inputParams = []) use ($analyticsParams) {
            $params = array_merge($analyticsParams, $inputParams);

            if (!isset($params['source']) || !isset($params['medium']) || !isset($params['campaign'])) {
                return $uri;
            }

            foreach ($params as $key => $value) {
                unset($params[$key]);
                $params['utm_' . $key] = $value;
            }

            $resultUri = HttpUri::createFromString($uri);

            $analyticsQuery = UriQuery::createFromArray($params);

            $complexQuery = $resultUri->query->merge($analyticsQuery);

            return $resultUri->withQuery($complexQuery->__toString())->__toString();
        });
    }

}
