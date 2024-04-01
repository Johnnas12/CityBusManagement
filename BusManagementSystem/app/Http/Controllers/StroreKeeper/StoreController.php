<?php

namespace App\Http\Controllers\StroreKeeper;

use App\Models\Bus;
use App\Models\Spare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\SampleChart;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    //
    public function index(){
        return view('storeKeeper.index');
    }

    public function registerAssets(){
        return view('storeKeeper.registerAssets');
    }
    public function registerSpares(){
        return view('storeKeeper.registerSpareParts');
    }

    public function storeOrUpdate(Request $request)
    {
        $category = $request->input('category');
        $component = $request->input('component');
        $quantity = $request->input('quantity');
        
        // Check if the component already exists for the given category
        $sparePart = Spare::where('category', $category)
            ->where('component', $component)
            ->first();
        
        if ($sparePart) {
            // Component already exists, update the quantity
            $sparePart->quantity += $quantity;
            $sparePart->save();
        } else {
            // Component does not exist, create a new entry
            Spare::create([
                'category' => $category,
                'component' => $component,
                'quantity' => $quantity,
            ]);
        }
        
        return response()->json(['message' => 'Data saved successfully']);
    }

    public function storeBuses(Request $request){
        $request->validate([
            'plate' => 'required', 
            'model' => 'required',
            'manufacturer' => 'required',
            'yearofmanufacture' => 'required',
            'seatcapacity' => 'required',
            'fuel' => 'required', 
            'vin' => 'required', 
            'transmission' => 'required', 
            'status' => 'required', 

        ]);

        Bus::create([
            'plate' => $request->plate,
            'model' => $request->model, 
            'manufacturer' => $request->manufacturer, 
            'yearofmanufacture' => $request->yearofmanufacture, 
            'seatcapacity' => $request->seatcapacity, 
            'fuel' => $request->fuel,
            'vin' => $request->vin,
            'transmission' => $request->transmission,
            'status' => $request->status,

        ]);

        return redirect()->back()->with('message', "Bus Registered Successfully");
    }

    public function useSpare(){
        return view('storeKeeper.useSpareParts');
    }


    public function quantityDecrease(Request $request)
    {
        $category = $request->input('category');
        $component = $request->input('component');
        $quantity = $request->input('quantity');
        
        // Check if the component already exists for the given category
        $sparePart = Spare::where('category', $category)
            ->where('component', $component)
            ->first();
        
        if ($sparePart) {
            // Component already exists, update the quantity
            $newQuantity = $sparePart->quantity - $quantity;
            
            if ($newQuantity >= 0) {
                $sparePart->quantity = $newQuantity;
                $sparePart->save();
            } else {
                return back()->with(['message' => 'Quantity cannot be decreased beyond zero'], 400);
            }
        } else {
            return back()->with(['fail' => 'Component not found'], 404);
        }
        
        return back()->with(['fail' => 'Data saved successfully']);
    }


    public function busManage(){
        return view('storeKeeper.manageBuses', [
            'datas' => Bus::get(),
        ]);
    }

    public function spareManage(){
        return view('storeKeeper.managespareparts', [
            'datas' => Spare::where('category', 'Engine Components')->get(),
            'datas1' => Spare::where('category', 'Electrical Components')->get(),
            'datas2' => Spare::where('category', 'Suspension and Steering Components')->get(),
            'datas3' => Spare::where('category', 'Brake System')->get(),
            'datas4' => Spare::where('category', 'Transmission and Drivetrain')->get(),
            'datas5' => Spare::where('category', 'Cooling System')->get(),
            'datas6' => Spare::where('category', 'Air Conditioning')->get(),
            'datas7' => Spare::where('category', 'Body and Interior')->get()      
        ]);
    }



    //================================ charts data =============================//
    
    
    public function busesDataFlotChart(){

        // $data = [
        // ['label' => 'working buses', 'data' => DB::table('buses')->where('status', 'Working')->count(), 'color'=>'#886AB5' ],
        // ['label' => 'buses on maintainance', 'data' => DB::table('buses')->where('status', 'on Maintainance')->count(), 'color' => '#4791CC' ],
        // ['label' => 'out of service', 'data' => DB::table('buses')->where('status', 'out of service')->count(), 'color' => '#FFBF87'],
        // ]; 

        // return response()->json($data);

        $data = [
            'labels' => ["Working buses", "Bus on maintainance", 'out of service'],
            'datasets' => [
                [
                    'data' => [
                    DB::table('buses')->where('status', 'Working')->count(), 
                    DB::table('buses')->where('status', 'on Maintainance')->count(),
                    DB::table('buses')->where('status', 'out of service')->count()],
                    'backgroundColor' => ["#34c38f", "#ebeff2", "ebecf2"],
                    'hoverBackgroundColor' => ["#34c38f", "#ebeff2"],
                    'hoverBorderColor' => "#fff",
                ],
            ],
        ];

        return response()->json($data);
}

public function spareDataFlotChart(){

    // $data = [
    // ['label' => 'working buses', 'data' => DB::table('buses')->where('status', 'Working')->count(), 'color'=>'#886AB5' ],
    // ['label' => 'buses on maintainance', 'data' => DB::table('buses')->where('status', 'on Maintainance')->count(), 'color' => '#4791CC' ],
    // ['label' => 'out of service', 'data' => DB::table('buses')->where('status', 'out of service')->count(), 'color' => '#FFBF87'],
    // ]; 

    // return response()->json($data);

    $data = [
        'labels' => ["Engine Components", "Electrical Parts", 'Suspension and Steering Components', 'Brake System Components', 'Transmission and Drivetrain Parts', 'Cooling System', 'Air Conditioning and Heating' , 'Body and Interior Parts'],
        'datasets' => [
            [
                'data' => [
                DB::table('spares')->where('category', 'Engine Components')->count(), 
                DB::table('spares')->where('category', 'Electrical Components')->count(),
                DB::table('spares')->where('category', 'Suspension and Steering Components')->count(), 

                DB::table('spares')->where('category', 'Brake System')->count(), 
                DB::table('spares')->where('category', 'Transmission and Drivetrain')->count(),
                DB::table('spares')->where('category', 'Cooling System')->count(),
                DB::table('spares')->where('category', 'Air Conditioning')->count(),
                DB::table('spares')->where('category', 'Body and Interior')->count(),
            ],
                'backgroundColor' => ["#34c38f", "#ebeff2", "ebecf2"],
                'hoverBackgroundColor' => ["#34c38f", "#ebeff2"],
                'hoverBorderColor' => "#fff",
            ],
        ],
    ];

    return response()->json($data);
}

}
