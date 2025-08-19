@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Boston, USA">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contributors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>FAQ - DevConf.US</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/us"><img src="/assets/images/devconf-logo-us-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/us/" class="nav-link">Home</a>
				</li>
				<!-- <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link local">Blog</a>
                </li> -->
				<li class="nav-item active px-3">
					<a href="/us/faq" class="nav-link local">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" class="nav-link local" target="_blank">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php
	$questions = array(
		array("group" => "General Questions", "id" => "general", 
			"questions" => array( 
				array("q" => "Where on the Boston University campus is the conference held?", "a" => "The conference will be held at 43 Hawes Street, Brookline, MA 02446. Please follow the link to the <a href='https://www.bu.edu/meetatbu/campus-venues/43-hawes-street/' target='_blank'>location</a> for more information on how to get there."),
				array("q" => "Do you provide visa invitation letters?", "a" => "Yes, we can provide a visa invitation letter to accepted speakers and registered attendees. Please <a href='https://forms.gle/nr62qyM1E44Z8ubg6' target='_blank'>fill out the form</a> to request a visa invitation letter. If you need the visa invitation letter before our acceptance letters are sent out or before registration opens, specify the reason in the 'Additional Information' section of the form."),
                array("q" => "What is the official chat platform for the conference?", "a" => "We are moving our official chat communication over to Matrix. Matrix offers a more open, federated, and extensible communication ecosystem that aligns better with our goals of fostering collaboration and adhering to open-source principles. We believe this shift will enhance the overall experience and accessibility for our local and remote attendees. We encourage you to join us on Matrix for all chat-related discussions during the event. Telegram and Discord channels will be deprecated."),
                
                array("q" => "Are there any recommended hotels to stay near the venue?", "a" => "Yes, you can find a list of recommended hotels <a href='https://www.devconf.info/us/hotels/' target='_blank'>here</a>."),
                array("q" => "Do you provide parking at the venue?", "a" => "No, we do not offer any parking. We highly recommend using public transportation instead of arriving by car. If you arrive by car, you can use various street parking or Longwood Towers Garage at 20 Chapel Street."),
                array("q" => "What food and drink options are available at the venue?", "a" => "We'll have coffee, water, and a light lunch available for all attendees. Additionally, there are many other options available nearby on Beacon Street."),
                array("q" => "Is there Wi-Fi available at the venue?", "a" => "Yes, we have a dedicated network for all conference attendees. Credentials will be shared with all registered participants shortly before the event</p><p>Please be considerate of your fellow attendees and limit your Wi-Fi usage to essential communication. Avoid streaming movies, downloading large files, or other bandwidth-heavy activities, as the network is shared by everyone.")
                )),
		
		array("group" => "CfP Questions", "id" => "cfp", 
			"questions" => array( 
				array("q" => "What is a session/talk?", "a" => "A talk is where you present, usually with slides and demos, to an audience. The default time slot for <strong>each talk and Q&A is 35 minutes</strong> (we recommend 25-minute talk and 10-minute Q&A). <strong>A talk has one primary speaker</strong> and, optionally, a secondary speaker. Consider recruiting your colleagues to interact with people online while you are talking live at the conference.</p><p>A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be independent so that they do not need to be presented in a specific order.</p><p>Please note that this year <strong>all presentations will be delivered in person</strong>."),
                array("q" => "What is a discussion?", "a" => "<strong>A discussion</strong> is a bit where <strong>you lead/moderate a discussion with a group of knowledgeable panelists</strong> where they answer prepared questions or questions from the audience as selected by you for appropriateness to your topic and session’s goal. It is more interactive than a talk because you could engage with the audience during the session. If you are willing to open the discussion to attendees, consider holding a fishbowl discussion where you start with a group of speakers and an empty “seat” which could be filled by active audience members in the course of a discussion.</p><p>A discussion is <strong>35 minutes long</strong>. If speakers wish to continue after the 35-minute slot, there will be a dedicated place for it. A discussion has a dedicated moderator and <strong>up to 5 active speakers</strong></p><p>Please note that this year <strong>all presentations will be delivered in person</strong>."),
				array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. Smaller technical topics, project introductions, and research/thesis topic introductions are great topics for lightning talks.</p><p><strong>A lightning talk is 10 minutes long.</strong> A lightning talk has one primary speaker.</p><p><strong>All lightning talks are delivered in person.</strong> We plan to stream content online and make sure in-person as well as online audiences can participate in chat."),
				array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact with the audience with the goal to share your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. As a result, workshops should be actionable and goal-oriented.</p><p><strong>A workshop is 80 minutes long.</strong> We allow up to <strong>3 active presenters</strong> in a workshop. You must designate one of them to be the primary session leader.</p><p><strong>All workshops are conducted live and are not recorded by default.</strong>"),
                array("q" => "What is a meetup?", "a" => "Meetups are organized as in-person meetings. They are open to all participants, and they serve as a place for open discussions during the dedicated time, sharing the latest project developments and interaction with contributors and attendees.</p><p><strong>A meetup is 80 minutes long.</strong> We allow up to <strong>3 active presenters</strong> in a meetup. You must designate one of them to be the primary session leader.</p><p><strong>All meetups are conducted live and are not recorded.</strong>."),
				array("q" => "What is a booth?", "a" => "A booth is a staffed table at the event. Booths are open to all participants at all times, and they serve as a place for conversations about the project and interaction with contributors, users, and attendees.</p><p>There must be <strong>at least one person at the booth at all times</strong> and there must be <strong>at least two staff members registered.</strong> Preference is given to booths that will run all three days."),
				array("q" => "Where is the schedule? When will the schedule be ready?", "a" => "We will release the schedule in July 2025."),
				array("q" => "When should I expect to receive an acceptance notification by?", "a" => "We receive a large number of high quality submissions. We plan to send out acceptances by June 2025."),
				array("q" => "How do I write a good proposal?", "a" => "We have put together a <a href='/assets/files/devconfUS-cfp-help.pdf'>document</a> with guidelines on how to write a good proposal."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.US?  Do I need to register?", "a" => "Admission to DevConf.US is free and only requires that you register. Registration details will be available by July 2025."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.US."),
				array("q" => "Can I register on-site?", "a" => "There are a small number of tickets reserved for on-site registration. On-site registration is identical to internet registration in terms of cost (free!) and in terms of what information is asked for. You are strongly encouraged to register online when we open online registration to both save time when you arrive and to prevent you from being turned away because we are at capacity.")
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array( 
				array("q" => "Why doesn’t my Pretalx account work even though I spoke at DevConf events in 2024?", "a" => "Starting in 2025, we are using a self-hosted instance of Pretalx. In 2024, we tested the platform using a paid version, but we have since switched to self-hosting. If you're a returning speaker, you'll need to create a new account. You can access all DevConf CfPs at <a href=\"https://pretalx.devconf.info\" target=\"_blank\">pretalx.devconf.info</a>."),
				array("q" => "Can I present virtually?", "a" => "All speakers are required to give their presentation in-person in Boston."),
				array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, please indicate on the CfP submission if you'll be co-presenting.  If you'd like to add a co-speaker to a submission or an accepted session, no worries!  Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with your update."),
				array("q" => "Is there a recommended slide deck I can use?", "a" => "You can use any presentation slide deck you wish. We also put together a DevConf.US slide deck template in 16:9 format (<a href=\"/assets/files/devconf-us-template-16-9.odp\">odp</a> | <a href=\"https://docs.google.com/presentation/d/1a_DWuRJNZO94D_32zv-SYrFMwI1ma_WedQzd3B4NFxA/edit?usp=sharing\">Google Slides</a>) for your convenience."),
				array("q" => "Are there any tips and tricks for composing and delivering a successful talk at DevConf.US?", "a" => "To assist you with producing your talk, we are collecting a list of suggestions for both virtual and in-person speakers in the <a href='/us/speakerguide/' target='_blank'>speaker guide</a>."),
				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.US and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.US, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide/' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by mid June 2025, with the expectation that they will schedule practice sessions between mid July 2025 and early September 2025. <br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck. <br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on our YouTube channel after the conference. If this is a problem, please contact us at <a href='mailto:info@devconf.us'>info@devconf.us</a> as soon as possible so we can determine if we can accommodate your request."),
			)),
			
			array("group" => "Matrix Questions", "id" => "matrix", 
			"questions" => array( 
				array("q" => "What is Matrix?", "a" => "A Matrix server is a communication platform. It supports many methods of communication, including text, voice, and video streaming. Matrix is an open standard for interoperable, decentralized, real-time communication over IP. Learn more at <a href='https://matrix.org/docs/chat_basics/matrix-for-im/'>https://matrix.org/docs/chat_basics/matrix-for-im/</a>"),
				array("q" => "How do I join?", "a" => "Open <a href='https://matrix.to/#/#main.us:devconf.cz'>https://matrix.to/#/#main.us:devconf.cz</a> to get started."),
				array("q" => "I don't have a Matrix account.", "a" => "Matrix servers are all <a href='https://matrix.org/faq/#what-does-federated-mean%3F' target='_blank'>federated</a>. This means you can use another Matrix server account on the DevConf.CZ server. For this reason, we don’t offer direct user registration.</p><p>Many online and open-source communities host Matrix servers and offer accounts. You can also self-host. Here are some places to get an account:<ul><li>matrix.org - A server provided by the Matrix Foundation</li><li>Your community's server if you plan to use the account as a contributor, not just during DevConf.cz (e.g. Fedora, Mozilla etc.)</li><li>You can also find a potentially helpful list of public servers at <a href='https://joinmatrix.org/servers/' target='_blank'>https://joinmatrix.org/servers/</a></li><li>Another option is to host or self-host your own server. For more information, visit <a href='https://matrix.org/hosting/' target='_blank'>https://matrix.org/hosting/</a> or <a href='https://github.com/spantaleev/matrix-docker-ansible-deploy' target='_blank'>https://github.com/spantaleev/matrix-docker-ansible-deploy</a></li></ul></p><p>While creating an account, you will be asked to choose a client, and you can choose the client based on your preferences. We recommend using <a href='https://element.io/download' target='_blank'>Element</a> because it supports all features we use at DevConf.US."),
				array("q" => "Can I use my existing Matrix account?", "a" => "Absolutely! #2025.us:devconf.cz rooms are public and <a href='https://matrix.org/faq/#what-does-federated-mean%3F' target='_blank'>federated</a>, which means you can use your existing account to join. Open <a href='https://matrix.to/#/#main.us:devconf.cz' target='_blank'>https://matrix.to/#/#main.us:devconf.cz</a> to get started."),
				array("q" => "What Matrix client(s) can I use?", "a" => "In theory, any client should allow you to join the rooms. However, not all clients support all features. DevConf.US, for example, takes advantage of “spaces”. If your client does not support this feature, you may not have the optimal experience. We recommend using <a href='https://element.io/download' target='_blank'>Element</a>."),
				array("q" => "Why are the rooms under devconf.cz domain and not a US domain?", "a" => "DevConf.CZ already tested and used Matrix as its primary communication platform for two years. Since DevConf.US is testing Matrix for the first time, the infrastructure and domains will remain unchanged for stability."),
				array("q" => "I can't see any rooms.", "a" => "When using the <a href='https://element.io/download' target='_blank'>Element</a> client to access <a href='https://matrix.to/#/#2024.us:devconf.cz'>#2024.us:devconf.cz</a>, you should see two rooms and one space: <a href='https://matrix.to/#/#devconfus-volunteers:devconf.cz'>DevConf.US Volunteers</a>, <a href='https://matrix.to/#/#day-0:devconf.cz'>Day 0 - AI Think Tank</a> and the <a href='https://matrix.to/#/#general-us:devconf.cz'>General</a> space with a sub-room <a href='https://matrix.to/#/#main.us:devconf.cz'>Main Chat US</a>. If you can’t find any DevConf rooms, make sure you’re searching within the devconf.cz server (not matrix.org or other domains)."),
			)),

		// array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
		// 	"questions" => array(
		// 		array("q"=>"How is DevConf.US encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers.  We'll be offering programs for our virtual event, also.  We will pair coaches with new speakers to help with presentation content as well as video production.  This option will be available on the acceptance notification.  More details on this and other efforts will be added to our site in the near future.")
		// )),

        // array("group" => "Attendee Coaching Questions", "id" => "attendeecoaching",
        //     "questions" => array(
        //         array("q" => "Will there be coaching for people who are new or have only attended a few technology or virtual conferences?", "a" => "Yes! When you register for the event, you will be asked whether you would like to be a coach or an apprentice and what topics you have experience in or are interested in. Coaches and apprentices will then receive their matches via email. We always get a lot of interest from people to be coached, and encourage people who have attended more than ten technology conferences to sign up as coaches. If you have attended fewer than three technology conferences, please consider signing up as an apprentice."),
        //         array("q" => "What are the goals for providing attendee coaching?", "a" => "<ol><li>Ensuring that apprentices have a friendly contact who can orient them to attending an open source technical conference. Additionally, introducing apprentices to ideas and skills that will be useful at future in-person conferences, such as how to find and participate in the hallway track.</li><li>Offering apprentices an opportunity to learn more about the topics they are interested in, be introduced to open source projects they might like to get involved in, and possibly receive advice that might be helpful for their career."),
        //         array("q" => "How does new attendee coaching work?", "a" => "Apprentices will be paired with coaches, with our best efforts being made to pair apprentices with coaches who have experience with one or more of the technical topics apprentices selected a preference for when registering. The coach will contact the apprentice prior to the conference to arrange a virtual meeting prior to attending the conference via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc) or a voice call. This meeting will give you a chance to exchange introductions, answer any questions the apprentice has as they prepare to attend the conference, learn about the apprentice's career goals, review the conference schedule together, and plan to attend some sessions together. During the conference, you will be invited to meet other apprentices and coaches.")
		// 	))
);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to be back in person with you!</div>
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

@include('_layouts.footerus')
