<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CheckoutController extends Controller
{
    public function payment(Request $request)
    {
        $payment = Payment::all();
        if ($request->ajax()) {
            return DataTables::of($payment)
                ->addColumn('action', function ($row) {
                    $html = '<td class="align-middle text-right">
                    <a href="javascript: ;"
                        class="text-secondary font-weight-bold text-xs btn-edit"
                        data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                        title="edit payment">
                        Edit
                    </a>
                    <a href="javascript:;" class="ml-3 text-danger font-weight-bold text-xs btn-delete" data-rowid"' . $row->id . '" data-toggle="tooltip" data-placement="top" title="delete payment"> <i class="fas fa-times"></i></a>
                </td>';
                    return $html;
                })
                ->toJson();
        }
        return \view('cms.checkout.payment', [
            'payment' => Payment::all(),
           
        ]);
    }
    public function shipment(Request $request)
    {
        $payment = Courier::all();
        if ($request->ajax()) {
            return DataTables::of($payment)
                ->addColumn('action', function ($row) {
                    $html = '<td class="align-middle text-right">
                    <a href="javascript: ;"
                        class="text-secondary font-weight-bold text-xs btn-edit"
                        data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                        title="edit shipment">
                        Edit
                    </a>
                    <a href="javascript:;" class="ml-3 text-danger font-weight-bold text-xs btn-delete" data-rowid="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="delete shipment"> <i class="fas fa-times"></i></a>
                </td>';
                    return $html;
                })
                ->toJson();
        }
        return \view('cms.checkout.shipment', [
            'shipment' => Courier::latest()->get()
        ]);
    }

    public function paymentStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        $save = Payment::create($input);
        $inputAll = [
            'id' => $save->id,
            'name' => $save->name,
            'account_number' => $save->account_number
        ];

        return ['success' => true, 'message' => 'add successfully',];
    }
    public function shipmentStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        $save = Courier::create($input);
        $inputAll = [
            'id' => $save->id,
            'name' => $save->name,
        ];

        return ['success' => true, 'message' => 'add successfully',];
    }
    public function paymentEdit(Request $request, $id)
    {

        $payment = Payment::find($id);

        return ['success' => true, 'message' => ' successfully',];
    }
    public function paymentUpdate(Request $request, $id)
    {

        $payment = Payment::find($id);
        $result = $payment->update($request->all());

        return ['success' => true, 'message' => 'update successfully',];
    }
    public function shipmentUpdate(Request $request, $id)
    {

        $shipment = Courier::find($id);
        $result = $shipment->update($request->all());

        return ['success' => true, 'message' => 'update successfully',];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroyPayment($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return ['success' => true, 'message' => 'Delete successfully',];
    }
    public function destroyShipment($id)
    {
        $shipment = Courier::find($id);
        $shipment->delete();
        return ['success' => true, 'message' => 'Delete successfully',];
    }
}
