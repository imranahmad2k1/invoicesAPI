<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoiceitem;

class InvoiceController extends Controller
{
    public function create(Request $request){
        $validated = $request->validateWithBag('ers',[
            'BillTo'=>'required',
            'InvoiceNo'=>'required',
            'InvoiceDate'=>'date|required',
            'Terms'=>'required',
            'DueDate' => 'date',
        ]);

        $invoice = new Invoice;
        $invoice->fill($validated);
        $invoice->DueDate = $request->DueDate ?? 'As per Agreed';
        $invoice->save();

        $len = count($request->InvoiceItem);
        for($i=0;$i<$len;$i++){
            $invoiceitem = new Invoiceitem;
            $invoiceitem->invoice_id = $invoice->id;
            $invoiceitem->Dated = $request->InvoiceItem[$i]['Dated']; 
            $invoiceitem->ItemDescription = $request->InvoiceItem[$i]['ItemDescription']; 
            $invoiceitem->Amount = $request->InvoiceItem[$i]['Amount'];
            $invoiceitem->save(); 
        }

        return response($invoice->refresh());
    }

    public function read(){
        return response(Invoice::all());
    }

    public function update(Request $request, Invoice $invoice){

        $validated = $request->validateWithBag('ers',[
            'BillTo'=>'required',
            'InvoiceNo'=>'required',
            'InvoiceDate'=>'date|required',
            'Terms'=>'required',
            'DueDate' => 'date',
        ]);

        $invoice->fill($validated);
        $invoice->DueDate = $request->DueDate ?? 'As per Agreed';
        $invoice->update();

        return response($invoice->refresh());

    }

    public function destroy(Invoice $id){
        $del = $id->delete();
        if($del){
            return response("Invoice has been deleted");
        }
        else{
            return response("Couldn't delete, Something wrong!");
        }
    }
}
