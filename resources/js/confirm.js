(function () {
    $(document).ready(function () {
        $(".delete").on("submit", function(){
            return confirm("Toute suppression est définitive. Voulez-vous vraiment le supprimer ?");
        });
    });
})($);