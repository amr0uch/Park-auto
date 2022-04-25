@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<script>
    $(function() {

var format = "yy-mm-dd";
var today = new Date();

  from = $( "#debut_contract" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      dateFormat: format,
      minDate:today,
      showButtonPanel: true,
})
.on("change", function() {
  to.datepicker( "option", "minDate", getDate( this ) );
}),
  to = $( "#end_contract" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
     dateFormat: format,
    numberOfMonths: 2,
    showButtonPanel: true,
  })
  .on( "change", function() {
    from.datepicker( "option", "maxDate", getDate( this ) );
  });

function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
      return date;
}
});



// auto calculate price and fill it in the total price input
function calcPrice(){
var out = document.getElementById('debut_contract').value;
var ins 	= document.getElementById('end_contract').value;
var price_day = document.getElementById('price_day').value;
var date1 = new Date(out);
var date2 = new Date(ins);
var time_difference = date2.getTime() - date1.getTime();
var days_difference = Math.ceil(time_difference / (1000 * 3600 * 24) * parseInt(price_day));

var total = days_difference;
document.getElementById('amount').value = total;

}


function processForm(){
var amount = document.getElementById('amount').value;
alert(amount);
}
</script>

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer le Contrat </h3>
                <hr>
                
                    <form action="{{route('contracts.update',$contracts->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')    

                    <div class="row">        
                        <div class="col"> 
                            <label for=""><b> Client*</b></label>
                      <select name="id_client" class="custom-select" id="id_client" required>                                
                        @foreach ($clients as $client)
                      
                            <option value="{{$client->id}}" {{ $client->id == $contracts->id_client ? 'selected' : '' }}>{{$client->first_name}}
                            {{$client->last_name}}
                            </option>
                          
                        @endforeach
                    </select>
                </div> 
                    <div class="col"> 
                    <label for=""><b> Employée*</b></label>
                    <select name="id_user" class="custom-select" id="id_user" required>                                
                        @foreach ($users as $user)
                      
                            <option value="{{$user->id}}" {{ $user->id == $contracts->id_user ? 'selected' : '' }}>{{$user->name}}</option>
                          
                        @endforeach
                        
                    </select>
                </div> 
            </div> 
            <br>
            <div class="form-group">
            <label for=""><b> Matriculation *</b></label>
            <select name="id_car" class="custom-select" id="id_car" required>                                
                @foreach ($cars as $car)
              
                    <option value="{{$car->id}}" {{ $car->id == $contracts->id_car ? 'selected' : '' }}data-price="{{$car->price_day}}" >{{$car->registration}}</option>
                  
                @endforeach
            </select>  
         </div>         
                       <div class="form-group">
                            <label for="debut_contract"><b> Debut de Contart*</b></label>
                            <input type="date" class="form-control" placeholder="Date de debut Contrat" id="debut_contract"  name="debut_contract" value="{{$contracts->debut_contract}}" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="end_contract"><b> Fin de Contrat*</b></label>
                            <input type="Date" placeholder="Fin de contrat " class="form-control" onblur="calcPrice()" id="end_contract" name="end_contract" value="{{$contracts->end_contract}}" required>
                        </div>
                        <div class="form-group">
                            <label for="price_day"><b> prix par jour*</b></label>
                            <input type="text" placeholder=" prix par jour " class="form-control" onblur="calcPrice()" id="price_day" name="price_day" value="{{$contracts->price_day}}" required>
                        </div>
                        <div class="form-group">
                        <label for="amount"><b> Montant*</b></label>
                        <input type="text" placeholder="Montant " class="form-control"  id="amount" name="amount" value="{{$contracts->amount}}" readonly/>
                        </div>

                        
                        <button type="submit" class="btn btn-success">Editer</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>
<script type="text/javascript" >
    let sel = document.getElementById('id_car');
    sel.addEventListener('click', function (e) {
        let price = e.srcElement.selectedOptions["0"].dataset.price;
        document.getElementById('price_day').value = price; });
</script>


@endsection