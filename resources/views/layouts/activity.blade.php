<div class="ui segment">
    <div class="ui stackable grid">
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img src="{{ $act->photo }}">
                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <h2 class="ui header"><a href="{{ route('activity.show', $act) }}">{{ $act->name }}</a></h2>
            <p>
                {{ $act->description }}
            </p>
            <div class="ui centered stackable grid">
                <div class="eight wide column">
                    <i class="calendar icon"></i>
                    le {{ $act->date->format('d/m/Y à H:i') }}
                </div>
                <div class="eight wide column">
                    <i class="map signs icon"></i>
                    {{ $act->lieu }}
                </div>
            </div>
            <div class="ui centered stackable grid">
                <div class="four wide column ui center">
                    <i class="thumbs up icon"></i>
                    <span data-activity="{{ $act->id }}">{{ $act->like }} J'aime</span>
                </div>
                <div class="six wide column ui center">
                    <i class="comments up icon"></i>
                    {{ $act->comment_count }} commentaires
                </div>
                <div class="four column ui center">
                    <button class="ui icon button">
                        <i class="share alternate icon"></i>
                    </button>
                </div>
            </div>
            @if($act->comment)
                <div class="ui comments">
                    <h3 class="ui dividing header">Dernier commentaire :</h3>
                    <div class="comment">
                        <a href="{{ route('user.show', $act->comment->user_id) }}" class="avatar">
                            <img src="{{ $act->comment->user->avatar }}">
                        </a>
                        <div class="content">
                            <a class="author" href="{{ route('user.show', $act->comment->user_id) }}">
                                {{ $act->comment->user->name }}
                                {{ $act->comment->user->forename }}
                            </a>
                            <div class="metadata">
                                <span class="date" title="{{ $act->comment->created_at->format('d/m/Y H:i:s') }}">
                                    {{ $act->comment->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                                </span>
                            </div>
                            <div class="text">
                                {{ $act->comment->content }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>