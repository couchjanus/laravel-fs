<h3>Recent Posts</h3>
<ul class="nav nav-pills nav-stacked">
@foreach ($articles as $key => $value)
      <li><a href="{{ route('blog.show', $value->id) }}">{{ $value->title }}</a></li>
@endforeach
</ul>
