<?php

class TrellisValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return file_exists($sitePath . '/site/web/app/mu-plugins/bedrock-autoloader.php') ||
              (is_dir($sitePath . '/site/web/app/') &&
               file_exists($sitePath . '/site/web/wp-config.php') &&
               file_exists($sitePath . '/site/config/application.php'));
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string       $sitePath
     * @param  string       $siteName
     * @param  string       $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        $staticFilePath = $sitePath . '/site/web' . $uri;
        if ($this->isActualFile($staticFilePath)) {
            return $staticFilePath;
        }
        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $_SERVER['PHP_SELF'] = $uri;
        if (strpos($uri, '/wp/') === 0) {
            return is_dir($sitePath . '/site/web' . $uri)
                            ? $sitePath . '/site/web' . $this->forceTrailingSlash($uri) . '/index.php'
                            : $sitePath . '/site/web' . $uri;
        }
        return $sitePath . '/site/web/index.php';
    }

    /**
     * Redirect to uri with trailing slash.
     *
     * @param  string $uri
     * @return string
     */
    private function forceTrailingSlash($uri)
    {
        if (substr($uri, -1 * strlen('/wp/wp-admin')) == '/wp/wp-admin') {
            header('Location: ' . $uri . '/');
            die;
        }
        return $uri;
    }
}
