<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Agenda;
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
use App\Models\Staff;
use App\Models\Statistic;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use Illuminate\View\View;

class WebController extends Controller
{
    protected function getSharedData(): array
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        $socials = [];
        $platforms = [
            'social_facebook' => 'fab fa-facebook-f',
            'social_instagram' => 'fab fa-instagram',
            'social_twitter' => 'fab fa-x-twitter',
            'social_youtube' => 'fab fa-youtube',
            'social_tiktok' => 'fab fa-tiktok',
            'social_whatsapp' => 'fab fa-whatsapp',
        ];

        foreach ($platforms as $key => $icon) {
            if (!empty($settings[$key])) {
                $socials[] = (object) [
                    'url' => $settings[$key],
                    'icon_class' => $icon,
                ];
            }
        }

        return [
            'settings' => $settings,
            'socialLinks' => collect($socials),
        ];
    }

    public function home(): View
    {
        $sharedData = $this->getSharedData();
        $schoolName = $sharedData['settings']['school_name'] ?? 'SMK YAJ';
        $tagline = $sharedData['settings']['school_tagline'] ?? 'Pilihan Yang Tepat Di Sekolah Yang Berkualitas';

        $seo = app(\App\Services\SEOManager::class)
            ->setTitle($schoolName . ' - ' . $tagline, false)
            ->setDescription($sharedData['settings']['school_description'] ?? '')
            ->setKeywords(['SMK YAJ', 'Sekolah Kejuruan', 'Pendidikan', 'Jakarta']);

        // Schema: School
        $seo->addSchema([
            '@context' => 'https://schema.org',
            '@type' => 'School',
            'name' => $schoolName,
            'url' => url('/'),
            'logo' => asset('storage/' . ($sharedData['settings']['school_logo'] ?? 'logo.png')),
            'description' => $sharedData['settings']['school_description'] ?? '',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $sharedData['settings']['school_address'] ?? '',
                'addressLocality' => 'Jakarta',
                'addressRegion' => 'DKI Jakarta',
                'postalCode' => $sharedData['settings']['school_postal_code'] ?? '',
                'addressCountry' => 'ID',
            ],
            'telephone' => $sharedData['settings']['school_phone'] ?? '',
            'email' => $sharedData['settings']['school_email'] ?? '',
        ]);

        // News Highlighting Logic: Max 2 pinned, fill with latest to total 3
        $pinnedNews = News::active()->published()
            ->where('is_featured', true)
            ->orderBy('published_at', 'desc')
            ->take(2)
            ->get();
        
        $latestNews = News::active()->published()
            ->whereNotIn('id', $pinnedNews->pluck('id'))
            ->orderBy('published_at', 'desc')
            ->take(3 - $pinnedNews->count())
            ->get();
            
        $homeNews = $pinnedNews->merge($latestNews);

        $data = array_merge($sharedData, [
            'slideBener' => ImgModel::active()->ordered()->get(),
            'principalMessage' => PrincipalMessage::active()->first(),
            'awards' => Award::active()->ordered()->take(8)->get(),
            'majors' => Major::active()
                ->ordered()
                ->get(),
            'achievements' => Achievement::active()->ordered()->take(6)->get(),
            'news' => $homeNews,
            'businessCenters' => BusinessCenter::active()->ordered()->take(3)->get(),
            'statistics' => Statistic::active()->ordered()->get(),
            'extracurriculars' => Extracurricular::active()->ordered()->take(6)->get(),
            'teachers_count' => Teacher::active()->count(),
            'students_stat' => Statistic::active()->where('label', 'Siswa Aktif')->first(),
            'upcomingAgendas' => Agenda::active()
                ->where(function($q) {
                    $today = now()->toDateString();
                    $q->where('event_date', '>=', $today)
                      ->orWhere(function($q2) use ($today) {
                          $q2->whereNotNull('end_date')
                             ->where('end_date', '>=', $today);
                      });
                })
                ->orderBy('event_date', 'asc')
                ->take(4)
                ->get(),
        ]);

        return view('home', $data);
    }

    public function page(string $slug): View
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();

        app(\App\Services\SEOManager::class)
            ->setTitle($page->title)
            ->setDescription($page->meta_description ?? strip_tags($page->content) ?? '');

        $data = array_merge($this->getSharedData(), [
            'page' => $page,
        ]);

        return view('pages.show', $data);
    }

    public function majors(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Program Keahlian')
            ->setDescription('Daftar Program Keahlian Unggulan di SMK YAJ yang siap mencetak tenaga kerja profesional.');

        $data = array_merge($this->getSharedData(), [
            'majors' => Major::active()->ordered()->get(),
        ]);

        return view('pages.majors', $data);
    }

    public function majorShow(Major $major): View
    {
        $seo = app(\App\Services\SEOManager::class)
            ->setTitle($major->name)
            ->setDescription($major->short_description)
            ->setOgImage($major->image ? asset('storage/' . $major->image) : null);

        // Schema: Breadcrumb
        $seo->addSchema([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Program Keahlian',
                    'item' => route('majors'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $major->name,
                    'item' => route('major.show', $major->slug),
                ],
            ],
        ]);

        $data = array_merge($this->getSharedData(), [
            'major' => $major,
        ]);

        return view('pages.major-show', $data);
    }

    public function extracurriculars(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Ekstrakurikuler')
            ->setDescription('Kembangkan bakat dan minat siswa melalui berbagai kegiatan ekstrakurikuler di SMK YAJ.');

        $data = array_merge($this->getSharedData(), [
            'extracurriculars' => Extracurricular::active()->ordered()->get(),
        ]);

        return view('pages.extracurriculars', $data);
    }

    public function extracurricularShow(Extracurricular $extracurricular): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle($extracurricular->name)
            ->setDescription($extracurricular->short_description)
            ->setOgImage($extracurricular->image ? asset('storage/' . $extracurricular->image) : null);

        $data = array_merge($this->getSharedData(), [
            'extracurricular' => $extracurricular,
            'relatedExtracurriculars' => Extracurricular::active()->ordered()
                ->where('id', '!=', $extracurricular->id)
                ->take(3)
                ->get(),
        ]);

        return view('pages.extracurricular-show', $data);
    }

    public function achievements(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Prestasi Siswa')
            ->setDescription('Daftar prestasi membanggakan yang diraih oleh siswa-siswi SMK YAJ di berbagai tingkatan.');

        $data = array_merge($this->getSharedData(), [
            'achievements' => Achievement::active()->ordered()->paginate(12),
        ]);

        return view('pages.achievements', $data);
    }

    public function achievementShow(Achievement $achievement): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle($achievement->title)
            ->setDescription($achievement->description ?? $achievement->title)
            ->setOgImage($achievement->image ? asset('storage/' . $achievement->image) : null);

        $data = array_merge($this->getSharedData(), [
            'achievement' => $achievement,
            'relatedAchievements' => Achievement::active()->ordered()
                ->where('id', '!=', $achievement->id)
                ->take(3)
                ->get(),
            'latestNews' => News::active()->published()->latest()->take(3)->get(),
        ]);

        return view('pages.achievement-show', $data);
    }

    public function businessCenterShow(BusinessCenter $businessCenter): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle($businessCenter->name)
            ->setDescription($businessCenter->short_description)
            ->setOgImage($businessCenter->image ? asset('storage/' . $businessCenter->image) : null);

        $data = array_merge($this->getSharedData(), [
            'businessCenter' => $businessCenter,
            'relatedBusinessCenters' => BusinessCenter::active()->ordered()
                ->where('id', '!=', $businessCenter->id)
                ->take(3)
                ->get(),
            'latestNews' => News::active()->published()->latest()->take(3)->get(),
        ]);

        return view('pages.business-center-show', $data);
    }

    public function teachers(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Direktori Guru')
            ->setDescription('Kenali lebih dekat tenaga pendidik profesional di SMK YAJ.');

        $data = array_merge($this->getSharedData(), [
            'teachers' => Teacher::active()->ordered()->get(),
        ]);

        return view('pages.teachers', $data);
    }

    public function teacherShow(Teacher $teacher): View
    {
        $sharedData = $this->getSharedData();
        app(\App\Services\SEOManager::class)
            ->setTitle($teacher->name . ' - Guru ' . ($sharedData['settings']['school_name'] ?? 'SMK YAJ'))
            ->setDescription('Profil lengkap ' . $teacher->name . ', ' . ($teacher->position ?? 'Guru') . ' di ' . ($sharedData['settings']['school_name'] ?? 'SMK YAJ'))
            ->setOgImage($teacher->photo ? asset('storage/' . $teacher->photo) : null);

        $data = array_merge($sharedData, [
            'teacher' => $teacher,
            'relatedTeachers' => Teacher::active()->ordered()
                ->where('id', '!=', $teacher->id)
                ->take(4)
                ->get(),
        ]);

        return view('pages.teacher-show', $data);
    }

    public function staff(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Direktori Staff')
            ->setDescription('Tenaga kependidikan yang mendukung operasional SMK YAJ.');

        $data = array_merge($this->getSharedData(), [
            'staff' => Staff::active()->ordered()->get(),
        ]);

        return view('pages.staff', $data);
    }

    public function staffShow(Staff $staff): View
    {
        $sharedData = $this->getSharedData();
        app(\App\Services\SEOManager::class)
            ->setTitle($staff->name . ' - Staff ' . ($sharedData['settings']['school_name'] ?? 'SMK YAJ'))
            ->setDescription('Profil lengkap ' . $staff->name . ', ' . ($staff->position ?? 'Staff') . ' di ' . ($sharedData['settings']['school_name'] ?? 'SMK YAJ'))
            ->setOgImage($staff->photo ? asset('storage/' . $staff->photo) : null);

        $data = array_merge($sharedData, [
            'staffMember' => $staff,
            'relatedStaff' => Staff::active()->ordered()
                ->where('id', '!=', $staff->id)
                ->take(4)
                ->get(),
        ]);

        return view('pages.staff-show', $data);
    }

    public function agenda(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Agenda Sekolah')
            ->setDescription('Kalender kegiatan dan agenda penting di SMK YAJ.');

        $agendas = Agenda::active()->orderBy('event_date', 'asc')->get();

        $agendasForJs = $agendas->map(function ($a) {
            return [
                'id'             => $a->id,
                'title'          => $a->title,
                'description'    => $a->description,
                'event_date'     => $a->event_date ? $a->event_date->format('Y-m-d') : null,
                'end_date'       => $a->end_date ? $a->end_date->format('Y-m-d') : null,
                'selected_dates' => $a->selected_dates, // Array of strings ["YYYY-MM-DD", ...]
                'category'       => $a->category,
                'color'          => $a->category_color,
                'label'          => $a->category_label,
            ];
        })->values();

        $data = array_merge($this->getSharedData(), [
            'agendas'      => $agendas,
            'agendasForJs' => $agendasForJs,
        ]);

        return view('pages.agenda', $data);
    }

    public function businessCenters(): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Bussiness Center')
            ->setDescription('Unit usaha dan layanan jasa kreasi siswa SMK YAJ.');

        $data = array_merge($this->getSharedData(), [
            'businessCenters' => BusinessCenter::active()->ordered()->get(),
        ]);

        return view('pages.business-centers', $data);
    }

    public function galleryPhotos(Request $request): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Galeri Foto')
            ->setDescription('Kumpulan dokumentasi kegiatan dan momen berharga di SMK YAJ.');

        $query = Gallery::active()->photos()->ordered();

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        $categories = Gallery::active()->photos()->whereNotNull('category')->distinct()->pluck('category');

        $data = array_merge($this->getSharedData(), [
            'galleries' => $query->paginate(12)->withQueryString(),
            'categories' => $categories,
            'type' => 'photo',
            'activeCategory' => $request->category ?? 'all'
        ]);

        return view('pages.gallery', $data);
    }

    public function galleryVideos(Request $request): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Galeri Video')
            ->setDescription('Dokumentasi video kegiatan dan profil SMK YAJ.');

        $query = Gallery::active()->videos()->ordered();

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        $categories = Gallery::active()->videos()->whereNotNull('category')->distinct()->pluck('category');

        $data = array_merge($this->getSharedData(), [
            'galleries' => $query->paginate(12)->withQueryString(),
            'categories' => $categories,
            'type' => 'video',
            'activeCategory' => $request->category ?? 'all'
        ]);

        return view('pages.gallery', $data);
    }

    public function news(Request $request): View
    {
        app(\App\Services\SEOManager::class)
            ->setTitle('Berita & Artikel')
            ->setDescription('Informasi terbaru seputar kegiatan dan perkembangan SMK YAJ.');

        $query = News::active()->published();

        if ($search = $request->input('search')) {
            $keywords = array_filter(explode(' ', $search), fn($k) => strlen($k) >= 3);

            $query->where(function ($q) use ($search, $keywords) {
                // Priority 1: Exact title match (Very Fast)
                $q->where('title', 'like', "%{$search}%");

                // Priority 2: Keyword matches in titles (Fast)
                foreach ($keywords as $keyword) {
                    $q->orWhere('title', 'like', "%{$keyword}%");
                }

                // Priority 3: Exact phrase in content (Heavy, only done once)
                if (strlen($search) > 3) {
                    $q->orWhere('content', 'like', "%{$search}%");
                }
            });
        }

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        $data = array_merge($this->getSharedData(), [
            'news' => $query->orderBy('is_featured', 'desc')->orderBy('published_at', 'desc')->paginate(9)->withQueryString(),
        ]);

        return view('pages.news', $data);
    }

    public function newsShow(News $news): View
    {
        $news->incrementViews();

        $seo = app(\App\Services\SEOManager::class)
            ->setTitle($news->title)
            ->setDescription($news->excerpt)
            ->setType('article')
            ->setOgImage($news->image ? asset('storage/' . $news->image) : null);

        // Schema: NewsArticle
        $seo->addSchema([
            '@context' => 'https://schema.org',
            '@type' => 'NewsArticle',
            'headline' => $news->title,
            'description' => $news->excerpt,
            'image' => $news->image ? [asset('storage/' . $news->image)] : [],
            'datePublished' => $news->published_at->toAtomString(),
            'dateModified' => $news->updated_at->toAtomString(),
            'author' => [
                '@type' => 'Person',
                'name' => $news->author ?? 'Admin SMK YAJ',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'SMK YAJ',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('storage/logo.png'),
                ],
            ],
        ]);

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
        ]);

        return view('pages.news-show', $data);
    }

    public function contact(): View
    {
        $data = $this->getSharedData();

        return view('pages.contact', $data);
    }

    public function contactSend(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->except('_token');

        // Get school email from settings or environment
        $schoolEmail = Setting::where('key', 'school_email')->value('value') ?? env('MAIL_FROM_ADDRESS', 'admin@sekolah.sch.id');

        try {
            Mail::to($schoolEmail)->send(new ContactMessage($data));
            return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti. ' . $e->getMessage());
        }
    }
}
