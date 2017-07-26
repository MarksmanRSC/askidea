<?php

namespace App\Http\Controllers;

use App\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promo_code.index');
    }

    public function redeem(Request $request)
    {
        $this->validate($request, [
            'promo_code' => 'required',
        ]);

        $promoCode = $request->all()['promo_code'];

        $re = PromoCode::where('promo_code', $promoCode)->get();

        if(count($re) === 0) {
            return redirect()->back()->withInput()->withErrors(['promo_code' => 'Invalid Promo Code']);
        }

        $re = $re[0];

        $remaining_quantity = $re->remaining_quantity;

        if($remaining_quantity <= 0) {
            return redirect()->back()->withInput()->withErrors(['promo_code' => 'Invalid Promo Code']);
        }
        $this->processPromoCode($re->promo_code_type_id, Auth::user()->id);
        PromoCode::find($re->id)->update([
            'remaining_quantity' => $remaining_quantity - 1
        ]);
        DB::insert(DB::raw("
        insert into user_promo_code(user_id, promo_code_id) values(?, ?)
        "), [Auth::user()->id, $re->id]);
        return redirect()->back()->withInput()->withErrors(['promo_code' => 'Redeem Successfully']);
    }

    private function processPromoCode($typeId, $userId) {

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
        //
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
        //
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
