<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Award;
use App\Models\BusinessCenter;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\Major;
use App\Models\News;
use App\Models\Page;
use App\Models\PrincipalMessage;
use App\Models\Setting;
use App\Models\ImgModel;
use App\Models\SocialLink;
use App\Models\Staff;
use App\Models\Statistic;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebController extends Controller
{
    protected function getSharedData(): array
    {
        return [
            'settings' => Setting::all()->pluck('value', 'key')->toArray(),
            'socialLinks' => SocialLink::active()->ordered()->get(),
        ];
    }

    public function home(): View
    {
        $data = array_merge($this->getSharedData(), [
            'slideBener' => ImgModel::active()->ordered()->get(),
            'principalMessage' => PrincipalMessage::active()->first(),
            'awards' => Award::active()->ordered()->take(8)->get(),
            'majors' => Major::active()->ordered()->get(),
            'achievements' => Achievement::active()->ordered()->take(6)->get(),
            'news' => News::active()->published()->latest()->take(4)->get(),
            'businessCenters' => BusinessCenter::active()->ordered()->take(3)->get(),
            'statistics' => Statistic::active()->ordered()->get(),
            'extracurriculars' => Extracurricular::active()->ordered()->take(6)->get(),
        ]);

        return view('home', $data);
    }

    public function page(string $slug): View
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();

        $data = array_merge($this->getSharedData(), [
            'page' => $page,
            'metaDescription' => $page->meta_description,
        ]);

        return view('pages.show', $data);
    }

    public function majors(): View
    {
        $data = array_merge($this->getSharedData(), [
            'majors' => Major::active()->ordered()->get(),
        ]);

        return view('pages.majors', $data);
    }

    public function majorShow(Major $major): View
    {
        $data = array_merge($this->getSharedData(), [
            'major' => $major,
        ]);

        return view('pages.major-show', $data);
    }

    public function extracurriculars(): View
    {
        $data = array_merge($this->getSharedData(), [
            'extracurriculars' => Extracurricular::active()->ordered()->get(),
        ]);

        return view('pages.extracurriculars', $data);
    }

    public function achievements(): View
    {
        $data = array_merge($this->getSharedData(), [
            'achievements' => Achievement::active()->ordered()->paginate(12),
        ]);

        return view('pages.achievements', $data);
    }

    public function teachers(): View
    {
        $data = array_merge($this->getSharedData(), [
            'teachers' => Teacher::active()->ordered()->get(),
        ]);

        return view('pages.teachers', $data);
    }

    public function staff(): View
    {
        $data = array_merge($this->getSharedData(), [
            'staff' => Staff::active()->ordered()->get(),
        ]);

        return view('pages.staff', $data);
    }

    public function businessCenters(): View
    {
        $data = array_merge($this->getSharedData(), [
            'businessCenters' => BusinessCenter::active()->ordered()->get(),
        ]);

        return view('pages.business-centers', $data);
    }

    public function galleryPhotos(): View
    {
        $data = array_merge($this->getSharedData(), [
            'galleries' => Gallery::active()->photos()->ordered()->paginate(12),
            'type' => 'photo',
        ]);

        return view('pages.gallery', $data);
    }

    public function galleryVideos(): View
    {
        $data = array_merge($this->getSharedData(), [
            'galleries' => Gallery::active()->videos()->ordered()->paginate(12),
            'type' => 'video',
        ]);

        return view('pages.gallery', $data);
    }

    public function news(): View
    {
        $data = array_merge($this->getSharedData(), [
            'news' => News::active()->published()->latest()->paginate(9),
        ]);

        return view('pages.news', $data);
    }

    public function newsShow(News $news): View
    {
        $news->incrementViews();

        $data = array_merge($this->getSharedData(), [
            'news' => $news,
            'relatedNews' => News::active()->published()
                ->where('id', '!=', $news->id)
                ->where('category', $news->category)
                ->take(3)
                ->get(),
            'latestNews' => News::active()->published()
                ->where('id', '!=', $news->id)
                ->latest()
                ->take(5)
                ->get(),
            'metaDescription' => $news->excerpt,
        ]);

        return view('pages.news-show', $data);
    }

    public function contact(): View
    {
        $data = $this->getSharedData();

        return view('pages.contact', $data);
    }
}
