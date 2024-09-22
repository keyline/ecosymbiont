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
        font-size: 10px;
        line-height: 1.3;
        margin: 0;
        }
        table,
        tr,
        td p,
        ul li {
        font-size: 11px;
        padding: 0;
        margin: 0;
        }
        .header{
            padding: 0;
            height: 50px;
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
        <li style="float: left; width: 70%;">
            <p style="font-size: 11px;"><strong>RETURN FORM <span><u>ERT-N0924-02:</u></span></strong></p>
            <p style="font-size: 12px; line-height: 2;">A <span><u>digitized form of a</u></span> <strong>hand-signed</strong> copy of this NELP must be uploaded to  (<span style="background: yellow;">xxxx</span>).</p>
            <h5>NON-EXCLUSIVE LICENSE TO PUBLISH (“NELP”)</h5>
        </li>
        <li style="float: right;"><img src="logo.png" alt="" srcset="" style="max-width: 100%;width: 30%;"></li>
    </ul>
    <ul style="padding: 0;">
        <li>
            <p style="line-height: 1.5; width: 100%;">This NELP records the terms under which the Creative-Work specified below will be published online only on <strong>Ecosymbionts Regenerate Together</strong> (the “<strong>Platform</strong>”). The Platform is published by Ecosymbionts Regenerate (the “Publisher”). The Platform is owned by the Śramani Institute (the “<strong>Proprietor</strong>”).
        <br>Submission Reference Number (“<strong>SRN</strong>”): <span style="background: yellow;">xxx</span></p>
        </li>
    </ul>
    <table style="width: 100%; background: #fff; padding: 0px;">
        <tbody>
            <!-- <tr>
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
            </tr> -->
            <!-- THE CREATIVE-WORK -->
            <tr>
                <td width="100%" colspan="7" style="border: 1px solid #000; background-color: #e7e6e6; text-align:left; padding: 5px 15px;">
                    <p style="width: 100%; text-align:left; font-weight: bold">THE CREATIVE-WORK</p>
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Creative-Work Title:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">
                    [14 (note: this indicates the question number on the submission form; the answer should be pasted here)]<span style="display: block; margin-top: 5px; text-align: right;">(the <strong>“Contribution”</strong>)</span>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="7"><p style="color: #4472c4;margin-top: 10px;"><i>This NELP can be used where a Contribution has one or more authors. The first author listed (“<strong> <i>Lead Author</i> </strong>”) must be a human individual and must complete the box below and sign this NELP on behalf of herself/himself/themself (and all other authors, if any).</i></p></td>
            </tr>
            <!-- LEAD AUTHOR’S DETAILS AND SIGNATURE -->
            <tr>
                <td width="100%" colspan="7" style="border: 1px solid #000; background-color: #e7e6e6; text-align:left; padding: 5px 15px;">
                    <p style="width: 100%; text-align:left; font-weight: bold">LEAD AUTHOR’S DETAILS AND SIGNATURE</p>
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Full Legal Name:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">
                [2] [3] [4] <span style="display: block; margin-top: 5px; text-align: right;">(the “<strong>Lead Author</strong>”)</span>
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Preferred name for publication:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">
                [4A]
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Email address:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">
                [0]
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Ancestral continental ecoweb affiliation:</strong></td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">[22]</td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Ancestral regional ecoweb affiliation:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">[23]</td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Organizational affiliation:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">[20]</td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Country of residence:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">[17]</td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Authority to sign:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px;">
                    <p>By signing this NELP, I confirm and agree that: 
                        <ul style="list-style-type: lower-roman; padding-left: 15px; font-size: 14px; line-height: 1.5;">
                            <li>All information that I have entered into this NELP is correct at the time of signature.</li>
                            <li><strong>EITHER</strong>, I am the sole author and owner of the copyright in the Contribution and I agree to the terms and conditions in this NELP. </li>
                            <li><strong>OR</strong>, the copyright in the Contribution is jointly owned by me and the Author(s) listed below and I agree to (and am authorized by each Author to agree to) the terms of this NELP on behalf of all Authors;</li>
                            <li>AND, no other person nor entity has any copyright interest in the Contribution</li>
                        </ul>    
                    <p>
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">Signature:</td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; padding: 5px 15px; font-weight: bold">Date:</td>
            </tr>
            <!-- OTHER AUTHORS’ DETAILS -->
            <tr>
                <td colspan="7">&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7" style="width: 100%; text-align:left; font-weight: bold; margin-top: 10px;border: 1px solid #000; background-color: #e7e6e6; text-align:left; padding: 5px 15px;">
                    <p>OTHER AUTHORS’ DETAILS</p>
                </td>
            </tr>
            <tr>
                <td width="10%" rowspan="4" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold"><p style="color: #4472c4; width:"><i>If the Contribution is created by two or more authors and the copyright in the Contribution is jointly owned by them – please enter the details of all other individuals who contributed to the creation of the Contribution in this box.</i></p></td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">
                Full Legal Name/ Preferred name for publication
                </td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">Email address</td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">Ancestral continental ecoweb affiliation</td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">Ancestral regional ecoweb affiliation</td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">Organizational/ ecoweb-rooted community/ movement affiliation Organizational affiliation</td>
                <td width="15%" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold; font-size: 9px;">Country of residence</td>
            </tr>
            <tr>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [2] [3] [4]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [0]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [22]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [23]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [20]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Form-2 [17]</td>
            </tr>
            <tr>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [2] [3] [4]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [0]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [22]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; border-right: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [23]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [20]</td>
                <td width="20%" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;">Form-3 [17]</td>
            </tr>
            <tr>
                <td width="20%" colspan="6" valign="top" style="border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;"><p style="text-align: center;">(the Lead Author and each individual listed here and at the end of this NELP is, individually and collectively, the “<strong>Author</strong>”)</p></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <!-- ŚRAMANI INSTITUTE EMPLOYEE -->
            <tr>
                <td width="30%" colspan="1" valign="top" style="border: 1px solid #000; border-right: none; background: #e7e6e6; padding: 5px 15px; font-weight: bold">
                    SRAMANI INSTITUTE EMPLOYEE
                    <p style="color: #4472c4;"><i>You must check this box and enter details, if applicable</i></p>
                </td>
                <td width="70%" colspan="6" valign="top" style="border: 1px solid #000; padding: 5px 15px;">
                    <div>
                     <input type="checkbox"  name="" id="" style="height:15px; width:15px; margin: 0;margin-top: 0px">
                        <label style="margin: 0;padding-left: 3px;font-weight: normal;">One or more Authors are employed by the Śramani Institute or are related to a Śramani Institute employee. Please provide names and describe the relationship(s):
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;&nbsp;&nbsp;</td>
            </tr>
              <!-- SUPPLEMENTARY MATERIALS-->
             <tr>
                <td width="100%" colspan="1" style="border: 1px solid #000; border-right: none; background-color: #e7e6e6; text-align:left; padding: 5px 15px;">
                    <p style="width: 100%; text-align:left; font-weight: bold">SUPPLEMENTARY MATERIALS</p>
                </td>
                <td colspan="6" style="background-color: #e7e6e6; border: 1px solid #000; border-left: none; text-align:left; padding: 5px 15px;">
                    <p style="color: #4472c4;"><i>Identify any additional materials to be published in association with the Contribution</i></p>
                </td>
            </tr>
            <tr>
                <td width="30%" colspan="1" rowspan="3" valign="top" style="border: 1px solid #000; border-top: none; padding: 5px 15px; font-weight: bold; border-right: 1px solid #000; border-bottom: 1px solid #000;">If the Author intends to submit or upload any additional materials for online publication in association with the Contribution, please indicate by checking the applicable boxes in this section.</td>
                <td width="70%" colspan="6" valign="top" style="padding: 5px 15px; border: 1px solid #000; border-top: none;">
                     <input type="checkbox"  name="" id="" style="height:15px; width:15px; margin: 0;margin-top: 0px">
                        <label style="margin: 0;padding-left: 3px;font-weight: normal;">NO, Supplementary Materials will not be submitted or uploaded by the Author for publication/uploading in connection with the Contribution.
                        </label>
                </td>
            </tr>
            <tr>
                <td width="70%" colspan="6" valign="top" style="padding: 5px 15px; border: 1px solid #000; border-top: none;">
                     <input type="checkbox"  name="" id="" style="height:15px; width:15px; margin: 0;margin-top: 0px">
                    <label style="margin: 0;padding-left: 3px;font-weight: normal;">YES, Supplementary Materials which have been entirely created by the Author (“Original SM”) will be submitted to the Publisher for publication/uploading in connection with the Contribution.
                    </label>
                </td>
            </tr>
            <tr>
                <td width="70%" colspan="6" valign="top" style="padding: 5px 15px; border: 1px solid #000; border-top: none;">
                     <input type="checkbox"  name="" id="" style="height:15px; width:15px; margin: 0;margin-top: 0px">
                    <label style="margin: 0;padding-left: 3px;font-weight: normal;">YES, Supplementary Materials which contain third-party materials (“Third-party SM”) will be submitted to the Publisher for publication/uploading in connection with the Contribution and the Author shall include a prominent notice stating the license terms under which those additional materials can be made available.
                    <p>(the “<strong>Supplementary Material</strong>”)</p>
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;">
                    <p style="matgin-top: 5px">PLEASE NOTE: Amended/alternative versions of this NELP will not be accepted and may delay or prevent publication</p>
                </td>
            </tr>
        </tbody>
    </table>
    <ul style="padding: 0;">
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">1.</span> STANDARD TERMS AND CONDITIONS</li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">1.1</span>The Author hereby agrees to be bound by all terms and conditions in this NELP. </li>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">2.</span> LICENSE </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.1.</span>The term “Contribution” means the Creative-Work created by the Author as identified on page one of this NELP and includes, without exception, all the following versions of the Creative-Work: </li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><b><span style="margin-right: 10px">2.1.1.</span>Submitted Creative-Work Under Review (“SCWUR”):</b> any version of the Contribution that is under formal review for inclusion on the Platform. </li>
            <li style="margin: 10px 0"><b><span style="margin-right: 10px">2.1.2.</span>Accepted Creative-Work (“ACW”):</b>the version of the Contribution that has been accepted for publication. This version may include revisions resulting from editor review but may be subject to further editorial input by the Publisher.</li>
            <li style="margin: 10px 0"><b><span style="margin-right: 10px">2.1.3.</span>Content of Record (“CoR”):</b> the version of the Contribution that is formally published on the Platform and is citable via a permanent identifying Digital Object Identifier (“DOI”). This does not include any ‘early release Creative-Work’ that has not yet been fixed by processes that are still to be applied, such as copy-editing, proof corrections, layout, and typesetting. The CoR includes any corrected or enhanced CoR. </li>
        </ul>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.2</span>The term “<b>Supplementary Material</b>” means any additional written, illustrative, image, photographic, audio, and/or video materials submitted or uploaded to the Platform by the Author for publication in connection with the Contribution. Supplementary Material forms part of the Contribution and will be made available in association with the Contribution. Supplementary Material may be original content created by the Author (“<b>Original SM</b>”) or it may be third-party material sourced and cleared in accordance with Clause 4 below by the Author (“<b>Third-party SM</b>”). </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.3</span>In consideration of publication of the Contribution, the Author hereby grants to the Proprietor:</li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><b><span style="margin-right: 10px">2.3.1.</span>a non-exclusive license to publish, reproduce, and distribute the Author’s full legal name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and the Contribution or any part of it in all forms and media and in all languages throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all translation and subsidiary rights, wherein the Author retains the copyright to the Contribution; and </li>
            <li style="margin: 10px 0"><b><span style="margin-right: 10px">2.3.2.</span>a non-exclusive license to publish, reproduce, and distribute the Author’s full legal name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and any Supplementary Material or any part of it in all forms and media and in all languages throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all translation and subsidiary rights, wherein the Author retains the copyright to the Supplementary Material. </li>
        </ul>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.4.</span>The licenses described in Clause 2.3 above shall, throughout this NELP, be referred to collectively as the “License”. </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.5.</span>The License shall commence upon the Proprietor’s formal acceptance to publish the Contribution and shall endure for the legal term of copyright in the Contribution. </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">2.6.</span>The Author hereby asserts his/her/their moral right always to be identified as the author of the Contribution in accordance with the provisions of applicable national and international copyright laws. </li>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">3.</span> UNDERTAKINGS AND REPRESENTATIONS </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.</span> The Author hereby undertakes and represents that: </li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.1.</span>each named Author has full authority and power to agree to this NELP;</li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.2.</span>the Lead Author has full authority to execute this NELP on behalf of the Author;</li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.3.</span>the Contribution is original and has not been previously published in whole or in part in any medium that has an exclusive license to publish the Contribution; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.4.</span>the Contribution and any Supplementary Material contain nothing that infringes any existing copyright or license or any other intellectual property right of any third party; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.5.</span>the Contribution and any Supplementary Material contain nothing that breaches a duty of confidentiality or discloses any private or personal information of any person without that person’s written consent; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.6.</span>all statements contained in the Contribution and any Original SM purporting to be facts are true and any formula, instruction or equivalent contained therein will not, if followed accurately, cause any injury or damage to the user; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.7.</span>the Contribution and any Supplementary Material do not contain any libelous or otherwise unlawful material, or any material which would harm the reputation of the Platform or the Publisher or the Proprietor; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.8.</span>there are no actual or apparent conflicts of interest connected to the Contribution that have not previously been declared. A conflict of interest is understood to exist if an interest (financial or otherwise) exerts or appears to exert undue influence on the analysis or conclusions in the Contribution, the choice of subject matter, or in any other way that impedes or appears to impede the Author’s objectivity or independence;.</li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.9.</span>if the Contribution is in a vernacular language that is not English, an accurate English translation has been submitted and, if applicable, accurate English subtitles have been submitted; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.10.</span>if a named Author is a representative of an ecoweb-rooted community or a movement, then that named Author is an authorized and accepted representative of the ecoweb-rooted community or the movement;</li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">3.1.11.</span>if a named Author has listed a Preferred name for publication that is different from the named Author’s Legal Name, then that named Author authorizes the use of the Preferred name for publication in association with the Contribution. </li>
        </ul>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">3.2</span> In the event that the Author is in breach of any of these undertakings the Platform, Proprietor, and/or Publisher shall have the right to cease making the Contribution and/or any Supplementary Material available and/or to require that the Author makes any necessary revisions to the Contribution and/or any Supplementary Material (including any factual information). Any such revisions shall be governed by this NELP.  </li>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">4.</span> THIRD-PARTY MATERIALS </li>
        <li style="margin: 10px 0"><span style="margin-right: 10px">4.1.</span> The Author further confirms that for (i) any Third-party SM and (ii) any other third-party material within the Contribution: </li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><span style="margin-right: 10px">4.1.1.</span>licenses to re-use said content throughout the world in all languages and in all forms and media have or will be obtained from the rights-holders; </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">4.1.2.</span>appropriate acknowledgement to the original source of all such materials has been made; and </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">4.1.3.</span>in the case of photographic/audio/video material, appropriate release forms have been obtained from the individual(s) whose likenesses are represented in the Contribution and/or Third-party SM, as applicable.</li>
        </ul>
        <li style="margin: 10px 0"><span style="margin-right: 10px">4.2.</span> Copies of all licenses and/or release documentation acquired in accordance with Clause 4.1 above will, on request, be forwarded to the Platform’s editor prior to publication of the Contribution.</li>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">5.</span> MISCELLANEOUS </li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><span style="margin-right: 10px">5.1.</span>If this NELP, and/or any other document provided in connection with this NELP, is or has been translated into any language other than English, the English language version shall prevail. </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">5.2.</span>The information contained in this NELP will be held for record-keeping purposes. The names of the Author may be reproduced on the Platform and provided to print and online indexing and abstracting services and bibliographic databases. The Proprietor and the Publisher comply with applicable data protection and privacy laws in the collection, retention, storage, and use of personal data. </li>
        </ul>
        <li style="font-weight: bold; margin: 10px 0"><span style="margin-right: 10px">6.</span> ENTIRE AGREEMENT</li>
        <ul style="padding: 0; padding-left: 20px">
            <li style="margin: 10px 0"><span style="margin-right: 10px">6.1.</span>This NELP is made between, and contains the entire agreement between, the Proprietor and the Author concerning the Contribution and supersedes all related prior agreements, arrangements and understandings (whether written or oral). No addition to or modification of any provision of this NELP shall be binding unless it is in writing and signed on behalf of the Publisher and the Author. </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">6.2.</span>The Author acknowledges and agrees that the Proprietor is responsible, at its discretion, for appointing ‘publisher(s)’ to fulfil all or part of the Proprietor’s and Publisher’s obligations under this NELP, provided that any new ‘publisher’ appointed by the Proprietor shall comply with the terms of this NELP. </li>
            <li style="margin: 10px 0"><span style="margin-right: 10px">6.3.</span>The Author acknowledges and agrees that the Proprietor is responsible, at its discretion, for appointing ‘publisher(s)’ to fulfil all or part of the Proprietor’s and Publisher’s obligations under this NELP, provided that any new ‘publisher’ appointed by the Proprietor shall comply with the terms of this NELP. </li>
        </ul>
    </ul>    
</body>
</html>