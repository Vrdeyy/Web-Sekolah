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

    public function __construct()
    {
        $this->title = config('app.name', 'SMK YAJ');
        $this->description = 'Website Resmi SMK YAJ - Sekolah Menengah Kejuruan yang berkomitmen mencetak generasi yang terampil dan berkarakter.';
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

    public function generate()
    {
        $html = [];
        $html[] = '<title>' . e($this->title) . '</title>';
        $html[] = '<meta name="description" content="' . e($this->description) . '">';

        if (!empty($this->keywords)) {
            $html[] = '<meta name="keywords" content="' . e(implode(', ', $this->keywords)) . '">';
        }

        if ($this->canonical) {
            $html[] = '<link rel="canonical" href="' . e($this->canonical) . '">';
        }

        // Open Graph
        $html[] = '<!-- Open Graph / Facebook -->';
        $html[] = '<meta property="og:type" content="' . e($this->type) . '">';
        $html[] = '<meta property="og:url" content="' . e(request()->fullUrl()) . '">';
        $html[] = '<meta property="og:title" content="' . e($this->title) . '">';
        $html[] = '<meta property="og:description" content="' . e($this->description) . '">';
        if ($this->ogImage) {
            $html[] = '<meta property="og:image" content="' . e($this->ogImage) . '">';
        }

        // Twitter
        $html[] = '<!-- Twitter -->';
        $html[] = '<meta property="twitter:card" content="summary_large_image">';
        $html[] = '<meta property="twitter:url" content="' . e(request()->fullUrl()) . '">';
        $html[] = '<meta property="twitter:title" content="' . e($this->title) . '">';
        $html[] = '<meta property="twitter:description" content="' . e($this->description) . '">';
        if ($this->ogImage) {
            $html[] = '<meta property="twitter:image" content="' . e($this->ogImage) . '">';
        }

        return implode("\n    ", $html);
    }
}
