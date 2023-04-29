<?php

namespace App\Http\Controllers\Horensou;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Horensou\StoreHorensouRequest;
use App\Models\Horensou\HorensouRequest;
use App\Models\Horensou\HorensouCategory as Category;
use App\Models\Horensou\HorensouPriority as Priority;
use App\Models\Admin\Department;
use App\Models\Admin\Shop;
use App\Models\Horensou\HorensouRole as Role;
use App\Enums\ShopStatusEnum;
use Exception;
// use App\Models\User;

class HorensouRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('horensou.index');
    }

    public function horensouDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = HorensouRequest::with(['category','priority','department','section','shop','approveBy'])->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('priority_id', function($data){
                    return $data->priority->code . " - " . $data->priority->desc;
                })
                ->editColumn('request_by', function($data){
                    return $data->requestBy->name;
                })
                ->editColumn('shop_status', function($data){
                    switch ($data->shop_status) {
                        case 'Submitted':
                            $status_color = 'primary';
                            break;
                        
                        case 'Rejected':
                            $status_color = 'danger';
                            break;

                        case 'Approved':
                            $status_color = 'success';
                            break;
                    }
                    $status = '
                            <span class="badge bg-'. $status_color . '" style="padding: 5px 8px; font-size: 12px; border-radius: 15px;" title="Status dari PIC: ' . $data->shop_status . '" data-toggle="tooltip" data-placement="bottom">' . $data->shop_status . '</span>
                        ';
                    return $status;
                })
                ->escapeColumns([])
                ->setRowAttr([
                    'onclick' => function($data) {
                        return "window.open('" . route('horensou.request.show', $data->id) . "','_self')";
                    },
                    'style' => "cursor: pointer;",
                    'title' => "Click untuk detail",
                    'data-toggle' => "tooltip"
                ])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::with(['sections', 'shops'])->get();
        // $shops = Shop::where('section_id', auth()->user()->section->id)->get();
        $categories = Category::all();
        $priorities = Priority::all();

        return view('horensou.create', compact('departments', 'categories', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHorensouRequest $request)
    {
        $shop = Shop::find($request->shop);
        $cost_center = substr($shop->name,0,4);
        $doc_no = "CC" . $cost_center . "-" . date('Ymd-His');
        
        try {
            $horensou = HorensouRequest::create([
                'doc_no' => $doc_no,
                'department_id' => $request->department,
                'section_id' => $request->section,
                'shop_id' => $request->shop,
                'category_id' => $request->category,
                'priority_id' => $request->priority,
                'point_problem' => $request->point_problem,
                'detail_problem' => $request->detail_problem,
                'part_name' => $request->part_name,
                'request_by' => auth()->user()->id,
                'approve_by' => Role::where('section_id',auth()->user()->section_id)->first()->user->id,
                'shop_status' => ShopStatusEnum::Submitted,
            ]);
        } catch (Exception $e) {
            return redirect()->route('horensou.request.index')->withError('Tidak dapat menyimpan data (Exception: ' . $e->getMessage() . ")");
        }
        return redirect()->route('horensou.request.index')->withSuccess('Item horensou baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horensou = HorensouRequest::find($id);
        return view('horensou.show', compact('horensou'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreHorensouRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
