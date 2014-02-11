<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
    <input type="text" name="some_name" value="" id="some_name" />
    <div id="date">
        date ici
    </div>
    <input type="button" name="refresh" value="rafraîchir la date" id="refresh" />
    <script type="text/javascript" charset="utf-8">
        function Horloge() {
            jQuery.ajax({
                url: "date.php"
            }).done(function(retour) {
                jQuery('#date').html(retour);
            });
        }
        jQuery('#refresh').on('click', function() {
            var timer = setInterval(Horloge, 1000);
        });
    </script>
</body>
</html>
