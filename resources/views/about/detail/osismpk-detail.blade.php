@extends('layouts.main')
@section('container')
<style>
.Container {
	width: 1160px;
	margin: 0 auto;
	position: relative;
}

.ag-timeline_item {
	margin: 0 0 50px;
	position: relative;
}
.ag-timeline_item-r {
	text-align: right;
}
.ag-timeline {
	display: inline-block;
	width: 100%;
	max-width: 100%;
	margin: 0 auto;
	position: relative;
}
.ag-timeline_line {
	width: 8px;
	background-color: #0F172A;
	position: absolute;
	top: 2px;
	left: 50%;
	bottom: 0;
	overflow: hidden;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-o-transform: translateX(-50%);
	transform: translateX(-50%);
}

.ag-timeline_line-progress {
	width: 100%;
	height: 20%;
	background-color: #0284c7;
}

.ag-timeline-card_box {
	padding: 0 0 20px 50%;
}

.ag-timeline_item-r .ag-timeline-card_box {
	padding: 0 50% 20px 0;
}

.ag-timeline-card_point-box {
	display: inline-block;
	margin: 0 14px 0 -28px;
}

.ag-timeline_item-r .ag-timeline-card_point-box {
	margin: 0 -28px 0 14px;
}

.ag-timeline-card_point {
	height: 50px;
	line-height: 50px;
	width: 50px;
	border: 3px solid #0284c7;
	background-color: #0F172A;
	text-align: center;
	font-size: 20px;
	color: #FFF;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.js-ag-active .ag-timeline-card_point {
	color: #0F172A;
	background-color: #0284c7;
}

.ag-timeline-card_meta-box {
	display: inline-block;
}

.ag-timeline-card_meta {
	margin: 10px 0 0;
	font-weight: bold;
	font-size: 28px;
}

.ag-timeline-card_item {
	display: inline-block;
	width: 45%;
	margin: -77px 0 0;
	background-color: #0F172A;
    padding: 14px 16px;
	opacity: 0;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0 0 0 0 rgba(0,0,0,.5);
	-moz-box-shadow: 0 0 0 0 rgba(0,0,0,.5);
	-o-box-shadow: 0 0 0 0 rgba(0,0,0,.5);
	box-shadow: 0 0 0 0 rgba(0,0,0,.5);
	-webkit-transition: -webkit-transform .5s, opacity .5s;
	-moz-transition: -moz-transform .5s, opacity .5s;
	-o-transition: -o-transform .5s, opacity .5s;
	transition: transform .5s, opacity .5s;
	position: relative;
}

.ag-timeline_item .ag-timeline-card_item {
	-webkit-transform: translateX(-200%);
	-moz-transform: translateX(-200%);
	-ms-transform: translateX(-200%);
	-o-transform: translateX(-200%);
	transform: translateX(-200%);
}

.ag-timeline_item-r .ag-timeline-card_item {
	-webkit-transform: translateX(200%);
	-moz-transform: translateX(200%);
	-ms-transform: translateX(200%);
	-o-transform: translateX(200%);
	transform: translateX(200%);
}

.js-ag-active.ag-timeline_item .ag-timeline-card_item,
.js-ag-active.ag-timeline_item-r .ag-timeline-card_item {
	opacity: 1;
	-webkit-transform: translateX(0);
	-moz-transform: translateX(0);
	-ms-transform: translateX(0);
	-o-transform: translateX(0);
	transform: translateX(0);
}

.ag-timeline-card_arrow {
	height: 18px;
	width: 18px;
	margin-top: 20px;
	background-color: #0F172A;
	z-index: -1;
	position: absolute;
	top: 0;
	right: 0;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
}

.ag-timeline_item .ag-timeline-card_arrow {
	margin-left: calc(-18px / 2);
	margin-right: calc(-18px / 2);
}
.ag-timeline_item-r .ag-timeline-card_arrow {
  margin-left: -10px;
  right: auto;
  left: 0;
}

/*--- Responsive Code ---*/
@media only screen and (max-width: 979px) {
  .ag-timeline_line {
	left: 30px;
  }

  .ag-timeline_item-r {
	text-align: left;
  }

  .ag-timeline-card_box,
  .ag-timeline_item-r .ag-timeline-card_box {
	padding: 0 0 20px;
  }
  
  .ag-timeline-card_meta-box {
    display: none;
  }
  
  .ag-timeline-card_point-box,
  .ag-timeline_item-r .ag-timeline-card_point-box {
    margin: 0 0 0 8px;
  }
  
  .ag-timeline-card_point {
    height: 40px;
    line-height: 40px;
    width: 40px;
  }
  
  .ag-timeline-card_item {
    width: auto;
    margin: -65px 0 0 75px
  }
  
  .ag-timeline_item .ag-timeline-card_item,
  .ag-timeline_item-r .ag-timeline-card_item {
    -webkit-transform: translateX(200%);
    -moz-transform: translateX(200%);
    -ms-transform: translateX(200%);
    -o-transform: translateX(200%);
    transform: translateX(200%);
  }
  
  .ag-timeline_item .ag-timeline-card_arrow {
    right: auto;
    left: 0;
  }
  
  .ag-timeline-card_arrow {
    margin-top: 12px;
  }
}

@media only screen and (max-width: 767px) {
  .Container {
    width: 96%;
  }
}

@media (min-width: 768px) and (max-width: 979px) {
  .Container {
    width: 750px;
  }
}

@media (min-width: 980px) and (max-width: 1161px) {
  .Container {
    width: 960px;
  }
}
/*--- Responsive Code End ---*/
</style>

<section id="detail-sispek" class="pt-36 pb-32 bg-slate-600">
    <div class="container">
        @if($data->count())
            <div class="px-6 flex justify-start mb-5">
                <a href="/{{ $data[0]->divisi->organisasi->nama_organisasi }}" class="font-semibold text-base text-white hover:text-primary transition-all duration-300 ease-in-out">{{ $name }} <span class="text-dark">/ </span></a>
                <h2 class="font-medium text-sm text-dark">{{ $data[0]->divisi->nama_divisi }}</h2>
            </div>
            <div class="px-6 lg:px-24 py-6 block lg:flex justify-start mb-10 lg:mb-16">
                <img src="{{ asset('storage/' . $data[0]->divisi->gambar_divisi) }}" alt="{{ $data[0]->gambar_anggota }}" class="max-w-full lg:max-w-[350px] mb-5 lg:mb-0 lg:mr-20 rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                <div class="p-2 lg:p-4">
                    <h2 class="font-bold @if($name == 'MPKK') text-blue-400 @else text-yellow-500 @endif text-2xl mr-5 sm:text-xl lg:text-4xl">{{ $data[0]->divisi->nama_divisi }}</h2>
                    <article class="mt-5 lg:mb-0 lg:my-5 text-sm font-small text-white" style="text-align: justify;">
                        {!! $data[0]->divisi->deskripsi_divisi !!}
                    </article>
                    </div>
                </div>
            </div>
            {{-- buat daftar anggota --}}
            <div class="mx-auto text-center mb-10 lg:mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $data[0]->divisi->nama_divisi }}</h4>
                <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">Pengurus</h2>
            </div>

            <div class="w-full">
                <div class="cards w-[60%] lg:w-1/6 mx-auto mb-16 relative rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                    <img src="{{ asset('storage/' . $data[0]->gambar_anggota) }}" class="rounded-2xl">
                    <div class="cards-body absolute bg-opacity-70 bg-dark text-center pt-4">
                        <p class="text-yellow-500 font-semibold text-base tracking-normal mb-2">{{ $data[0]->nama_anggota }}</p>
                        <p class="text-white font-small text-sm tracking-normal mb-4">"{{ $data[0]->kelas }}"</p>
                        <a href="{{ $data[0]->instagram_anggota }}" target="_blank" class="mx-auto w-1/4 px-2 py-2 flex justify-center items-center rounded-sm bg-dark text-white hover:bg-primary transition-all duration-300 ease-in-out">
                                <svg role="img" class="fill-current" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full mx-auto block lg:flex flex-wrap justify-evenly items-center mb-10 lg:mb-16">
                @foreach ($data as $div)
                    @if ($loop->iteration > 1)
                    <div class="cards w-[60%] lg:w-1/6 mx-auto mb-16 relative rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                        <img src="{{ asset('storage/' . $div->gambar_anggota) }}" class="rounded-2xl">
                        <div class="cards-body absolute bg-opacity-70 bg-dark text-center pt-4">
                            <p class="text-yellow-500 font-semibold text-base tracking-normal mb-2">{{ $div->nama_anggota }}</p>
                            <p class="text-white font-small text-sm tracking-normal mb-4">"{{ $div->kelas }}"</p>
                            <a href="{{ $div->instagram_anggota }}" target="_blank" class="mx-auto w-1/4 px-2 py-2 flex justify-center items-center rounded-sm bg-dark text-white hover:bg-primary transition-all duration-300 ease-in-out">
                                    <svg role="img" class="fill-current" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @if($data[0]->divisi->organisasi->nama_organisasi != 'mpk')
                @if ($data[0]->divisi->slug !== 'trikora' && $data[0]->divisi->slug !== 'sekretaris' && $data[0]->divisi->slug !== 'bendahara')
                    <div class="mx-auto text-center mb-10">
                        <h4 class="font-medium text-base lg:font-semibold lg:text-lg text-primary mb-2 tracking-[0.3rem]">TIMELINE PROGRAM KERJA</h4>
                        <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">{{ $data[0]->divisi->nama_divisi }} "{{ $data[0]->divisi->bidang }}"</h2>
                    </div>
                    <section class="overflow-hidden mt-10 px-4 lg:p-0">
                        <div class="Container">
                          <div class="js-timeline ag-timeline">
                            <!-- Progress Bar Line Code-->
                            <div class="js-timeline_line ag-timeline_line">
                              <div
                                class="js-timeline_line-progress ag-timeline_line-progress"
                              ></div>
                            </div>
                
                            <div class="ag-timeline_list">
                            <p class="hidden">{{ $number = 1 }}</p>
                            @foreach($data[0]->divisi->event as $event)
                              <!-- Left Batman Box -->
                              {{-- @dd($number % 2 == 0) --}}
                              @if($number % 2 == 1)
                                <div class="js-timeline_item ag-timeline_item">
                                    <div class="ag-timeline-card_box">
                                    <!-- Number Code-->
                                    <div
                                        class="js-timeline-card_point-box ag-timeline-card_point-box"
                                    >
                                        <div class="ag-timeline-card_point"></div>
                                    </div>
                    
                                    <!-- Name Code-->
                                    <div class="ag-timeline-card_meta-box">
                                        <div class="hidden lg:block text-slate-200 text-lg lg:text-3xl font-medium lg:font-semibold tracking-[0.5px]">{{ $event->nama_acara }}</div>
                                    </div>
                                    </div>
                    
                                    <!-- Image Code-->
                                    <div class="ag-timeline-card_item">
                                        <h1 class="block lg:hidden text-yellow-500 font-bold text-xl mb-2">{{ $event->nama_acara }}</h1>
                                        <h1 class="text-white font-semibold text-base lg:text-lg mb-2">{{ $event->tanggal_acara }}</h1>
                                        <article class="text-slate-200 font-thin text-sm lg:text-md text-justify">{!! $event->deskripsi_acara !!}</article>
                                    <div class="ag-timeline-card_arrow"></div>
                                    </div>
                                </div>
                              @else
                                <!-- Right Deathstroke Box -->
                                <div class="js-timeline_item ag-timeline_item-r">
                                    <div class="ag-timeline-card_box">
                                    <!-- Name Code-->
                                    <div class="ag-timeline-card_meta-box">
                                        <div class="hidden lg:block text-slate-200 text-lg lg:text-3xl font-medium lg:font-semibold tracking-[0.5px]">{{ $event->nama_acara }}</div>
                                    </div>
                    
                                    <!-- Number Code-->
                                    <div
                                        class="js-timeline-card_point-box ag-timeline-card_point-box"
                                    >
                                        <div class="ag-timeline-card_point"></div>
                                    </div>
                                    </div>
                    
                                    <!-- Image Code-->
                                    <div class="ag-timeline-card_item">
                                      <h1 class="block lg:hidden text-yellow-500 font-bold text-xl mb-2">{{ $event->nama_acara }}</h1>
                                      <h1 class="text-white font-semibold text-base lg:text-lg mb-2">{{ $event->tanggal_acara }}</h1>
                                      <article class="text-slate-200 font-thin text-sm lg:text-md text-justify">{!! $event->deskripsi_acara !!}</article>
                                    <div class="ag-timeline-card_arrow"></div>
                                    </div>
                                </div>
                              @endif
                              <p class="hidden">{{ $number++ }}</p>
                            @endforeach
                            </div>
                          </div>
                        </div>
                      </section>
                @endif
            @endif    
        @else
            <div class="container">
                <p class="font-semibold text-2xl text-white text-center">Data Pengurus Masih Kosong.</p>
            </div>
        @endif
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    (function ($) {
  $(function () {

    $(window).on('scroll', function () {
      fnOnScroll();
    });

    $(window).on('resize', function () {
      fnOnResize();
    });

    var agTimeline = $('.js-timeline'),
      agTimelineLine = $('.js-timeline_line'),
      agTimelineLineProgress = $('.js-timeline_line-progress'),
      agTimelinePoint = $('.js-timeline-card_point-box'),
      agTimelineItem = $('.js-timeline_item'),
      agOuterHeight = $(window).outerHeight(),
      agHeight = $(window).height(),
      f = -1,
      agFlag = false;

    function fnOnScroll() {
      agPosY = $(window).scrollTop();

      fnUpdateFrame();
    }

    function fnOnResize() {
      agPosY = $(window).scrollTop();
      agHeight = $(window).height();

      fnUpdateFrame();
    }

    function fnUpdateWindow() {
      agFlag = false;

      agTimelineLine.css({
        top: agTimelineItem.first().find(agTimelinePoint).offset().top - agTimelineItem.first().offset().top,
        bottom: agTimeline.offset().top + agTimeline.outerHeight() - agTimelineItem.last().find(agTimelinePoint).offset().top
      });

      f !== agPosY && (f = agPosY, agHeight, fnUpdateProgress());
    }

    function fnUpdateProgress() {
      var agTop = agTimelineItem.last().find(agTimelinePoint).offset().top;

      i = agTop + agPosY - $(window).scrollTop();
      a = agTimelineLineProgress.offset().top + agPosY - $(window).scrollTop();
      n = agPosY - a + agOuterHeight / 2;
      i <= agPosY + agOuterHeight / 2 && (n = i - a);
      agTimelineLineProgress.css({height: n + "px"});

      agTimelineItem.each(function () {
        var agTop = $(this).find(agTimelinePoint).offset().top;

        (agTop + agPosY - $(window).scrollTop()) < agPosY + .5 * agOuterHeight ? $(this).addClass('js-ag-active') : $(this).removeClass('js-ag-active');
      })
    }

    function fnUpdateFrame() {
      agFlag || requestAnimationFrame(fnUpdateWindow);
      agFlag = true;
    }

  });
})(jQuery);
</script>
@endsection