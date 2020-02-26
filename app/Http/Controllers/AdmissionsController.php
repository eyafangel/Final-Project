<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Exception;
use App\Patient;
use App\Guardian;
use App\Residence;
use App\Admission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdmissionsController extends Controller
{
    
    public function home()
    {
        return view('admissions.home');
    }
    
    public function patientlist()
    {
        $patients = Patient::paginate(10);
 
        return view('admissions.list', compact('patients'));
    }
    public function search(Request $request){
        // dd($request);
        $search = Request::get('search');

        $patients = DB::table('patients')
                    ->where('last_name', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('middle_name', 'like', '%'.$search.'%')
                    ->orWhere('middle_name', 'like', '%'.$search.'%')
                    ->paginate(5);
       
        return view('admissions.list', ['patients' => $patients]);
    }

    public function create()
    {
        return view('admissions.create_patient');
    }

    public function showQRCode()
    {
        return view('admissions.qrcode');
    }

    public function createQRDocx($id)
    {
        $patient = Patient::where('id', $id)->first();

        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $wordTest->addSection();

        QrCode::size(5000)
                ->format('png')
                ->generate($patient->qr_code, base_path().$patient->patient_id.'.png');
        
        $newSection->addImage(base_path().$patient->patient_id.'.png');
        
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try
            {
                $objectWriter->save(storage_path('QRCode.docx'));
            }
        catch (Exception $e)
            {
            }

        return response()->download(storage_path('QRCode.docx'));
    }

    public function store()
    {        
        $patient = new Patient();
        $residence = new Residence();
        $guardian = new Guardian();
        $admission = new Admission();

        $id = Auth::id();        

        $admission->room = request('room');
        $admission->category = request('category');
        $admission->status = request('status');
        $admission->admission_date = request('admission_date');
        $admission->users_id = $id;
        $admission->mode_of_arrival = request('modeOfArrival');        
 
        $patient->last_name = request('last_name');
        $patient->first_name = request('first_name');
        $patient->middle_name = request('middle_name');
        $patient->sex = request('sex');
        $patient->birthday = date('Y-m-d', strtotime(request('birthday')));        
        $patient->age = request('age');
        $patient->contact_number = request('contact_number');
        $patient->marital_status = request('marital_status');
        $patient->nationality = request('nationality');
                
        $residence->lot=request('lot');
        $residence->street=request('street');        
        $residence->city=request('city');
        $residence->postal_code=request('postal_code');
        $residence->province=request('province');
        $residence->country=request('country');
                              
        $guardian->guardian_last_name=request('guardian_last_name');
        $guardian->guardian_first_name=request('guardian_first_name');
        $guardian->guardian_middle_name=request('guardian_middle_name');
        $guardian->guardian_contact_number=request('guardian_contact_number');
        $guardian->relationship_to_patient=request('relationship_to_patient');
        
        
        $residence->save();
        $patient->save();
        $guardian->save();
                

        $patient_id = $patient->id;
        $patient->qr_code = "http://127.0.0.1:8000/showChart/{$patient_id}";        
        $admission->patient_id = $patient_id;
        $patient->residence_id = $patient_id;
        $patient->guardian_id = $patient_id;
        $patient->save();
        $admission->save();     


        // Session::flash('alert-success', 'User was successful added!');
        return redirect('admissions')->with('message','Success');
    }

    public function profile(Patient $profile){
        return view('admissions.profile', compact('profile'));
    }

    // protected function validatePatient(){
    //     'last_name' => 'required',
    //     'middle_name' => 'required',
    //     'first_name' => 'required',
    //     'last_name' => 'required',
    // }
    
}
