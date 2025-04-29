<?php
//  use Illuminate\Support\Facades\Route;
//  $routeName = Route::current();
//  $pageName = explode('/', $routeName->uri());
//  $pageSegment = $pageName[1];
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$current_url = $protocol . $host . $uri;
?>
<!-- block-wrapper-section ================================================== -->
<section class="block-wrapper submittion_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 content-blocker">
                <!-- block content -->
                <div class="block-content">
                    <div class="article-box">
                        <div class="col-md-12">
                            <div class="welcome_mucis_section">
                                <audio preload="auto" controls>
                                    <source src="<?=env('FRONT_ASSETS_URL')?>Audio-Submissions-28Apr2025.mp3">
                                </audio>
                            </div>
                        </div>
                        <div class="titleto-box">
                            <h1>ABOUT</h1>  
                        </div>
                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="post-content">
                                            <div class="titleto-inner">                                                
                                                <p style="color:#000;">Welcome to <strong>EaRTh</strong>, a custom-built professionally edited knowledge-sharing and community-building platform for grassroots changemakers, innovators, and knowledge-holders across the world. <strong>EaRTh</strong> stands for Ecosymbionts all Regenerate Together and is a project of the Ecosymbionts Regenerate initiative of the <i>Śramani Institute</i>.</p>
                                            </div>
                                            <div class="titleto-inner">
                                                <h2>EaRTh IS FOR YOU IF…</h2>
                                                <p class="black">Do you care about transforming man-made <strong>extractivist</strong> systems (those that exploit human and ecological resources without replenishing them)? Are you working to counter the <strong>inequity</strong> and <strong>ecocide</strong> caused by extractivist economics, law, governance, and education (ELGE) systems? Do you think about these extractivist systems and work on how to <strong>transform or replace</strong> them with <strong>regenerative</strong> systems (those that restore, revitalize, generate, and/or nurture in a way that leads to ecosymbiotic health and wellbeing)?</p>
                                                <p class="black">Then EaRTh is for you.</p>
                                                <p class="black">Do you want to <strong>share</strong> your ideas, art, music, stories, experiences, performances, knowledge, and work <strong>with the world</strong> in a <strong>trusted space,</strong> so that we can learn from and work with each other to <u>reestablish human-ecological connection</u> and <u>ecosymbiosis?</u></p>
                                                <p class="black">Then EaRTh is for you.</p>
                                                <p class="black">Do you wish you could <strong>connect</strong> with <u>grassroots humans, communities, and movements</u> all across the world, so we can <strong>support</strong> each other as we implement solutions that ensure <u>human-ecological wellbeing</u>? Together?</p>
                                                <p class="black">Then EaRTh is for you.</p>
                                                <p class="black">EaRTh welcomes creative-works submitted in the form of written narratives, art images, and landscape videos. The ways in which you can share your ideas and work are as unlimited as your creativity. Digitized, of course!</p>
                                                <p class="black"><u>Creative-works in vernacular languages are welcome</u>, as long as you provide a full English translation (and English subtitles for videos) Share your fiction or non-fiction, poetry or prose, projects that worked and ones that didn’t. Share personal stories or cultural stories, interviews with Elders or with youth. As long as what you share is <strong>related to the connection between humans and ecologies</strong>, we want to know!</p>

                                                <p class="black">
                                                    Read this submissions page and watch the video tutorial to get started with making <u>your own password-protected account</u> for streamlined submission of your creative-works, allowing EaRTh editors to review and revise efficiently before publication.<br><strong>Welcome to EaRTh!</strong>
                                                </p>
                                                <div class="titleto-box">
                                                    <h1>SUBMISSION GUIDELINES</h1>
                                                </div>
                                                <p class="black">Before making a submission of your Creative-Work to our professionally edited online knowledge-sharing and community-building platform, please read these submission guidelines in their entirety.</p>
                                                <h2>ELIGIBILITY CRITERIA</h2>
                                                <ul class="black">
                                                    <li>You ("Author") must be a grassroots changemaker, innovator, and/or knowledge-holder.</li>
                                                    <li>All components of your word narrative, art image, and/or landscape video, including accompanying images and/or photographs (“Creative-Work”) must be your own original work.</li>
                                                    <li>You must not have used Artificial Intelligence (AI) to generate any component of your Creative-Work.</li>
                                                    <li>You must own the copyright and licensing rights to all components of your Creative-Work.</li>
                                                    <li>Your Creative-Work must not have been published in any other medium that has the exclusive right to publish your work.</li>
                                                    <li>Your Creative-Work must relate to the connection between humans and ecologies <i>(hint: food security/ sovereignty, housing challenges, forced displacement from lands, all of these have a human-ecological connection).</i></li>
                                                </ul>
                                                <h2>AUTHORSHIP</h2>
                                                <p class="black">EaRTh encourages human individuals, as well as ecoweb-rooted communities (see below for definition) or movements to be authors of Creative-Works submitted to EaRTh. Given the current legal framework associated with copyright and licensing, at least one human individual must be a co-author (and the first author) if an ecoweb-rooted community or movement is an author. Please also see the instructions below:</p>
                                                <ul class="black">
                                                    <li>A Creative-Work may have up to three co-authors, wherein the first author listed must be a human individual ("Lead Author").</li>
                                                    <li>EaRTh encourages an ecoweb-rooted community or movement to be a co-author of a Creative-Work, but only if a human individual is also a co-author (first author).</li>
                                                    <li>For the purposes of submissions of Creative-Work to EaRTh, an ecoweb-rooted community is defined as a self-associating group of human individuals that trace their origins to a particular ecoweb. Examples of ecoweb-rooted communities are: the Idu Mishmi of Arunachal Pradesh (India) and the Lisjan Ohlone of California (United States).</li>
                                                </ul>
                                                <h2>GUIDELINES</h2>
                                                <ol class="black">
                                                    <li>Your Creative-Work can be non-fiction or fiction and must be one of 3 types:</li>
                                                    <ul class="black">
                                                        <li><strong>Type A</strong>: word narrative (500-1000 words for prose, 100-250 words for poetry);</li>
                                                        <li><strong>Type B</strong>: art image(s) + descriptive narrative (100-250 words); or</li>
                                                        <li><strong>Type C</strong>: video (5-10 minutes) + descriptive narrative (100-250 words).</li>
                                                    </ul>
                                                    <li>For Creative-Work <strong>Type A</strong>, your word narrative submission <u>must be accompanied</u> by at least one (1) image or photograph and may be accompanied by up to five (5) images or photographs.</li>
                                                    <li>For Creative-Work <strong>Type B</strong>, you may submit up to five (5) art images of the same or related piece(s) of art. You <u>must provide the following details</u> about your piece(s) of art: (a) title, (b) medium (<i>e.g.,</i> oil on canvas), (c) dimensions, and (d) year created.</li>
                                                    <li>For Creative-Work <strong>Type C</strong>, your video <u>must be</u> (a) a landscape video, (b) be 5-10 minutes long, and (c) have a file size of 1 GB or less.</li>
                                                    <li>For all Creative-Work types, each image or photograph submitted <u>must be accompanied</u> by a brief figure caption (up to 50 words).</li>
                                                    <li>If your Creative-Work is longer (or has more images) than the guidelines in points 1-5, then <u>consider submitting a series</u>. EaRTh can publish up to a 6-part series, wherein each segment of the series must conform to the guidelines in points 1-5, including requirements for length and number of accompanying images.</li>
                                                    <li>To be categorized as non-fiction any knowledge or ideas contained in your Creative-Work must be your own and may include your first-person account of narration by a knowledge-holder and/or ancestor who is explicitly named and credited.</li>
                                                    <li>A non-fiction Creative-Work that contains descriptions of knowledge and/or activities — especially harmful activities — by legal entities (<i>e.g.,</i> corporations) and/or human persons other than yourself must be substantiated by external sources (<i>e.g.,</i> citations) and/or be witnessed first-hand by you.</li>
                                                    <li>As you generate your Creative-Work, please keep in mind that readers and grassroots individuals and collectives from across the world will be viewing your Creative-Work if it is published by EaRTh as content. Thus, please write and present in a manner that explains terms and concepts specific to your region or culture, such that a person completely unfamiliar with the topic and regional/cultural context of your Creative-Work can understand.</li>
                                                    <li>Please <u>write in a simple and clear manner that is not academic</u>, keeping in mind that readers and grassroots individuals and collectives viewing your Creative-Work are from a variety of occupational and cultural backgrounds and may not be native English speakers. When citing another’s publication, please simply state the finding and use footnotes to provide information about the full citation.
                                                    <p>For example, do <strong>not</strong> write: “Garcia and Hussain (2018) describe various detrimental neurological effects of environmental pollution in frontline communities.”</p>
                                                    <p>Instead, write: “Environmental pollution has been reported to have various detrimental neurological effects in frontline communities.<sup>[1]</sup>" Then in your footnote for [1] provide the entire citation of Garcia and Hussain (2018).</p>
                                                    </li>
                                                    <li>If you are including citations in your Creative-Work, please format them as follows:
                                                    <p>M. Garcia, L. Hussain, <i>Environmental Pollution Causes Neurological Effects in Impacted Communities,</i> <strong>Journal of Impacts:</strong> Vol. 5 (Issue 12), pp. 46-48 (2018).</p>
                                                    </li>
                                                    <li>EaRTh encourages the submission of Creative-Works in vernacular languages. For narratives — both word narratives and descriptive narratives — please ensure that if the language is not English, you also submit an accurate English translation of the entire narrative. For video in which the languages spoken are not English, please ensure that there are accurate English subtitles within the submitted video.</li>
                                                </ol>
                                                <h2>EXPLANATION OF CATEGORIES AND SUB-CATEGORIES OF EaRTh</h2>
                                                <p>EaRTh has five main categories that are further divided into sub-categories. To help you understand what type of content is appropriate for each category/sub-category, please see below.</p>
                                                <ul class="black">
                                                    <li><strong>ACTION</strong>
                                                        <ul class="black" style="margin-top: 10px">
                                                            <li><strong><i>Activism</i></strong><br>Substantive Creative-Work about specific upcoming or past activism, not a mere announcement.</li>
                                                            <li><strong><i>Events</i></strong><br>Substantive Creative-Work about specific upcoming or past events, not a mere announcement.</li>
                                                            <li><strong><i>Women & Marginalized</i></strong><br>About issues that concern women and members of marginalized communities.</li>
                                                        </ul>
                                                    </li>
                                                    <li><strong>INDIGENOUS</strong>
                                                        <ul class="black" style="margin-top: 10px">
                                                            <li><strong><i>Indigenous Knowledge-Technologies-Practices</i></strong><br>You must either be an Indigenous person narrating your own community's Knowledge-Technologies-Practices (KTP), or if you are a person narrating on behalf of an Indigenous individual and/or community, the latter must be a co-author of your Creative-Work (narrate in a manner that does not reveal details of KTP so that misappropriation by others is prevented).</li>
                                                            <li><strong><i>Indigenous Retelling & Telling</i></strong><br>A retelling or telling of past and/or current events from the perspective of an Indigenous individual and/or community.</li>
                                                            <li><strong><i>Indigenous Survivance</i></strong><br>A sharing of Indigenous individuals, especially women, being vanished by various actors and/or of the persevering and resilience of Indigenous communities.</li>
                                                        </ul>
                                                    </li>
                                                    <li><strong>REGENERATIVE</strong>
                                                        <ul class="black" style="margin-top: 10px">
                                                            <li><strong><i>Ecoweb Regeneration</i></strong><br>About restoring, revitalizing, generating, and/or nurturing one or more ecowebs in a way that optimizes ecosymbiotic health and wellbeing.</li>
                                                            <li><strong><i>Human-Ecoweb Integration</i></strong><br>About integrating one or more human communities into one or more natural or regenerated ecowebs.</li>
                                                            <li><strong><i>Regenerative Technologies</i></strong><br>About technologies that use materials and processes that are not extractive but instead preserve and/or regenerate ecowebs and human communities in ways that optimize ecosymbiotic health and wellbeing.</li>
                                                        </ul>
                                                    </li>
                                                    <li><strong>SYSTEMS</strong>
                                                        <ul class="black" style="margin-top: 10px">
                                                            <li><strong><i>Ecoweb-Rooted Framing</i></strong><br>Creative-Work that conceptualizes economics, law, governance, and education (ELGE) systems in a manner that reframes them to optimize ecoweb-rooted symbiotic wellbeing, <i>i.e.,</i> of human communities and one or more ecowebs we rely on.</li>
                                                            <li><strong><i>Extractivism Alternatives</i></strong><br>Creative-Work that describes Knowledge-Technologies-Practices (KTP) and/or systems that present an alternative to extractivist KTP and systems (<i>e.g.,</i> the cycle of sustainable generation, repeated use, and biodegradable disposal of objects, as opposed to the cycle of resource extraction, disposable commodity production, disposable use, and landfill waste generation).</li>
                                                            <li><strong><i>Systems Reform</i></strong><br>Creative-Work that critically analyzes extractivist economics, law, governance, and education (ELGE) systems or describes concrete ideas on how to reshape ELGE systems in a manner that minimizes or eliminates extractivism.</li>
                                                        </ul>
                                                    </li>
                                                    <li><strong>WELLBEING</strong>
                                                        <ul class="black" style="margin-top: 10px">
                                                            <li><strong><i>Art-Music-Performance</i></strong><br>Visual art, literary art, and/or audiovisual media of music and/or performance, including storytelling.</li>
                                                            <li><strong><i>Food Sovereignty</i></strong><br>About systems that generate food in a manner that optimizes the wellbeing of human communities and the ecowebs we rely on.</li>
                                                            <li><strong><i>Sustainable Health</i></strong><br>About systems that optimize the mental and physical wellbeing of humans, especially those that incorporate connections to and sustainable utilization of biodiverse ecowebs and ecoweb resources.</li>
                                                        </ul>
                                                    </li>
                                                </ul>

                                                <h2>INSTRUCTIONS FOR SUBMISSION</h2>
                                                <p class="black">Upon submitting a completed form to EaRTh, if you meet the eligibility criteria, you will receive an e-mail from ecosymbiont with a Submission Reference Number ("SRN"). However, upon completing your Creative-Work submission form, you will not be able to click on the "Submit" button unless you check the box just below the scrollable text for the Non-Exclusive License to Publish ("NELP"). Once the editor(s) receive(s) your submission, we will begin substantively reviewing your Creative-Work.</p>
                                                <h2>REVIEW PROCESS</h2>
                                                <p class="black">Your Creative-Work will be reviewed based on several criteria, including clarity, veracity, and relevance to human-ecological connection. If your Creative-Work is accepted for publication as Content on EaRTh, a few rounds of editor-guided revision may be required before publication.</p>
                                                <h2>COPYRIGHT & LICENSE</h2>
                                                <p class="black">As per the terms detailed in the NELP, you grant EaRTh, Ecosymbionts Regenerate (ER), and the Śramani Institute (the nonprofit host organization of ER and EaRTh) a non-exclusive license to publish and use your Content. You will retain the copyright to your work and the right to also publish elsewhere.</p>
                                                <h3 class="box_heading">Please watch the tutorial videos below before signing up for your password-protected EaRTh Creator account.</h3>
                                                <div class="video_box">
                                                    <h4 class="text-center">EaRTh Creator Tutorial 1: Navigating EaRTh</h4>
                                                    <iframe src="https://youtu.be/epfiF1mJJIQ" frameborder="0"></iframe>
                                                </div>   
                                                <div class="video_box">
                                                    <h4 class="text-center">EaRTh Creator Tutorial 2: Sign-Up and Profile Creation</h4>
                                                    <iframe src="https://youtu.be/7WP08ULd5p8" frameborder="0"></iframe>
                                                </div>  
                                                <div class="video_box">
                                                    <h4 class="text-center">EaRTh Creator Tutorial 3: Submitting a Creative-Work (Part 1)</h4>
                                                    <iframe src="https://youtu.be/HVzN3cPgRrY" frameborder="0"></iframe>
                                                </div>   
                                                <div class="video_box">
                                                    <h4 class="text-center">EaRTh Creator Tutorial 4: Submitting a Creative-Work (Part 2)</h4>
                                                    <iframe src="https://youtu.be/MrkH7BYnstc" frameborder="0"></iframe>
                                                </div> 
                                                
                                                <?php if($button_show){?>
                                                    <?php if(session('is_user_login')){?>
                                                        <p class="text-center"><a href="<?=url('user/submit-new-article')?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Submit New Creative-Work</a></p>
                                                        <p style="color: red; text-align: center;">In case of technical difficulties please <a href="<?=env('REGENERATE_URL')?>contact.php">contact us.</a></p>
                                                    <?php } else {?>
                                                        <p class="text-center"><a href="<?=url('sign-in/' . Helper::encoded('https://ecosymbiont.org/earth/user/submit-new-article'))?>" class="btn btn-primary">Submit New Creative-Work</a></p>
                                                        <p style="color: red; text-align: center;">In case of technical difficulties please <a href="<?=env('REGENERATE_URL')?>contact.php" target="_blank">contact us.</a></p>
                                                    <?php }?>
                                                <?php }?>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- End block content -->
            </div>
        </div>
    </div>
</section>
<!-- End block-wrapper-section -->