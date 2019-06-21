/**
 * Return a pop-in confirm when the delete class form is submit
 * Prevent to delete accidentally
 */

(function () {
    $(document).ready(function () {
        $(".delete").on("submit", function(){
            return confirm("Toute suppression est définitive. Voulez-vous vraiment le supprimer ?");
        });
    });
})($);