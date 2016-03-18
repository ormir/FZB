<script>
$(document).ready(function(){
    $(".dropdown").on("show.bs.dropdown", function(event){
        var x = $(event.relatedTarget).text(); // Get the button text
        alert("You clicked on: " + x);
    });
});
$(document).ready(function(){
    $(".dropdown-toggle").dropdown("toggle");
});
</script>