@extends('app-view.layouts')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:100% ;">
            <div class="card">
                <div class="card-header">
                         <h2> {{$offer->type->name}}  </h2>
                </div>
                <div class="card-body">
                    
                    {{-- LIVEWIRE(CHECKBOXES) --}}

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                    <th>ID</th>
                                    <th>User </th>
                                    <th>Saving</th>
                                    <th>Pin</th>

                                   
                                    <!-- <th>Actions</th> -->
	
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usersoffers as $offer)
                              
                                <tr style="font-size: 90%">
     
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $offer->user->name }}</td>  
                                    <td>
                                        
                                        {{$offer->saving}}$
                            
                                    </td>

                                    
                                    <td>
                                        
                                        {{$offer->code}}
                            
                                    </td>
                                
                                    {{ csrf_field() }}

                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








{{-- {{$month}} <br>
{{$users}} --}}
@endsection   