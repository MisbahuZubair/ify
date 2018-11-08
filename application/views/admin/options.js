<script type="text/javascript">
    $(document).ready(function () {
       if ($('[name="Abia"]').is(':checked')) {
           $('#constituency')
                .empty()
                $("#constituency").append("<option value='item'>Item</option>");
            }
        
        else{
            $('#constituency')
                .empty();  } 
                      });
 </script>