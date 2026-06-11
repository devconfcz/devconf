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
<title>Booths - DevConf.CZ</title>
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
				<li class="nav-item active px-3">
					<a href="/cz/aroundbrno" class="nav-link">Getting around Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/tobrno" class="nav-link">Getting to Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/faq" class="nav-link">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" target="_blank" class="nav-link">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="os-400 mx-5">
			<div class="h1 mont-700 mb-5 underline position-relative">Booths at DevConf.CZ 2026</div>
			<p>This is the list of booths you can expect at DevConf.CZ this year. Get ready for some stickers and so much more!</p>
			<p>Booths are located on the street level in D and E buildings.</p>
		</div>
	</div>
</section>
<hr>
<section class="mx-auto mt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="os-400 mx-5">
			<div class="h2 mont-700 mb-4 underline position-relative">D Building</div>
		</div>
	</div>
	<div class="row">
		<?php

			$booths_d = array(
				array("code"=>"D01", "name"=>"Red Hat", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/EDQMFRA9WJAYM7DMS8BAGPEPRHCMTEYT"),
				array("code"=>"D02", "name"=>"Canonical", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/PRQ8X3GFHXFV3TJ3RJUGW9EDSCWRQGFV"),
				array("code"=>"D03", "name"=>"openSUSE", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/PHF7E9MW78TFZ99D8P8RLUVZGHZ39Y9T"),
				array("code"=>"D04", "name"=>"Microsoft", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/8SCKXRBJTHLCNN98PTDQDQHV9C9WTUPG"),
				array("code"=>"D05", "name"=>"Fedora", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/PBPPTXUYT3ZAY8EF7X7XPMUSVAYXRXGH"),
				array("code"=>"D06", "name"=>"Pulp", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/NJK9SNQMPV3ELNVVPUUHTXAWYEVTFHGB"),
				array("code"=>"D07", "name"=>"Foreman", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/RHKXAA3WBDGDWDNQLTXMHYM7ZMTBF37Z"),
				array("code"=>"D08", "name"=>"Podman", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/PWTLUERUXFTMM7VBBYVFNXXFJTBADKWR"),
				array("code"=>"D09", "name"=>"OpenSSL", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/HZF3QMZGEPDXYLWCSJKHKZHBZNCWYWNY"),
				array("code"=>"D10", "name"=>"KubeVirt", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/7VEBEDHRYXGEJ8SMJE7CCD9ALPU9YRFR"),
			);

			foreach($booths_d as $b){ ?>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700"><a href="<?php echo $b['link'];?>" target="_blank"><?php echo $b['code'];?>: <?php echo $b['name'];?></a></div>
		</div>
		<?php } ?>
	</div>
	<div class="row mt-4">
		<div class="col-lg-10 mx-auto">
			<div style="overflow: hidden; max-height: 500px; border: 1px solid #ddd;">
				<img src="/assets/images/devconf-cz-booth-map-26.svg" alt="D Building booth map"
				     style="width: 325%; max-width: none; margin-left: -200%; margin-top: -108%;">
			</div>
		</div>
	</div>
</section>
<hr>
<section class="mx-auto mt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="os-400 mx-5">
			<div class="h2 mont-700 mb-4 underline position-relative">E Building</div>
		</div>
	</div>
	<div class="row">
		<?php

			$booths_e = array(
				array("code"=>"E01 + E02", "name"=>"Videogame history", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/9GTZKWWB7PUSUQGFT7ZVSYF7CUMG9P73"),
				array("code"=>"E03 + E04", "name"=>"3D printing &amp; open HW", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/HHCRKXTE9RLSR98BDTRUNN8GJHNUNBLG"),
				array("code"=>"E05 + E06", "name"=>"Base 48", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/NNRDTSPFVH97SRAWQFEWPYCYXVHTCGR7"),
				array("code"=>"E07", "name"=>"Grafana", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/S7G7WTKUWP8VEHZJMQQ3EHYFRPFVBMNG"),
				array("code"=>"E08", "name"=>"FreeIPA", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/HPUEAFBY3NFGNT8JS7W9WJNHSYFJEDTZ"),
				array("code"=>"E09", "name"=>"FSFE", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/LPZWFK9EC9ZQXPC7NFMSKV8AJDX9JGFF"),
				array("code"=>"E10", "name"=>"Tolgee", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/EEY8AE7MTSRL3M7U8WVRTQ3AYJGFSLXW"),
				array("code"=>"E11", "name"=>"CCAT", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/HUHL7ENAELRSM9VMGMB7ZVCFPH7BBCQD"),
				array("code"=>"E12", "name"=>"INDUSTRA", "link"=>"https://pretalx.devconf.info/devconf-cz-2026/talk/review/HG9JPENYDCNR7PPSBVFBUN8MSETXYWRA"),
			);

			foreach($booths_e as $b){ ?>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700"><a href="<?php echo $b['link'];?>" target="_blank"><?php echo $b['code'];?>: <?php echo $b['name'];?></a></div>
		</div>
		<?php } ?>
	</div>
	<div class="row mt-4">
		<div class="col-lg-10 mx-auto">
			<div style="overflow: hidden; max-height: 500px; border: 1px solid #ddd;">
				<img src="/assets/images/devconf-cz-booth-map-26.svg" alt="E Building booth map"
				     style="width: 175%; max-width: none; margin-left: -65%; margin-top: -17%;">
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
