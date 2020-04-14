<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Source;
use App\Models\City;
use App\Models\Coordinate;

class SourceController extends Controller
{

    private function _sourceQuery($request, $validated, $review = 0) {
        $query = $request->query('selected');
        $parts = explode('-', $query);

        if (count($parts) == 2) {
            $parts[0] = $parts[0]. "-01-01";
            $parts[1] = $parts[1]. "-12-31";

            if($review == 1) {
                return Source::with('cities', 'domains', 'persons', 'groups', 'regions')
                    ->where('validated', $validated)
                    ->where('review', 1)
                    ->where('date', '>=', $parts[0])
                    ->where('date', '<=', $parts[1])
                    ->orderBy('date', 'asc')->paginate(100);
            } else {
                return Source::with('cities', 'domains', 'persons', 'groups', 'regions')
                    ->where('validated', $validated)
                    ->where('date', '>=', $parts[0])
                    ->where('date', '<=', $parts[1])
                    ->orderBy('date', 'asc')->paginate(100);
            }
        }
        if($review == 1) {
            return Source::with('cities', 'domains', 'persons', 'groups', 'regions')
                ->where('validated', $validated)
                ->where('review', 1)
                ->orderBy('date', 'asc')
                ->paginate(100);
        } else {
            return Source::with('cities', 'domains', 'persons', 'groups', 'regions')
                ->where('validated', $validated)
                ->orderBy('date', 'asc')
                ->paginate(100);
        }

    }

    public function index(Request $request)
    {
        return $this->_sourceQuery($request, 0);
    }

    public function validated(Request $request)
    {
        return $this->_sourceQuery($request, 1);
    }

    public function review(Request $request)
    {
        return $this->_sourceQuery($request, 0, 1);
    }

    public function update(Request $request)
    {
        if ($request->segment(3)) {
            $source = Source::findId($request->segment(3))->firstOrFail();
            $source->source = $request->input('source');
            $source->save();
        }
    }

    public function updateValid(Request $request)
    {
        if ($request->segment(3)) {
            $source = Source::findId($request->segment(3))->firstOrFail();
            $request->input('validated') == False ? $out = 0 : $out = 1;
            $source->validated = $out;
            $source->save();
        }
        return $out;
    }

    public function updateReview(Request $request)
    {
        if ($request->segment(3)) {
            $source = Source::findId($request->segment(3))->firstOrFail();
            $request->input('review') == False ? $out = 0 : $out = 1;
            $source->review = $out;
            $source->save();
        }
        return $out;
    }

    // CITIES
    public function storeCity(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();

        $city = City::findId($request->input('city_id'))->first();
        // Si la ville n'est pas dans le dictionnaire
        if (!$city) {
            $coordinates = Coordinate::findCityId($request->input('city_id'))->first();
            $city = new City();
            $city->id = $coordinates->city_id;
            $city->name = strtolower($coordinates->nom);
            $city->save();
        }

        $source->cities()->attach($request->input('city_id'));
    }

    public function removeCity(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->cities()->detach($request->segment(5));
    }

    // REGIONS
    public function storeRegion(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->regions()->attach($request->input('region_id'));
    }

    public function removeRegion(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->regions()->detach($request->segment(5));
    }

    // DOMAINS
    public function storeDomain(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->domains()->attach($request->input('domain_id'));
    }

    public function removeDomain(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->domains()->detach($request->segment(5));
    }

    // PERSONS
    public function storePerson(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->persons()->attach($request->input('person_id'));
    }

    public function removePerson(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->persons()->detach($request->segment(5));
    }

    // GROUPS
    public function storeGroup(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->groups()->attach($request->input('group_id'));
    }

    public function removeGroup(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->groups()->detach($request->segment(5));
    }

    // MATTERS
    public function storeMatter(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->firstOrFail();
        $source->matters()->attach($request->input('matter_id'));
    }

    public function updateReference(Request $request)
    {
        if ($request->segment(4)) {
            $source = Source::findId($request->segment(4))->firstOrFail();
            $source->ref_id = $request->input('ref_id');
            $source->save();
        }
    }


}
