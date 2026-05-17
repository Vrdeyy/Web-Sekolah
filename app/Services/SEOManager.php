<?php

namespace App\Services;

class SEOManager
{
    protected $title;
    protected $description;
    protected $keywords = [];
    protected $ogImage;
    protected $type = 'website';
    protected $canonical;
    protected $robots = 'index, follow';
    protected $siteName;
    protected $locale = 'id_ID';
    protected $schema = [];

    public function __construct()
    {
        $this->title = config('app.name', 'SMK YAJ');
        $this->description = 'Website Resmi SMK YAJ - Sekolah Menengah Kejuruan yang berkomitmen mencetak generasi yang terampil dan berkarakter.';
        $this->siteName = config('app.name', 'SMK YAJ');
        $this->canonical = request()->url();
    }

    public function setTitle($title, $appendDefault = true)
    {
        if ($appendDefault) {
            $this->title = $title . ' - ' . config('app.name', 'SMK YAJ');
        } else {
            $this->title = $title;
        }
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = strip_tags($description);
        return $this;
    }

    public function setKeywords($keywords)
    {
        if (is_array($keywords)) {
            $this->keywords = $keywords;
        } else {
            $this->keywords = explode(',', $keywords);
        }
        return $this;
    }

    public function setOgImage($url)
    {
        $this->ogImage = $url;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setCanonical($url)
    {
        $this->canonical = $url;
        return $this;
    }

    public function setRobots($robots)
    {
        $this->robots = $robots;
        return $this;
    }

    public function addSchema($data)
    {
        $this->schema[] = $data;
        return $this;
    }

    public function generate()
    {
        $html = [];
        $html[] = '<title>' . e($this->title) . '</title>';
        $html[] = '<meta name="description" content="' . e($this->description) . '">';
        $html[] = '<meta name="robots" content="' . e($this->robots) . '">';

        if (!empty($this->keywords)) {
            $html[] = '<meta name="keywords" content="' . e(implode(', ', $this->keywords)) . '">';
        }

        $html[] = '<link rel="canonical" href="' . e($this->canonical) . '">';

        // Open Graph
        $html[] = '<!-- Open Graph / Facebook -->';
        $html[] = '<meta property="og:type" content="' . e($this->type) . '">';
        $html[] = '<meta property="og:url" content="' . e(request()->fullUrl()) . '">';
        $html[] = '<meta property="og:title" content="' . e($this->title) . '">';
        $html[] = '<meta property="og:description" content="' . e($this->description) . '">';
        $html[] = '<meta property="og:site_name" content="' . e($this->siteName) . '">';
        $html[] = '<meta property="og:locale" content="' . e($this->locale) . '">';
        if ($this->ogImage) {
            $html[] = '<meta property="og:image" content="' . e($this->ogImage) . '">';
            $html[] = '<meta property="og:image:alt" content="' . e($this->title) . '">';
        }

        // Twitter
        $html[] = '<!-- Twitter -->';
        $html[] = '<meta name="twitter:card" content="summary_large_image">';
        $html[] = '<meta name="twitter:url" content="' . e(request()->fullUrl()) . '">';
        $html[] = '<meta name="twitter:title" content="' . e($this->title) . '">';
        $html[] = '<meta name="twitter:description" content="' . e($this->description) . '">';
        if ($this->ogImage) {
            $html[] = '<meta name="twitter:image" content="' . e($this->ogImage) . '">';
        }

        // Structured Data
        if (!empty($this->schema)) {
            foreach ($this->schema as $schema) {
                $html[] = '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
            }
        }

        return implode("\n    ", $html);
    }
}
