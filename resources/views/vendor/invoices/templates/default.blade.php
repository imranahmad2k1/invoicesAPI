<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                /* font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; */
                line-height: 1.15;
                margin: 0;
            }

            body:before {
                /* background-image: url('{{ $invoice->getBG() }}') 0 0/100% 100vh; 
                background-repeat: no-repeat;
                background-size:70% 50%;
                background-attachment: fixed;
                background-position: center;
                opacity:0.1; */

                content: ' ';
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background-size:70% 50%;
                background-image:  url('{{ $invoice->getBG() }}') 0 0/100% 100vh;
                background-position: center;  
                background-repeat: no-repeat;
                background-attachment: fixed;
                z-index: -1;
                opacity: 0.1;
            }

            body {
                /* background-image: url('{{ $invoice->getBG() }}') 0 0/100% 100vh; 
                background-repeat: no-repeat;
                background-size:70% 50%;
                background-attachment: fixed;
                background-position: center;
                opacity:0.1; */
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                /* background-color: #fff; */
                font-size: 10px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                /* font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; */
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }

            .regulars{
                font-size: 15px;
                font-weight: 400;
            }
            .center{
                text-align: center;
                font-size : 1.0rem;
            }
            .address{
                font-size: 1rem;
                text-align: right;
            }
            .invtab{
                margin-top:15px;
            }
            .bt{
                font-size: 1.5rem;
            }

            #b0{
                padding-top:0px;
                padding-bottom:0px;
            }

            .addresst{
                margin-bottom:4px;
            }
            .tt{
                font-size:1rem;
            }

            .ctable{
                padding:0;
                margin:0;
            }
            
            .ctable td{
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .custtable{
                width:80%;
            }
            .tableheads{
                background:#17365d;
                color:white;
                font-size: 1.1rem;
            }

            .table-items tbody tr td{
                font-size: .9rem;
            }

            .strong{
                font-weight: 700;
            }

            .bankdetails{
                font-size: 1rem;
            }

            .bankdetails td{
                padding-right: 15px;
            }

            .btitle{
                font-size:1.1rem;
                font-weight: 1000;
                text-decoration: underline;
                margin-bottom:0;
                padding-bottom:0;
            }

            ol{
                padding-left: 15px;
            }
            ol li{
                font-size: .7rem;
                
            }

        </style>
    </head>

    <body>
        {{-- Header --}}
        {{-- @if($invoice->logo)
            <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
        @endif --}}

        <table width="100%">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
                    </td>
                    <td class="address">
                        <p class="addresst">Address: Rashid Building, Office No. 208,</p>
                        <p class="addresst">Naif Deira, Dubai – U.A.E</p>
                        <p class="addresst">Tel.: +971 4 2944 555, Mob.: +971 567526 970</p>
                        <p class="addresst">E-mail: info@ecoguardians.ae, <a href="http://www.ecoguardians.ae/">www.ecoguardians.ae</a></p>
                        <p class="addresst">TRN : 100442981500003</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="90%" class="invtab">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="60%">
                        <h4 class="center text-uppercase">
                            <strong>Invoice</strong>
                        </h4>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table" style="width:100%">
            <tbody>
                <tr>
                    <td class="border-0 pl-0 regulars" id="b0" width=40%>
                        Bill To:
                    </td>
                    <td class="border-0" id="b0"></td>
                </tr>
                <tr>
                    <td class="px-0 bt text-uppercase" style="font-family:sans-serif">
                        @if($invoice->buyer->name)
                            <strong style="margin:0;padding:0;">
                                {{ $invoice->buyer->name }}
                            </strong>
                        @endif
                    </td>
                    <td class="px-0">
                        <table border="1" width="100%" class="ctable">
                            @foreach($invoice->buyer->custom_fields as $key => $value)
                                <tr>
                                    <td class="tt" style="background:#17365d; color:#FFFFFF;"><strong>{{ ucfirst($key) }}</strong></td>
                                    <td class="tt">{{ $value }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <table class="table table-items" border="1px solid black">
            <thead>
                <tr>
                    <th scope="col" class="border-0 tableheads" style="padding-top:0;padding-bottom:0;" width=6%>SL</th>
                    <th scope="col" class="left border-0 tableheads" style="padding-top:0;padding-bottom:0;" width=12%>Dated</th>
                    <th scope="col" class="left border-0 tableheads" style="padding-top:0;padding-bottom:0;">Item & Description</th>
                    <th scope="col" class="text-right border-0 tableheads" style="padding-top:0;padding-bottom:0;" width=10%>Amount</th>
                </tr>
            </thead>
            <tbody>
                {{-- Items --}}
                {{$i=0}}
                @foreach($invoice->items as $item)
                <tr>
                    <td>
                        <strong>{{ ++$i }}</strong>
                    </td>

                    <td class="text-right pl-0">
                        {{ $item->date }}
                    </td>

                    <td class="left">
                        {{ $item->description }}
                    </td>

                    <td class="center" style="font-size:1.2rem">
                        <strong>{{ $item->amountt }}</strong>
                    </td>
                </tr>
                @endforeach
                {{-- Summary --}}
            </tbody>
        </table>
        <table width=100%>
            <tr>
                <td class="border-0" width=60%></td>
                <td class="center tableheads"><strong>Total:</strong></td>
                <td class="text-right pr-0 total-amount tableheads">
                    {{ number_format($invoice->total_amount,2) }} AED
                </td>
            </tr>
            <tr>
                <td class="border-0" width=50%></td>
                <td class="text-right">Total in words:</td>
                <td class="text-right pr-0 total-amount">
                    <p style="color:black">
                        {{ $invoice->getTotalAmountInWords() }}
                    </p>
                </td>
            </tr>
        </table>

        {{-- @if($invoice->notes)
            <p>
                {{ trans('invoices::invoice.notes') }}: {!! $invoice->notes !!}
            </p>
        @endif --}}

        {{-- <p style="color:black">
            Total in Words:{{ $invoice->getTotalAmountInWords() }}
        </p> --}}

        {{-- <p>
            {{ trans('invoices::invoice.pay_until') }}: {{ $invoice->getPayUntilDate() }}
        </p> --}}

        {{-- <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script> --}}

        <p style="page-break-after: always;"></p>
        <table width="100%">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="btitle">Online Transfer / Bank Detail Eco Guardians:</h2>
        <table>
            <tr class="bankdetails">
                <td class="strong">Account Title</td>
                <td>ECO GUARD PEST CONT DIS & SANIT SER LLC</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">Account Number</td>
                <td>200682554</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">IBAN Number</td>
                <td>AE180470000000200682554</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">Swift Code</td>
                <td>UNILAEAD</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">Branch Code</td>
                <td>0901</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">Bank Name</td>
                <td>SHARJAH – UNITED BANK LAMITED</td>
            </tr>
            <tr class="bankdetails">
                <td class="strong">TRN No :</td>
                <td>100442981500003</td>
            </tr>
        </table>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <h2 class="strong"><u>Terms & Conditions</u></h2>
        <ol>
            <li>
                All Bank Charges to your account
            </li>
            <li>
                Payment 50% advance before the Service Time & balance 50% on completion, unless otherwise agreed with the Provider.
            </li>
            <li>
                Water and Power to be supplied on site
            </li>
            <li>
                All equipment and solutions supplied by Eco Guardians Pest Control, Disinfection and sanitization Services.
            </li>
            <li>
                All works to be carried out are subject to our terms & conditions.
            </li>
        </ol>

    </body>
</html>
