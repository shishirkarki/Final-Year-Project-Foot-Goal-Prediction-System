
@extends('layouts.app')

@section('content')

<div id="Imageback">
    <div class="container">
        <div class="transbox">
               <center> <h2>Here, we can predict football match</h2></center>
               <!-- <center> <h2>Just For Entertainment...!</h2></center> -->
 
        <!-- user name  -->
                <div class ="col-9 pt-3 pl-1">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <form action="/action_page.php">
                            <label for="team">Home Team </label><br>
                                <select id="team" name="team">
                                    <option value="volvo">Barcelona</option>
                                    <option value="saab">real Madrid</option>
                                    <option value="fiat">Arsanal</option>
                                    <option value="audi">PSG</option>
                                </select>
                        </form>
                    <div class="pl-5">
                        <form action="/action_page.php">
                            <label for="team">Away Team </label><br>
                                <select id="team" name="team">
                                    <option value="volvo">Real Madrid</option>
                                    <option value="saab">Arsanal</option>
                                    <option value="fiat">Barselona</option>
                                    <option value="audi">PSG</option>
                                </select>
                        </form>
                    </div>
                </div>
                <br>
                <br>
                <br>
               <div class="pl-5"> <center><button type="submit" class="btn btn-light">Predict</button> </center>
               </div>
        </div>    
    </div>
</div>    
@endsection