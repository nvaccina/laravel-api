<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Builder;

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

        $works = Work::with('type', 'technologies')
                ->whereHas('technologies', function(Builder $query) use($id){
                    $query->where('technology_id', $id);
                })->paginate(10);

		return response()->json($works);
	}

    public function getWorkDetail($slug){

		$work = Work::where('slug', $slug)->with('type', 'technologies')->first();
        if($work->image) $work->image = asset('storage/' . $work->image);
        else{
            $work->image = asset('/img/noimage.jpg');
            $work->image_original_name = '- no image -';
        }

		return response()->json($work);
	}

    public function search($tosearch){
        $works = Work::where('title', 'like', "%$tosearch%")->with('type', 'technologies')->paginate(10);

        return response()->json($works);
    }


}
