<?php

namespace App\Http\Controllers;

// use App\Models\User;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('check');
    }
    public function upload_file(Request $request)
    {
        if ($request->input()) {
            $file = $request->file("upload_file");
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $valid_extion = array('csv');
            if (in_array(strtolower($extension), $valid_extion)) {
                if ($fileSize) {
                    $location = "Upload";
                    $file->move($location, $fileName);
                    $filePath = public_path($location . "/" . $fileName);
                    $file = fopen($filePath, 'r');
                    $importData_arr = [];
                    $i = 1;
                    while ($fileData = fgetcsv($file, 10000, ',')) {
                        $num = count($fileData);
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $fileData[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    foreach ($importData_arr as $importData) {
                        User::create([
                            'name' => $importData[0],
                            'f_name' => $importData[1],
                            'l_name' => $importData[2],
                            'address' => $importData[3],
                            'primary_address' => $importData[4],
                            'secondary' => $importData[5],
                            'state' => $importData[6],
                            'zip' => $importData[7],
                            'county' => $importData[8],
                            'age_range' => $importData[9],
                            'income_range' => $importData[10],
                            'home_value_range' => $importData[11],
                            'owns_a_home' => $importData[12],
                        ]);
                    }
                    return redirect('/data')->with(['message' => 'file is SuccessFully Upload....']);
                }
            }
        }
    }
    public function csv_data()
    {
        $users = User::all();
        return view('data', ['users' => $users]);
    }
    public function exportCsv()
    {
        $fileName = "csv";
        $data = User::all();
        $headers = array(
            "Content-type"  => "text/csv",
        );
        $columns = [
            'name',
            'f_name',
            'l_name',
            'address',
            'primary_address',
            'secondary',
            'state',
            'zip',
            'county',
            'age_range',
            'income_range',
            'home_value_range',
            'owns_a_home',
        ];
        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            foreach ($data as $task) {
                $row['name']  = $task->name;
                $row['f_name']    = $task->f_name;
                $row['l_name']    = $task->l_name;
                $row['address']    = $task->address;
                $row['primary_address']    = $task->primary_address;
                $row['secondary']    = $task->secondary;
                $row['state']    = $task->state;
                $row['zip']    = $task->zip;
                $row['county']    = $task->county;
                $row['age_range']    = $task->age_range;
                $row['income_range']    = $task->income_range;
                $row['home_value_range']    = $task->home_value_range;
                $row['owns_a_home']    = $task->owns_a_home;
                fputcsv($file, array(
                    $row['name'], $row['f_name'],
                    $row['l_name'], $row['address'],
                    $row['primary_address'],
                    $row['secondary'],
                    $row['state'],
                    $row['zip'],
                    $row['county'],
                    $row['age_range'],
                    $row['income_range'],
                    $row['home_value_range'],
                    $row['owns_a_home'],
                ));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
