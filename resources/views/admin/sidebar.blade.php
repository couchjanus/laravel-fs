<div class="col-md-3">

            <div class="panel panel-default panel-flush">
                <div class="panel-heading">
                <a class="nav-link" href="{{ route('posts.index') }}">Post Manager<span class="sr-only"></span></a> 
                </div>

                <div class="panel-body">
                    <ul class="nav" role="tablist">
                        <li role="presentation">
                            <a class="nav-link" href="{{ route('posts.index') }}">Posts List<span class="sr-only">(current)</span></a>
                        </li>
                        <li role="presentation">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categoties List </a>
                        </li>
                        <li role="presentation">
                            <a class="nav-link" href="{{ route('tags.index') }}">Tags List </a>
                        </li>
                    </ul>
                </div>
            </div>
    
</div>
