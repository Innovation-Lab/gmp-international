<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function showIndex(Request $request)
    {
        $sort = $request->sort;

        $cars_query = Car::where(function(Builder $q) use ($request){
            $q->where(function(Builder $keyword_q) use ($request){
                $keyword_reg = '%' . $request->query('keyword') . '%';
                $keyword_q->where('brand', 'LIKE', $keyword_reg)
                    ->orWhere('car_name', 'LIKE', $keyword_reg);
            });

            if($request->filled('brand_code')) $q->where('brand_code', $request->query('brand_code'));
            if($request->filled('car_name')) $q->where('car_name', 'LIKE', '%' . $request->query('car_name') . '%');

            if($request->filled('from_vehicle_inspection_date')) $q->whereDate('vehicle_inspection_date', '>=', $request->query('from_vehicle_inspection_date'));
            if($request->filled('to_vehicle_inspection_date')) $q->whereDate('vehicle_inspection_date', '<=', $request->query('to_vehicle_inspection_date'));
        });

        if($sort === 'asc' || is_null($sort)) {
            $cars_query->orderBy('brand')->orderByDesc('created_at');
        } else if ($sort === 'desc'){
            $cars_query->orderByDesc('brand')->orderByDesc('created_at');
        }

        $cars = $cars_query
            ->paginate(50)
            ->appends($request->query());

        $brands = Car::select('brand', 'brand_code')
            ->get()
            ->unique('brand_code')
            ->pluck('brand', 'brand_code')
            ->toArray();

        return view('car.index',
            [
                'cars' => $cars,
                'brands' => $brands
            ]
        );
    }

    /**
     * 詳細画面の表示
     */
    public function detail($id)
    {
        $car = Car::find($id);

        return view('car.detail', compact('car'));
    }

    public function showEdit($car_id)
    {
        $car = Car::find($car_id);
        return view('car.edit',
            [
                'car'=>$car
            ]
        );
    }

    public function edit(Request $request, $car_id)
    {
        $car = Car::find($car_id);
        $car->fill([
            'brand' => $request->input('brand'),
            'car_name' => $request->input('car_name'),
            'grade' => $request->input('grade'),
            'model_year' => $request->input('model_year'),
            'color' => $request->input('color'),
            'mileage' => $request->input('mileage'),
            'inspection_expiration_date' => $request->input('inspection_expiration_date'),
            'vehicle_inspection_date' => $request->input('vehicle_inspection_date')

        ]);

        $car->save();
        return redirect()->route('car.detail',$car->id);
    }
     
    public function destroy(Request $request)
    {
        $cars = Car::find($request->input('carId'));
        $cars->delete();
        return redirect()->route('car.index');
    }

}
