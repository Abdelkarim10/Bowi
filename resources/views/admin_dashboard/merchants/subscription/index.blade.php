@extends('app-view.layouts')
@section('content')
<div style="height: 80%">
         @if(isset($merchant->subscription))
        <div style="text-align: center;justify-content: center;padding:25% 0">  
         
       
         <p style="font-family: Lucida Console, Courier New, monospace;font-size:30px"> Your subscription ends in : {{$merchant->subscription->format('d/m/Y')}}</p> 
      


        </div>
 
</div>
       @endif
@endsection