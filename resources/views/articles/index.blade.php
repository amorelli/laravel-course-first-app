@extends ('layout')

@section ('header')
  <div>
    <h1>
    About
    </h1>
  </div>
@endsection

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
    @foreach ($articles as $article)
      <div id="content">
        <div class="title">
        <h2><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
        {{ $article->body }}
      </div>
    @endforeach
	</div>
</div>

@endsection