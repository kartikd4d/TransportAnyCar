<div style="max-width: 850px; margin: 0 auto; padding:0px 0; font-size: 16px; line-height: 24px; font-family: Arial, sans-serif; color: #555;">
    <table style="width: 100%; font-size: 14px; line-height: 20px; table-layout: fixed;" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td style="width: 50%; padding: 0 16px 18px 5px;">
                    <h1 style="font-weight: 700; font-size: 20px; color: #222;">Transport Any Car</h1>
                    <p style="margin-bottom: 0;">128 City Road <br>London, EC1V 2NX</p>
                    <p style="margin-top: 3px; margin-bottom: 0;"><a style="color: #222; text-decoration: none;" href="#">www.transportanycar.com</a></p>
                    <p style="margin-top: 3px;"><a style="color: #222; text-decoration: none;" href="mailto:info@transportanycar.com">info@transportanycar.com</a></p>
                </td>
                <td style="width: 50%; text-align: right; padding: 0 16px;vertical-align:top;">
                    <a style="text-decoration: none;" href="#"><img src="https://transportanycar.com/uploads/admin/Ol5bnQTFOlfZC5XoJIVzViwByZUt38ybdENEIfk0.png" alt="Logo" style="object-fit: contain;max-width: 205px;width: 100%;" ></a>
                </td>
            </tr>
        </thead>
        <tbody style="border-top: 1px solid #D7DAE0;">
            <tr>
                <td style="padding: 0 16px; vertical-align: top;">
                    <p style="font-weight: 700; color: #1A1C21; margin-bottom: 5px;">BILL TO</p>
                    <p style="font-weight: 700; color: #1A1C21; font-size: 18px; margin-bottom: 0;">{{$username}}</p>
                    <p><a style="color: #5E6470; text-decoration: none;" href="mailto:user101@gmail.com">{{$user_email}}</a></p>
                </td>
                <td style="text-align: right; padding: 0 16px; vertical-align: top;">
                    <p style="font-weight: 700; color: #1A1C21; margin-bottom: 5px;">DATE</p>
                    <p style="color: #5E6470;">{{$payment_date}}</p>
                    <p style="font-weight: 700; color: #1A1C21; margin-bottom: 5px;">DUE</p>
                    <p style="color: #5E6470;">On Receipt</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 16px;">
                    <p style="font-weight: 700; color: #1A1C21; margin-bottom: 5px;">INVOICE</p>
                    <p style="color: #5E6470;">{{$invoice_number}}</p>
                </td>
                <td style="text-align: right; padding: 0 16px;">
                    <p style="font-weight: 700; color: #1A1C21; margin-bottom: 5px;">BALANCE DUE</p>
                    <p style="color: #5E6470;">GBP £{{$total}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 0 16px;">
                    <table style="width: 100%; background-color: #FFF; border-top: 1px solid #D7DAE0; font-size: 14px; line-height: 20px; border-spacing: 0;">
                        <thead>
                            <tr style="background-color: #047dc7; color: #fff;">
                                <th style="padding: 8px; text-align: left; font-weight: 700;">DESCRIPTION</th>
                                <th style="padding: 8px; text-align: right; font-weight: 700;">RATE</th>
                                <th style="padding: 8px; text-align: right; width: 100px; font-weight: 700;">QTY</th>
                                <th style="padding: 8px; text-align: right; width: 120px; font-weight: 700;">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 12px 8px; color: #5E6470;">{{$description}}</td>
                                <td style="padding: 12px 8px; text-align: right; color: #5E6470;">£{{$subtotal}}</td>
                                <td style="padding: 12px 8px; text-align: right; color: #5E6470;">1</td>
                                <td style="padding: 12px 8px; text-align: right; color: #5E6470;">£{{$subtotal}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="1" style="padding: 16px;">
                    <p style="font-weight: 700; font-size: 20px; color: #222; margin-bottom: 10px;">Payment Info</p>
                    <p style="font-weight: 700; color: #222;">OTHER</p>
                    <p style="color: #5E6470;">VAT NO: {{$van_number}}</p>
                </td>
                <td colspan="2" style="padding: 0 16px;">
                    <table style="width:100%; font-size: 14px; border-spacing: 0;">
                        <tbody>
                            <tr>
                                <th style="padding-top: 12px; text-align: left; color: #1A1C21;">SUBTOTAL</th>
                                <td style="padding-top: 12px; text-align: right; color: #5E6470;">£{{$subtotal}}</td>
                            </tr>
                            <tr>
                                <th style="padding: 12px 0 10px; text-align: left;color: #1A1C21;">TAX (20%)</th>
                                <td style="padding: 12px 0 10px; text-align: right; color: #5E6470;">£{{$tax}}</td>
                            </tr>
                            <tr>
                                <th style="padding: 5px 0px 12px; text-align: left;color: #1A1C21;">TOTAL</th>
                                <td style="padding: 5px 0px 12px; text-align: right; color: #5E6470;">£{{$total}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="padding: 12px 0; text-align: left; border-top: 1px solid #D7DAE0;color: #1A1C21;">BALANCE DUE</th>
                                <th style="padding: 12px 0; text-align: right; border-top: 1px solid #D7DAE0;color: #1A1C21;">GBP £{{$total}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
