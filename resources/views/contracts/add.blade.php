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
                <h3 class="card-titl">Ajouter une contrat </h3>
                <hr>
                
                    <form action="{{route('contracts.index')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                    <div class="row">        
                        <div class="col">   
                            <label for=""><b>Employées*</b></label>
                    <select name="id_user" class="custom-select" id="id_user" required>
                            <option selected>Nom d'employé</option>
                            @foreach ($users as $user )
                            <option value="{{$user->id}}"  >{{$user->name}}</option>
                             @endforeach
                            </select>
                        </div>   
                        <div class="col">
                            <label for=""><b>Clients*</b></label>
                    <select name="id_client" class="custom-select" id="id_client" required>                      
                        <option selected>Nom de Client</option>
                        @foreach ($clients as $client )
                        <option value="{{$client->id}}" >{{$client->first_name}} {{$client->last_name}}</option> 
                        @endforeach
                        </select>
                        </div>
                    </div>  
                    <br>
                    <div class="form-group">
                        <label for=""><b>Voiture*</b></label>
                    <select name="id_car" class="custom-select" id="id_car">                       
                        <option selected value="id_car">Matriculation de Voiture</option>
                        @foreach ($cars as $car )
                        @if ($car->id_status == 1)
                      
                        <option value="{{$car->id}}" data-price="{{$car->price_day}}" >{{$car->registration}}</option>
                        @endif
                      @endforeach
                        </select>
                    </div>
                   

                   
                        <div class="form-group">
                            <label for="debut_contract"><b> Debut de contrat*</b></label>
                            <input type="date" class="form-control" placeholder="Date de Debut" id="debut_contract"  name="debut_contract" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="end_contract"><b> Fin de contrat*</b></label>
                            <input type="date" placeholder="Date de fin" class="form-control" id="end_contract"  onblur="calcPrice()" name="end_contract" required>
                        </div>
                        <div class="form-group">
                            <label for="price_day"><b> Prix par jour*</b></label>
                            <input type="number" placeholder="Prix par jour" class="form-control price"  onblur="calcPrice()" id="price_day" name="price_day" value="" required>
                        </div>
                        <div class="form-group">
                        <label for="amount"><b> Montant*</b></label>
                        <input type="number" placeholder="Montant" class="form-control" id="amount" name="amount" readonly />  
                        </div>
                                                
                        <br>        
                       
                         
                         
                        
                        <button type="submit" class="btn btn-success">Ajouter le Contrat</button>
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