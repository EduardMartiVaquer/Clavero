<textarea id="new-story-info" class="styled-textarea" name="story-description" placeholder="Cuentanos tu historia.." rows="6"></textarea>

<h4>Imágenes</h4>
<a id="new-image-link" class="pointer">Añadir imagen</a>

<div id="images-row" class="row">
</div>
<form id="images-form" action="post_images" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input id="imageNum" type="hidden" name="imageNum">
    <input id="storyId" type="hidden" name="storyId">
    <div id="image-inputs" class="hidden">
        @for($x = 1; $x < 11; $x++)
            <input type="file" id="input-image-{{$x}}" name="image-{{$x}}" class="input-image">
        @endfor
    </div>
</form>



<script>
    var imageNum = 0;
    $(document).on('click', '#new-image-link', function(){
        imageNum++;
        $('#input-image-'+imageNum).trigger('click');
    });
    
    $(document).on('change', '.input-image', function(){
        var div = $(this);
        var id = parseInt(div.attr('id').replace('input-image-', ''));
        var getImagePath = URL.createObjectURL(div[0].files[0]);

        document.getElementById('images-row').innerHTML += '<div class="col-xs-12 col-sm-6 col-md-4">' +
                '<div id="image-'+id+'" class="new-image" style="background-image: url(\''+ getImagePath +'\')"></div>' +
                '</div>';

    });

    $(document).on('click', '#new-story-button', function(){
        $('#imageNum').val(imageNum);
        console.log(imageNum);
        var parameters = {
            '_token' : '{{csrf_token()}}',
            'description' : $('#new-story-info').val()
        };
        $.ajax({
            type: "POST",
            url: '/post_story',
            data: parameters,
            dataType: 'json',
            success: function (data) {
                $('#storyId').val(data.id);
                $('#images-form').submit();
            },
            error: function (data) {
                console.log(data)
            }
        });
    });
</script>