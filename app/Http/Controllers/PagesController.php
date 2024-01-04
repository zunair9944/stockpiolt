<?php

namespace App\Http\Controllers;

use App\Models\BlogsModel;
use App\Models\CasestudiesModel;
use App\Models\FaqHeadsModel;
use App\Models\HomeModel;
use App\Models\NewsModel;
use App\Models\PartnersModel;
use App\Models\SettingModel;
use App\Models\TeamModel;
use App\Models\TestimonialsModel;
use CaseStudies;
use Illuminate\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PagesController extends Controller
{
    function index(){
        $data['page'] = HomeModel::find(1);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        // dd($data);
        return view("pages/home", $data);
    }

    public function aboutUs(){
        $data['page'] = HomeModel::find(2);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['team'] = TeamModel::get();
        $data['news'] = NewsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/about-us", $data);
    }

    public function products(){
        $data['page'] = HomeModel::find(3);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/products", $data);
    }
    public function blogs(){
        $data['page'] = HomeModel::find(5);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['topBar'] = BlogsModel::where('in_topbar','on')->limit(3)->get();
        $data['features'] = BlogsModel::where('is_featured','on')->orderBy('id', 'DESC')->get();
        $data['blogs'] = BlogsModel::orderBy('id' , 'DESC')-> get();
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/blog", $data);
    }
    public function blogDetail($blog_id){
        $data['page'] = BlogsModel::find($blog_id);
        // dd($data);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/blog-detail", $data);
    }

    public function contactUs(){
        $data['page'] = HomeModel::find(8);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/contact-us", $data);

    }
    public function submitContactUs(Request $request) {
        $detail['title'] = 'Contact us Email';
        $detail['body'] = $request->message;
        $detail['name'] = $request->name;
        $detail['email'] = $request->email;
        $detail['phone'] = $request->phone;
        $detail['contactMethod'] = $request->flexRadioDefault;
        Mail::to('stockpilot@stgdev.net')->send(new \App\Mail\contactUsEmail($detail));
        session()->flash('success', '<div class="alert alert-success"><center>  Email Successfully Sent!</div></denter>');
        return redirect()->route('contactUs');
    }

    public function demo(){
        $data['page'] = HomeModel::find(11);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/demo", $data);

    }
    public function faqs(){
        $data['page'] = HomeModel::find(11);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        $faq_heads = FaqHeadsModel::whereNull('parent_id')->get();
        for($f=0; $f < count($faq_heads); $f++){
            $d[$faq_heads[$f]->title] = FaqHeadsModel::where('parent_id', $faq_heads[$f]->id)->get();
            $data['faqs'] = $d;
        }
        return view("pages/faq2", $data);

    }
    public function pilot(){
        $data['page'] = HomeModel::find(14);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/pilot", $data);

    }
    public function partners(){
        $data['pageTitle'] = 'partners | Stock Pilot';
        $data['companies'] = PartnersModel::orderBy('id' , 'DESC')-> get();
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        // dd($data);
        return view("pages/partners", $data);

    }
    public function subscribers(){
        $data['page'] = HomeModel::find(4);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/subscribers", $data);

    }
    public function strategy(){
        $data['page'] = HomeModel::find(10);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/strategy", $data);
    }
    public function caseStudies(){
        $data['page'] = HomeModel::find(7);
        $data['page2'] = HomeModel::find(8);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['cases'] = CasestudiesModel::limit(2)->orderBy('id' , 'DESC')-> get();
        $data['cases2'] = CasestudiesModel:: get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/case-studies", $data);
    }
    public function casestudiesdetail($casestudies_id){
        $data['page'] = CasestudiesModel::find($casestudies_id);
        // dd($data);
        $data['pageTitle'] = $data['page']->mataTitle. ' | Stock Pilot';
        $data['mataDescription'] = $data['page']->mataDescription;
        $data['mataTags'] = $data['page']->mataTags;
        $data['testimonials'] = TestimonialsModel::get();
        $data['settings'] = SettingModel::where('id' , 1)->first();
        return view("pages/case-studies-detail", $data);
    }


}