<div id="storyModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 id="storyModal-title"></h3>
                <select id="lang-select">
                    <option id="select-es" value="es">ES</option>
                    <option id="select-en" value="en">EN</option>
                </select>
            </div>

            <div class="modal-body">
                <div class="hidden">
                    <a id="new-story-link" href="#new-story" data-toggle="tab"></a>
                    <a id="existing-story-link" href="#existing-story" data-toggle="tab"></a>
                    <a id="existing-story-link2" href="#existing-story2" data-toggle="tab"></a>
                </div>
                <div id="indexTabs" class="tab-content">
                    <div id="new-story" class="tab-pane active">
                        @include('tabs.newStoryTab')
                    </div>

                    <div id="existing-story" class="tab-pane">
                        @include('tabs.storyTab')
                    </div>

                    <div id="existing-story2" class="tab-pane">
                        @include('tabs.storyTab2')
                    </div>

                    <div id="edit-story" class="tab-pane">
                        <form action="edit_story" method="post">
                            {{ csrf_field() }}
                            <input id="story-id-input" type="hidden" name="story_id">
                            <textarea id="editable-textarea" name="description" class="styled-textarea" rows="6"></textarea>
                            <button type="submit" class="styled-button background-color-orange-1">Modificar</button>
                        </form>
                    </div>
                    <div id="edit-story2" class="tab-pane">
                        <form action="edit_story2" method="post">
                            {{ csrf_field() }}
                            <input id="story-id-input2" type="hidden" name="story_id">
                            <textarea id="editable-textarea2" name="description2" class="styled-textarea" rows="6"></textarea>
                            <button type="submit" class="styled-button background-color-orange-1">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button id="delete-story-button" type="button" class="styled-button background-color-red" onclick="document.getElementById('delete-story-form').submit()"><i class="fa fa-trash"></i> Borrar</button>
                <button id="new-story-button" type="button" class="styled-button background-color-blue"><i class="fa fa-cloud-upload"></i> Añadir</button>
            </div>

        </div>
    </div>
</div> <!-- /modal -->
<form id="delete-story-form" class="hidden" action="delete_story" method="post">
    {{ csrf_field() }}
    <input id="story_id_input" type="hidden" name="story_id">
</form>

<script>
    $('#lang-select').change(function(){
        if($('#lang-select option:selected').val() == 'es'){
            $('#existing-story-link').click();
        } else {
            $('#existing-story-link2').click();

        }
    })
</script>