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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1,h2,h3,h4,h5,h6,p,span,ul,li,a{
            margin: 0;
            padding: 0;
        }
        p{
            font-size: 12px;
        }
        ol { counter-reset: item }
        ol li{ display: block; line-height: 1.5; position: relative; padding-left: 38px;}
        li:before { content: counters(item, ".") " "; counter-increment: item ; margin-right: 10px; position: absolute; top: 0; left: 0;}
        ol > strong > li{
            padding-left: 15px;
        }
        ul > li::before{
            display: none;
        }
    </style>
</head>
<body style="background: #e7e6e6; font-family: sans-serif;">
    <table style="width: 100%; background: #fff; margin:0 auto; padding: 30px;">
        <tbody>
            <tr>
                <td colspan="2">
                    <p style="font-size: 11px; width: 80%;"><strong>RETURN FORM <span><u>ERT-N0924-02:</u></span></strong></p>
                    <p style="font-size: 12px; line-height: 2; width: 80%;">A <span><u>digitized form of a</u></span> <strong>hand-signed</strong> copy of this NELP must be uploaded to  (<span style="background: yellow;">xxxx</span>).</p>
                    <h5>NON-EXCLUSIVE LICENSE TO PUBLISH (“NELP”)</h5>
                </td>
                <td>
                    <img src="logo.png" alt="" srcset="" style="width: 100px; float: right">
                </td>
            </tr>
            <tr>
                <td width="100%">
                    <p style="line-height: 1.5; width: 100%; margin-top: 10px;">This NELP records the terms under which the Creative-Work specified below will be published online only on <strong>Ecosymbionts Regenerate Together</strong> (the “<strong>Platform</strong>”). The Platform is published by Ecosymbionts Regenerate (the “Publisher”). The Platform is owned by the Śramani Institute (the “<strong>Proprietor</strong>”).</p>
                    <p style="width: 100%">Submission Reference Number (“<strong>SRN</strong>”): <span style="background: yellow;">xxx</span></p>
                </td>
            </tr>
            <!-- THE CREATIVE-WORK -->

            <tr>
                <td style="width: 100%; border: 1px solid #000; background-color: #e7e6e6; padding: 5px 15px;" colspan="4">
                    <p>THE CREATIVE-WORK</p>
                </td>
            </tr>
            <tr>
                <td width="20%"><p style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Creative-Work Title:</p></td>
                <td width="80%"><p style="border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;">[14 (note: this indicates the question number on the submission form; the answer should be pasted here)]<span style="display: block; margin-top: 20px; text-align: right;">(the <strong>“Contribution”</strong>)</span></p></td>
            </tr>

        </tbody>
    </table>
</body>
</html>