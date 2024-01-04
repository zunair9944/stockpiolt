<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\TeamModel;
use App\Models\User;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

// use Yajra\DataTables\Contracts\DataTable;

class TeamController extends Controller
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
            $data = TeamModel::select('id','name','dsignation','description','status', 'created_at')->get();
            return FacadesDataTables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/team/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/team/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
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
        $data['pageTitle'] = 'Team';
        $data['teamListActive'] = 'active';
        $data['teamOpening'] = 'menu-is-opening';
        $data['teamOpend'] = 'menu-open';
        // dd($data);
        return view('admin.team.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Create Team Member';
        $data['teamCreateActive'] = 'active';
        $data['teamOpening'] = 'menu-is-opening';
        $data['teamOpend'] = 'menu-open';
        return view('admin.team.form', $data);
    }
    public function store(TeamRequest $request)
    {
        $request['slug'] = Str::slug($request->name);
        $request['user_id'] = auth()->user()->id;
        $post = TeamModel::create($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');

            return redirect()->route('team');
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
        $data['pageTitle'] = 'Edit team member';
        $data['teamListActive'] = 'active';
        $data['teamOpening'] = 'menu-is-opening';
        $data['teamOpend'] = 'menu-open';
        $data['item'] = TeamModel::find($id);
        // $data['tags'] = TagsModel::get();

        return view('admin.team.edit', $data);
    }


    public function update(TeamRequest $request)
    {
        $post = TeamModel::find($request->id);
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

            return redirect()->route('team');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }


    public function destroy($id)
    {
        // dd('ddddd');
        if(TeamModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}