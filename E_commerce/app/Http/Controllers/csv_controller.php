<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\csv;

class csv_controller extends Controller
{
    public function csvpage(){
    	return view('admin.csv.csv_input_page');
    }
    /*public function csvinput(Request $request){
    	$upload = $request->file('excell');
    	$filepath = $upload->getRealPath();
    	$file = fopen($filepath,'r');
    	$header = fgetcsv($file);
    	//dd($header);
    	$escapedheader = [];
    	foreach($header as $key=>$value){
    		$lcheader = strtolower($value );
    		$escapeditem = preg_replace('/[^a-z]/','', $lcheader);//only accept a-z. this will change all the letter symbol except a-z
    		//dd($escapeditem);// only for 1st value; dying and dumping
    		array_push($escapedheader, $escapeditem);
    		//dd($escapedheader);
    		while($columns = fgetcsv($file)){   
    			if($columns[0] == "")  
    			{
    				continue;
    			}
    			foreach($columns as $key => $value){
    				$valu = preg_replace('/[^a-z]/','', $value);
    				dd($valu);
    			}
    			
    		}

    	}
    }*/
   /* public function csvinput(Request $request)
    {
    	
    	include(app_path().'\Classes\PHPExcel.php');
    	//require_once "Classes/PHPExcel.php";
		$tmpvar = 'hello.xlsx';
		
		// $xlreader=PHPExcel_IOFactory::createReaderForFile($tmpvar);
		// $xlob=$xlreader->load($tmpvar);
		
		$xlob=PHPExcel_IOFactory::load($tmpvar);

    	//$upload = $request->file('excel');
    	//$excel = $upload->getClientOriginalName();
    	//$uploadpath = 'public/uploadpic/';
        //$upload->move($uploadpath, $excel);

    	//$filepath = 'public/uploadpic/'.$excel;
    	//return $filepath;
    	//$file = fopen($filepath,'r');
    	//$tmpvar = fgetcsv($file);

    	//$xlob = PHPExcel_IOFactory::load($filepath);

    	$worksheet = $xlob->getSheet(0);
    	$lastrow = $worksheet->getHighestRow();
    	return $lastrow;
    	echo "<br/>";
    	for ($row=1; $row <$lastrow ; $row++) { 
    		echo $worksheet->getCell('A'.$row)->getValue();
    		echo "&nbsp;";
    		echo "&nbsp;";
    		echo "&nbsp;";
    		echo "&nbsp;";
    		echo $worksheet->getCell('B'.$row)->getValue();
    		echo "</br>";
    	}
    	return "ok";
    	
    }*/

    public function exportclients(){
    	Excel::create('clien',function($excel){
    		$excel->sheet('clien',function($sheet){
    			$sheet->loadView('csv.exportclients');
    		});
    	})->export('csv');
    }
    public function csvinpu(){
        $p = new csv(); 

    	$file = Input::file('excel');
    	$filename = $file->getClientOriginalName();
    	$uploadpath = 'public/uploadpic/';
    	$file->move($uploadpath,$filename);
    	$results = Excel::load($uploadpath.$filename,function($reader){
    		$reader->all();
    	})->get();

        $p->Nom = $results->NOM;
        $p->Prenom = $results->PRENOM;
        $p->Email = $results->EMAIL;
        $p->Address = $results->ADDRESS;
        $p->save();

    	//return view('csv.importcsv',['data'=>$results]);
    }

    public function csvinput(Request $request){

        $upload = $request->file('excel');
        $filepath = $upload->getRealPath();
        $file = fopen($filepath, 'r');
        $header = fgetcsv($file);
        //dd($h);

        $escapedheader = [];

        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapeditem = preg_replace('/[^a-z]/', '', $lheader);
            //dd($escapeditem);
            array_push($escapedheader, $escapeditem);
         }
         //dd($escapedheader);

         while ($columns = fgetcsv($file)) {
             if ($columns[0]=="") {
                 continue;
             }
             
             $data = array_combine($escapedheader, $columns);
             //foreach ($data as $key => &$value) {
               //  $val = ($key = "nom" || $key = "prenom")?(integer)$val:($float)$val;
             //}
             $nom = $data["nom"];
             $prenom = $data["prenom"];
             $email = $data["email"];
             $address = $data["address"];

             $p = new csv();

             $p->Nom = $nom;
             $p->Prenom = $prenom;
             $p->Email = $email;
             $p->Address = $address;
             $p->save();
         }
    }
}
