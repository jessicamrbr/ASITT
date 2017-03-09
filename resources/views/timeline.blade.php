@extends('header')
@section('optCss')
  {!! MaterializeCSS::include_css_tl() !!}
@endsection
@section('titleIcon', "access_time")
@section('titleName', "Minha linha do tempo")
@section('containerPage')
<section id="cd-timeline">
  @foreach($timeline as $timelineItem)
	<div class="cd-timeline-block">
		<div class="cd-timeline-img valign-wrapper">
			<i class="material-icons valign center-align">assignment_turned_in</i>
		</div> 
		<div class="cd-timeline-content card-panel pink lighten-5">
			<h5>{{$timelineItem->event_name}}</h5>
			<p>{{date('d/m/Y', strtotime($timelineItem->date))}}</p>
		</div>
	</div>
  @endforeach
</section>
@endsection
