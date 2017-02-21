<div id="contactModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>{{trans('index.contact')}}</h3>
            </div>

            <div class="modal-body">
                <form action="send_email" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="styled-input" name="name" placeholder="{{trans('index.name')}}..">
                    <input type="email" class="styled-input" name="email" placeholder="{{trans('index.email')}}..">
                    <textarea class="styled-textarea" rows="6" name="message" placeholder="{{trans('index.message')}}.."></textarea>
                    <button class="styled-button background-color-blue">{{trans('index.send')}}</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- /modal -->