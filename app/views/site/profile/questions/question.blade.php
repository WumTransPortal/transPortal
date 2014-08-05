

@section('question')


<script type="text/javascript" src="/js/question_edit.js"></script>
<link rel="stylesheet" href="/css/index-question-answers.css">

<div class="question">

    <?php

    if(!Sentry::check())
    {

    }
    else
    {
        $user = Sentry::getUser();
        $user_id = $user->id;
    }


    ?>

    <h4>Questions</h4>
    @foreach ($questions as $question)

    <?php $author = User::where('id', '=' , $question->user_id)->first(); ?>
    <?php $project = Project::where('id', '=' , $question->project_id)->first(); ?>

    <div class="single-question">
        <div class="text">
            <h2> by {{$author->username}} in project: {{$project->title}}</h2>
            <a href="/question/show?question_id={{ $question->id }}&from=profile">
                <h4>{{$question->title}}</h4>
            </a>
            <?php
            $string =$question->description;
            $string = substr($string,0,300).'...';
            ?>
            <p>{{$string}}</p>

        </div>
    </div>
    @endforeach
</div>

<div style="text-align: center">
    {{ $questions->links() }}
</div>
@stop

