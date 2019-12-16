<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Lancé de dés DJD</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="plateau">
        <div class="bloc-de">
            <div class="nb-de"><img src="img/nb-de.png" alt="2 dés blancs" title="Nombre de dés">
                <select name="nb-de" id="nb-de-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="type-de"><img src="img/type-de.png" alt="1 dé blanc" title="Type de dé">
                <select name="type-de" id="type-de-select">
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="20">20</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="bonus-malus-de">
                <img src="img/bonus-malus.png" alt="+ ou -" title="Bonus/Malus">
                <input type="number" name="bonus-malus-de" class="b-n-de">
            </div>
            <div class="btn-de"><input type="submit" class="call-result-de" value="Go"></div>
        </div>
    
    <div class="result-de"></div>
    </div>
   
    <div class="player-list">
        <?php 
        
        $dir = 'players/';
        $filesplayers = scandir($dir);
        
        for($i = 2; $i < count($filesplayers); $i++) {
            echo '<div class="player-bloc player-' . $i . '" id="' . substr($filesplayers[$i], 0, -5) . '">';
            include $dir.$filesplayers[$i];
            echo '</div>';
        }
        
        ?>  
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var nbDe = jQuery('select#nb-de-select');
            var typeDe = jQuery('select#type-de-select');
            var bNDe = jQuery('input.b-n-de');
            var blocReusltDe = jQuery('.result-de');
            
            jQuery('.call-result-de').click(function() {
                var nbDeVal = nbDe.find("option:selected").val(); 
                var typeDeVal = Math.floor((Math.random() * typeDe.find("option:selected").val()) + 1);
                
                if(bNDe.val() == '') {
                   var bNDeVal = 0; 
                } else {
                    var bNDeVal = bNDe.val();   
                }
                
                var resultDe = (nbDeVal * typeDeVal) + parseInt(bNDeVal);
                blocReusltDe.text(resultDe);
            });
        });
    </script>
</body>

</html>
