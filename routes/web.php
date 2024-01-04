<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CasestudiesController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GenSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return View::make('pages.home');
// });
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('aboutUs');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{blog_id?}', [PagesController::class, 'blogDetail'])->name('blog-detail');
Route::get('/case-detail/{casestudies_id?}', [PagesController::class, 'casestudiesdetail'])->name('case-detail');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contactUs');
Route::post('/submit-contact', [PagesController::class, 'submitContactUs'])->name('submit-contact-form');

Route::get('/demo', [PagesController::class, 'demo'])->name('demo');
Route::get('/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/pilot', [PagesController::class, 'pilot'])->name('pilot');
Route::get('/partners', [PagesController::class, 'partners'])->name('partners');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/subscribers', [PagesController::class, 'subscribers'])->name('subscribers');
Route::get('/strategy', [PagesController::class, 'strategy'])->name('strategy');
Route::get('/case-studies', [PagesController::class, 'caseStudies'])->name('caseStudies');



// Auth::routes();
Route::get('/admin/login', [LoginController::class, 'showloginform'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login');
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');

//blogs
Route::get('/admin/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('create-blog');
Route::post('/admin/blogs/save', [BlogController::class, 'store'])->name('save-blog');
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('delete-blog');
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('edit-blog');
Route::post('/admin/blog/update', [BlogController::class, 'update'])->name('update-blog');

//News
Route::get('/admin/news', [NewsController::class, 'index'])->name('news');
Route::get('/admin/news/create', [NewsController::class, 'create'])->name('create-news');
Route::post('/admin/news/save', [NewsController::class, 'store'])->name('save-news');
Route::get('/admin/news/delete/{id}', [NewsController::class, 'destroy'])->name('delete-news');
Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('edit-news');
Route::post('/admin/news/update', [NewsController::class, 'update'])->name('update-news');


//Team
Route::get('/admin/team', [TeamController::class, 'index'])->name('team');
Route::get('/admin/team/create', [TeamController::class, 'create'])->name('create-team');
Route::post('/admin/team/save', [TeamController::class, 'store'])->name('save-team');
Route::get('/admin/team/delete/{id}', [TeamController::class, 'destroy'])->name('delete-team');
Route::get('/admin/team/edit/{id}', [TeamController::class, 'edit'])->name('edit-team');
Route::post('/admin/team/update', [TeamController::class, 'update'])->name('update-team');

//Testimonials
Route::get('/admin/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');
Route::get('/admin/testimonial/create', [TestimonialsController::class, 'create'])->name('create-testimonial');
Route::post('/admin/testimonial/save', [TestimonialsController::class, 'store'])->name('save-testimonial');
Route::get('/admin/testimonial/delete/{id}', [TestimonialsController::class, 'destroy'])->name('delete-testimonial');
Route::get('/admin/testimonial/edit/{id}', [TestimonialsController::class, 'edit'])->name('edit-testimonial');
Route::post('/admin/testimonial/update', [TestimonialsController::class, 'update'])->name('update-testimonial');

//Tags
Route::get('/admin/tags', [TagsController::class, 'index'])->name('tags');
// Route::get('/admin/tag/create', [TagsController::class, 'create'])->name('create-tag');
Route::post('/admin/tag/save', [TagsController::class, 'store'])->name('save-tag');
Route::get('/admin/tag/delete/{id}', [TagsController::class, 'destroy'])->name('delete-tag');
Route::get('/admin/tag/edit/{id}', [TagsController::class, 'edit'])->name('edit-tag');
// Route::post('/admin/tag/update', [TagsController::class, 'update'])->name('update-tag');

//FAQ Heads
Route::get('/admin/faq-heads', [FaqsController::class, 'heads'])->name('faq-heads');
Route::post('/admin/faq-heads/save', [FaqsController::class, 'storeHeads'])->name('save-faq-heads');
Route::get('/admin/faq-heads/delete/{id}', [FaqsController::class, 'destroyHeads'])->name('delete-faq-heads');
Route::get('/admin/faq-heads/edit/{id}', [FaqsController::class, 'editHeads'])->name('edit-faq-heads');
Route::get('admin/faq-heads/children/{id}', [FaqsController::class, 'children'])->name('faq-head-children');

//FAQs
Route::get('/admin/faqs', [FaqsController::class, 'index'])->name('faqs');
Route::post('/admin/faq/save', [FaqsController::class, 'store'])->name('save-faq');
Route::get('/admin/faq/delete/{id}', [FaqsController::class, 'destroy'])->name('delete-faq');
Route::get('/admin/faq/edit/{id}', [FaqsController::class, 'edit'])->name('edit-faq');


//Case Studies
Route::get('/admin/case-studies', [CasestudiesController::class, 'index'])->name('case-studies');
Route::get('/admin/case-study/create', [CasestudiesController::class, 'create'])->name('create-case-study');
Route::post('/admin/case-study/save', [CasestudiesController::class, 'store'])->name('save-case-study');
Route::get('/admin/case-study/delete/{id}', [CasestudiesController::class, 'destroy'])->name('delete-case-study');
Route::get('/admin/case-study/edit/{id}', [CasestudiesController::class, 'edit'])->name('edit-case-study');
Route::post('/admin/case-study/update', [CasestudiesController::class, 'update'])->name('update-case-study');


//Partners
Route::get('/admin/partners', [PartnersController::class, 'index'])->name('partners');
Route::get('/admin/partner/create', [PartnersController::class, 'create'])->name('create-partner');
Route::post('/admin/partner/save', [PartnersController::class, 'store'])->name('save-partner');
Route::get('/admin/partner/delete/{id}', [PartnersController::class, 'destroy'])->name('delete-partner');
Route::get('/admin/partner/edit/{id}', [PartnersController::class, 'edit'])->name('edit-partner');
Route::post('/admin/partner/update', [PartnersController::class, 'update'])->name('update-partner');

// General settings
Route::get('/admin/general-settings', [SettingController::class, 'generalSettings']);
Route::get('/admin/generalsetting', [SettingController::class, 'updateaddress'])->name('general-setting');
Route::get('/admin/generalsetting/update', [SettingController::class, 'updateGeneralSetting'])->name('settings-update');


// Pages
Route::get('/admin/settings/home', [SettingController::class, 'home'])->name('home-settings');
Route::post('/admin/settings/home/update', [SettingController::class, 'updateHome'])->name('update-home-settings');

Route::get('/admin/settings/about-us', [SettingController::class, 'aboutUs'])->name('aboutus-settings');
Route::post('/admin/settings/about-us/update', [SettingController::class, 'updateAboutUs'])->name('update-aboutus-settings');

Route::get('/admin/settings/services', [SettingController::class, 'services'])->name('services-settings');
Route::post('/admin/settings/services/update', [SettingController::class, 'updateServices'])->name('update-services-settings');

Route::get('/admin/settings/portfolio', [SettingController::class, 'portfolio'])->name('portfolio-settings');
Route::post('/admin/settings/portfolio/update', [SettingController::class, 'updatePortfolio'])->name('update-portfolio-settings');

Route::get('/admin/settings/support', [SettingController::class, 'support'])->name('support-settings');
Route::post('/admin/settings/support/update', [SettingController::class, 'updateSupport'])->name('update-support-settings');

Route::get('/admin/settings/blog', [SettingController::class, 'blog'])->name('blog-settings');
Route::post('/admin/settings/blog/update', [SettingController::class, 'updateBlog'])->name('update-blog-settings');

Route::get('/admin/settings/news', [SettingController::class, 'news'])->name('news-settings');
Route::post('/admin/settings/news/update', [SettingController::class, 'updateNews'])->name('update-news-settings');

Route::get('/admin/settings/caseStudies', [SettingController::class, 'caseStudies'])->name('caseStudies-settings');
Route::post('/admin/settings/caseStudies/update', [SettingController::class, 'updatecaseStudies'])->name('update-caseStudies-settings');

Route::get('/admin/settings/contactUs', [SettingController::class, 'contactUs'])->name('contactUs-settings');
Route::post('/admin/settings/contactUs/update', [SettingController::class, 'updatecontactUs'])->name('update-contactUs-settings');

Route::get('/admin/settings/pilot', [SettingController::class, 'pilot'])->name('pilot-settings');
Route::post('/admin/settings/pilot/update', [SettingController::class, 'updatepilot'])->name('update-pilot-settings');

Route::get('/admin/settings/strategy', [SettingController::class, 'strategy'])->name('strategy-settings');
Route::post('/admin/settings/strategy/update', [SettingController::class, 'updatestrategy'])->name('update-strategy-settings');

Route::get('/admin/settings/demo', [SettingController::class, 'demo'])->name('demo-settings');
Route::post('/admin/settings/demo/update', [SettingController::class, 'updateDemo'])->name('update-demo-settings');

Route::get('/admin/settings/faqs', [SettingController::class, 'faqs'])->name('faqs-settings');
Route::post('/admin/settings/faqs/update', [SettingController::class, 'updateFaqs'])->name('update-faqs-settings');

Route::get('/admin/settings/partners', [SettingController::class, 'partners'])->name('partners-settings');
Route::post('/admin/settings/partners/update', [SettingController::class, 'updatePartners'])->name('update-partners-settings');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/admin/dashboard'); // Redirect to the desired page after logout.
})->name('logout');
// Route::get('/home', [PagesController::class, 'index'])->name('index');

Route::fallback(function () {
    return view('errors.404');
});