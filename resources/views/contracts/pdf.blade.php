
  
  <div class="invoice overflow-auto">
    <div style="min-width: 600px">
        <header>
            <div class="row">
                <div class="col">
                    <span>
                        <img src="assets/images/logo-icon.png" width="80" alt="" />
                        <span style="color: #673AB7"> GALV</span>
                    </span>
                </div>
                {{-- <div class="col company-details">
                    <h2 class="name">
                PARC AUTO
            </h2>
                </div> --}}
            </div>
        </header>
        <main>
            <div class="row contacts">
                <div class="col invoice-to">
                    <table border="0" style="border-collapse: collapse; width: 100%; height: 449px;">
                        <tbody>
                        <tr style="height: 74px;">
                        <td style="width: 65.6985%; height: 74px; text-align: center;"><span style="color: #0000ff;"><strong>Contrat de location de voiture</strong></span></td>
                        </tr>
                        <tr style="height: 95px;">
                        <td style="width: 65.6985%; height: 95px;">
                        <div><span>ENTRE LES SOUSSIGNES,</span><span></span></div>
                        <div><span>Appelé ci-aprés le loueur &nbsp;</span><span><b>{{$contractss->users->name}} </b></span><span>,</span><span></span><br /><span>ET</span><span></span></div>
                        <div><span>Appelé ci-aprés le locataire&nbsp;</span><span><b>{{$contractss->clients->first_name}} {{$contractss->clients->last_name}}</b></span><span>,</span></div>
                        <div><span></span></div>
                        <div>
                        <div><span style="color: #0000ff;"><b>IL A ETE CONVENU CE QUI SUIT;</b></span><span></span></div>
                        <div><span>1.1 - Nature et date d'effet du contrat</span><span></span></div>
                        <div><span>Le&nbsp;</span><span>loueur</span><span>&nbsp;met &agrave; disposition du&nbsp;</span><span>locataire</span><span>, un véhicule de marque <b>{{$contractss->car->model}} </b>, immatriculé <b>{{$contractss->car->registration}} </b></span><span></span><br />le {{$contractss->debut_contract}}  jusqu'à {{$contractss->end_contract}} </div>
                        <div>
                        <div><span style="color: #0000ff;"><b>1.2 - Etat du véhicule</b></span><span></span></div>
                        <div><span>Lors de la remise du véhicule et lors de sa restitution, un procés-verbal de l'état du véhicule sera établi</span><span></span><br /><span>entre le locataire et le loueur.</span><span></span><br /><span>Le </span>véhicule devra &ecirc;tre restitué le m&ecirc;me état que lors de sa remise.</div>
                        <div>
                        <div><span>Toutes </span>les détériorations sur le véhicule constatées sur le PV de sortie seront &agrave; la charge du locataire.</div>
                        </div>
                        <div><span>Le locataire certifie &ecirc;tre en possession du permis l'autorisant &agrave; conduire le présent véhicule.</span></div>
                        <div>
                        <div><span style="color: #0000ff;"><strong>1.3 - Prix de la location du de la voiture</strong></span><span></span></div>
                        <div><span>Les parties s'entendent sur un prix de location <b>{{$contractss->amount}}</b> DH&nbsp;et {{$contractss->car->price_day}} Dirhams par jour (calendaires).</span></div>
                        <div>
                        <div><span style="color: #0000ff;"><strong>1.4 - Jour supplémentaires</strong></span><span></span></div>
                        <div><span>Les jours réalisé au-del&agrave; du forfait indiqué &agrave; <strong>l&rsquo;article 1.3</strong> du présent contrat sera facturé au prix de </span><span><B>{{$contractss->car->price_day}}Dirham</B> et une pénalité de 350 DH par jour.</span><span></span></div>
                        <div>
                        <div><span style="color: #0000ff;"><strong>1.5 - Durée et restitution de la voiture</strong></span><span></span></div>
                        <div><span>Le contrat est &agrave; durée indéterminée. Il pourra y &ecirc;tre mis fin par chacune des parties &agrave; tout moment en</span><span></span><br /><span>adressant un courrier recommandé en respectant un préavis d'un mois.</span></div>
                        </div>
                        <div>
                        <div><strong><span style="color: #0000ff;">1.6 - Autres éléments et accessoires</span></strong><span></span></div>
                        <div><span>Le locataire prendra en charge l'ensemble des charges afférentes &agrave; la mise &agrave; disposition du véhicule :</span><span></span></div>
                        <div><span>&nbsp; -Frais d'entretien du véhicule,</span><span></span><br /><span>&nbsp; -Impôts et taxes liés au véhicule,</span><span></span><br /><span>&nbsp; -Les frais d'essence et gasoil,</span><span></span><br /><span>&nbsp; -L'assurance du véhicule.</span></div>
                        <div>
                        <div><strong><span style="color: #0000ff;">1.7 - Clause en cas de litige</span></strong><span></span></div>
                        <div><span>Les parties conviennent expressément que tout litige pouvant naître de l'exécution du présent contrat</span><span></span><br /><span>relévera de la compétence du tribunal de commerce de .</span><span></span><br /><span>Fait en deux exemplaires originaux remis &agrave; chacune des parties,</span><span></span></div>
                        <div><span>Fait en deux exemplaires originaux remis &agrave; chacune des parties,</span><span></span><br /><span>A <strong>Tanger</strong>, le <b>{{$contractss->debut_contract}}</b></span></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </td>
                        </tr>
                        <tr style="height: 113px;">
                        <td style="width: 65.6985%; height: 113px;">
                        <div><strong>Le locataire&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Le Louer</strong><span></span></div>
                        <span>signature procédée de la mention manuscrite&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; signature procédée de la mention manuscrite</span><br />
                        <div><span>bon pour accord&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;bon pour accord</span></div>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        <p></p>
                </div>
            </div>
        
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>
</div>
</div>
</div>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>



