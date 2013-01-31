<div class="modal hide" id="upload_modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="$('#upload_modal').attr('class', 'modal hide');">&times;</button>
        <h3>Post a new article, all quick like.</h3>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{ URL::to('article/post') }}" id="post_modal_form" enctype="multipart/form-data">
            <label for="title">title</label>
            <input type="text" placeholder="Article Title" name="title" id="title" />
            <label for="content">Content</label>
            <textarea placeholder="Content goes here" name="content" id="content" class="span5"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" onclick="$('#upload_modal').attr('class', 'modal hide');">Cancel</a>
        <button type="button" onclick="$('#post_modal_form').submit();" class="btn btn-primary">submit</a>
    </div>
</div>