<?php

class TrellisValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return void
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return (
            file_exists("$sitePath/site/config/application.php")
            && file_exists("$sitePath/site/web/wp-config.php")
            && is_dir("$sitePath/site/web/app/")
        );
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
        $staticFilePath = $sitePath . '/site/web/' . $uri;
        if (file_exists($staticFilePath) && !is_dir($staticFilePath)) {
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
        if (0 === strpos($uri, '/wp/')) {
            return $sitePath . '/site/web' . $uri;
        }
        return $sitePath . '/site/web/index.php';
    }
}
