<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Media/Javascript/materialize.js"></script>


<script>
    $(document).ready(function() {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
        $('select').material_select();
        $('.chips-placeholder').material_chip({
            placeholder: 'Enter a tag',
            secondaryPlaceholder: '+Tag',
        });
        $(".button-collapse").sideNav();
        $('.chips-placeholder').material_chip({
            secondaryPlaceholder: '+Mot clé',
        });
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 200 // Creates a dropdown of 15 years to control year
        });
        $(document).ready(function(){
            $('ul.tabs').tabs();
        });
    })
</script>