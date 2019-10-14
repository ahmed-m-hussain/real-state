<?php

namespace App\Http\Controllers\Admin;

use App\Administration;
use App\Http\Controllers\Controller;
use App\Point;
use App\RealEstateAppraisal;
use App\ServicesSection;
use Illuminate\Http\Request;
use Session;

class ServicesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAdministration()
    {
        $administration = Administration::first();
        return view('admin.services.administration.index', compact('administration'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAdministration(Request $request, $id)
    {
        $request->validate([
            'page_title_en' => 'required|string|max:255',
            'text_title_en' => 'required|string|max:1000',
            'description_en' => 'required|string|max:1000',
            'page_title_it' => 'required|string|max:255',
            'text_title_it' => 'required|string|max:1000',
            'description_it' => 'required|string||max:1000',
            'page_title_de' => 'required|string|max:255',
            'text_title_de' => 'required|string|max:1000',
            'description_de' => 'required|string|max:1000',
        ]);
        $data = $request->all();


        $administration = Administration::where('id', '=', $id)->first();
        $administration->update([
            'page_title_en' => $data['page_title_en'],
            'text_title_en'       => $data['text_title_en'],
            'description_en'      => $data['description_en'],
            'page_title_it'       => $data['page_title_it'],
            'text_title_it'       => $data['text_title_it'],
            'description_it'      => $data['description_it'],
            'page_title_de'       => $data['page_title_de'],
            'text_title_de'       => $data['text_title_de'],
            'description_de'      => $data['description_de'],

        ]);

        Point::where('administration_id', '=', $id)->delete();
        $points = [];
        if (isset($data['value_en'])) {
            foreach ($data['value_en'] as $key => $value) {
                if (!empty($value) && !empty($data['value_en'][$key])) {
                    $points[] = [
                        'value_en' => $data['value_en'][$key],
                        'value_it' => $data['value_it'][$key],
                        'value_de' => $data['value_de'][$key],
                    ];
                }
            }
        }

        $administration->points()->createMany($points);
        Session::flash('success_message', 'Administration info successfully updated!');
        return redirect()->route('administration.index');
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexRealEstateAppraisals()
    {
        $realEstateAppraisal = RealEstateAppraisal::first();
        return view('admin.services.real_estate_appraisals.index', compact('realEstateAppraisal'));

    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRealEstateAppraisals(Request $request, $id)
    {
        $request->validate([
            'page_title_en' => 'required|string|max:255',
            'text_title_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'page_title_it' => 'required|string|max:255',
            'text_title_it' => 'required|string|max:255',
            'description_it' => 'required|string',
            'page_title_de' => 'required|string|max:255',
            'text_title_de' => 'required|string|max:255',
            'description_de' => 'required|string',
        ]);
        $data = $request->all();


        $realEstateAppraisals = RealEstateAppraisal::where('id', '=', $id)->first();
        $realEstateAppraisals->update([
            'page_title_en' => $data['page_title_en'],
            'text_title_en' => $data['text_title_en'],
            'description_en' => $data['description_en'],
            'page_title_it' => $data['page_title_it'],
            'text_title_it' => $data['page_title_it'],
            'description_it' => $data['description_it'],
            'page_title_de' => $data['page_title_de'],
            'text_title_de' => $data['text_title_de'],
            'description_de' => $data['description_de'],

        ]);
        ServicesSection::where('real_estate_appraisal_id', '=', $id)->delete();
        $sections = [];
        if (isset($data['name_en'])) {
            foreach ($data['name_en'] as $key => $value) {
                if (!empty($value) && !empty($data['name_en'][$key])) {
                    $sections[] = [
                        'name_en' => $data['name_en'][$key],
                        'name_it' => $data['name_it'][$key],
                        'name_de' => $data['name_de'][$key],
                        'font' => $data['font'][$key],
                    ];
                }
            }
        }


        $realEstateAppraisals->sections()->createMany($sections);

        Session::flash('success_message', 'Real Estate Appraisals info successfully updated!');
        return redirect()->route('real.estate.appraisals.index');
    }
}
