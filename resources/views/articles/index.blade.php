@extends('layouts.app')

@section('content')
	<div class="row">
		@forelse($articles as $article)
			<div class="col-xs-6 col-xs-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>MaNu</span>

						<span class="pull-right">
							{{ $article->created_at->diffForHumans() }}
						</span>
					</div>
					<div class="panel-body">
						{{-- Get only the first 100 char: {{ substr($article->content, 0, 100) }} 
						--}}
						{{-- Get a random number of characters: {{ substr($article->content, 0, random_int(60, 150)) }} 
						--}}
						{{-- Let's use an assesor for this --}}
						{{ $article->shortContent }}

						<a href="/articles/{{ $article->id }}">Read more</a>

					</div>
					<div class="panel-footer clearfix">
						<i class="fa fa-heart pull-right"></i>
					</div>
				</div>
			</div>
		@empty
			No articles.
		@endforelse
	</div>
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3">
			{{ $articles->links() }}
		</div>
	</div>
@endsection