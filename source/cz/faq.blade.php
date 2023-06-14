@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.cz | Brno, Czechia">
<meta property="og:site_name" content="DevConf.cz">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>FAQ - DevConf.CZ</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/cz"><img src="/assets/images/devconf-logo-cz-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/cz/" class="nav-link">Home</a>
				</li>
<!--				<li class="nav-item active px-3">
					<a href="/cz/aroundbrno" class="nav-link">Getting around Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/tobrno" class="nav-link">Getting to Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/hotels" class="nav-link">Hotels</a>
				</li> -->
                <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link">Blog</a>
                </li>
				<li class="nav-item active underline px-3">
					<a href="/cz/faq" class="nav-link">FAQ</a>
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
/*                array("q"=>"What is DevConf.cz Mini?", "a"=>"DevConf.cz Mini is a bi-annual, highly focused, local, in-person version of DevConf.cz. It offers an opportunity to return to our conference themes in a smaller setting and establishes a platform for the Czech Republic and EMEA based community to sync, share and hack on upstream projects together."),
                array("q"=>"What will happen to the main event? Is it going to take place in January 2023?", "a"=>"We plan to organize the DevConf.CZ main event every year. The dates will be announced later this year."),
                array("q"=>"Is there a Call for Proposals for DevConf.cz Mini?", "a"=>"No. We're working with the pool of speakers who were not able to present their talk at DevConf.cz main event in January."),
                array("q"=>"When will you publish the schedule for DevConf.cz Mini?", "a"=>"We're working hard on creating a list of engaging talks. The schedule will be published in October."),
                array("q"=>"When will you open registration for DevConf.cz Mini?", "a"=>"We plan to open registration in October."),
                array("q"=>"Will you be streaming DevConf.cz Mini content live?", "a"=>"No, however, we will record the content and publish it on our YouTube channel afterwards."),
				array("q" => "Are the talks recorded or live-streamed?", "a" => "We give speakers choice to speak live or send us a pre-recorded session. Consider what would work best for your session goals.<ul><li>Pre-recorded session and live Q&A - during the session speaker interacts with audience in chat</li><li>Pre-recorded first half, second half live with the audience interaction</li><li>Live session - speaker can recruit their colleagues to help them out with the audience interaction</li></ul>"),
                array("q" => "What does a hybrid format mean? What is my experience going to be in-person? What about virtually?", "a" => "DevConf.CZ 2022 is going to be held on Jan 28-29, 2022 as a hybrid event with a shared in-person and virtual component during Central European Time. This way we can ensure that everyone who wishes to participate is able to do so. Obviously, this decision will continue to be evaluated as travel conditions change.</p><p>The virtual component of the conference will be hosted on our event platform: <a href=”https://hopin.com/” target=”_blank”>https://hopin.com/</a></p><p>The in-person component of the conference will be held at FIT VUT in Brno, Czech Republic: <a href=”https://www.fit.vut.cz/” target=”_blank”>https://www.fit.vut.cz/</a>."),
                array("q" => "Will you switch to in-person only or virtual only?", "a" => "Since event and travel conditions keep changing locally, we reserve the right to cancel the in-person component of the event due to Covid-related issues. We plan to make the final reevaluation of the hybrid format on December 22. We advise against non-refundable travel purchases before this date."),*/
                array("q" => "What is the difference between DevConf.CZ and DevConf.cz Mini conferences?", "a" => "DevConf.cz main event is an annual 3-day conference for developers, admins, DevOps engineers, testers, documentation writers and other contributors to open source technologies. The event is held in Brno and welcomes speakers and attendees from all over the world.</p><p>In addition to the annual conference, we established a new DevConf.cz event series in 2022: DevConf.cz Mini conferences.</p><p>DevConf.cz Mini conferences are highly focused, local, in-person versions of DevConf.cz main event. They offer an opportunity to return to our conference themes in a smaller setting. They are one-day events and speakers and attendees are typically local to Brno or able to easily travel."),
                array("q" => "How can I submit a proposal to DevConf.cz or DevConf.cz Mini conference?", "a" => "You can find all currently open devconf-related CfPs here: <a href='https://cfp.devconf.info' target='_blank'>https://cfp.devconf.info</a>. We also updated the events timeline on our <a href='/cz'>website</a>."),
                array("q" => "What are the in-person attendance guidelines?", "a" => "We have to comply with the appropriate government regulations in this area. You can find the latest Covid regulations here: <a href='https://covid.gov.cz/en/' target='_blank'>https://covid.gov.cz/en/</a>."), 
                array("q" => "Do I need proof of vaccination or a negative test in order to attend in person?", "a" => "You should be prepared to meet all appropriate government regulations for the duration of your visit to Brno."),
                array("q" => "Will you provide masks or tests?", "a" => "No. You should be prepared to meet all appropriate government regulations for the duration of your visit to Brno."),
//                array("q" => "What if I don't want to wear a mask or provide proof I am COVID free?", "a" => "We have to comply with the appropriate government regulations in this area and do not get to decide arbitrarily. Therefore we are unable to accommodate your request. Plan to attend virtually."),
                array("q" => "Where can I find the latest information regarding travel conditions to the Czech Republic?", "a" => "You can find the latest Covid regulations here: <a href='https://covid.gov.cz/en/' target='_blank'>https://covid.gov.cz/en/</a>.")
//                array("q" => "This conference was announced as a hybrid event. Why did you switch to virtual?", "a" => "We decided to cancel the in-person component of the conference in light of the current situation in the Czech Republic. Taking into account the level of lockdowns and the new covid-19 variant, we believe it is the safest option to organize the conference.")
			)),
			
    array("group" => "CfP Questions", "id" => "cfp", 
			"questions" => array( 
				array("q" => "What is the format of DevConf.cz 2023? Can I speak online?", "a" => "DevConf.cz 2023 will be a <strong>hybrid event</strong>, with both in-person and virtual presence to ensure that everyone who wishes to participate is able to do so. Because of that, we're updating descriptions of different session types. Please note that this year <strong>all presentations will be delivered in person</strong>."),
				array("q" => "What is a session/talk?", "a" => "A talk is where you present, usually with slides and demos, to an audience. The default time slot for <strong>each talk and Q&A is 35 minutes</strong> (we recommend 25-minute talk and 10-minute Q&A). <strong>A talk has one primary speaker</strong> and, optionally, a secondary speaker. Consider recruiting your colleagues to interact with people online while you are talking live at the conference.</p><p>A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be independent so that they do not need to be presented in a specific order.</p><p>If you require more than 35 minutes to cover a certain topic, there is an option to submit a two-part session (two 35-minute time slots with a 10-minute break in between) where we guarantee the order in the schedule. You should consider that different audiences may join each part and tailor the content accordingly. This option is recommended for deep technical dives that include a demo. You will be asked to specify why you require more time, each case will be evaluated individually.</p><p>Please note that this year <strong>all presentations will be delivered in person</strong>. We plan to stream talks online and make sure in-person as well as online audiences can participate in Q&A and chat."),
                array("q" => "What is a discussion?", "a" => "A discussion is where you lead/moderate a conversation with a group of knowledgeable panelists who answer prepared questions or questions from the audience. You should be prepared to moderate questions for appropriateness to your topic and session goal. It is an interactive session and you're asked to engage with the audience during the session.</p><p><strong>A discussion is 35 minutes long</strong>. A discussion has a <strong>dedicated moderator and up to 3 active speakers</strong>.</p><p><strong>All discussions are delivered in person.</strong> We plan to stream content online and make sure in-person as well as online audiences can participate in Q&A and chat."),
                array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. Smaller technical topics, project introductions, and research/thesis topic introductions are great topics for lightning talks.</p><p><strong>A lightning talk is 15 minutes long.</strong> A lightning talk has one primary speaker.</p><p><strong>All lightning talks are delivered in person.</strong> We plan to stream content online and make sure in-person as well as online audiences can participate in chat."),
                array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact with the audience with the goal to share your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. As a result, workshops should be actionable and goal-oriented.</p><p><strong>A workshop is 80 minutes long.</strong> We allow up to <strong>3 active presenters</strong> in a workshop. You must designate one of them to be the primary session leader.</p><p><strong>All workshops are conducted live and are not recorded or streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
                array("q" => "What is a meetup?", "a" => "Meetups are organized as in-person meetings. They are open to all participants, and they serve as a place for open discussions during the dedicated time, sharing the latest project developments and interaction with contributors and attendees.</p><p><strong>A meetup is 80 minutes long.</strong> We allow up to <strong>3 active presenters</strong> in a meetup. You must designate one of them to be the primary session leader.</p><p><strong>All meetups are conducted live and are not recorded nor streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
                array("q" => "What is a booth?", "a" => "A booth is a staffed table at the event. Booths are open to all participants at all times, and they serve as a place for conversations about the project and interaction with contributors, users, and attendees.</p><p>There must be <strong>at least one person at the booth at all times</strong> and there must be <strong>at least two staff members registered.</strong> Preference is given to booths that will run all three days."),
                array("q" => "What is an activity?", "a" => "Activities are organized as non-technical meetups. They are open to all participants, and they serve as a great place to engage with other attendees outside of the hallway track and conference sessions. They usually center around various hobbies and interests. We hosted a candy swap session, a coffee lovers meetup, and a yoga session in past.</p><p><strong>An activity is either 35 or 80 minutes long. An activity has one primary lead</strong> and, optionally, a secondary session leader.</p><p><strong>All activities are conducted live and are not recorded nor streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
                array("q" => "How to get to Brno?", "a" => "You can find travel guidelines <a href='/cz/tobrno/'>here</a>."),
//				array("q" => "It's after the deadline and I haven't received an acceptance notification. What do I do?", "a" => "We receive an amazingly large number of high quality submissions. Our track teams that review the talks have to work a lot to read and decide on them all. We have expect to send out the first round of acceptances around November 30, 2020."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.CZ?  Do I need to register?", "a" => "Admission to DevConf.CZ is free and only requires that you register for a free ticket."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.CZ."),
				array("q" => "Can I register on-site?", "a" => "There are a small number of tickets reserved for on-site registration. On-site registration is identical to internet registration in terms of cost (free!) and in terms of what information is asked for. You are <strong>strongly</strong> encouraged to register online when we open online registration to both save time when you arrive and to prevent you from being turned away because we are at capacity."),
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array(
                //array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, you can set the co-speaker by yourself in CfP tool until the end of the CfP open window. If you'd like to add a co-speaker to a submission or an accepted session, no worries! Please email us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> with your update."),
				//array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don't have a preference or don't have one already, just provide any email address you read and we will do the rest."),
              //  array("q" => "Are the talks recorded or live-streamed?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and possibly via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
                //array("q" => "Are there any video recording guidelines?", "a" => "Yes! We are putting together steps on how to record an awesome video with the open source software OBS. The steps can be found <a href='https://github.com/devconfcz/virtual-presentations/blob/master/Recording.md' target='_blank'>here</a>. If you're struggeling with OBS software, you can reach to us at <a hrefr='mailto:speakers@devconf.cz'>speakers@devconf.cz</a> mailing list. "),
               // array("q" => "How should I submit the pre-recorded video?", "a" => "We recommend uploading the video to YouTube as unlisted. Once you have uploaded your video, go to 'accepted proposals' on the <a href='https://cfp.devconf.info/acceptedproposals/37'>CfP site</a> to submit the link to your recorded video.<br><br> If you would prefer to not to use YouTube, send the organizers an email at <a href='mailto:speakers@devconf.cz'>speakers@devconf.cz</a> and we will work with you to figure out alternate options."),
               // array("q" => "What is the DevConf.CZ virtual platform?", "a" => "We're hosting the event on hopin.com."),
               // array("q" => "Can I test the virtual environment in advance?", "a" => "We will be hosting a test event one week before the conference on our event platform, hopin.com. Speakers are encouraged to join the test event to test out their audio, video, and screen sharing setup. We will share further details with speakers directly."),
   				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.CZ and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.CZ, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by beginning of May, with the expectation that they will schedule practice sessions between May 8 and June 2.<br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck.<br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
				array("q" => "Is there a recommended slide deck I can use?", "a" => "You can use any presentation slide deck you wish. We also put together a DevConf.CZ slide deck template in <a href=\"/assets/files/devconf-cz-template-16-9.odp\">16:9</a> and <a href=\"/assets/files/devconf-cz-template-4-3.odp\">4:3</a> format for your convenience."),
				array("q" => "Are there any tips and tricks for composing and delivering a successful talk at DevConf.CZ?", "a" => "To assist you with producing your talk, we are collecting a list of suggestions for both virtual and in-person speakers in the <a href='/cz/speakerguide/' target='_blank'>speaker guide</a>."),
				array("q" => "What kind of project/speakers/audio-visual equipment do you provide?", "a" => "Every session room will have a projector that should accept most common display technologies. <strong>If you do not have an HDMI port on your laptop, please bring an adapter to ensure you can connect.</strong>  While we will try to have a full suite of display adapters, new versions seem to appear every day. Please have practiced plugging your laptop into an external display and setting your mirroring/speaker mode as you like it. You know your computer best.<br><br>We will also have a microphone in all rooms where recording is taking place. Please use the microphone and don't forget to repeat questions."),
				array("q" => "What else should I know as a speaker?", "a" => "Your talk is scheduled with the Question and Answer time included. This means, for example, if you have a 25 minute talk, you should plan to leave 5 minutes for Q&A. After your time has expired, even if you only had a short Q&A you will need to leave the room and continue conversations in the hallway to ensure the next speaker has full use of their time.<br><br>Each room will have a session chair to help with timing. They will show you cards when you are getting close to running out of time. They will also assist you with setting up your talk and provide you with a brief introduction, if you wish."),
				array("q" => "What should I know if I lead a workshop?", "a" => "Bandwidth is shared by everyone and we occasionally experience issues with wifi due to overload which is beyond our power to fix. Please, prepare to switch from workshop to hands-on or guided tour in this case, meaning you solely will have access to the internet."),
				array("q" => "Does DevConf.cz cover any speaker expenses? Is there any speaker sponsorship?", "a" => "DevConf.cz offers speaker sponsorship that covers accepted speakers' accommodation in our partner hotels for up to 3 nights during the conference. We do not cover travel expenses. In order to apply for speaker sponsorship, speakers should indicate they require accommodation in the confirmation form once they receive acceptance letters."),
		)),

        array("group" => "Matrix questions", "id" => "matrix", 
			"questions" => array( 
				array("q" => "What is Matrix?", "a" => "A Matrix server is a communication platform. It supports many methods of communication, including text, voice, and video streaming. Matrix is an open standard for interoperable, decentralized, real-time communication over IP. Learn more at <a href='https://matrix.org/faq/' target='_blank'>https://matrix.org/faq/</a>."),
                array("q" => "What is the DevConf.cz Matrix server for?", "a" => "We're using Matrix at DevConf.cz 2023 to enhance communication and collaboration during the conference. It provides virtual rooms that correspond to each physical room at the event. These rooms:</p><ul><li>Facilitate seamless communication for local and remote attendees.It provides virtual rooms that correspond to each physical room at the event.</li><li>
Allow attendees to actively participate in Q&A by submitting and upvoting questions.</li><li>Keep attendees informed with important announcements and updates related to the conference.</li></ul><p>It's hosted by the Red Hat OSPO (Open Source Program Office) team.</p><p>By leveraging the DevConf.cz Matrix server, we aim to create an interactive and inclusive conference experience for all participants."),
                array("q" => "How do I join?", "a" => "Open <a href='https://matrix.to/#/#2023:devconf.cz' target='_blank'>https://matrix.to/#/#2023:devconf.cz</a> to get started."),
                array("q" => "I don't have a Matrix account.", "a" => "Matrix servers are all federated. This means you can use another Matrix server account on the DevConf.CZ server. For this reason we don’t offer direct user registration.</p><p>Many online and open source communities host Matrix servers and offer accounts. You can also self-host. Here are some places to get an account:</p><ul><li>matrix.org - A server provided by the Matrix Foundation</li><li>Your community's server if you plan to use the account as a contributor, not just during DevConf.cz (e.g. Fedora, Mozilla etc.)</li><li>You can also find a potentially helpful list of public servers at <a href='https://joinmatrix.org/servers/' target='_blank'>https://joinmatrix.org/servers/</a></li><li>Another option is to host or self-host your own server. For more information, visit <a href='https://matrix.org/hosting/' target='_blank'>https://matrix.org/hosting/</a> or <a href='https://github.com/spantaleev/matrix-docker-ansible-deploy' target='_blank'>https://github.com/spantaleev/matrix-docker-ansible-deploy</a></li></ul><p>While creating an account, you will be asked to choose a client and you can choose the client based on your preferences. We recommend using <a href='https://element.io/download' target='_blank'>Element</a> because it supports all features we use at DevConf.cz, such as  “spaces”, “threads” and “pinned events”."),
                array("q" => "Can I use my existing Matrix account?", "a" => "Absolutely! #2023:devconf.cz rooms are public and <a href='https://matrix.org/faq/#what-does-federated-mean%3F' target='_blank'>federated</a>, which means you can use your existing account to join. Open <a href='https://matrix.to/#/#2023:devconf.cz' target='_blank'>https://matrix.to/#/#2023:devconf.cz</a> to get started."),
                array("q" => "Will the server stay online indefinitely, or just for the duration of the conference?", "a" => "The server will be online for the duration of the conference. We believe Matrix offers the best possible solution for mixing local and remote attendees, and we have already invested significant effort into its implementation. While we cannot guarantee its continued availability beyond the conference, we are committed to exploring Matrix as a long-term communication solution. Your feedback and experience will be valuable in shaping our future decisions.</p><p>Because Matrix is decentralized and users registered on other servers, you’ll remain able to connect with each other via direct messages and other chat rooms even if our server is taken offline."),
                array("q" => "What is the main platform for chat communication?", "a" => "The main platform for chat communication at DevConf.cz 2023 has transitioned from Telegram and Discord to Matrix.</p><p>Matrix offers a more open, federated, and extensible communication ecosystem that aligns better with our goals of fostering collaboration and adhering to open-source principles. We believe this shift will enhance the overall experience and accessibility for our local and remote attendees. We encourage you to join us on Matrix for all chat-related discussions during the event.</p><p>While we are moving away from Telegram and Discord, we have not closed off any options yet and remain committed to finding the best platform to communicate with all attendees."),
                array("q" => "What Matrix client(s) can I use?", "a" => "In theory, any client should allow you to join the devconf.cz rooms. However, not all clients support all features, #2023:devconf.cz for example takes advantage of “spaces”, “threads” or “pinned events”. If your client does not support these features, you may not have the optimal experience. We recommend using <a href='https://element.io/download' target='_blank'>Element</a>, because it supports all features we use."),
                array("q" => "I can't see any rooms.", "a" => "When using the <a href='https://element.io/download' target='_blank'>Element</a> client to access #2023:devconf.cz, you should see three sub-spaces: ‘General', ‘Sessions' and ‘Workshops & Meetups'. If your client does not display the spaces correctly, you should still be able to see the “Main Chat” room and all the “Sessions” and “Workshops & Meetups“ rooms when using the ‘explore’ feature. If you still can’t find any DevConf room, make sure you’re searching within the devconf.cz server."),
                array("q" => "How can I access the streamed content on Matrix?", "a" => "We plan to stream sessions such as talks, discussions, and lightning talks on Matrix. However, please note that workshops and meetups will not be streamed as they are not suitable for virtual viewing.</p><p>For the session rooms, we will provide widgets with YouTube streams. You will be able to join the session room and watch the live stream directly from the platform.</p><p>It's important to remember that workshop rooms will primarily serve as spaces for attendees and workshop organizers to communicate and share important information during the workshop. Streaming will not be available in workshop rooms."),
           //     array("q" => "", "a" => ""),
			)),

        array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
            "questions" => array(
                array("q" => "Who is eligible for diversity scholarships?", "a" => "In an effort to create a more diverse and inclusive event, Red Hat is delighted to be able to offer <a href='https://forms.gle/HrQsGGij8YdCcPSh9' target='_blank'>scholarships</a> for attending DevConf.CZ. As DevConf.CZ is the DevConf for the Europe, Middle East, and Africa region, these scholarships are only available to people from these locations. The scholarships are aiming to support students and people relatively new or returning to full-time work in technology, who don't work at Red Hat and whose employer is not able to cover their travel expenses. Applicants who work full-time in technology, need to have worked full-time in technology for less than 5 years since the time they started full-time work in technology or resumed it after a break of six months or more due to studies or personal reasons. Applicants have to be at least 18 years old."),
                array("q" => "How will diversity scholarships decisions be made?", "a" => "Decisions will be made based on applicants' experience with Red Hat-supported and other open source technologies and based on being a student or being new or returning to full-time work in technology. People who are accepted as speakers for the conference will be given some preference, but the scholarships are aiming to support both speakers and attendees."),
                array("q" => "What do diversity scholarships cover?", "a" => "The scholarships can cover requests of up to 1,000 USD for expenses such as travel, hotel, food, and child care. Conference registration is free and will open on April 24, 2023."),
                array("q" => "How do I apply for a diversity scholarship?", "a" => "Please review full eligibility criteria in the <a href='https://forms.gle/HrQsGGij8YdCcPSh9' target='_blank'>application form</a> and submit your application by 31 of March, 2023. If you have proposed a session, but would like to attend the conference regardless of whether it's accepted, you can fill out the form without waiting for the acceptance decisions. We expect to send out most acceptance decisions before April 14, but speakers whose sessions are accepted after April 14 will still have a chance to apply for diversity scholarships.")
        ))
	);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
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
						<p><?php echo $value['a']; ?></p>
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

@include('_layouts.footercz')
