<?php

namespace App\Http\Controllers;

use App\PromoCode;
use Carbon\Carbon;
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
        $userPromoCodes = DB::select(DB::raw("
        select 
           user_promo_codes.created_at as created_at,
           promo_code_types.description as description
        from user_promo_codes
        join promo_codes on user_promo_codes.promo_code_id = promo_codes.id
        join promo_code_types on promo_code_types.id = promo_codes.promo_code_type_id
        where user_promo_codes.user_id = ?
        order by user_promo_codes.created_at desc
        "), [Auth::user()->id]);

        return view('promo_code.index', ['userPromoCodes' => $userPromoCodes]);
    }

    public function redeem(Request $request)
    {
        $this->validate($request, [
            'promo_code' => 'required',
        ]);

        $promoCode = $request->all()['promo_code'];

        $re = PromoCode::join('promo_code_types', 'promo_code_type_id', '=', 'promo_code_types.id')
            ->where('promo_code', $promoCode)->get();

        if(count($re) === 0) {
            return redirect()->back()->withInput()->withErrors(['promo_code' => 'Invalid Promo Code']);
        }

        $re = $re[0];

        $remaining_quantity = $re->remaining_quantity;

        if($remaining_quantity && $remaining_quantity <= 0) {
            return redirect()->back()->withInput()->withErrors(['promo_code' => 'This promo code is expired']);
        }

        if(!$re->is_resuable) {
            $userPromoCodes = DB::select(DB::raw("
            select * from user_promo_codes
            where user_id = ?
            and promo_code_id = ?
            "), [Auth::user()->id, $re->id]);
            if(count($userPromoCodes)) {
                return redirect()->back()->withInput()->withErrors(['promo_code' => 'You have already used this code']);
            }
        }

        $this->processPromoCode($re->promo_code_type_id, Auth::user()->id);

        if($remaining_quantity) {
            PromoCode::find($re->id)->update([
                'remaining_quantity' => $remaining_quantity - 1
            ]);
        }

        DB::insert(DB::raw("
        insert into user_promo_codes(user_id, promo_code_id) values(?, ?)
        "), [Auth::user()->id, $re->id]);

        return redirect(route('promo_code.index'))->withErrors(['promo_code' => $re->success_message]);
    }

    private function processPromoCode($typeId, $userId) {
        if($typeId === 1) { // grant sliver membership, increase limit: 30
            if(Auth::user()->role->id === 999) {
                Auth::user()->update([
                    'role_id' => 4,
                    'role_expired_at' => Carbon::now()->addYear(1),
                    'pc_limit' => Auth::user()->pc_limit + 30
                ]);
            } else {
                Auth::user()->update([
                    'pc_limit' => Auth::user()->pc_limit + 30
                ]);
            }
        }
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
