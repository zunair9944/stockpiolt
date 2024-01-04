<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\BlogsModel;
use App\Models\TagsModel;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;


class BlogController extends Controller
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
            $data = BlogsModel::select('id','title','description','status', 'created_at')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/blog/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/blog/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
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
        $data['pageTitle'] = 'Blogs';
        $data['blogListActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';
        $data['blogOpend'] = 'menu-open';
        return view('admin.blogs.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Create Blog';
        $data['blogCreateActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';
        $data['blogOpend'] = 'menu-open';
        $data['tags'] = TagsModel::get();
        return view('admin.blogs.form', $data);
    }
    public function store(BlogRequest $request)
    {
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        $post = BlogsModel::create($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');

            return redirect()->route('blogs');
        }else{
            session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
            return back();
        }

    }
    public function show(string $id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Blog';
        $data['blogListActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';
        $data['blogOpend'] = 'menu-open';
        $data['item'] = BlogsModel::find($id);
        $data['tags'] = TagsModel::get();

        return view('admin.blogs.edit', $data);
    }
    public function update(BlogRequest $request)
    {
        $post = BlogsModel::find($request->id);
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        $post->update($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->clearMediaCollection('images');
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');

            return redirect()->route('blogs');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }


    public function destroy($id)
    {

        if(BlogsModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }


}
