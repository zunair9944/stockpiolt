<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CasestudiesRequest;
use App\Models\CasestudiesModel;
use App\Models\TagsModel;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;


class CasestudiesController extends Controller
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
            $data = CasestudiesModel::select('id','title','description','status', 'created_at')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/case-study/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/case-study/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('thumbnail', function($row){
                    $src = $row->getFirstMediaUrl('images', 'thumb');
                    $thumbnail = '<img class="img img-fluid" src="'.$src.'">';
                    return $thumbnail;
                })
                ->rawColumns(['thumbnail', 'created_at', 'action'])
                ->make(true);
            }
        $data['pageTitle'] = 'Case Studies';
        $data['caseStudyListActive'] = 'active';
        $data['caseStudyOpening'] = 'menu-is-opening';  
        $data['caseStudyOpend'] = 'menu-open';
        return view('admin.case-studies.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Create Case Study';
        $data['caseStudyCreateActive'] = 'active';
        $data['caseStudyOpening'] = 'menu-is-opening';  
        $data['caseStudyOpend'] = 'menu-open';
        $data['tags'] = TagsModel::get();
        return view('admin.case-studies.form', $data);
    }
    public function store(CasestudiesRequest $request)
    {
        // dd($request->all());
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        $post = CasestudiesModel::create($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');
            
            return redirect()->route('case-studies');
        }else{
            session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
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
        $data['pageTitle'] = 'Edit Case Study';
        $data['caseStudyListActive'] = 'active';
        $data['caseStudyOpening'] = 'menu-is-opening';  
        $data['caseStudyOpend'] = 'menu-open';
        $data['item'] = CasestudiesModel::find($id);
        $data['tags'] = TagsModel::get();
        
        return view('admin.case-studies.edit', $data);
    }

    
    public function update(CasestudiesRequest $request)
    {
        $post = CasestudiesModel::find($request->id);
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        // dd($request->all());
        $post->update($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->clearMediaCollection('images');
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');
            
            return redirect()->route('case-studies');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    
    public function destroy($id)
    {
        // dd('ddddd'); 
        if(CasestudiesModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}

