  </body>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    var $cat = $('select[name=idKelas]'),
        $items = $('select[name=idSiswa]');

    $cat.change(function(){
        var $this = $(this).find(':selected'),
            rel = $this.attr('rel'),
            $set = $items.find('option.' + rel);

        $items.show().find('option').hide();

        $set.show().first().prop('selected', true);
    });
  });
  $(document).ready(function() {
      $('#example').DataTable( {
          initComplete: function () {
              this.api().columns().every( function () {
                  var column = this;
                  var select = $('<select><option value=""></option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );

                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );

                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
          }
      } );
  } );
  </script>
</html>
