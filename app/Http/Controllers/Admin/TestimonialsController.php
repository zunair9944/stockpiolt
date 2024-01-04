<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialsRequest;
use App\Models\TestimonialsModel;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;


class TestimonialsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = TestimonialsModel::select('id','subject','body','star_rating', 'client_name', 'designation', 'created_at')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/testimonial/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/testimonial/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('thumbnail', function($row){
                    $src = $row->getFirstMediaUrl('images', 'thumb');
                    $thumbnail = '<img class="img img-fluid" src="'.$src.'">';
                    return $thumbnail;
                })
                ->addColumn('company_logo', function($row){
                    $src1 = $row->getFirstMediaUrl('company_logo', 'thumb');
                    $company_logo = '<img class="img img-fluid" src="'.$src1.'">';
                    return $company_logo;
                })
                ->addColumn('client', function($row){
                    $client = $row->client_name.' '.$row->designation;
                    return $client;
                })
                ->rawColumns(['thumbnail', 'company_logo', 'client', 'created_at', 'action'])
                ->make(true);
            }
        $data['pageTitle'] = 'Testimonials';
        $data['testimonialsListActive'] = 'active';
        $data['testimonialsOpening'] = 'menu-is-opening';  
        $data['testimonialsOpend'] = 'menu-open';
        return view('admin.testimonials.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Create Testimonial';
        $data['testimonialsCreateActive'] = 'active';
        $data['testimonialsOpening'] = 'menu-is-opening';  
        $data['testimonialsOpend'] = 'menu-open';
        return view('admin.testimonials.form', $data);
    }
    // public function store(TestimonialsRequest $request)
    // {
        
    //     $post = TestimonialsModel::create($request->all());
    //     if($post){
    //         if($request->hasFile('image') && $request->file('image')->isValid()){
    //                 $post->addMediaFromRequest($request->file('image'))->toMediaCollection('images', 'public');
    //         }
    //         if($request->hasFile('image12') && $request->file('image12')->isValid()){
    //             $post->addMediaFromRequest('image12')->toMediaCollection('company_logo', 'public');
    //         }
    //         session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');
            
    //         return redirect()->route('testimonials');
    //     }else{
    //         session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
    //         return back();
    //     }

    // }

    public function store(TestimonialsRequest $request)
    {
        $post = TestimonialsModel::create($request->all());

        if ($post) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }

            if ($request->hasFile('image12') && $request->file('image12')->isValid()) {
                $post->addMediaFromRequest('image12')->toMediaCollection('company_logo');
            }

            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');
            return redirect()->route('testimonials');
        } else {
            session()->flash('error', '<div class="alert alert-danger">Failed to save the data.</div>');
            return back();
        }
    }
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Testimonial';
        $data['testimonialsListActive'] = 'active';
        $data['testimonialsOpening'] = 'menu-is-opening';  
        $data['testimonialsOpend'] = 'menu-open';
        $data['item'] = TestimonialsModel::find($id);
        
        return view('admin.testimonials.edit', $data);
    }

    public function update(TestimonialsRequest $request)
    {
        $post = TestimonialsModel::find($request->id);
        
        $post->update($request->all());

        if ($post) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $post->clearMediaCollection('images'); // Remove existing images
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }

            if ($request->hasFile('image12') && $request->file('image12')->isValid()) {
                $post->clearMediaCollection('company_logo');
                $post->addMediaFromRequest('image12')->toMediaCollection('company_logo');
            }

            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');
            return redirect()->route('testimonials');
        } else {
            session()->flash('msg', 'Failed to save the data.');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }



    // public function update(TestimonialsRequest $request)
    // {
    //     $post = TestimonialsModel::find($request->id);
        
    //     // dd($request->all());
    //     $post->update($request->all());
    //     if($post){
    //         if($request->hasFile('image') && $request->file('image')->isValid()){
    //             $post->addMediaFromRequest($request->file('image'))->toMediaCollection('images', 'public');
    //         }
    //         if($request->hasFile('image12') && $request->file('image12')->isValid()){
    //             $post->addMediaFromRequest('image12')->toMediaCollection('company_logo', 'public');
    //         }
    //         session()->flash('msg', 'Successfully saved the data!');
    //         session()->flash('alert-class', 'alert-success');
            
    //         return redirect()->route('testimonials');
    //     }else{
    //         session()->flash('msg', 'Successfully saved the data!');
    //         session()->flash('alert-class', 'alert-danger');
    //         return back();
    //     }
    // }

    
    public function destroy($id)
    {
        // dd('ddddd'); 
        if(TestimonialsModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}

