<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$models = [
    'users' => \App\Models\User::all(),
    'settings' => \App\Models\Setting::all(),
    'sliders' => \App\Models\Slider::all(),
    'img_models' => \App\Models\ImgModel::all(),
    'principal_messages' => \App\Models\PrincipalMessage::all(),
    'majors' => \App\Models\Major::all(),
    'social_links' => \App\Models\SocialLink::all(),
    'statistics' => \App\Models\Statistic::all(),
    'pages' => \App\Models\Page::all(),
    'extracurriculars' => \App\Models\Extracurricular::all(),
    'achievements' => \App\Models\Achievement::all(),
    'awards' => \App\Models\Award::all(),
    'news' => \App\Models\News::all(),
    'teachers' => \App\Models\Teacher::all(),
    'staff' => \App\Models\Staff::all(),
    'business_centers' => \App\Models\BusinessCenter::all(),
    'galleries' => \App\Models\Gallery::all(),
    'partners' => \App\Models\Partner::all()
];

file_put_contents(__DIR__ . '/full_db_dump.json', json_encode($models, JSON_PRETTY_PRINT));
echo "Exported successfully.";
