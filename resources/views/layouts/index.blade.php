@extends('layouts.master')
@section('content')

    <div class="hidden">
        <a id="mainTabLink" href="#main" data-toggle="tab"></a>
        <a id="biographyTabLink" href="#biography" data-toggle="tab"></a>
    </div>
    <div id="indexTabs" class="tab-content">

        <div id="main" class="tab-pane fade in active" style="background-color: #000">
            <button id="unmute" class="sound-btn"><i class="fa fa-volume-up"></i></button>
            <div id="variable-div">
                <video controls="true" loop poster="http://masnouclav.com//images/web_images/clav_3.JPG" id="bgvid" muted>
                    <source src="/videos/Bboy_Clav.mp4" type="video/mp4">
                </video>
            </div>
            <div id="second-wrapper">
                <div class="middle-display">
                    <h1 id="title" class="text-center">BBOY CLAV</h1>
                </div>
            </div>
        </div>

        <div id="biography" class="tab-pane fade">
            <div id="biography-wrapper"></div>
            <div class="container" style="padding-top: 20px">
                @include('layouts.stories')
            </div>
        </div>

        <div id="videos" class="tab-pane fade">
            <div id="videos-wrapper"></div>
            <div class="container" style="padding-top: 20px">
                @include('layouts.videos')
            </div>
        </div>

    </div>
    @include('layouts.footer')

    @include('modals.signinModal')
    @include('modals.contactModal')
    @include('modals.imageModal')

    <script>
        var title = 0;
        var combo = 0;
        var pos = 1;
        /*$('#bgvid').on('timeupdate', function(){
            var time = this.currentTime;
            if(time >= 21){
                if(title == 0){
                    title = 1;
                    $('#title').fadeIn();
                }
            }
        });*/

        $(document).ready(function(){
            document.getElementById('bgvid').play();
            if($(window).width() < 1025){
                $('#variable-div').empty().css({'background-image' : "url('images/web_images/clav_4.jpg')"});
                $('#unmute').addClass('hidden');
            }
        });
        $(window).scroll(function(){
            var scrollTop = $(window).scrollTop();
            if(scrollTop > 5){
                if(pos == 1){
                    pos = 0;
                    $('.navbar').animate({top: -90});
                }
            } else {
                if(pos == 0){
                    pos = 1;
                    $('.navbar').animate({top: 0});
                }
            }
        });

        $(document).keypress(function(e){
            var string = [109, 105, 112, 111, 108, 108, 97, 54, 57];
            if(e.which == string[combo]){
                combo++;
                if(combo == 9){
                    $('#signInModal').modal('show');
                    combo = 0;
                }
            } else {
                combo = 0;
            }
        });

        $(document).on('click', '#unmute', function(){
            $(this).attr('id', 'mute').html('<i class="fa fa-volume-off"></i>');
            $('#bgvid').prop('muted', false);
            $('#title').css({'color': 'transparent'});
            $('#second-wrapper').css({'background-color': 'transparent'});

        });
        $(document).on('click', '#mute', function(){
            $(this).attr('id', 'unmute').html('<i class="fa fa-volume-up"></i>');
            $('#bgvid').prop('muted', true);
            $('#title').css({'color': '#fff'});
            $('#second-wrapper').css({'background-color': 'rgba(0, 0, 0, 0.5);'});
        });

        $('#sidebar-show').on('click', function(){
            $('#main-link').trigger('click');
        });
        /*$('#main-link').on('shown.bs.tab', function () {
            $('#sidebar-show').css({'color': '#fff'});
            $('.navbar-default .navbar-nav > li > a').css({'color': '#fff'});
        });
        $('#biography-link').on('shown.bs.tab', function () {
            $('#sidebar-show').css({'color': '#333'});
            $('.navbar-default .navbar-nav > li > a').css({'color': '#333'});
        });
        $('#videos-link').on('shown.bs.tab', function () {
            $('#sidebar-show').css({'color': '#333'});
            $('.navbar-default .navbar-nav > li > a').css({'color': '#333'});
        });*/

        $(document).on('click', '.story-image', function(){
            var url = $(this).attr('src');
            $('#modal-image').attr('src', url);
            $('#imageModal').modal('show');
        });
    </script>

    <script>
        var tag = document.createElement('script');
        tag.src = "http://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        function onYouTubeIframeAPIReady() {
            @foreach($videos as $video)
            var player{{$video->id}};
            player{{$video->id}} = new YT.Player('player-{{$video->id}}', {
                videoId: '{{substr($video->url,-11)}}'
            });
            @endforeach
        }
    </script>

    <script>
        $('.carousel').each(function(){
            $(this).carousel({
                interval: 5000
            });
        });
    </script>

@endsection