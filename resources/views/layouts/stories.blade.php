<h1 class="text-center">Biografía</h1>
<div class="divider"></div>

@foreach($stories as $story)
    <?php
    $images = \App\Image::where('story_id', $story->id)->orderBY('id', 'DESC')->get();
    ?>
    @if($locale == 'es')
        <pre>{{ $story->description }}</pre>
    @else
        <pre>{{ $story->description2 }}</pre>
    @endif


    <div class="divider"></div>

    <div class="row">
        @foreach($images as $image)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="carousel-image" style="background-image: url('{{$image->image}}')">
                    <div class="carousel-image-inner">
                        <h1 class="text-center color-white middle-display" onclick="seeImage('{{$image->image}}')"><i class="fa fa-eye"></i></h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($stories->last() != $story)
        <div class="divider"></div>
        <div class="divider"></div>
    @endif
@endforeach

<script>
    var rand = 2;
    function seeImage(url){
        $('#modal-image').attr('src', url);
        $('#imageModal').modal('show');
    }

</script>