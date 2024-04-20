@extends('app-view.layouts')
@section('content')
<br>
<div style="width:98%;margin:auto ">
    <a href="/merchant-analytics" class="createBtn"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        &nbsp;Graphs  
    </a> 
</div>
<br>
<br>
<div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="width:95% ;">
                    
                        <div  style="background-color: white">

                            <h2>Offers Table</h2>
                        </div>

                    
                        
                            
                            {{-- LIVEWIRE(CHECKBOXES) --}}

                            <br />
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Offer name</th>
                                            <th>Offer Type</th>
                                            <th>Saving</th>
                                            <th>Pin</th>
                                            <th>Date</th>
                                           
                                            

                                            <!-- {{-- <th>Role rank</th>--}} -->
                                            <!-- <th>Actions</th> -->
            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach($useroffers as $useroffer)
                                        <tr style="font-size: 90%">
                                            
                                            <td>{{ $useroffer->offer_name }}</td>
                                            <td>{{ $useroffer->type_name }}</td>
                                            <td>{{ $useroffer->saving }}</td> 
                                            <td>{{ $useroffer->code }}</td>
                                            <td>{{ $useroffer->created_at}}</td>
                                           
                                        
                                            {{ csrf_field() }}

                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                          
                            <span> {{$useroffers->onEachSide(1)->links()}}</span>
                            </div>
                </div>
            </div>
        </div>

    
       </div>
       
         <br><br>
       
  

@endsection