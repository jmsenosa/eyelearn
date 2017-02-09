 <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Eye Learn <?php echo date('Y'); ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->


</body>
</html>
<script>
    $('.lettersonly').on('keypress',function(event){
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z ]/g,'') );
    });
    
    
    $('.lettersonly').on('blur', function(){
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z ]/g,'') );
    });
    
     $('.numbersonly').on('keypress',function(event){
        var inputValue = event.which;
        // numbers only.
        if(!(inputValue >= 48 && inputValue <= 57)) { 
            event.preventDefault(); 
        }
    });
    
     $('.numbersonly').on('blur', function(){
        var node = $(this);
        node.val(node.val().replace(/[^0-9]/g,'') );
    });
     
    $('.date-picker').datepicker({ beforeShowDay: $.datepicker.noWeekends  });

</script>