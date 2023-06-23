         <footer>
            <div class="a">
                <div class="col-lg-12">
                    <p style="color:white;">Copyright &copy; Lab Managed Services <script>document.write(new Date().getFullYear())</script> </p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    <!-- jQuery -->

    <script type="text/javascript" src="/assets/back/js/custom/common.js"></script>

    <script>
        $("#selectAllBoxes").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
</body>
</html>