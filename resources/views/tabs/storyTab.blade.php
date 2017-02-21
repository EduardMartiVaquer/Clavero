<a href="#edit-story" data-toggle="tab">Modificar texto</a>
<pre id="story-description"></pre>
<a id="addImages">Añadir más imágenes</a>
<div id="story-images" class="row"></div>
<form id="upload-file-form" class="hidden" enctype="multipart/form-data">
    {{csrf_field()}}
    <input id="more-image-input" type="file" name="more-image">
    <input id="more-story-id" name="more-story-id">
</form>

<script>
    $('#addImages').click(function(){
        document.getElementById('more-image-input').click();
    });
    $('#addImages2').click(function(){
        document.getElementById('more-image-input').click();
    });

    $(document).on('change', '#more-image-input', function(){
        $.ajax({
            type: "POST",
            url: "more_image",
            data: new FormData($("#upload-file-form")[0]),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {
                var image = data.image;
                document.getElementById('story-images').innerHTML += '<div class="col-xs-12 col-sm-6 col-md-4">' +
                        '<div id="story-image-'+image['id']+'" class="new-image" style="background-image: url(\''+ image['image'] +'\')">' +
                        '<div id="inner-image-'+image['id']+'" class="new-image-inner">' +
                        '<h1 class="middle-display text-center color-white"><i class="fa fa-trash-o"></i></h1>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                document.getElementById('story-images2').innerHTML += '<div class="col-xs-12 col-sm-6 col-md-4">' +
                        '<div id="story-image-'+image['id']+'" class="new-image" style="background-image: url(\''+ image['image'] +'\')">' +
                        '<div id="inner-image-'+image['id']+'" class="new-image-inner">' +
                        '<h1 class="middle-display text-center color-white"><i class="fa fa-trash-o"></i></h1>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
            },
            error: function (data) {
                console.log(data)
            }
        });
    });
</script>