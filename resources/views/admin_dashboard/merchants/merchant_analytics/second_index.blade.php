@extends('app-view.layouts')
@section('content')

<div class="AdminAna">
    <div class="AnalyticContainers">
        <div class="AnalyticContainer"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
            <div>
                <p style="margin: 0"><b>Most sold type :</b></p>
                <p style="margin-bottom:0">{{ $mostSoldType->name }}</p>
            </div>
        </div>
        <div class="AnalyticContainer">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
                <path d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z"/>
            </svg>
            <div>
                <p style="margin: 0"><b>Most loyal customer:</b></p>
                <p style="margin-bottom:0">{{ $mostLoyalCustomer->name }}</p>
            </div> 
        </div>
        <div class="AnalyticContainer">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
            </svg>
            <div>
                <p style="margin: 0 0 0.5rem 0"><b>Total customers :</b></p>
                <p style="margin-bottom:0">{{ $totalCustomerNumber }}</p>
            </div> 
        </div>
    </div>

    <div class="analyticsTopBtns"> 
        <div class="analyticsBtnsHub">
            <a href="/merchant-analytics">Buy One Get one</a>
            <a href="/merchant-analytics1" style="color: white ; background-color: black;">Discount</a>
            <a href="/merchant-analytics2">Total</a>
        </div>
        <a href="/merchant-analytics/table" class="createBtn"> 
            Tables  &nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right " viewBox="0 0 16 16" style="size: 20px">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>  
        </a> 
    </div>

    <div>
        <h2>Discount</h2>
        <div class="graph">
            <div style="width: 70%">
                <canvas  id="discount" width="70" height="30"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
<script  type="text/javascript">  
    
    var discount = [
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0
      ];
  
    @php
    
    $discount = json_decode($discount, true);
  
    for($i = 0;$i < count($discount);$i++){
      echo "discount[" . ($discount[$i]['month'] - 1) . "] = " . $discount[$i]['num'] . ";";
    }
  
    @endphp
  
    console.log(discount);
  
    getDiscountRecieved(discount);
    
</script>
@endsection