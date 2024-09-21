<?php
   use App\Models\GeneralSetting;
   use App\Models\User;
   use App\Models\Property;
   use App\Models\Unit;
   use App\Models\PropertyInspection;
   use App\Models\RoomType;
   $generalSetting               = GeneralSetting::find('1');
   $getUser                      = User::select('first_name', 'last_name')->where('id', '=', $user_id)->first();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>QARP RECEIPT TEMPLATE</title>
      <style>
         @font-face {
         font-family: 'willow bloom';
         src: url('/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
         url('/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
         font-weight: normal;
         font-style: normal;
         font-display: swap;
         }
         @font-face {
         font-family: 'willow bloom';
         src: url('/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
         url('/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
         font-weight: normal;
         font-style: normal;
         font-display: swap;
         }
         .signature {
         font-family: 'willow bloom';
         }
         body {
         margin: 0 auto;
         font-family: Montserrat, sans-serif;
         }
         table,
         tr,
         td {
         border-collapse: collapse;
         padding: 0;
         font-size: 13px;
         line-height: 20px;
         margin: 0;
         }
         table,
         tr,
         td p {
         font-size: 13px;
         line-height: 20px;
         padding: 0;
         margin: 0;
         }
         @page {
         @bottom-left-corner {
         content: "Page " counter(page);
         }
         }
         @media print {
         /* avoid cutting tr's in half */
         th div,
         td div {
         margin-top: -8px;
         padding-top: 8px;
         page-break-inside: avoid;
         }
         }
         @media print {
         table tr {
         -webkit-print-color-adjust: exact;
         print-color-adjust: exact;
         }
         }
      </style>
   </head>
   <body>
      <table style="width: 100%;padding-bottom: 10px;">
         <tbody>
            <tr>
               <td >
                  <img style="max-width: 100%;width: 65%;" src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/uploads/' . $generalSetting->site_logo))); ?>" alt="<?=$generalSetting->site_name?>">
               </td>
               <td >
                  <p style="font-weight: 700;padding-top:20px;font-size: 45px;padding-bottom: 20px;color:#2e3092;line-height: 56px;text-align:end;">
                     INVOICE
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;font-weight:600">
                     Invoice to :
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                     Invoice No : #<?=$invoice_no?>
                  </p>
                  <p style="font-size: 18px;color:#181717;">
                     Date : <?=date_format(date_create($payment_date_time), "M d, Y h:i A")?>
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-weight: 700;padding-top: 10px;font-size: 20px;padding-bottom: 20px;color: #2e3092;line-height: 26px;">
                     <?=(($getUser)?$getUser->first_name . '' . $getUser->last_name:'')?>
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 15px;">
                     <!-- [Address] -->
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-weight: 700;font-size: 20px;color: #2e3092;line-height: 26px;">
                     ____
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;">
                     <!-- [Unit #] -->
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;">
                  </p>
               </td>
            </tr>
            <tr>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                  </p>
               </td>
               <td style="">
                  <p style="font-weight: 700;padding-top: 10px;font-size: 20px;padding-bottom: 20px;color: #2e3092;line-height: 26px;text-align:end;">
                     <!-- DUE : 1,200 -->
                  </p>
               </td>
            </tr>
            <tr style="background:#2e3092;">
               <td >
                  <p style="font-size: 18px;color:#181717;padding-bottom: 15px;padding-top: 15px;color:#fff;padding-left:15px;font-weight:600;">
                     Description
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 15px;padding-top: 15px;color:#fff;padding-right:15px;font-weight:600;">
                     Total
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-left:15px;padding-bottom: 30px;padding-top: 30px;">
                     <?=$particulars?>
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 30px;padding-top: 30px;padding-right:15px;">
                     $<?=number_format($net_amount,2)?>
                  </p>
               </td>
            </tr>
            <!-- <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-left:15px;">
                     Additional Person/Pet
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-right:15px;">
                     $200
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-left:15px;padding-bottom: 30px;padding-top: 30px;">
                     Late Fee
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 30px;padding-top: 30px;padding-right:15px;">
                     $100
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-left:15px;">
                     Administrative Fee
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-right:15px;">
                     $50
                  </p>
               </td>
            </tr> -->
            <tr style="text-align: left;">
               <td colspan="2" style="padding-bottom:0px;border-bottom:2px solid#2e3092;padding-bottom: 15px;padding-top: 15px;">
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;padding-top: 30px;font-weight:600;">
                     
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-right:15px;padding-bottom: 30px;padding-top: 30px;padding-right:15px;">
                     Sub-total : &nbsp;&nbsp;&nbsp;$<?=number_format($net_amount,2)?>
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;padding-top: 30px;font-weight:600;">
                     Contact us:
                  </p>
               </td>
               <td style="text-align: end;">
                  <p style="font-size: 18px;color:#181717;padding-right:15px;padding-bottom: 30px;padding-top: 30px;padding-right:15px;">
                     Discount : &nbsp;&nbsp;&nbsp;$<?=number_format($discount_amount,2)?>
                  </p>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                     <?=$generalSetting->site_name?>
                  </p>
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                     Phone Number: <?=$generalSetting->site_phone?>
                  </p>
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                     Email: <?=$generalSetting->system_email?>
                  </p>
                  <p style="font-size: 18px;color:#181717;padding-bottom: 10px;">
                     <?=$generalSetting->site_url?>
                  </p>
               </td>
               <td align="right" >
                  <table style="width:100%;">
                     <tbody>
                        <tr class="bg" style="width: 100%;background: #2e3092;line-height: 20px; color:#fff;">
                           <td style="width:50%;padding: 10px 25px 10px 25px;">
                              <p style="font-size: 18px;color:#fff;font-weight: 600;">Total : </p>
                           </td>
                           <td style="width:50%;padding: 10px 25px 10px 25px;">
                              <p style="font-size: 18px;color:#fff;font-weight: 600;">$<?=number_format($payment_amount,2)?></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td style="">
                  <p style="font-size: 18px;color:#181717;font-weight:600;">
                     Thank You for Being a Valued Tenant!
                  </p>
               </td>
               <td  >
                  <p style="text-align: center;font-weight: 700;font-size: 20px;padding-bottom: 5px;color: #2e3092;line-height: 26px;">
                     KARLA<br>
                     HERRERA
                  </p>
                  <p style="text-align: center;font-size: 18px;color:#181717;padding-top: 10px;">
                     Administrator
                  </p>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>