<?php

namespace App\Http\Controllers\API;

use App\Models\Aplikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AplikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Aplikan::getAplikan()->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'nama_aplikan' => 'required',
            'email' => 'required',
            'cv' => 'required|file|mimes:pdf',
            'id_lowongan' => 'required'
        ]);
        try{
            $fileName = time().$request->file('cv')->getClientOriginalName();
            $path = $request->file('cv')->storeAs('uploads/cv',$fileName);
            $validasi['cv']=$path;
            $response = Aplikan::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e){
            return response()->json([
                'success' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi=$request->validate([
            'nama_aplikan' => 'required',
            'email' => 'required',
            'cv' => '',
            'id_lowongan' => 'required'
        ]);
        try{
            if( $request->file('cv')){
                $fileName = time().$request->file('cv')->getClientOriginalName();
                $path = $request->file('cv')->storeAs('uploads/cv',$fileName);
                $validasi['cv']=$path;
            }

            $response = Aplikan::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e){
            return response()->json([
                'success' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
