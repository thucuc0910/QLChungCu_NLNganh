<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


use App\Models\Position;
use App\Http\Requests\admin\PositionRequest;
use App\Http\Services\admin\PositionService;



class PositionController extends Controller
{
    protected $positionService;


    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }
    public function list (){

        $positions = Position::paginate(15);

        return view('admin.position.list',[
            'title' => "QUẢN LÝ CHỨC VỤ",
            'positions' => $positions,
        ]);
    }

    public function add(){
        return view('admin.position.add',[
            'title' => "THÊM CHỨC VỤ",
        ]);
    }

    public function create(PositionRequest $request)
    {
        $this->positionService->create($request);

        return redirect()->back();
    }

    public function edit(Position $position)
    {
        return view('admin.position.edit', [
            'title' => 'CẬP NHẬT CHỨC VỤ',
            'position' => $position
        ]);
    }

    

    public function update(Position $position, PositionRequest $request )
    {
        $this->positionService->update($request, $position);

        return redirect('/admin/position/list');
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->positionService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công chức vụ.'
            ]);
        }
        return response()->json([
            'error' => true  
        ]);
    }
}
