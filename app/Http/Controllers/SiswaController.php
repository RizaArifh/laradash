<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Str;
use PDF;
use \App\Siswa;

class SiswaController extends Controller
{
    public function index(request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_siswa = \App\Siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan'=>'min:5',
            'nama_belakang'=>'required',
            'email'=>'email|required|unique:users',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'avatar'=>'mimes:jpeg,png'
            ]);
        //insert table user
        $user = new User;
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password= bcrypt('rahasia');
        $user->remember_token=Str::random(60);
        $user->save();

        //inser table siswa
        $request->request->add(['user_id' =>$user->id]);
        $siswa =\App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar=$request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Tambahkan');
    }
    public function edit(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        // $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar=$request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Update');
    }
    public function delete(Siswa $siswa)
    {

        $siswa->delete();
        return \redirect('/siswa')->with('sukses', 'Data Berhasil Di Hapus');
    }
    public function profile(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();


        $categories=[];
        $data=[];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[]= $mp->nama;
            $data[]=$siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
        }}

        return view('siswa.profile', ['siswa' => $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }
    public function addnilai(request $request,Siswa $siswa)
    {
        
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('/siswa/'.$siswa->id.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');
        };
        $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);
        return redirect('/siswa/'.$siswa->id.'/profile')->with('suskses','Data Nilai Berhasil Di Masukan');
    }
    public function deletenilai(Siswa $siswa,$idmapel){
        // $siswa =\App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Berhasil Hapus Nilai');

    }
    public function exportExcel(){
        return Excel::download(new SiswaExport,'Siswa.xlsx');   

    }
    public function exportPdf(){
        $siswa = Siswa::all();
        $pdf= PDF::loadView('export.siswapdf',['siswa'=> $siswa]);
        return $pdf->download('Siswa.pdf');

    }
}
