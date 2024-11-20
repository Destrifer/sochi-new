<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Page;
use App\Service\CarsService; // Импортируем сервис

class IndexController extends Controller
{
    protected $carsService;

    // Внедрение зависимости через конструктор
    public function __construct(CarsService $carsService)
    {
        $this->carsService = $carsService;
    }

    public function index()
{
    $slides = Slide::all();

    try {
        // Получаем данные машин из сервиса
        $cars = $this->carsService->getCars();

        // Передаём машины в шаблон
        return view('index', [
            'slides' => $slides,
            'cars' => $cars,
        ]);
    } catch (\Exception $e) {
        return view('index', [
            'slides' => $slides,
            'error' => $e->getMessage(),
        ]);
    }
}

	
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', ['page' => $page]);
    }
    
    public function contacts()
    {
        return view('contacts');
    }
    
    public function about()
    {
        return view('about');
    }
}
