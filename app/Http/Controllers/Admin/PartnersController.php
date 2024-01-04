<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnersRequest;
use App\Models\PartnersModel;
use App\Models\User;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PartnersController extends Controller
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
            $data = PartnersModel::select('id','company_name','description', 'created_at')->get();
            return FacadesDataTables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/admin/partner/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url('/admin/partner/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
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
        $data['pageTitle'] = 'Partners';
        $data['partnersListActive'] = 'active';
        $data['partnersOpening'] = 'menu-is-opening';
        $data['partnersOpend'] = 'menu-open';
        return view('admin.partners.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Add Partner';
        $data['partnersCreateActive'] = 'active';
        $data['partnersOpening'] = 'menu-is-opening';
        $data['partnersOpend'] = 'menu-open';
        return view('admin.partners.form', $data);
    }


    public function store(PartnersRequest $request)
    {
        $post = PartnersModel::create($request->all());

        if ($post) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('success', '<div class="alert alert-success">Successfully saved the data!</div>');
            return redirect()->route('partners');
        } else {
            session()->flash('error', '<div class="alert alert-danger">Failed to save the data.</div>');
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
        $data['pageTitle'] = 'Edit Partner';
        $data['partnersListActive'] = 'active';
        $data['partnersOpening'] = 'menu-is-opening';
        $data['partnersOpend'] = 'menu-open';
        $data['item'] = PartnersModel::find($id);

        return view('admin.partners.edit', $data);
    }

    public function update(PartnersRequest $request)
    {
        $post = PartnersModel::find($request->id);

        $post->update($request->all());

        if ($post) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $post->clearMediaCollection('images'); // Remove existing images
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }

            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');
            return redirect()->route('partners');
        } else {
            session()->flash('msg', 'Failed to save the data.');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function destroy($id)
    {
        if(PartnersModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}