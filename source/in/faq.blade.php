
@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.IN">
<meta property="og:site_name" content="DevConf.IN">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-in-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-in-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>FAQ - DevConf.IN</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/in"><img src="/assets/images/devconf-logo-in-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/in/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/in/schedule" class="nav-link local">Schedule</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/in/faq" class="nav-link">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" target="_blank" class="nav-link">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php
	$questions = array(
		array("group" => "General Questions", "id" => "general", 
			"questions" => array( 
				array("q" => "How can I contact the organizers and get in touch with other attendees?", "a" => "You can reach the organizers by emailing info@devconf.in. The official chat platform for communication is Matrix."),
			/*	array("q" => "What’s the best way to get to the venue?", "a" => "We recommend using public transport or carpooling if public transport is not an option.</p><p><strong>By <a href='https://www.punemetrorail.org/' target='_blank'>Pune Metro</a></strong><br>
<ol><li>Use WhatsApp Pune Metro Ticket Chat at <a href='http://wa.me/919420101990' target='_blank'>wa.me/919420101990</a>.
<ul><li>Send a “Hi” to the above number. Click on “Book Now”</li>
<li>Select your source station and select “<strong>Anand Nagar</strong>” (Nearest stop to venue) as the destination station.</li>
<li>Click “Proceed to Pay” and select “Pay Online”.</li>
<li>If you have UPI on your phone select “UPI” and select the app you want to use for payment. Complete the payment.</li>
<li>If you don’t have UPI, select “Other Methods”. Enter your Credit/Debit card details and complete the payment. Make sure to wait until a ”Payment Successful” screen appears.</li>
<li>You’ll receive the ticket to your WhatsApp. Scan the e-ticket at the source and destination stations.</li></ul></li>
<li>Download the Pune Metro app on <a href='https://play.google.com/store/apps/details?id=org.mahametro.punemobileapp' target='_blank'>Android</a> or <a href='https://apps.apple.com/in/app/pune-metro-official-app/id1571012648' target='_blank'>iOS</a>.</li>
<li>Purchase a ticket at the source station.<ul><li>
Walk to the ticket counter and ask for a ticket to “<strong>Anand Nagar</strong>” station.</li>
<li>Pay in Cash/Card/UPI and get the paper ticket.</li>
<li>Scan the ticket at source and destination. Make sure to keep the ticket with you  until you are near the exit of the metro station to comply with any random Ticket Checks by the metro authorities.</li></ul></li></ol>
<p><strong>Note:</strong> Attendees traveling from the Purple Line need to change their course at the “Civil Court” station and switch to “Aqua Line” (Blue Line).</p><p>
Once you reach Anand Nagar Metro station, you can use Google maps to walk to MIT (10 mins by foot) or hail an Auto Rickshaw (costs ~ Rs 30).</p><p>
<strong>By taxi</strong><br>
Alternatively, you may directly hail an auto rickshaw to the venue. You may also use one of the following apps: 
<ul><li><a href='https://www.uber.com/in/en/ride/' target='_blank'>Uber</a> (recommended)</li>
<li><a href='https://www.olacabs.com/' target='_blank'>Ola cabs</a></li>
<li><a href='https://rapido.bike/Pune/main-page' target='_blank'>Rapido</a></li></ul>

If using an online cab hailing service, please add <a href='https://maps.app.goo.gl/c9MUDbUaQDuwYDdz9' target='_blank'>MIT WPU School of Design</a> as the drop location.</p>
<p><strong>By car</strong><br>
<u>We do not recommend arriving by car</u>. Due to the size of the MIT campus and high daily foot traffic, we are unable to offer parking. If you decide to drive anyway, please check for publicly available parking areas near the venue in advance."),*/
            array("q" => "Are there any recommended hotels to stay in near the venue?", "a" => "Yes, you can find a list of recommended hotels <a href='https://www.devconf.info/in/#hotels'>here</a>."),
            array("q" => "Do you provide parking at the venue?", "a" => "No, due to the size of the MIT campus and the high daily foot traffic, we are unable to offer parking. If you plan to drive or ride a bike, please check for publicly available parking areas near the venue."),
          //  array("q" => "What food and drink options are available at the venue?", "a" => "There are multiple cafés and many other dining options near the campus where you can purchase lunch and snacks during the conference. Please note that all meals served at the venue are vegetarian.<br><br>There are multiple water dispenses available at the venue. Make sure to bring your reusable water bottles to avoid unnecessary waste and reduce environmental impact."),
            array("q" => "Is there Wi-Fi available at the venue?", "a" => "We cannot guarantee Wi-Fi access for all attendees at this time. However, we are working to provide connectivity in the conference rooms and will share updates as we receive more information from the venue.<br><br>As a speaker, you will have Wi-Fi access in the room where you are presenting."),
			)),

		array("group" => "CfP Questions", "id" => "cfp", 
			"questions" => array( 
				array("q" => "What is the format of DevConf.IN? Can I present online?", "a" => "DevConf.IN is primarily an in-person event with some virtual elements, such as conference chat and streaming of select sessions. However, all presentations must be delivered in person, and virtual presentations are not an option."),
				array("q" => "What is a talk?", "a" => "A talk is where you present, usually with slides and demos, to an audience. A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. The default time slot for each talk and Q&A is 45 minutes (we recommend 30-minute talk and 15-minute Q&A and speaker connect). A talk has one primary speaker and, optionally, a secondary speaker.<br><br>Please note that this year all presentations will be delivered in person."),
				array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. Smaller technical topics, project introductions, and research/thesis topic introductions are great topics for lightning talks.<br><br>A lightning talk is 15 minutes long. A lightning talk has one primary speaker.<br><br>All lightning talks are delivered in person."),
				array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact with the audience with the goal to share your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. As a result, workshops should be actionable and goal-oriented.<br><br>A workshop is 75 minutes long. We allow up to 2 active presenters in a workshop.<br><br>All workshops are conducted live and are not recorded or streamed."),
				array("q" => "What is a booth?", "a" => "A booth is a staffed table at the event. Booths are open to all participants at all times, and they serve as a place for conversations about the project and interaction with contributors, users, and attendees.<br><br>There must be at least one person at the booth at all times and there must be at least two staff members registered. Preference is given to booths that will run on both days."),
				array("q" => "How are decisions made during the CfP process?", "a" => "Each track/theme has a review committee of 3 - 7 members that are subject-matter experts. The process consists of multiple phases to ensure fair and thorough evaluation:<ul><li>Blind Review: Reviewers assess anonymized proposals based solely on content.</li><li>Captain Review: Track captains prioritize talks, ensuring a mix of topics and experience levels.</li><li>Final Selection: The CfP Committee makes final decisions, prioritizing sessions across all tracks holistically, and preparing speaker notifications.</li></ul><br><br>Decisions are based on content quality, alignment with track themes, diversity in difficulty levels, and speaker experience. Since DevConf events are organized globally, we prioritize speakers from the same region as the event. For DevConf.IN, that includes Asia and the Pacific region.<br><br>During the review process, track captains may move your session to another track without prior notification. They can also contact you and suggest changing the session format, combining talks, or identifying potential keynotes."),
				array("q" => "What is the maximum number of submissions one person can submit?", "a" => "To ensure high-quality proposals and efficiently streamline the review process for our CfP Review Committee, each individual is limited to submitting up to three proposals in total. This limit includes all submission types (talks, lightning talks, workshops, meetups, activities, and booths). If you are listed as a co-speaker on any submission, it will count toward your individual limit."),
				array("q" => "What is the maximum number of speakers allowed per session?", "a" => "To ensure a high-quality schedule featuring a broad range of topics and speakers, we are setting a limit of two speakers per submission. This limit includes all submission types (talks, lightning talks, workshops). For booths, you can only submit up to two contact people in your proposal. However, it is allowed and expected that there is a larger number of staffers onsite. Exceptions may be considered for panel discussions or other collaborative formats. If you require more than two speakers, please provide the reason in the 'Notes' section of your proposal."),
			)),
			
		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array(
		    	array("q" => "What internet connection is provided at the venue?", "a" => "As a speaker, you will have Wi-Fi access in the room where you are presenting."),
		    	array("q" => "Will my talk be recorded?", "a" => "Yes, all talks (excluding workshops and meetups) will be recorded and made available on our <a href='https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg' target='_blank'>YouTube channel</a> after the event."),
		    	array("q" => "Do I need to upload my session slides? Is there a deadline?", "a" => "Yes, please upload your slides to our <a href='https://pretalx.devconf.info/devconf-in-2026/cfp' target='_blank'>CfP platform</a> by signing in and updating your session. We recommend publishing your slide deck and any other relevant materials before your session starts to ensure attendees can access them in advance."),
		    	array("q" => "Is extra time allocated for Q&A?", "a" => "No, your talk time already includes Q&A. For example, if you have a 45-minute session, plan to leave 5-10 minutes for audience questions. Once your time is up, even if Q&A was brief, you must leave the room to allow the next speaker to set up. Follow-up discussions can continue in the hallway.<br><br>Each room will have a volunteer to assist with timing. They will display countdown cards as you near the end of your talk and can introduce you if desired."),
		    	array("q" => "Do you provide meals for speakers?", "a" => "Yes, we will be providing meals for our speakers. Further details regarding speaker catering will be shared directly with them closer to the event. Please note that all meals served at the venue are indian vegetarian."),
		    	array("q" => "Is financial support available for speakers?", "a" => "No, we do not cover travel or accommodation expenses for speakers."),
		)),
		
		array("group" => "Sponsorships and Community Presence", "id" => "sponsors", 
			"questions" => array(
		    	array("q" => "Can my company or organization financially sponsor DevConf events?", "a" => "DevConf conferences are Red Hat-sponsored events, and we do not accept external financial sponsorships or paid advertising. Our goal is to maintain a community-focused, non-commercial atmosphere that prioritizes open source education and collaboration."),
		    	array("q" => "If you don’t have sponsors, how can my project or organization be represented?", "a" => "While we do not offer paid commercial sponsorships, we provide two main non-monetary avenues for open-source projects, user groups, and communities to gain visibility:<ol><li>Showfloor booths: We host a dedicated Showfloor at the venue specifically for showcasing open-source technologies, projects, and community initiatives. Projects can apply for a community booth through our CfP process to demonstrate software, engage with attendees, and share their mission in person.</li><li>2. Digital Community Partnerships: Local user groups, meetups, student networks, and open-source communities can apply to become an official Community Partner. This promotional exchange offers website logo recognition, joint social media promotion across LinkedIn and Instagram, and inclusion in our year-round community network.</li></ol>"),
		    	array("q" => "How do I apply for a booth on the showfloor?", "a" => "Much like our speaking sessions, booths are reviewed and accepted through our Call for Proposals. We welcome submissions from upstream projects, non-profit organizations, and community groups. Because space at the venue is limited, our committee reviews all proposals to ensure the content is relevant and valuable to our technical audience."),
		    	array("q" => "What are the requirements for a booth?", "a" => "The most important rule is that booths must focus on open source technology and community engagement, not commercial products or sales pitches. Your proposal should outline what technology you will be showcasing and how you plan to interact with the attendees (e.g., live demos, hardware displays, or interactive tutorials)."),
		    	array("q" => "Is there a deadline for booth proposals?", "a" => "Yes, booth proposals follow the same timeline as our session CfP."),
		    	array("q" => "What is a Community Partnership?", "a" => "A Community Partnership is a non-monetary, promotional collaboration between DevConf.IN and local tech communities, user groups, student networks, and open-source organizations. Our goal is to work together to amplify open-source initiatives, share knowledge, and grow the regional developer ecosystem."),
		    	array("q" => "What does DevConf.IN provide to Community Partners?", "a" => "As an official Community Partner, your group receives:<ul><li>Official Partner Kit: Ready-to-use graphics, banner images, social media templates, and email copy to make sharing effortless.</li><li>Website Recognition: Your logo listed on the official DevConf.IN website as a Community Partner.</li><li>Social Media Amplification: Dedicated shout-outs and cross-promotional posts featuring your community across our official LinkedIn and Instagram handles.</li><li>Future Collaboration: Inclusion on our priority list for early outreach, CfP updates, and partnership opportunities for future DevConf events.</li></ul>"),
		    	array("q" => "What is expected of a Community Partner?", "a" => "We ask our partners to help spread awareness about DevConf.IN within their networks by:<ul><li>Sharing event announcements (ticket registrations and call for proposals) across your communication channels (Slack, WhatsApp, mailing lists, or social media).</li><li>Promoting DevConf.IN during your virtual or in-person events.</li><li>Encouraging your members to attend and contribute to open source.</li></ul>"),
		    	array("q" => "Are Community Partners required to attend or submit talks?", "a" => "No, community partners are encouraged to participate, but there are no mandatory quotas for talk submissions or registrations."),
		    	array("q" => "How can your group apply to become a Community Partner?", "a" => "Simply email our team at info@devconf.in with your group’s name, social links, and primary point of contact."),
		    	array("q" => "Do Community Partners receive special event perks, guaranteed registrations, or extra swag?", "a" => "No. Community Partnerships are strictly promotional and awareness-driven exchanges. To maintain fairness for all community members and adhere to venue capacity limits, partnerships do not include guaranteed ticket allocations, reserved swag, or special onsite recognition. All partner members and leaders must register through the standard attendee registration process."),
		)),
			
			array("group" => "Matrix questions", "id" => "matrix", 
			"questions" => array( 
				array("q" => "What is Matrix?", "a" => "A Matrix server is a communication platform. It supports many methods of communication, including text, voice, and video streaming. Matrix is an open standard for interoperable, decentralized, real-time communication over IP. Learn more at <a href='https://matrix.org/faq/' target='_blank'>https://matrix.org/faq/</a>."),
                array("q" => "How do I join?", "a" => "Open <a href='https://matrix.to/#/#2025.in:devconf.cz' target='_blank'>https://matrix.to/#/#2025.in:devconf.cz</a> to get started."),
                array("q" => "I don't have a Matrix account.", "a" => "Matrix servers are all federated. This means you can use another Matrix server account on the DevConf server. For this reason we don’t offer direct user registration.</p><p>Many online and open source communities host Matrix servers and offer accounts. You can also self-host. Here are some places to get an account:</p><ul><li>matrix.org - A server provided by the Matrix Foundation</li><li>Your community's server if you plan to use the account as a contributor, not just during DevConf events (e.g. Fedora, Mozilla etc.)</li><li>You can also find a potentially helpful list of public servers at <a href='https://joinmatrix.org/servers/' target='_blank'>https://joinmatrix.org/servers/</a></li><li>Another option is to host or self-host your own server. For more information, visit <a href='https://matrix.org/hosting/' target='_blank'>https://matrix.org/hosting/</a> or <a href='https://github.com/spantaleev/matrix-docker-ansible-deploy' target='_blank'>https://github.com/spantaleev/matrix-docker-ansible-deploy</a></li></ul><p>While creating an account, you will be asked to choose a client and you can choose the client based on your preferences. We recommend using <a href='https://element.io/download' target='_blank'>Element</a> because it supports all features we use at DevConf events, such as  “spaces”, “threads” and “pinned events”."),
                array("q" => "Can I use my existing Matrix account?", "a" => "Absolutely! DevConf rooms are public and <a href='https://matrix.org/faq/#what-does-federated-mean%3F' target='_blank'>federated</a>, which means you can use your existing account to join. Open <a href='https://matrix.to/#/#2025.in:devconf.cz' target='_blank'>https://matrix.to/#/#2025.in:devconf.cz</a> to get started."),
                array("q" => "Will the server stay online indefinitely, or just for the duration of the conference?", "a" => "The server will be online for the duration of the conference. We believe Matrix offers the best possible solution for mixing local and remote attendees, and we have already invested significant effort into its implementation. While we cannot guarantee its continued availability beyond the conference, we are committed to exploring Matrix as a long-term communication solution. Your feedback and experience will be valuable in shaping our future decisions.</p><p>Because Matrix is decentralized and users registered on other servers, you’ll remain able to connect with each other via direct messages and other chat rooms even if our server is taken offline."),
                array("q" => "What Matrix client(s) can I use?", "a" => "In theory, any client should allow you to join the devconf.cz rooms. However, not all clients support all features, #2025.in:devconf.cz for example takes advantage of “spaces”, “threads” or “pinned events”. If your client does not support these features, you may not have the optimal experience. We recommend using <a href='https://element.io/download' target='_blank'>Element</a>, because it supports all features we use."),
                )),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.IN?  Do I need to register?", "a" => "Admission to DevConf.IN is free and only requires that you register for a free ticket."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.IN.")
			)));
?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row mt-3">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to bring the DevConf India chapter back, this time in Pune!</div>
    </div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<?php   foreach($questions as $q){
					echo '<a href="#' . $q['id'] . '">' . $q['group'] . '</a>';
				}
			?>
		</div>
	</div>
</section>
<hr>
<?php
foreach($questions as $q){
?>
<section id="<?php echo $q['id']; ?>" class="mx-auto col-lg-11 mb-5">
	<div class="row">
		<div class="h2 mx-5 my-4 mont-700"><?php echo $q['group']; ?></div>

		<div class="accordion w-100 mx-5" id="sub-<?php echo $q['id']; ?>">
		<?php foreach( $q['questions'] as $id => $value ){ ?>
			<div class="card">
				<div class="card-header collapsed mont-600" id="heading-<?php echo $q['id'] . $id; ?>" data-toggle="collapse" 
				     data-target="#collapse-<?php echo $q['id'] . $id; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $q['id'] . $id; ?>">
						<?php echo $value['q']; ?>
						<i class="fa"></i>
					
				</div>

				<div id="collapse-<?php echo $q['id'] . $id; ?>" class="collapse" aria-labelledby="heading-<?php echo $q['id'] . $id; ?>" data-parent="#sub-<?php echo $q['id']; ?>">
					<div class="card-body os-400">
						<?php echo $value['a']; ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<?php
}
?>
@endsection

@include('_layouts.footerin')
