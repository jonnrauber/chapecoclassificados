<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
      $anuncios = DB::select('select * from anuncios order by qtvisit desc');
      $recentes = DB::select('select * from anuncios order by created_at DESC');
      return view('welcome', ['recentes' => $recentes, 'anuncios' => $anuncios]);
    }
}
