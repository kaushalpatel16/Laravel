<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaCalculatorController extends Controller
{
    public function showCalculatorForm()
    {
        return view('calculator');
    }

    public function calculateArea(Request $request)
    {
        $shape = $request->input('shape');
        $length = $request->input('length');
        $width = $request->input('width', 0); // Default width to 0

        switch ($shape) {
            case 'square':
                $area = $length * $length;
                break;
            case 'rectangle':
                $area = $length * $width;
                break;
            case 'circle':
                $area = 3.14159 * ($length * $length);
                break;
            default:
                return 'Invalid shape';
        }

        return view('result', ['shape' => $shape, 'area' => $area]);
    }
}

