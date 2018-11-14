@extends('layouts.app')

@section('content')  
<div class="container">
    {{-- <img style="width:100%;" src="/storage/cover_images/headers/header-maasim.jpg" class="img-fluid" alt="Responsive image"> --}}
        <div class="jumbotron">   
                        <h1>Welcome To {{$title}}</h1>
                        <p>This is the official information website for the municipality of Maasim</p>
        </div>
        {{-- <div class="panel right text-center col-md-5">
        <clock-app></clock-app>
        </div> --}}
        <div class="row featurette">
                        <div class="col-md-7">
                          <calendar-app></calendar-app>
                        </div>
                        <div class="col-md-5">
                          <clock-app class="right"></clock-app>
                          <img style="width:100%;" class="featurette-image img-fluid mx-auto" src="/storage/cover_images/headers/header-home.png" alt="Generic placeholder image">
                           <h2 class="featurette-heading">Maasim Municipality</h2>
                          <p class="text-justify">Maasim, officially the Municipality of Maasim, is a 1st class municipality in the province of Sarangani, Philippines. According to the 2015 census, it has a population of 59,468 people. The majority of the population are Moro and Lumad origin. One of the indigenous peoples living in mountainous areas of Maasim is known as Bla'an. It is bordered on the west by the municipality of Kiamba, on the easy by Sarangani Bay, on the north by South Cotabato, and on the south by the Celebes Sea. Maasim is subdivided into 16 barangays which are Amsipit, Bales, Colon, Daliao, Kabatiol, Kablacan, Kamanga, Kanalo Lumasal, Lumatil, Malbang, Nomoh, Pananag, Poblacion, (Maasim) Seven Hills, and Tinoto. The economy of Maasim is largely based on agriculture with a high - level production of copra (dried coconut meat). Animal husbandry is the second biggest income earner, notably cattle farming. Other agricultural products are coconuts, maize (corn), sugarcane, bananas, pineapples, mangoes, eggs, beef, and fish. The economy has accelerated in the past decade driven by advances in global communication technology and the finishing of a modern highway that tremendously improved trade and transport.</p>
                        </div>
                        <div class="col-md-5">
                          <img style="width:50%;" src="/storage/cover_images/vision.svg" class="img-fluid" alt="Responsive image">
                          <h2>Our Vision</h2>
                          <h4 class="text-justify">
                            Poblacion Maasim is the agro-industrial center of Sarangani and home of vigilant people governed by leaders advocating good governance in a peaceful and ecologically-balanced environment.
                          </h4>
                        </div>
                        <div class="col-md-5 right">
                            <img style="width:50%;" src="/storage/cover_images/mission.svg" class="img-fluid" alt="Responsive image">
                          <h2>Our Mission</h2>
                          <h4 class="text-justify">
                            The Local Government Unit of Poblacion Maasim will work in solidarity to promote the well-being of the people thru effective and efficient delivery of basic services, sustained economic growth, environmental regeneration, and democratic governance.
                          </h4>
                        </div>
                      </div>
        </div>
@endsection             