<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Sitemap extends Controller
{
    public function index()
    {
        $pages = [
            ['loc' => base_url('/'), 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => base_url('/#services'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => base_url('/#news'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => base_url('/#schedule'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['loc' => base_url('/#media'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
        ];

        $sitemap = view('sitemap', ['pages' => $pages]);
        return $this->response->setHeader('Content-Type', 'application/xml')->setBody($sitemap);
    }
}
