<x-app-layout>
    <x-slot name="navbar">
        <nav class="navbar navbar-light bg-white fixed-top shadow-sm" id ="navigation">
            <div class="container">
                <span class="navbar-brand mb-0 h1">CREPIS</span>

                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#methods">Nos méthodes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Notre équipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#solutions">Nos solutions</a>
                    </li>
                </ul>
            </div>
            
        </nav>
    </x-slot>

    <div class="masterhead">
        <section id="home">
            <header>
                <div class="overlay"></div>
                <video playsinline autoplay muted loop>
                    <source src="{{ asset('/videos/welcome-x2.mp4') }}" type="video/mp4">
                </video>
                <div class="container h-100">
                    <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">Bienvenue au CREPIS</h1>
                        <p class="lead mb-0">Centre de Recherches et d'Expérimentations Poétiques pour des Intérieurs Soutenables</p>
                    </div>
                    </div>
                </div>
            </header>
        </section>
    </div>

    <div class="container">
        <section id="about">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-12">
                        <p>Bienvenue sur le site du CREPIS, le Centre de Recherches et d'Expérimentations Poétiques pour des Intérieurs Soutenables.<br><br>
                                        En cette période de pandémie et de mutation des pratiques (tant économiques, que sociales, politiques, techniques, artistiques et écologiques), le groupe de recherche du CREPIS se saisit de la question des « intérieurs soutenables ». Alors que nombre de situations quotidiennes deviennent plus énervantes, révoltantes, désespérantes, anxiogènes, pénibles, crispantes ou absurdes, le CREPIS travaille à formuler des stratégies aisément réappropriables pour vous permettre de souffler un peu, tenir le coup, décompresser ou tout simplement traverser au mieux ces temps confinés.<br><br> 
                                        Bien plus qu'un think-tank, le CREPIS s'est construit dans un souci de collégialité centrée sur l’humain, partant du constat qu'efficience pouvait être conjuguée avec résilience.<br><br>
                                        Ses membres sont issu·e·s d'horizons différents mais tous animé·e·s d'une même motivation : chercher à décloisonner la pensée au-delà des limites imposées par des mesures de confinement ou autres restrictions collectives/individuelles.<br><br>
                                        Grâce à une approche transdisciplinaire et holistique, dans le respect des gestes barrières et des standards de la recherche académique par les moyens de l'art (en toute indépendance et transparence), le CREPIS a su mettre à profit aussi bien la puissance de l'intelligence collective que les opportunités offertes par le digital.<br><br>
                                        Aujourd'hui, nos méthodes innovantes nous permettent de proposer des solutions de bien-être pour tous et toutes.<br><br>
                                        Mais le travail doit se poursuivre, et vous aussi pouvez être acteur ou actrice du processus !</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="methods">
            <div class="container">
                <h1>Nos méthodes</h1>
            </div>
            
        </section>
        <section id="team">
            <div class="container">
                <h1>Notre équipe</h1>
            </div>
            
        </section>
        <section id="solutions">
            <div class="container">
                <h1>Nos solutions</h1>

                <div class="row" id="app">
                    <carousel></carousel>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="/generator" class="btn btn-lg btn-info fw-bold" role="Button">Générer ma propre solution</a>
                    </div>
                    
                </div>
            </div>
            
        </section>
    </div>
</x-app-layout>