 <link rel="stylesheet" href="{{ asset('css/components/comments.css')}}" />
@if (!empty($comments))
@foreach ($comments as $comment)
<div class="comment_item_div">
	<p class="comment_user_name">{{ $comment->user_login }}</p>
	@auth
	@if(Auth::user()->status == 'admin')
		<button value="{{ $comment->id }}" class="delete_comment_btn">Удалить отзыв</button>
	@endif
	@endauth
	<p class="comment_user_text">{{ $comment->text }}</p>
</div>
@endforeach
@endif
