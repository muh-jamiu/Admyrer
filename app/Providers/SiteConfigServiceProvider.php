<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class SiteConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        $host = Request::getHost();
        $filename = 'site_configs/' . $host . '.ini';
        $config = parse_ini_file(config_path($filename), true);
        config(['siteConfig' => $config]);
    }
}
