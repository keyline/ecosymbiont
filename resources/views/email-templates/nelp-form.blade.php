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
            font-size: 14px;
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
    <table style="max-width: 90%; background: #fff; margin:0 auto; padding: 50px;">
        <tbody>
            <tr>
                <td>
                    <div class="box" style="float: left; margin-top: 25px">
                        <p style="font-size: 14px;"><strong>RETURN FORM2 <span style="color: #ff0000"><u>ERT-N0924-02:</u></span></strong></p>
                        <p style="font-size: 13px; line-height: 2;">A <span style="color: #ff0000"><u>digitized form of a</u></span> <strong>hand-signed</strong> copy of this NELP must be uploaded to  (<span style="background: yellow; color: #ff0000">xxxx</span>).</p>
                        <h3>NON-EXCLUSIVE LICENSE TO PUBLISH (“NELP”)</h3>
                    </div>
                    <img src="logo.png" alt="" srcset="" style="width: 300px; float: right;">
                </td>
            </tr>
            <tr>
                <td width="100%">
                    <p style="line-height: 1.5;">This NELP records the terms under which the Creative-Work specified below will be published online only on <strong>Ecosymbionts Regenerate Together</strong> (the “<strong>Platform</strong>”). The Platform is published by Ecosymbionts Regenerate (the “Publisher”). The Platform is owned by the Śramani Institute (the “<strong>Proprietor</strong>”).</p>
                    <p style="color: #ff0000; font-size: 13px;">Submission Reference Number (“<strong>SRN</strong>”): <span style="background: yellow; color: #ff0000">xxx</span></p>
                </td>
            </tr>
            <!-- THE CREATIVE-WORK -->

            <tr>
                <td style="width: 100%; display: block; margin-top: 20px; border: 1px solid #000; background: #e7e6e6; padding: 5px 15px;">
                    <strong style="font-size: 15px;">THE CREATIVE-WORK</strong>
                </td>
                <td style="width: 20%; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6; height: 67px;  padding: 5px 15px;"><strong style="font-size: 14px;">Creative-Work Title:</strong></td>
                <td style="width: 80%; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[14 (note: this indicates the question number on the submission form; the answer should be pasted here)]</p> <span style="display: block; margin-top: 20px; text-align: right;">(the <strong>“Contribution”</strong>)</span></td>
            </tr>
            <tr>
                <td style="margin-top: 20px; display: block;"><p style="color: #4472c4"><i>This NELP can be used where a Contribution has one or more authors. The first author listed (“<strong> <i>Lead Author</i> </strong>”) must be a human individual and must complete the box below and sign this NELP on behalf of herself/himself/themself (and all other authors, if any).</i></p></td>
            </tr>

            <!-- LEAD AUTHOR’S DETAILS AND SIGNATURE -->
            <tr>
                <td style="width: 100%; display: block; margin-top: 20px; border: 1px solid #000; background: #e7e6e6; padding: 5px 15px;">
                    <strong style="font-size: 15px;">LEAD AUTHOR’S DETAILS AND SIGNATURE</strong>
                </td>
                <td style="width: 30%; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6; height: 67px;  padding: 5px 15px;"><strong style="font-size: 14px;">Full Legal Name:</strong></td>
                <td style="width: 70%; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; height: 67px;"><p style="color: #ff0000; font-size: 14px;">[2] [3] [4]</p> <span style="display: block; margin-top: 20px; text-align: right;">(the “<strong>Lead Author</strong>”)</span></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="color: #ff0000; font-size: 14px;">Preferred name for publication:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[4A] <p></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="font-size: 14px;">Email address:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[0] <p></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="font-size: 14px;">Ancestral continental ecoweb affiliation:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[22] <p></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="font-size: 14px;">Ancestral regional ecoweb affiliation:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[23] <p></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="font-size: 14px;">Organizational affiliation:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[20] <p></td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px;"><strong style="font-size: 14px;">Country of residence:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;"><p style="color: #ff0000">[17] <p></td>

                <td style="width: 30%; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px; height: 134px;"><strong style="font-size: 14px;">Authority to sign:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; height: 134px;">
                    <p>By signing this NELP, I confirm and agree that: 
                        <ul style="list-style-type: lower-roman; padding-left: 15px; font-size: 14px; line-height: 1.5;">
                            <li>All information that I have entered into this NELP is correct at the time of signature.</li>
                            <li><strong>EITHER</strong>, I am the sole author and owner of the copyright in the Contribution and I agree to the terms and conditions in this NELP. </li>
                            <li><strong>OR</strong>, the copyright in the Contribution is jointly owned by me and the Author(s) listed below and I agree to (and am authorized by each Author to agree to) the terms of this NELP on behalf of all Authors;</li>
                            <li>AND, no other person nor entity has any copyright interest in the Contribution</li>
                        </ul>    
                    <p>
                </td>

                <td style="width: 30%; height: 30px; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6;  padding: 5px 15px; height: 80px;"><strong style="font-size: 14px;">Signature:</strong></td>
                <td style="width: 70%; height: 30px; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; height: 80px;"><strong font-size: 14px;>Date: </strongs></td>

            </tr>
            <!-- OTHER AUTHORS’ DETAILS -->
            <tr>
                <td style="width: 100%; display: block; margin-top: 20px; border: 1px solid #000; background: #e7e6e6; padding: 5px 15px;">
                    <strong style="font-size: 15px;">OTHER AUTHORS’ DETAILS</strong>
                </td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; background: #e7e6e6; padding: 5px 15px;"><p style="color: #4472c4; font-size: 14px; line-height: 1.5;"><i>If the Contribution is created by two or more authors and the copyright in the Contribution is jointly owned by them – please enter the details of all other individuals who contributed to the creation of the Contribution in this box.</i></p></td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px;">Full Legal Name <span style="color: #ff0000;">/ Preferred name for publication</span></strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [2] [3] [4]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [2] [3] [4]</p>
                </td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px;">Email address</strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [0]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [0]</p>
                </td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px;">Ancestral continental ecoweb affiliation</strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [22]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [22]</p>
                </td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px;">Ancestral regional ecoweb affiliation</strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [23]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [23]</p>
                </td>
                <td style="width: 14.28%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px; color: #ff0000;">Organizational/ ecoweb-rooted community/ movement affiliation </strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [20]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [20]</p>
                </td>
                <td style="width: 14.3%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px;">
                    <strong style="margin: -5px -15px; background: #e7e6e6; display: block; padding: 5px 15px; border-bottom: 1px solid #000; height: 50px;">Country of residence</strong>
                    <p style="padding: 15px 0px; color: #ff0000; height: 93px">Form-2 [17]</p>
                    <p style="margin: -5px -15px; padding: 10px 15px; color: #ff0000; border-top: 1px solid #000; height: 83px">Form-3 [17]</p>
                </td>
                <td style="width: 85.7%; float: left; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px; font-size: 12px; background: #e7e6e6;"><p style="text-align: center;">(the Lead Author and each individual listed here and at the end of this NELP is, individually and collectively, the “<strong>Author</strong>”)</p></td>
            </tr>
            <!-- ŚRAMANI INSTITUTE EMPLOYEE -->
            <tr>
                <td style="margin-top: 30px; display: block;"></td>
                <td style="width: 25%; float: left; border: 1px solid #000; background: #e7e6e6; padding: 5px 15px;">
                    <strong style="font-size: 15px;">ŚRAMANI INSTITUTE EMPLOYEE</strong>
                    <p style="color: #4472c4; font-size: 14px; line-height: 1.5;"><i>You must check this box and enter details, if applicable</i></p>
                </td>
                <td style="width: 75%; float: right; border: 1px solid #000; border-left: none; padding: 5px 15px; height: 72px;">
                    <ul style="list-style-type: square; padding-left: 15px; font-size: 14px; line-height: 1.5;">
                        <li>One or more Authors are <strong>employed by</strong> the Śramani Institute or are <strong>related</strong> to a Śramani Institute employee. Please provide names and describe the relationship(s):</li>
                    </ul>
                </td>
            </tr>
            <!-- SUPPLEMENTARY MATERIALS-->
            <tr>
                <td style="width: 100%; display: block; margin-top: 20px; border: 1px solid #000; background: #e7e6e6; padding: 5px 15px;">
                    <strong style="font-size: 15px;">SUPPLEMENTARY MATERIALS</strong>
                    <p style="color: #4472c4; font-size: 14px; line-height: 1.5; float: right; width: 60%;"><i>Identify any additional materials to be published in association with the Contribution</i></p>
                </td>
                <td style="width: 25%; float: left; border: 1px solid #000; border-top: none; padding: 5px 15px; height: 190px;"><p style="color: #4472c4; font-size: 14px; line-height: 1.5;"><i>If the Author intends to submit or upload any additional materials for online publication in association with the Contribution, please indicate by checking the applicable boxes in this section.</i></p></td>
                <td style="width: 75%; float: right; border: 1px solid #000; border-top: none; border-left: none; padding: 5px 15px;">
                    <ul style="list-style-type: square; padding-left: 15px; font-size: 14px; line-height: 1.5;">
                        <li style="margin-bottom: 10px"><strong>NO</strong>, Supplementary Materials will not be submitted or uploaded by the Author for publication/uploading in connection with the Contribution.</li>
                        <p style="border-top: 1px solid #000; margin: 0 -16px 0 -30px"></p>
                        <li style="margin-bottom: 10px"><strong>YES</strong>, Supplementary Materials which have been entirely created by the Author (“Original SM”) will be submitted to the Publisher for publication/uploading in connection with the Contribution.</li>
                        <p style="border-top: 1px solid #000; margin: 0 -16px 0 -30px"></p>
                        <li style="margin-bottom: 10px"><strong>YES</strong>, Supplementary Materials which contain third-party materials (“Third-party SM”) will be submitted to the Publisher for publication/uploading in connection with the Contribution and the Author shall include a prominent notice stating the license terms under which those additional materials can be made available.</li>
                        <p>(the “<strong>Supplementary Material</strong>”)</p>
                    </ul>
                </td>
            </tr>          

            <tr>
                <td><p style="color: #ff0000; text-align: center; margin: 20px 0;"><strong>PLEASE NOTE: Amended/alternative versions of this NELP will not be accepted and may delay or prevent publication</strong></p></td>
            </tr>

            <tr>
                <td>
                    <ol style="list-style-type: decimal; font-size: 14px;">
                        <strong><li>STANDARD TERMS AND CONDITIONS </li></strong>
                        <ol>
                            <li style="margin: 10px 0;">The Author hereby agrees to be bound by all terms and conditions in this NELP. </li>
                        </ol>
                        <strong><li>LICENSE</li></strong>
                        <ol>
                            <li style="margin: 10px 0;">The term “<strong>Contribution</strong>” means the Creative-Work created by the Author as identified on page one of this NELP and includes, without exception, all the following versions of the Creative-Work: </li>
                            <ol style="padding-left: 15px;">
                                <li style="margin: 10px 0;"><strong>Submitted Creative-Work Under Review (“SCWUR”):</strong> any version of the Contribution that is under formal review for inclusion on the Platform. </li>
                                <li style="margin: 10px 0;"><strong>Accepted Creative-Work (“ACW”):</strong> the version of the Contribution that has been accepted for publication. This version may include revisions resulting from editor review but may be subject to further editorial input by the Publisher. </li>
                                <li style="margin: 10px 0;"><strong>Content of Record (“CoR”):</strong> the version of the Contribution that is formally published on the Platform and is citable via a permanent identifying Digital Object Identifier (“<strong>DOI</strong>”). This does not include any ‘early release Creative-Work’ that has not yet been fixed by processes that are still to be applied, such as copy-editing, proof corrections, layout, and typesetting. The CoR includes any corrected or enhanced CoR. </li>
                            </ol>
                            <li style="margin: 10px 0;">The term “<strong>Supplementary Material</strong>” means any additional written, illustrative, image, photographic, audio, and/or video materials submitted or uploaded to the Platform by the Author for publication in connection with the Contribution. Supplementary Material forms part of the Contribution and will be made available in association with the Contribution. Supplementary Material may be original content created by the Author (“<strong>Original SM</strong>”) or it may be third-party material sourced and cleared in accordance with Clause 4 below by the Author (“<strong>Third-party SM</strong>”). </li>
                            <li style="margin: 10px 0;">In consideration of publication of the Contribution, the Author hereby grants to the Proprietor: </li>
                            <ol style="padding-left: 15px;">
                                <li style="margin: 10px 0;">a non-exclusive license to publish, reproduce, and distribute the Author’s full legal name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and the Contribution or any part of it in all forms and media and in all languages throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all translation and subsidiary rights, wherein the Author retains the copyright to the Contribution; and </li>
                                <li style="margin: 10px 0;">a non-exclusive license to publish, reproduce, and distribute the Author’s full legal name, ancestral continental ecosystem affiliation, ancestral regional ecosystem affiliation, organizational affiliation, and country of residence and any Supplementary Material or any part of it in all forms and media and in all languages throughout the world, whether print, digital / electronic, whether now known or hereinafter invented, and to grant sublicenses of all translation and subsidiary rights, wherein the Author retains the copyright to the Supplementary Material. </li>
                            </ol>
                            <li style="margin: 10px 0;">The licenses described in Clause 2.3 above shall, throughout this NELP, be referred to collectively as the “<strong>License</strong>”. </li>
                            <li style="margin: 10px 0;">The License shall commence upon the Proprietor’s formal acceptance to publish the Contribution and shall endure for the legal term of copyright in the Contribution. </li>
                            <li style="margin: 10px 0;">The Author hereby asserts his/her/their moral right always to be identified as the author of the Contribution in accordance with the provisions of applicable national and international copyright laws. </li>
                        </ol>
                        <strong><li>UNDERTAKINGS AND REPRESENTATIONS</li></strong>
                        <ol>
                            <li style="margin: 10px 0;">The Author hereby undertakes and represents that: </li>
                            <ol style="padding-left: 15px;">
                                <li style="margin: 10px 0;">each named Author has full authority and power to agree to this NELP; </li>
                                <li style="margin: 10px 0;">the Lead Author has full authority to execute this NELP on behalf of the Author;</li>
                                <li style="margin: 10px 0;">the Contribution is original and has not been previously published in whole or in part in any medium that has an exclusive license to publish the Contribution; </li>
                                <li style="margin: 10px 0;">the Contribution and any Supplementary Material contain nothing that infringes any existing copyright or license or any other intellectual property right of any third party;</li>
                                <li style="margin: 10px 0;">the Contribution and any Supplementary Material contain nothing that breaches a duty of confidentiality or discloses any private or personal information of any person without that person’s written consent; </li>
                                <li style="margin: 10px 0;">all statements contained in the Contribution and any Original SM purporting to be facts are true and any formula, instruction or equivalent contained therein will not, if followed accurately, cause any injury or damage to the user; </li>
                                <li style="margin: 10px 0;">the Contribution and any Supplementary Material do not contain any libelous or otherwise unlawful material, or any material which would harm the reputation of the Platform or the Publisher or the Proprietor; </li>
                                <li style="margin: 10px 0;">there are no actual or apparent conflicts of interest connected to the Contribution that have not previously been declared. A conflict of interest is understood to exist if an interest (financial or otherwise) exerts or appears to exert undue influence on the analysis or conclusions in the Contribution, the choice of subject matter, or in any other way that impedes or appears to impede the Author’s objectivity or independence;.</li>
                                <li style="margin: 10px 0;  color: #ff0000;"><u>if the Contribution is in a vernacular language that is not English, an accurate English translation has been submitted and, if applicable, accurate English subtitles have been submitted; </u></li>
                                <li style="margin: 10px 0;  color: #ff0000;"><u>if a named Author is a representative of an ecoweb-rooted community or a movement, then that named Author is an authorized and accepted representative of the ecoweb-rooted community or the movement;</u></li>
                                <li style="margin: 10px 0;  color: #ff0000;"><u>if a named Author has listed a Preferred name for publication that is different from the named Author’s Legal Name, then that named Author authorizes the use of the Preferred name for publication in association with the Contribution. </u></li>
                            </ol>
                            <li style="margin: 10px 0;">In the event that the Author is in breach of any of these undertakings the Platform, Proprietor, and/or Publisher shall have the right to cease making the Contribution and/or any Supplementary Material available and/or to require that the Author makes any necessary revisions to the Contribution and/or any Supplementary Material (including any factual information). Any such revisions shall be governed by this NELP. </li>
                        </ol>
                        <strong><li>THIRD-PARTY MATERIALS </li></strong>
                        <ol>
                            <li style="margin: 10px 0;">The Author further confirms that for (i) any Third-party SM and (ii) any other third-party material within the Contribution: </li>
                            <ol style="padding-left: 15px;">
                                <li style="margin: 10px 0;">licenses to re-use said content throughout the world in all languages and in all forms and media have or will be obtained from the rights-holders; </li>
                                <li style="margin: 10px 0;">appropriate acknowledgement to the original source of all such materials has been made; and </li>
                                <li style="margin: 10px 0;">in the case of photographic/audio/video material, appropriate release forms have been obtained from the individual(s) whose likenesses are represented in the Contribution and/or Third-party SM, as applicable.</li>
                            </ol>
                            <li style="margin: 10px 0;">Copies of all licenses and/or release documentation acquired in accordance with Clause 4.1 above will, on request, be forwarded to the Platform’s editor prior to publication of the Contribution.</li>
                        </ol>
                        <strong><li>MISCELLANEOUS </li></strong>
                        <ol>
                            <li style="margin: 10px 0;">If this NELP, and/or any other document provided in connection with this NELP, is or has been translated into any language other than English, the English language version shall prevail. </li>
                            <li style="margin: 10px 0;">The information contained in this NELP will be held for record-keeping purposes. The names of the Author may be reproduced on the Platform and provided to print and online indexing and abstracting services and bibliographic databases. The Proprietor and the Publisher comply with applicable data protection and privacy laws in the collection, retention, storage, and use of personal data. </li>
                        </ol>
                        <strong><li>ENTIRE AGREEMENT </li></strong>
                        <ol>
                            <li style="margin: 10px 0;">This NELP is made between, and contains the entire agreement between, the Proprietor and the Author concerning the Contribution and supersedes all related prior agreements, arrangements and understandings (whether written or oral). No addition to or modification of any provision of this NELP shall be binding unless it is in writing and signed on behalf of the Publisher and the Author. </li>
                            <li style="margin: 10px 0;">The Author acknowledges and agrees that the Proprietor is responsible, at its discretion, for appointing ‘publisher(s)’ to fulfil all or part of the Proprietor’s and Publisher’s obligations under this NELP, provided that any new ‘publisher’ appointed by the Proprietor shall comply with the terms of this NELP. </li>
                            <li style="margin: 10px 0;">This NELP is governed by the laws of the United States of America and is subject to the exclusive jurisdiction of the courts of the United States of America.</li>
                        </ol>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>