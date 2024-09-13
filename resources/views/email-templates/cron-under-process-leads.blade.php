<?php
use App\Models\GeneralSetting;
$generalSetting             = GeneralSetting::find('1');
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?=$generalSetting->site_name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body style="padding: 0; margin: 0;">
    <section style="padding: 80px 0; margin: 0 15px;">
        <div style="max-width: 900px; background: #ffffff; margin: 0 auto; border-radius: 15px; padding: 20px 15px; box-shadow: 0 0 30px -5px #ccc;">
          <div style="text-align: center;">
              <img src="https://qarp.itiffyconsultants.com/public/uploads/1698388423logo.png" alt="<?=$generalSetting->site_name?>" style=" width: 100%; max-width: 250px;">
          </div>
          <div>
            <h3 style="text-align: center; font-size: 25px; color: #5c5b5b; font-family: sans-serif;">Under Process Leads</h3>
            <table border="1" cellpadding="5" cellspacing="3" style="width: 900px;  border-spacing: 2px; margin-bottom: 10px; border-collapse: collapse;">
              <thead>
                <tr>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Enquiry No.</th>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Name</th>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Email</th>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Phone</th>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Property</th>
                  <th style="background: #2e3192; color: #fff; width: 30%; padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px;">Unit</th>
                </tr>
              </thead>
              <tbody>
                <?php if($leadData){ foreach($leadData as $row){?>
                  <tr>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['enquiry_no']?></td>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['first_name'].' '.$row['last_name']?></td>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['email']?></td>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['phone']?></td>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['property']?></td>
                    <td style="padding: 10px; background: #fff; text-align: left; color: #000;font-family: sans-serif;font-size: 15px;"><?=$row['unit']?></td>
                  </tr>
                <?php } } else {?>
                  <tr>
                    <td colspan="6" style="padding: 10px; background: #fff; text-align: left; color: red;font-family: sans-serif;font-size: 15px; text-align: center;">No Leads Available !!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div style="border-top: 2px solid #ccc; margin-top: 50px; text-align: center; font-family: sans-serif;">
          <div style="text-align: center; margin: 15px 0 10px;"><?=$generalSetting->site_name?></div>
          <div style="text-align: center; margin: 15px 0 10px;">Phone: <?=$generalSetting->site_phone?></div>
          <div style="text-align: center; margin: 15px 0 10px;">Email: <?=$generalSetting->site_mail?></div>
        </div>
      </div>
    </section>
  </body>
</html>