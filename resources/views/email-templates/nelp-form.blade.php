<?php
use App\Models\GeneralSetting;
use App\Models\Article;
$generalSetting            = GeneralSetting::find('1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecosymbion</title>
    <style>
        body {
        margin: 0 auto;
        font-family: Montserrat, sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span{
            margin: 0;
            padding: 0;
        }
        ul{
            list-style: none;
        }
        table,
        tr,
        td {
        border-collapse: collapse;
        padding: 0;
        font-size: 13px;
        line-height: 18px;
        margin: 0;
        }
        table,
        tr,
        td p {
        font-size: 13px;
        padding: 0;
        margin: 0;
        }
        .header{
            padding: 0;
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
    <ul class="header">
        <li style="float: left;">
            <p style="font-size: 11px;"><strong>RETURN FORM <span><u>ERT-N0924-02:</u></span></strong></p>
            <p style="font-size: 12px; line-height: 2;">A <span><u>digitized form of a</u></span> <strong>hand-signed</strong> copy of this NELP must be uploaded to  (<span style="background: yellow;">xxxx</span>).</p>
            <h5>NON-EXCLUSIVE LICENSE TO PUBLISH (“NELP”)</h5>
        </li>
        <li style="float: right;"><img src="logo.png" alt="" srcset="" style="max-width: 100%;width: 30%;"></li>
    </ul>
    <table style="width: 100%; background: #fff; padding: 10px;">
        <tbody>
            <tr>
                <td  width="100%">
                    <p style="font-size: 11px;"><strong>RETURN FORM <span><u>ERT-N0924-02:</u></span></strong></p>
                </td>
                <td align="right" rowspan="3">
                    <img src="logo.png" alt="" srcset="" style="max-width: 100%;width: 30%;">
                </td>
            </tr>
            <tr>
                <td  width="100%">
                    <p style="font-size: 12px; line-height: 2;">A <span><u>digitized form of a</u></span> <strong>hand-signed</strong> copy of this NELP must be uploaded to  (<span style="background: yellow;">xxxx</span>).</p>
                </td>
            </tr>
            <tr>
                <td  width="100%"><h5>NON-EXCLUSIVE LICENSE TO PUBLISH (“NELP”)</h5></td>
            </tr>
            <tr>
                <td width="100%" colspan="2">
                    <p style="line-height: 1.5; width: 100%; margin-top: 10px;">This NELP records the terms under which the Creative-Work specified below will be published online only on <strong>Ecosymbionts Regenerate Together</strong> (the “<strong>Platform</strong>”). The Platform is published by Ecosymbionts Regenerate (the “Publisher”). The Platform is owned by the Śramani Institute (the “<strong>Proprietor</strong>”).
                    <br>Submission Reference Number (“<strong>SRN</strong>”): <span style="background: yellow;">xxx</span></p>
                </td>
            </tr>
            <!-- THE CREATIVE-WORK -->
            <tr>
                <td colspan="2">
                    <p style="width: 100%; border: 1px solid #000; background-color: #e7e6e6; padding: 5px 15px;">THE CREATIVE-WORK</p>
                </td>
            </tr>
            <tr>
            <td width="5%" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Creative-Work Title:</td>
                <td width="95%" style="border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; background-color: grey;">
                    [14 (note: this indicates the question number on the submission form; the answer should be pasted here)]<span style="display: block; margin-top: 20px; text-align: right;">(the <strong>“Contribution”</strong>)</span>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>