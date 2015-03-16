<?php

/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 8/13/14
 * Time: 4:39 PM
 */
class UrlManager extends CUrlManager
{
    public $excludeRoutePattern = array();

    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        $matched = false;
        foreach ($this->excludeRoutePattern as $excludePattern) {
            if (preg_match($excludePattern, $route))
                $matched = true;
        }

        if ($matched) {
            unset($params[$this->routeVar]);
            foreach ($params as $i => $param)
                if ($param === null)
                    $params[$i] = '';

            if (isset($params['#'])) {
                $anchor = '#' . $params['#'];
                unset($params['#']);
            } else
                $anchor = '';
            $route = trim($route, '/');
            return $this->getOriginalUrl($route, $params, $ampersand) . $anchor;
        } else {
            return parent::createUrl($route, $params, $ampersand);
        }
    }

    protected function getOriginalUrl($route, $params, $ampersand)
    {
        // parent createDefaultUrl + urlFormatter (GET)
        $url = $this->getBaseUrl();
        if (!$this->showScriptName)
            $url .= '/';
        if ($route !== '') {
            $url .= '?' . $this->routeVar . '=' . $route;
            if (($query = $this->createPathInfo($params, '=', $ampersand)) !== '')
                $url .= $ampersand . $query;
        } elseif (($query = $this->createPathInfo($params, '=', $ampersand)) !== '')
            $url .= '?' . $query;
        return $url;
    }

    public function parseUrl($request)
    {
        if (!isset($_GET['r'])) {
            return parent::parseUrl($request);
        } else {
            if (isset($_GET[$this->routeVar]))
                return $_GET[$this->routeVar];
            elseif (isset($_POST[$this->routeVar]))
                return $_POST[$this->routeVar];
            else
                return '';
        }
    }
}