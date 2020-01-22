@extends('layouts.app')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1,minimal-ui" name="viewport">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Material+Icons">
  <link rel="stylesheet" href="https://unpkg.com/vue-material/dist/vue-material.min.css">
  <link rel="stylesheet" href="https://unpkg.com/vue-material/dist/theme/default.css">
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
  .card-expansion {
   height: 480px;
 }
 .md-card {
   width: ;
   margin: 4px;
   display: inline-block;
   vertical-align: top;
 }
</style>


<body>
  <template>
  <div id="app" class="body">
    <div class="search-bar" style="text-align: center;">
      <h1>Pokedex Online!</h1>
            <form action="{{ ('/search/submit') }}" method="post" role="search">
        {{ csrf_field() }}
        <div class="input-group">
          <input type="text" class="form-control" name="query"
          placeholder="Search for a Pokemon here" style="border-radius: 30px;
          padding: 25px;"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>
    </div>
    <div class="pokecard">
      <div class="card-expansion">
        <md-card>
          <md-card-media style="text-align: center;">
            <img src="{{$pokemon[0]['sprites']['front_shiny']}}" alt="Pokemon" style="width: 35%">
          </md-card-media>
          <md-card-header>
            <div class="md-title">
              <p style="text-transform: capitalize;">{{$pokemon[0]['name']}}</p>
            </div>
            <div class="md-subhead" style="text-transform: capitalize;">{{ $pokemon[0] ['types'] ['0'] ['type'] ['name'] }}<div>
            </md-card-header>

            <md-card-expand>
              <md-card-actions md-alignment="space-between">
                <div style="display: inline-flex;text-align: center;">
                  <p class="description">Weight</br><i>{{$pokemon[0]['weight']}} lbs</i> </p> 
                  <p class="description">Height</br><i>{{$pokemon[0]['height']}}</i> 
                  </div>
                </md-card-actions>

                <md-card-expand-content>
                  <md-card-content>
                    <p class="description">Ablities</br><i>{{$pokemon[0]['abilities'] [0] ['ability'] ['name'] }}</i></p>  
                  </md-card-content>
                </md-card-expand-content>
              </md-card-expand>
            </md-card>
          </div>

        </div>
        </template>

        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/vue-material"></script>
        <script>
          Vue.use(VueMaterial.default)

          new Vue({
            el: '#app'
          })
          $('#close').click(function(){
            $(this).parent().toggleClass('closed');
            $(this).prev().focus();
          });

          setTimeout(function() {
            $('#close').click();
          }, 100);

          setTimeout(function() {
            $('#close').click();
          }, 1500);
        </script>


      </body>
      </html>
      @endsection
