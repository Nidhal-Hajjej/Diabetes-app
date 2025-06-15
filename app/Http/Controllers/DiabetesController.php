<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DiabetesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
<<<<<<< HEAD
            $streamlit_output = shell_exec('streamlit run /predictionSystem/app.py --server.port 8080');
            return view('prediction', ['output' => $streamlit_output]);
        }

=======
            $form_data = $request->all();
            $streamlit_url = 'http://localhost:8501/?' . http_build_query($form_data);
            return view('prediction', ['streamlit_url' => $streamlit_url]);
        }
    
>>>>>>> dev-ahmed
        return view('prediction');
    }
}
