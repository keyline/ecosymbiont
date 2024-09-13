<?php
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
use App\Models\PropertyInspection;
$generalSetting             = GeneralSetting::find('1');
?>
<!DOCTYPE html>
<html data-lt-installed="true">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$generalSetting->site_name . '-Inspection-Notice-' . $inspection_no?></title>
    <style>
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
      margin:0;
      }
      table, tr, td p {
      font-size: 13px;
      line-height: 20px;
      padding: 0;
      margin: 0;
      }
    </style>
  </head>
  <body style="position:relative;">
    <img src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/material/frontend/assets/img/cover-logo.png'))); ?>" style="opacity: 0.2;position: absolute;left: 0;top: 50%;width: 56%;height: auto;transform: translate(35%);">
    <table style="width: 100%;padding-top: 20px;padding-bottom: 20px;position:relative">
      <tbody>
        <tr style="text-align: left;">
          <td colspan="2">
            <p class="content-title" style="margin: 0;background: #fff;display: flex;justify-content: center;line-height: 27px;font-weight: 700;font-size: 25px;padding-top: 20px;"><?=$generalSetting->site_name?></p>
          </td>
        </tr>
        <tr style="text-align: center;">
          <th colspan="2" style="font-weight: 700;padding-bottom:16px;font-size: 20px;padding-top: 20px;">NOTICE TO ENTER DWELLING UNIT </th>
        </tr>
        <tr style="text-align: left;">
          <td colspan="2" style="padding: 10px 0;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;">Pursuant to <b><?=$pursuant_to?></b>, Management/Agent hereby gives 24-Hour notice to:</p>
          </td>
        </tr>
        <tr style="text-align: left;">
          <td colspan="2" style="padding: 10px 0;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;border-bottom: 1px solid#000;"><span style="border-bottom: 2px solid#fff;">TENANT’S NAME(S):</span> <b><?=$tenant_name?></b></p>
          </td>
        </tr>
        <tr style="text-align: left;">
          <td colspan="2" style="padding: 10px 0;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;border-bottom: 1px solid#000;"><span style="border-bottom: 2px solid#fff;">and all persons at the street address of:</span> <b><?=$property_address?></b></p>
          </td>
        </tr>
        <tr style="text-align: left;">
          <td colspan="2" style="padding: 10px 0;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;line-height: 25px;">The Owner, Owner’s Agent, or Owner’s employee(s) will enter said premises on or about 
              <b><?=date_format(date_create($inspection_date), "d M, Y")?></b> during normal business hours for the reason set forth below:
            </p>
          </td>
        </tr>
        <?php
        $reasons = json_decode($reasons);
        ?>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To make necessary or agreed repairs or agreed decorating" style="margin: 0;margin-top: 6px;" <?=((in_array("To make necessary or agreed repairs or agreed decorating", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To make necessary or agreed repairs or agreed decorating</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To do necessary Inspection" style="margin: 0;margin-top: 6px;" <?=((in_array("To do necessary Inspection", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To do necessary Inspection</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To make necessary or agreed alterations or improvements" style="margin: 0;margin-top: 6px;" <?=((in_array("To make necessary or agreed alterations or improvements", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To make necessary or agreed alterations or improvements</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To supply necessary or agreed services" style="margin: 0;margin-top: 6px;" <?=((in_array("To supply necessary or agreed services", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To supply necessary or agreed services</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To exhibit the rental unit to prospective purchasers, mortgagees, tenants, or contractors" style="margin: 0;margin-top: 6px;" <?=((in_array("To exhibit the rental unit to prospective purchasers, mortgagees, tenants, or contractors", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To exhibit the rental unit to prospective purchasers, mortgagees, tenants, or contractors</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="Pursuant to Court Order" style="margin: 0;margin-top: 6px;" <?=((in_array("Pursuant to Court Order", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- Pursuant to Court Order</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To inspect waterbed or liquid-filled furniture" style="margin: 0;margin-top: 6px;" <?=((in_array("To inspect waterbed or liquid-filled furniture", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To inspect waterbed or liquid-filled furniture</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To test the smoke detector" style="margin: 0;margin-top: 6px;" <?=((in_array("To test the smoke detector", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To test the smoke detector</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To verify Resident has abandoned premises" style="margin: 0;margin-top: 6px;" <?=((in_array("To verify Resident has abandoned premises", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To verify Resident has abandoned premises</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td colspan="2" style="padding-bottom:0px;padding-left: 0px;">
            <input type="checkbox" name="reasons[]" value="To inspect the unit prior to the termination of the tenancy if requested by Resident" style="margin: 0;margin-top: 6px;" <?=((in_array("To inspect the unit prior to the termination of the tenancy if requested by Resident", $reasons))?'checked':'')?>>
            <p style="display: inline-block;margin: 0;padding-left: 8px;font-size:15px;line-height: 25px;">- To inspect the unit prior to the termination of the tenancy if requested by Resident</p>
          </td>
        </tr>
        <tr style="text-align: left;line-height: 27px;">
          <td style="padding-top: 30px;padding-right: 20px;padding-bottom:20px;width:60%;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;border-bottom: 1px solid#000;font-weight: 600;">
              <span style="border-bottom: 2px solid#fff;">Owner/Agent Signature:</span>
              <img src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/uploads/' . $generalSetting->owner_signature))); ?>" alt="" style="top: 50%;width: 56%;height: auto;">
            </p>
          </td>
          <td style="padding-top: 30px;padding-bottom:20px;width:40%;">
            <p class="content-title" style="margin: 0;padding:0;font-size:15px;border-bottom: 1px solid#000;font-weight: 600;"><span style="border-bottom: 2px solid#fff;">Date: <?=date('M-d-Y')?></span></p>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>