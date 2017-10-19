<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    function SaveStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'mahasiswa_name' => 'required'
            ]);
            $mahasiswa = new Siswa;
            $mahasiswa->name = $req->input('mahasiswa_name');
            $student->save();
            DB::commit();
            return response()->json($student, 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student, exception:' + $e], 500);
        }
    }
    function UpdateStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'id' => 'required',
                'mahasiswa_name' => 'required'
            ]);
            $id = $req->input('id');
            $mahasiswa = $req->input('mahasiswa_name');
            $updateMahasiswa = DB::table('students')
            ->where('id', $id)
            ->update(['mahasiswa_name' => $mahasiswa]);
            DB::commit();
            return response()->json(['message' => 'Successfully updated student data'], 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student, exception:' + $e], 500);
        }
    }
}
