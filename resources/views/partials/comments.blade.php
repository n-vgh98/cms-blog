
<script type="text/javascript">
    $(".btn-open").click(function () {
        $('.form-reply').css('display','none')
        var service= this.id
        var service_id = '#f-' + service
        $(service_id).show('slow');
    })

</script>


@foreach($comments as $comment)
    <div class="media mb-4 ml-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            {{$comment->description}}
            <div class="media mt-4">
                <button class="btn btn-light btn-open" id="div-comment-{{$comment->id}}">Reply</button>
                <div class="form-reply" id="f-div-comment-{{$comment->id}}" style="display: none;">
                    {!! Form::open(['method'=>'post' , 'route'=>['frontend.comments.reply']]) !!}
                    <div class="form-group">
                        {!! Form::hidden('parent_id', $comment->id) !!}
                        {!! Form::hidden('post_id', $post->id) !!}
                        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

                @include('partials.comments',['comments'=>$comment->replies])

            </div>
        </div>
    </div>
@endforeach
