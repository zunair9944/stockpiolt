<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqHeadsRequest;
use App\Http\Requests\FaqRequest;
use App\Models\FaqHeadsModel;
use App\Models\FaqsModel;
use App\Models\TagsModel;
use Yajra\DataTables\DataTables;
use DB;
use Illuminate\Support\Str;


class FaqsController extends Controller
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
            $data = DB::table('faq')
            ->join('faq_heads AS h1', 'h1.id', '=', 'faq.faq_head_id')
            ->join('faq_heads AS h2', 'h2.id', '=', 'faq.faq_subhead_id')
            ->select('faq.id', 'faq.question', 'faq.answer', 'h1.title AS head', 'h2.title AS sub_head')
            ->where('h1.deleted_at', null)
            ->where('h2.deleted_at', null)
            ->where('faq.deleted_at', null)
            ->get();
            // $data = TagsModel::select('id','tag','status')->get();
            return Datatables::of($data)->addIndexColumn()

                ->addColumn('heads', function($row){
                    $heads = $row->head.' >> '.$row->sub_head;
                    return $heads;
                })
                ->addColumn('action', function($row){
                    $url = "/admin/faq/delete/".$row->id;
                    $editUrl = @url('/admin/faq/edit/'.$row->id);
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" onclick="editMe('."'".$editUrl."'".')" action="'.@url('/admin/faq/edit/'.$row->id).'" class="btn btn-primary btn-edit-tag btn-xs"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['heads', 'action'])
                ->make(true);
            }
        $data['parents'] = FaqHeadsModel::where('parent_id', null)->get();
        $data['pageTitle'] = 'FAQs';
        $data['faqsListActive'] = 'active';
        $data['faqsOpening'] = 'menu-is-opening';
        $data['faqsOpend'] = 'menu-open';
        return view('admin.faqs.index', $data);
    }
    public function store(FaqRequest $request)
    {
        if($request->id > 0){
            $post = FaqsModel::find($request->id);
            if($post->update($request->all())){
                return response()->json([
                    'status' => 'ok',
                    'msg' => 'Data Saved'
                ]);
            }else{
                return response()->json([
                    'status' => 'notok',
                    'msg' => 'Something went wrong, please try again'
                ]);
            }
        }else{

            if(FaqsModel::create($request->all())){
                return response()->json([
                    'status' => 'ok',
                    'msg' => 'Data Saved'
                ]);
            }else{
                return response()->json([
                    'status' => 'notok',
                    'msg' => 'Something went wrong, please try again'
                ]);
            }
        }

    }
    public function edit($id)
    {
        $data['faq'] = FaqsModel::find($id);
        $d = FaqHeadsModel::where('parent_id', $data['faq']->faq_head_id)->get();
        $op = '<option value="">Select Sub-head</option>';
        foreach ($d as $dkey) {
            $op .= '<option '.($dkey->id==$data['faq']->faq_subhead_id?'SELECTED':'').' value="'.$dkey->id.'">'.$dkey->title.'</option>';
        }
        $data['options'] = $op;
        return response()->json($data);
    }

    public function destroy($id)
    {
        if(FaqsModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }

    //FAQs Heads


    public function heads(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('faq_heads AS h1')
            ->leftJoin('faq_heads AS h2', 'h2.id', '=', 'h1.parent_id')
            ->select('h1.*', 'h2.title AS parent')
            ->where('h1.deleted_at', null)
            ->get();
            return Datatables::of($data)->addIndexColumn()

                ->addColumn('action', function($row){
                    $url = "/admin/faq-heads/delete/".$row->id;
                    $editUrl = @url('/admin/faq-heads/edit/'.$row->id);
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" onclick="editMe('."'".$editUrl."'".')" action="'.@url('/admin/tag/edit/'.$row->id).'" class="btn btn-primary btn-edit-tag btn-xs"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

        $data['parents'] = FaqHeadsModel::where('parent_id', null)->get();
        $data['pageTitle'] = 'FAQ Heads';
        $data['faqHeadListActive'] = 'active';
        $data['faqsOpening'] = 'menu-is-opening';
        $data['faqsOpend'] = 'menu-open';
        return view('admin.faq-heads.index', $data);
    }

    public function storeHeads(FaqHeadsRequest $request)
    {
        if($request->id > 0){
            $post = FaqHeadsModel::find($request->id);
            if($post->update($request->all())){
                return response()->json([
                    'status' => 'ok',
                    'msg' => 'Data Saved'
                ]);
            }else{
                return response()->json([
                    'status' => 'notok',
                    'msg' => 'Something went wrong, please try again'
                ]);
            }
        }else{

            if(FaqHeadsModel::create($request->all())){
                return response()->json([
                    'status' => 'ok',
                    'msg' => 'Data Saved'
                ]);
            }else{
                return response()->json([
                    'status' => 'notok',
                    'msg' => 'Something went wrong, please try again'
                ]);
            }
        }

    }
    public function editHeads($id)
    {
        // $data = TagsModel::find($id);
        $data = DB::table('faq_heads AS h1')
            ->leftJoin('faq_heads AS h2', 'h2.id', '=', 'h1.parent_id')
            ->select('h1.*', 'h2.title AS parent')
            ->where('h1.id', $id)
            ->first();

        return response()->json($data);
    }

    public function children($id)
    {
        $data = FaqHeadsModel::where('parent_id', $id)->get();
        $option = '<option value="">Select Sub-Head</option>';
        foreach ($data as $dkey) {
            $option .= '<option value="'.$dkey->id.'">'.$dkey->title.'</option>';
        }
        return response()->json($option);
    }

    public function destroyHeads($id)
    {
        // dd('ddddd');
        if(FaqHeadsModel::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}