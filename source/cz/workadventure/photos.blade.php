@extends('_layouts.noads')

@section('title')
<title>Photos from previous years!</title>
@endsection

@section('body')
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="h-100">
  <div class="container h-100">
    <h1>Photo reminders from previous years</h1>
    <div class="text-center os-400 my-3">
        <a class="mont-400 px-3 py-1 pagination" style="text-decoration: none" href="#2020">2020</a>
        <a class="mont-400 px-3 py-1 pagination" style="text-decoration: none" href="#2019">2019</a>
    </div>
    <div class="row" id="2020">
    	<h1>2020</h1>
        <?php
            $h = scandir(getcwd()."/source/assets/images/workadventure/2020");
            foreach($h as $p){ 
                if($p == "." || $p == ".."){
                    continue;
                }
?>
                <div class="col-xl-2 col-sm-3 col-xs-6">
                    <a href="/assets/images/workadventure/2020/<?php echo $p; ?>" class="fancybox" rel="ligthbox">
                        <div class="card mb-3">
                           <img src="/assets/images/workadventure/2020/<?php echo $p; ?>" class="zoom w-100 img-fluid "  alt="">
                        </div>
                    </a>
                </div>
           <?php } ?>
    </div>

    <div class="row" id="2019">
    	<h1>2019</h1>
	<?php
            $h = scandir(getcwd()."/source/assets/images/workadventure/2019");
            foreach($h as $p){ 
                if($p == "." || $p == ".."){
                    continue;
                }
?>
                <div class="col-xl-2 col-sm-3 col-xs-6">
                    <a href="/assets/images/workadventure/2019/<?php echo $p; ?>" class="fancybox" rel="ligthbox1">
                        <div class="card mb-3">
                           <img src="/assets/images/workadventure/2019/<?php echo $p; ?>" class="zoom w-100 img-fluid "  alt="">
                        </div>
                    </a>
                </div>
           <?php } ?>
    </div>
  </div>
  <script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
                nextEffect: "fade",
                prevEffect: "fade",
                padding: 2,
                titlePosition: "outside"
            });
    });
  </script>
</header>
@endsection
