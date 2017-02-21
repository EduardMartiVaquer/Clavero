@extends('layouts.master')
@section('content')

    <div class="container" style="padding-top: 80px">
        <h1>Panel de Control</h1>
        <h2>Biografías</h2>
        <a id="new-story-square" class="square pointer margin-top-0">Nueva historia</a>
        <br>
        @foreach($stories as $story)
            <div id="story-{{$story->id}}" class="square">
                @if(!is_null(\App\Image::where('story_id', $story->id)->orderBy('id', 'DESC')->first()))
                    <div class="story-image-dashboard" style="background-image: url('{{\App\Image::where('story_id', $story->id)->orderBy('id', 'DESC')->first()->image}}')"></div>
                @endif
                <p class="cutup-title">{{$story->description}}</p>
            </div>
        @endforeach

         <div class="divider"></div>

        <h2>Videos</h2>
        <a id="new-video-link" class="pointer margin-top-0">Nuevo video</a>
        <br>
        @foreach($videos as $video)
            <div id="video-{{$video->id}}" class="square">
                <div id="video-image-{{$video->id}}" class="story-image-dashboard"></div>
                <p class="cutup-title">{{$video->title}}</p>
                <a id="delete-video-{{$video->id}}" class="color-red delete-video pointer">Eliminar</a>
            </div>
        @endforeach
    </div>

    @include('modals.storyModal')
    @include('modals.videoModal')

    <script>
        var currentStory;
        $(document).on('click', '.square', function(){
            var id = $(this).attr('id');
            currentStory = parseInt(id.replace('story-', ''));
            $('#more-story-id').val(currentStory);
            $('#story-id-input').val(currentStory);
            $('#story-id-input2').val(currentStory);
            if(id == 'new-story-square'){
                $('#new-story').addClass('active');
                $('#existing-story').removeClass('active');
                $('#storyModal-title').html('Nueva Historia');
                $('#new-story-button').removeClass('hidden');
                $('#delete-story-button').addClass('hidden');
                $('#images-row').empty();
                $('#storyModal').modal('show');
            } else {
                id = id.replace('story-', '');
                $('#new-story').removeClass('active');
                $('#existing-story').addClass('active');
                $('#new-story-button').addClass('hidden');
                $('#delete-story-button').removeClass('hidden');
                var parameters = {
                    '_token' : '{{csrf_token()}}',
                    'id' : id
                };
                $.ajax({
                    type: "POST",
                    url: '/get_story',
                    data: parameters,
                    dataType: 'json',
                    success: function (data) {
                        var story = data.story;
                        var images = data.images;
                        console.log(images);
                        $('#storyModal-title').html('Historia');
                        $('#lang-select option[value="es"]').attr('selected', 'selected');
                        $('#story-description').html(story['description']);
                        $('#story-description2').html(story['description2']);
                        $('#editable-textarea').val(story['description']);
                        $('#editable-textarea2').val(story['description2']);
                        $('#story-images').html('');
                        $('#story-images2').html('');
                        for(var i = images.length - 1; i > -1 ; i--){
                            document.getElementById('story-images').innerHTML += '<div class="col-xs-12 col-sm-6 col-md-4">' +
                                    '<div id="story-image-'+images[i]['id']+'" class="new-image" style="background-image: url(\''+ images[i]['image'] +'\')">' +
                                    '<div id="inner-image-'+images[i]['id']+'" class="new-image-inner">' +
                                    '<h1 class="middle-display text-center color-white"><i class="fa fa-trash-o"></i></h1>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                        }
                        for(var i = images.length - 1; i > -1 ; i--){
                            document.getElementById('story-images2').innerHTML += '<div class="col-xs-12 col-sm-6 col-md-4">' +
                                    '<div id="story-image-'+images[i]['id']+'" class="new-image" style="background-image: url(\''+ images[i]['image'] +'\')">' +
                                    '<div id="inner-image-'+images[i]['id']+'" class="new-image-inner">' +
                                    '<h1 class="middle-display text-center color-white"><i class="fa fa-trash-o"></i></h1>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                        }

                        $('#storyModal').modal('show');
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            }
        });

        $(document).on('click', '.new-image-inner', function(){
            var imageId = parseInt($(this).attr('id').replace('inner-image-', ''));
            var parameters = {
                '_token' : '{{csrf_token()}}',
                'id' : imageId
            };
            $.ajax({
                type: "POST",
                url: '/delete_image',
                data: parameters,
                dataType: 'json',
                success: function (data) {
                    $('#story-image-'+ imageId).fadeOut();
                },
                error: function (data) {
                    console.log(data)
                }
            });
        });

        $(document).on('click', '.delete-video', function(){
            var videoId = parseInt($(this).attr('id').replace('delete-video-', ''));
            var parameters = {
                '_token' : '{{csrf_token()}}',
                'id' : videoId
            };
            $.ajax({
                type: "POST",
                url: '/delete_video',
                data: parameters,
                dataType: 'json',
                success: function (data) {
                    $('#video-'+ data.id).fadeOut();
                },
                error: function (data) {
                    console.log(data)
                }
            });
        });
    </script>


    <script>
        var player;
        $(document).ready(function(){
            var tag = document.createElement('script');
            tag.src = "http://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var videoId = 'ca_Cv7seV4Y';

        });
        $('#new-video-link').click(function(){
            $('#player-collapse').collapse('hide');
            $('#videoModal-title').html('Nuevo Video');
            $('#video-url').removeClass('hidden');
            $('#upload-video').addClass('hidden');
            $('#videoModal').modal('show');
        });

        $('#video-url').keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                searchVideo();
            }
        });

        $('.search-button').click(function(){
            searchVideo();
        });

        $('.close').click(function(){
            $('#player-collapse').collapse('hide');
            $('#videoModal').modal('hide')
        });

        $('#upload-video').click(function(){
            $('#video-url').val();
        });

        function searchVideo() {
            $('#player-collapse').collapse('hide');
            var url = $('#video-url').val();
            if(url.replace(' ', '') != ''){
                $('#loading-video').fadeIn(function(){
                    var index = url.indexOf('=');
                    if(index != -1){
                        index += 1;
                        var index2 = url.length;
                        $('#loading-video').fadeOut(function(){
                            $('#player-collapse').collapse('show');
                            $('#upload-video').removeClass('hidden');
                            player = new YT.Player('player', {
                                videoId: url.substr(index, index2 - index),
                                events: {
                                    'onReady': onPlayerReady
                                }
                            });

                            console.log(player.getVideoData().title);

                        });
                    }
                });
            } else {
                $('#loading-video').fadeOut();
            }
        }

        function onYouTubeIframeAPIReady() {

            @foreach($videos as $video)
            var player{{$video->id}};
            player{{$video->id}} = new YT.Player('video-image-{{$video->id}}', {
                videoId: '{{substr($video->url,-11)}}'
            });
            @endforeach
        }

        function onPlayerReady(event) {
            $('#video-title-input').val(event.target.getVideoData().title);
        }



    </script>

    <script>

    </script>
@endsection