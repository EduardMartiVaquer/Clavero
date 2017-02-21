<div id="videoModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="upload_video" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="video-title-input" name="video-title">
                <div class="modal-header">
                    <button type="button" class="close">&times;</button>
                    <h3 id="videoModal-title"></h3>
                </div>

                <div id="video-modal-body" class="modal-body">
                    <input id="video-url" name="url" type="text" class="styled-input" placeholder="Url del video..">
                    <button type="button" class="search-button"><i class="fa fa-search"></i></button>
                    <div id="loading-video" class='uil-ring-css' style='transform:scale(0.66);display:none;'><div></div></div>
                    <div id="player-collapse" class="collapse">
                        <div id="player" class="player"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="upload-video" class="styled-button background-color-turquoise hidden"><i class="fa fa-cloud-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /modal -->
