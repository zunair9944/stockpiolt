<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HomeModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;





class SettingController extends Controller
{
    public function home(){
        $data['pageTitle'] = 'Home Page Settings';
        $data['homeSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(1);
        return view('admin.pages.home', $data);
    }
    public function updateHome(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('home-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function aboutUs(){
        $data['pageTitle'] = 'AboutUs Page Settings';
        $data['aboutSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(2);
        return view('admin.pages.aboutus', $data);
    }
    public function updateAboutUs(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('aboutus-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }


    public function services(){
        $data['pageTitle'] = 'Services Page Settings';
        $data['serviceSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(3);
        return view('admin.pages.services', $data);
    }
    public function updateServices(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('services-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }
    public function portfolio(){
        $data['pageTitle'] = 'Portfolio Page Settings';
        $data['portfolioSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(4);
        return view('admin.pages.portfolio', $data);
    }
    public function updatePortfolio(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('portfolio-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }


    public function support(){
        $data['pageTitle'] = 'Support Page Settings';
        $data['supportSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(3);
        return view('admin.pages.support', $data);
    }
    public function updateSupport(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('support-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }


    public function blog(){
        $data['pageTitle'] = 'Blog Page Settings';
        $data['blogSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(5);
        return view('admin.pages.blog', $data);
    }
    public function updateBlog(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('blog-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function news(){
        $data['pageTitle'] = 'News Page Settings';
        $data['newsSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(6);
        return view('admin.pages.news', $data);
    }
    public function updateNews(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('news-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function caseStudies(){
        $data['pageTitle'] = 'Case Studies Settings';
        $data['caseStudiesSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(7);
        return view('admin.pages.caseStudies', $data);
    }
    public function updatecaseStudies(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('caseStudies-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function contactUs(){
        $data['pageTitle'] = 'contact-Us Settings';
        $data['contactUsSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(8);
        return view('admin.pages.contactUs', $data);
    }
    public function updatecontactUs(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('contactUs-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function pilot(){
        $data['pageTitle'] = 'Pilot Page Settings';
        $data['pilotSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(14);
        return view('admin.pages.pilot', $data);
    }
    public function updatepilot(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('pilot-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function strategy(){
        $data['pageTitle'] = 'Strategy Page Settings';
        $data['strategySettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(10);
        return view('admin.pages.strategy', $data);
    }
    public function updatestrategy(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('strategy-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }
    public function demo(){
        $data['pageTitle'] = 'Demo Page Settings';
        $data['demoSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(11);
        return view('admin.pages.demo', $data);
    }
    public function updateDemo(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('demo-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function faqs(){
        $data['pageTitle'] = 'FAQs Page Settings';
        $data['faqsSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(12);
        return view('admin.pages.faqs', $data);
    }
    public function updateFaqs(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('faqs-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function partners(){
        $data['pageTitle'] = 'partner Page Settings';
        $data['partnerSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = HomeModel::find(13);
        return view('admin.pages.partner', $data);
    }
    public function updatePartner(Request $request){
        $body = HomeModel::find($request->id);
        $request['user_id'] = auth()->user()->id;
        if($body->update($request->all())){
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('partner-settings');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function generalSettings(){
        $data['pageTitle'] = 'General Settings';
        $data['GeneralSettings'] = 'active';
        $data['settingsOpend'] = 'menu-open';
        $data['settingsOpening'] = 'menu-is-opening';
        $data['item'] = SettingModel::where('id', 1)->first();
        return view('admin.general-setting.index', $data);
    }

    public function  updateGeneralSetting(Request $request)
    {
        $request->validate([
            'country' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $setting = SettingModel::find(1);

        if (!$setting) {
            return redirect()->back()->with('error', 'Setting not found');
        }
        $setting->country = $request->input('country');
        $setting->address = $request->input('address');
        $setting->phone = $request->input('phone');
        $setting->email = $request->input('email');
        $setting->map = $request->input('map');
        $settings= $setting->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            if ($setting->hasMedia('images')) {
                $setting->clearMediaCollection('images');
            }
            $setting->addMediaFromRequest('image')->toMediaCollection('images');
        }
        session()->flash('success', '<div class="alert alert-success"><center>  Data  Successfully Updated!</div></denter>');
        return redirect()->route('settings-update');
    }



}