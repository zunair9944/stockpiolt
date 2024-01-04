<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\NewsModel;
use App\Models\TagsModel;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;


class NewsController extends Controller
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
            $data = NewsModel::select('id','title','description','status', 'created_at')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/news/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/news/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
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
        $data['pageTitle'] = 'News';
        $data['newsListActive'] = 'active';
        $data['newsOpening'] = 'menu-is-opening';  
        $data['newsOpend'] = 'menu-open';
        return view('admin.news.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Create News';
        $data['newsCreateActive'] = 'active';
        $data['newsOpening'] = 'menu-is-opening';  
        $data['newsOpend'] = 'menu-open';
        $data['tags'] = TagsModel::get();
        return view('admin.news.form', $data);
    }
    public function store(NewsRequest $request)
    {
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        $post = NewsModel::create($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');
            
            return redirect()->route('news');
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
        $data['pageTitle'] = 'Edit News';
        $data['newsListActive'] = 'active';
        $data['newsOpening'] = 'menu-is-opening';  
        $data['newsOpend'] = 'menu-open';
        $data['item'] = NewsModel::find($id);
        $data['tags'] = TagsModel::get();
        
        return view('admin.news.edit', $data);
    }

    
    public function update(NewsRequest $request)
    {
        $post = NewsModel::find($request->id);
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
            
            return redirect()->route('news');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    
    public function destroy($id)
    {
        // dd('ddddd'); 
        if(NewsModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}

