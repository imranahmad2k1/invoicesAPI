<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productinvoice;
use App\Models\Productinvoiceitem;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

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

        $invoice = new Productinvoice;
        $invoice->fill($validated);
        $invoice->DueDate = $request->DueDate ?? 'As per Agreed';
        $invoice->save();

        $len = count($request->InvoiceItem);
        for($i=0;$i<$len;$i++){
            $invoiceitem = new Productinvoiceitem;
            $invoiceitem->productinvoice_id = $invoice->id;
            $invoiceitem->Dated = $request->InvoiceItem[$i]['Dated']; 
            $invoiceitem->ItemDescription = $request->InvoiceItem[$i]['ItemDescription']; 
            $invoiceitem->Amount = $request->InvoiceItem[$i]['Amount'];
            $invoiceitem->save(); 
        }

        return response($invoice->refresh());
    }

    public function read(){
        return response(Productinvoice::all());
    }

    public function update(Request $request, Productinvoice $invoice){

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

    public function destroy(Productinvoice $id){
        $del = $id->delete();
        if($del){
            return response("Invoice has been deleted");
        }
        else{
            return response("Couldn't delete, Something wrong!");
        }
    }

    public function generatepdf($invoice){
        $invoice = Productinvoice::find($invoice);
        if($invoice){
            $pitems = $invoice->productinvoiceitems()->get();
        }
        else{
            return response("Didn't found any Invoice for given Invoice ID");
        }

        $client = new Party([
            
        ]);

        $customer = new Party([
            'name'=> $invoice->BillTo,
            'custom_fields'=> [
                'Invoice No:' => $invoice->InvoiceNo,
                'Invoice Date:' => $invoice->InvoiceDate,
                'Terms:' => $invoice->Terms,
                'Due Date:' => $invoice->DueDate,
            ],
        ]);

        $items = [];
        $total = 0;
        foreach($pitems as $item){
            $a = (new InvoiceItem())
                ->dated($item->Dated)
                ->description($item->ItemDescription)
                ->amountt($item->Amount);
                $total=$total+$item->Amount;
            //EACH ITEM

            array_push($items, $a);
        }

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.paid'))
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->buyer($customer)
            ->seller($client)
            ->date(now()->subWeeks(3))
            ->dateFormat('d/m/Y')
            ->payUntilDays(14)
            ->currencySymbol('AED ')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->totalAmount($total)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
