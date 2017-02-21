<h1 class="text-center">Videos</h1>
<div class="divider"></div>

<div class="row">
    <?php $count = 0 ?>
    @foreach($videos as $video)
            <?php $count++ ?>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <h3>{{$video->title}}</h3>
            <div id="player-{{$video->id}}" class="player"></div>
        </div>
    @endforeach
</div>