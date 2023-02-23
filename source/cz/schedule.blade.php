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
<script src="/assets/build/js/matchHeight.js"></script>
@endsection

@section('title')
<title>Schedule - DevConf.CZ</title>
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
<?php

    $bgs = array("Session" => "table-danger", "Session2" => "table-primary",
                 "Bughunting" => "table-active", "Workshop" => "table-success");
    $streams = array("D1"=>"https://youtu.be/AgVfF-8E36c", "D2"=>"https://youtu.be/3sfVVeT-8bI", "D3"=>"https://youtu.be/oIO6Tij7IrA");
	$schedule = array(
	    array("start"=>"14:00", "items"=>array(
    	    array("end"=>"14:15", "length"=>15, "name"=>"Check in and welcome")
    	)),
        array("start"=>"14:15", "items"=>array(
            array("end"=>"14:55", "length"=>40, "name"=>"Panel discussion", "description"=>"", "track"=>"Session", "room"=>"",
                "speakers"=>array(),
                ),
            array("end"=>"14:55", "length"=>40, "name"=>"Session", "description"=>"", "track"=>"Session", "room"=>"",
                "speakers"=>array(),
                ),
            array("end"=>"14:55", "length"=>40, "name"=>"Workshop", "description"=>"", "track"=>"Workshop", "room"=>"",
                "speakers"=>array(),
                ),
            array("end"=>"14:55", "length"=>40, "name"=>"Bughunting", "description"=>"", "track"=>"Bughunting", "room"=>"",
                "speakers"=>array(),
                )
            )
        ),
        
	);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Schedule</div>
	</div>
</section>
<hr>
<?php
foreach($schedule as $k=>$time){
?>
<section id="<?php echo $k; ?>" class="mx-auto col-lg-11 mb-5">
	<div class="row">
		<div class="h2 mx-5 my-4 mont-700"><?php echo $time['start']; ?></div>


		<?php foreach( $time['items'] as $l=>$it ){ ?>
		<div class="col-xs-12 col-sm-6 col-md-3 px-2">
			<div class="card mb-2">
				<div class="card-body <?php if(isset($it['track'])){echo $bgs[$it['track']];}else{echo "table-warning";} ?>">
				    <div class="card-title">
				        <strong><?php echo $it["name"]; ?></strong>
				    </div>
				    <div class="card-text">
				        <p><?php if(isset($it['speakers'])){foreach($it['speakers'] as $si=>$s){ if($si>0){echo ", ";} else { ?><i class="fa fa-user"></i> <?php } echo $s['name']; if(isset($s['socials'])){
                            echo " (";
                            $add = false;
				            foreach($s['socials'] as $sk=>$sv){
				            if($add){ echo " | ";
				            }else{ $add = true;
				            }?>
				            <a href="<?php echo $sv;?>" target="_blank"><i class="fa fa-<?php echo $sk;?> text-dark"></i></a>
				            <?php
				            }
				            echo ")";
				        }}} 
                        if(isset($it['room']) && $it['room'] != "" && isset($streams[$it['room']])){
                        ?>
                        <p><i class="fa fa-youtube-play"></i>&nbsp;<a class="text-decoration-none text-dark" href="<?php echo $streams[$it['room']]; ?>" target="_blank">Live stream</a></p>
                        <?php } 
                        if(isset($it['files'])){ foreach($it['files'] as $fi=>$f){ if($fi>0){echo ", "; } else { ?><p><i class="fa fa-files-o"></i>&nbsp; <?php } ?>
                        <a class="text-decoration-none text-dark" href="<?php echo $f['path']; ?>" target="_blank"><?php echo $f['name']; ?></a>
                        <?php } echo "</p>"; } ?>
						<p><i class="fa fa-clock-o"></i>&nbsp;<?php echo $it['length']; ?> minutes<?php if(isset($it['room']) && $it['room'] != "") { ?> | <i class="fa fa-map-marker"></i>&nbsp;<?php echo $it['room']; } ?>
						<?php if(isset($it['track'])) { ?> | <i class="fa fa-tag"></i>&nbsp;<?php echo $it['track']; } 
						if(isset($it['description']) && $it['description']!=""){?>
						<span  data-toggle="collapse" data-target="#it<?php echo $k.$l; ?>" aria-expanded="false" aria-controls="it<?php echo $k.$l; ?>"><i class="fa fa-chevron-down"></i></span></p> <?php } ?>
				    </div>					
				    <div class="collapse" id="it<?php echo $k.$l; ?>">
                        <div class="card-body <?php if(isset($it['track'])){echo $bgs[$it['track']];}else{echo "table-warning";} ?>">
                            <p><?php echo $it['description']; ?></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</div>
</section>
<?php
    
}
?>
<script>

    $(document).ready(function() {
        // matchHeight the contents of each .card-pf and then the .card-pf itself
        $(".row > [class*='col'] > .card .card-title").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-body").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-footer").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card").matchHeight({property: 'min-height'});

    });
</script>

@endsection

@include('_layouts.footercz')
