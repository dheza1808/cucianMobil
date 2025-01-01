<?php

// app/Http/Controllers/CarController.php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $cars = Car::paginate(10); // Mengambil data mobil dengan pagination
        return view('index', compact('cars'));
    }

    public function create()
    {
        $cars = Car::paginate(10); // Mengambil data mobil dengan pagination
        return view('createCar', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_type' => 'required|string',
            'car_plate' => 'required|string',
            'service_type' => 'required|string',
            'payment_status' => 'required|string',
            'service_time' => 'required|date',
            'employee_name' => 'required|string',
            'remarks' => 'nullable|string',
            'car_price' => 'nullable|numeric',
        ]);

        $car = new \App\Models\Car();
        $car->fill($data);
        $car->save();


        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('editCar', compact('car'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $requestData = $request->validate([
            'vehicle_type' => 'required|string',
            'car_plate' => 'required|string|max:10',
            'service_type' => 'required|string',
            'payment_status' => 'required|string',
            'service_time' => 'required|date',
            'employee_name' => 'required|string',
            'remarks' => 'nullable|string',
            'car_price' => 'nullable|numeric',
        ]);
    
        // Konversi service_time ke format database jika diperlukan
        $requestData['service_time'] = \Carbon\Carbon::parse($request->service_time)->format('Y-m-d H:i:s');
    
        // Cari data mobil berdasarkan ID
        $car = Car::findOrFail($id);
    
        // Perbarui data menggunakan data yang telah divalidasi
        $car->update($requestData);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus.');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id); // Cari data berdasarkan ID atau lempar error 404 jika tidak ditemukan
        return view('car_show', compact('car')); // Return view dengan data mobil
    }
}
