<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Planning;

class PlanningController extends Controller
{
      public function index()
    {
        $plan = Planning::with(['item'])->latest()->get();

        return response()->json([
            'status' => true,
            'results' => $plan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_id' => 'required',
            'qty' => 'required',
            'waktu_target' => 'required',
        ]);
        try {
            $plan = new Planning;
            $plan->item_id = $request->item_id;
            $plan->qty = $request->qty;
            $plan->waktu_target = $request->waktu_target;
            $plan->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Simpan Planning",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Simpan Planning",
        ], 200);
    }

    public function show($id)
    {
        $plan = Planning::findOrFail($id);

        return response()->json([
            'status' => true,
            'result' => $plan
        ]);
    }

    public function update(Request $request, $id)
    {
        $plan = Planning::findOrFail($id);
        
        $this->validate($request, [
           'item_id' => 'required',
            'qty' => 'required',
            'waktu_target' => 'required',
           ]);
        try {
            $plan->item_id = $request->item_id;
            $plan->qty = $request->qty;
            $plan->waktu_target = $request->waktu_target;
            $plan->update();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Update Planning",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Planning",
        ], 200);
    }

    public function destroy($id)
    {
        $plan = Planning::findOrFail($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Delete Planning",
        ], 200);
    }
}
