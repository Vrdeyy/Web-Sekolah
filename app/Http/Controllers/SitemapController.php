<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\BusinessCenter;
use App\Models\Extracurricular;
use App\Models\Major;
use App\Models\News;
use App\Models\Page;
use App\Models\Staff;
use App\Models\Teacher;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [];

        // Static Pages
        $urls[] = [
            'loc' => url('/'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '1.0',
        ];

        $urls[] = [
            'loc' => url('/kontak'),
            'lastmod' => now()->startOfMonth()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.5',
        ];

        // Pages
        $pages = Page::active()->get();
        foreach ($pages as $page) {
            $urls[] = [
                'loc' => route('page', $page->slug),
                'lastmod' => $page->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        // Majors
        $urls[] = [
            'loc' => route('majors'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ];
        $majors = Major::active()->get();
        foreach ($majors as $major) {
            $urls[] = [
                'loc' => route('major.show', $major->slug),
                'lastmod' => $major->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        // Extracurriculars
        $urls[] = [
            'loc' => route('extracurriculars'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ];
        $extras = Extracurricular::active()->get();
        foreach ($extras as $extra) {
            $urls[] = [
                'loc' => route('extracurricular.show', $extra->slug),
                'lastmod' => $extra->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // Achievements
        $urls[] = [
            'loc' => route('achievements'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ];
        $achievements = Achievement::active()->get();
        foreach ($achievements as $achievement) {
            $urls[] = [
                'loc' => route('achievement.show', $achievement->slug),
                'lastmod' => $achievement->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // News
        $urls[] = [
            'loc' => route('news'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.9',
        ];
        $news = News::active()->published()->get();
        foreach ($news as $item) {
            $urls[] = [
                'loc' => route('news.show', $item->slug),
                'lastmod' => $item->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // Teachers & Staff
        $urls[] = [
            'loc' => route('teachers'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];
        $teachers = Teacher::active()->get();
        foreach ($teachers as $teacher) {
            $urls[] = [
                'loc' => route('teacher.show', $teacher->id),
                'lastmod' => $teacher->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $urls[] = [
            'loc' => route('staff'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];
        $staff = Staff::active()->get();
        foreach ($staff as $s) {
            $urls[] = [
                'loc' => route('staff.show', $s->id),
                'lastmod' => $s->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
