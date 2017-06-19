

@extends('layouts.app')

@section('content')
	<H1>Отзывы</H1>


	<div class="guestbook row">
		<div class="guestbook-form col-md-6 col-xs-12">

			<H2>Добавить отзыв</H2>

			<div class="guestbook-new-post">
				{{ Form::open( array( 'route' => ['postCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
				    @include('guestbook._form-fields')
				
				{{ Form::close() }}
			</div>			

		</div>

		<div class="guestbook-posts col-md-12 col-xs-12">

			@foreach ($posts as $post)

				<div class="guestbook-item">
					

					<?php
					 	if ( $user = Auth::user() ) {
				            if ( $user->role == 'admin')
								{
					?>
					 	<form action="{{ route('postDelete', ['guestbook' => $post->id]) }}" method="post">
                        	{{ method_field('DELETE')}}
                        	<p>
                        		<button type="submit" class="btn btn-danger"> Удалить комментарий </button>
                        		{{ csrf_field() }}
                        	</p>
                        </form>
                    <?php }} ?>


					<div class="name-item">
						{{ $post->name }}
					</div>
					<div class="body-item">
						{{ $post->body }}
					</div>
					<?php
					 	if ( $user = Auth::user() ) {
				            if ( $user->role == 'admin')
								{
									?>	
										<?php $adminAnswer = False; ?>
										@foreach ($answers as $answer)
											@if ( $answer->parent_id == $post->id )

												<div class="answer-item ">
													<div class="name-item">
														{{ $answer->name }}
													</div>
													<div class="answer-body">
														{{$answer->body}}
													</div>
													
												</div>											
												<?php $adminAnswer = True; ?>

											@endif
										@endforeach
										@if ( !$adminAnswer)
											<div class="answer-form">
												{{ Form::open( array( 'route' => ['postAdminCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}

												<input type="hidden" name="parent_id" value="{{$post->id}}">
												{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст','required' => 'required')) !!}
												<button type="submit" class="btn btn-success">Отправить ответ</button>
												{{ Form::close() }}	
											</div>
										

										@endif
									<?php
								}
						}
						else 
						{
							?>
								@if (count($answers) > 0 )
									@foreach ($answers as $answer)

										@if ( $answer->parent_id == $post->id )
											<div class="answer-item ">
												<div class="name-item">
													{{ $answer->name }}
												</div>
												<div class="answer-body">
													{{$answer->body}}
												</div>
												
											</div>

										@endif

									@endforeach
								@endif
							<?php
						}
					?>

				</div>


				

			@endforeach	
			
		</div>



	</div>
	{{ $posts->links('vendor.pagination.bootstrap-4') }}

@endsection

@section('footer')
	{!! view('footer') !!}
@endsection