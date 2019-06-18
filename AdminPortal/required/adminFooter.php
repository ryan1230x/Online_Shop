<?php
echo <<<_end
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(".materialboxed").materialbox();

    $(".fixed-action-btn").floatingActionButton();

    $(".modal").modal();
        
    $("#card_description").characterCounter();
    
    $("select").formSelect();
  
  


    

    

  })

</script>
</body>
</html>
_end;
