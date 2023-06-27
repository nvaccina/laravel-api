<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Type;
use App\Models\Technology;

class WorkController extends Controller
{

	public function index(){

		$works = Work::with('type', 'technologies')->paginate(10);

		return response()->json($works);
	}

    public function getTypes(){

		$types = Type::all();

		return response()->json($types);
	}

    public function getWorksByType($id){

		$works = Work::where('type_id', $id)->with('type', 'technologies')->paginate(10);

		return response()->json($works);
	}

    public function getTechnologies(){

		$technologies = Technology::all();

		return response()->json($technologies);
	}

    public function getWorksByTechnology($id){

		//$works = Work::where('technology_work.technology_id', $id)->with('type', 'technologies')->paginate(10);
        $works = Technology::find($id)->with('work', 'work.type')->get();
        //$works = Work::where('technologies.id', $id)->with('type', 'technologies')->paginate(10);
        //dd($id, $works->groupBy('work.id')->toArray());
		return response()->json($works);
	}

}
