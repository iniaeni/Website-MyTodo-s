<?php

namespace App\Http\Controllers;


use App\Models\Daily;
use Illuminate\Http\Request;
use Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// carbon package yang berhubungan dengan tanggal


class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('dashboard.login');
    }
    public function register(){
        return view('dashboard.register');
    }
    public function inputRegister(Request $request){
            // dd($request->all())
            //validasi atau aturan value colum pada db
            $request->validate([
                'email' => 'required',
                'name' => 'required|min:4|max:50',
                'username' =>'required|min:4|max:8',
                'password' => 'required',
            ]);
            //tambah data ke cb bagian tabel users
            user::create([
                'email' => $request->email,
                'name' => $request->name,
                'username' =>$request->username,
                'password' => Hash::make($request->password),
            ]);

            //apabila berhasil , bakal di arahin  ke halaman login dengan pesan success
            return redirect('/')->with('success','berhasil membuat akun!');
    }

        public function Auth(Request $request){
            $request->validate([
                'username' => 'required|exists:users,username',
                'password' => 'required',
            ],[
                'username.exists' =>"Akun belum ada !"
            ]);
            
            $user =$request->only('username', 'password'); //$user isi dari request username dan password
            if (Auth::attempt($user)){ //Auth::attempt = auth itu fitur untuk menyimpan data ketika login
                return redirect()->route('todo.index');
            }else{
                return redirect('login')->with('fail',"Gagal login, periksa dan coba lagi");
            }
        }

               


    public function index() //untuk menampilkan halaman awal
    {
        //mensmpilkan halaman awal,semua data
        //ambil semua data daily dari database
        //cari data daily yang punya user_id nya sama dengan id orang yang login.kemudian ketemu datanya diambil
        //kalau filternya ada lebih dari satu dibuat bentuk aray multidimensi
        $todos = Daily::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 0],
            ])->get();
        //tampilin file index di folder dashboard dan bawa data dari variabel yang namanya todos ke file tersebut
        return view('dashboard.index', compact('todos')); //confeg nya todos
        
    }

    public function logout()
    {
        //menghapus semua history login
        Auth::logout();
        //mengarakan ke halaman login lagi
        return redirect('/');
    }

    public function complated()
    {
        $todos = Daily::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 1],
        ])->get();
        return view('dashboard.complated',compact('todos'));
    }

    public function updateComplated($id)
    {
        //$id pada parameter mengambil data dari path dinamais {id}
        // cari data yang memiliki value colun id sama dengan data id yang dikirim ke route,maka update baris data tersebut
        Daily::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        //kalau berhasil bakal di arahain ke halaman list todo yang complated dengan pemberitahuan
        return redirect()->route('todo.complated')->with('done', 'Todo sudah selesai di kerjakan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //untuk menampilkan hamaman input form tambah data
    {
        //
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //menambah / mengirim data ke database
    {
        //validasi
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        //tambah data ke databasea daily
        Daily::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        //redirect apabila berhasil bersama alertnya
        return redirect()->route('todo.index')->with('succesAdd', 'Berhasil menambah data Daily!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function show(Daily $daily) //menampilan satu data
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //menampilkan form edit data
    {
        //manampilkan form edit data
        //ambil data dari db yang id nya sama dengan id  yang di kirim diroute
        $todo = Daily::where('id', $id)->first();
        //lalu tampilkan halaman dari view edit dengan mengirim data yang ada di variabel todo
        return view('dashboard.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //mengubah data di database
    {
        //
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
       //update data yang idnya sama dengan id dari route,updatenya ke db bagian table daily
       //kalau mau update harus tau data mana yang harus nyari dulu jadi pake where
       Daily::where('id', $id)->update([
        'title' => $request->title,
        'date' => $request->date,
        'description' => $request->description,
        'status' => 0,
        'user_id' => Auth::user()->id,
        ]);
        //kalau berhasil bakal diarahin ke halaman awl daily dengan 
        return redirect('/todo/')->with('succesUpdate', 'Data Berasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //menghapus data di data base
    {
        //parameter $id akan mengambil data dati path dinamis {id}
        //cari data yang isian idnya sama dengan $id yang di kirim ke path dinamis
        //kalau ada,aminil terus hapus datanya
        Daily::where('id', '=', $id)->delete();
        //kalu berhasil, bakal dibalikin ke halaman list todo  dengan pemberitahuan 
        return redirect()->route('todo.index')->with('successDelete', 'Berhasil menghapus data Todo!');
    }
}
